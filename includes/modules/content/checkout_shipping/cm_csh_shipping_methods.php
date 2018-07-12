<?php
/*
  $Id$

  Modular Checkout by @raiwa
  info@oscaddons.com
  www.oscaddons.com
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/

  class cm_csh_shipping_methods {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_TITLE;
      $this->description = MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_DESCRIPTION;
      $this->description .= '<div class="secWarning">' . MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION . '</div>';

      if ( defined('MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $order, $cartID, $cart, $shipping, $sendto, $messageStack, $total_count, $total_weight, $free_shipping, $shipping_modules, $quotes, $quote, $currencies, $sessiontoken, $redirect_to_payment; // plus a dynamic one below
      
        require('includes/classes/order.php');
        $order = new order;
      
      // register a random ID in the session to check throughout the checkout procedure
      // against alterations in the shopping cart contents
        if (!tep_session_is_registered('cartID')) {
          tep_session_register('cartID');
        } elseif (($cartID != $cart->cartID) && tep_session_is_registered('shipping')) {
          tep_session_unregister('shipping');
        }
      
        $cartID = $cart->cartID = $cart->generate_cart_id();
      
      // if the order contains only virtual products, forward the customer to the billing page as
      // a shipping address is not needed
        if ($order->content_type == 'virtual') {
          if (!tep_session_is_registered('shipping')) tep_session_register('shipping');
          $shipping = false;
          $sendto = false;
          $redirect_to_payment[] = true;
        }
      
        $total_weight = $cart->show_weight();
        $total_count = $cart->count_contents();
      
      // load all enabled shipping modules
        require('includes/classes/shipping.php');
        $shipping_modules = new shipping;
      
        if ( defined('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING') && (MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING == 'true') ) {
          $pass = false;
        
          switch (MODULE_ORDER_TOTAL_SHIPPING_DESTINATION) {
            case 'national':
            if ($order->delivery['country_id'] == STORE_COUNTRY) {
              $pass = true;
            }
            break;
            case 'international':
            if ($order->delivery['country_id'] != STORE_COUNTRY) {
              $pass = true;
            }
            break;
            case 'both':
            $pass = true;
            break;
          }
        
          $free_shipping = false;
        
          if ( ($pass == true) && ($order->info['total'] >= MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER) ) {
            $free_shipping = true;
        
            include('includes/languages/' . $language . '/modules/order_total/ot_shipping.php');
          }
        } else {
          $free_shipping = false;
        }
    
      // process the selected shipping method
        if ( isset($_POST['action']) && ($_POST['action'] == 'process') && isset($_POST['formid']) && ($_POST['formid'] == $sessiontoken) ) {
      
          if (!tep_session_is_registered('shipping')) tep_session_register('shipping');
        
          if ( (tep_count_shipping_modules() > 0) || ($free_shipping == true) ) {
      
            if ( (isset($_POST['shipping'])) && (strpos($_POST['shipping'], '_')) ) {
              $shipping = $_POST['shipping'];
          
              list($module, $method) = explode('_', $shipping);
              global $$module;
              if ( is_object($$module) || ($shipping == 'free_free') ) {
                if ($shipping == 'free_free') {
                  $quote[0]['methods'][0]['title'] = FREE_SHIPPING_TITLE;
                  $quote[0]['methods'][0]['cost'] = '0';
                } else {
                  $quote = $shipping_modules->quote($method, $module);
                }
                if (isset($quote['error'])) {
                  tep_session_unregister('shipping');
                } else {
                  if ( (isset($quote[0]['methods'][0]['title'])) && (isset($quote[0]['methods'][0]['cost'])) ) {
                    $shipping = array('id' => $shipping,
                            'title' => (($free_shipping == true) ?  $quote[0]['methods'][0]['title'] : $quote[0]['module'] . ' (' . $quote[0]['methods'][0]['title'] . ')'),
                            'cost' => $quote[0]['methods'][0]['cost']);
            
                    $redirect_to_payment[] = true;
                  }
                }
              } else {
                tep_session_unregister('shipping');
              }
            }
          } else {
            if ( defined('SHIPPING_ALLOW_UNDEFINED_ZONES') && (SHIPPING_ALLOW_UNDEFINED_ZONES == 'False') ) {
              tep_session_unregister('shipping');
            } else {
              $shipping = false;
              $redirect_to_payment[] = true;
            }
          }
        }
    
      // get all available shipping quotes
        $quotes = $shipping_modules->quote();
      
      // if no shipping method has been selected, automatically select the cheapest method.
      // if the modules status was changed when none were available, to save on implementing
      // a javascript force-selection method, also automatically select the cheapest shipping
      // method if more than one module is now enabled
        if ( !tep_session_is_registered('shipping') || ( tep_session_is_registered('shipping') && ($shipping == false) && (tep_count_shipping_modules() > 1) ) ) $shipping = $shipping_modules->cheapest();
      
        if ( defined('SHIPPING_ALLOW_UNDEFINED_ZONES') && (SHIPPING_ALLOW_UNDEFINED_ZONES == 'False') && !    tep_session_is_registered('shipping') && ($shipping == false) ) {
          $messageStack->add_session('checkout_address', ERROR_NO_SHIPPING_AVAILABLE_TO_SHIPPING_ADDRESS);
          tep_redirect(tep_href_link('checkout_shipping_address.php', '', 'SSL'));
      }
	
      if (tep_count_shipping_modules() > 0) {
      
        $content_width = (int)MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_CONTENT_WIDTH;

        ob_start();
        include('includes/modules/content/' . $this->group . '/templates/tpl_' . basename(__FILE__));
        $template = ob_get_clean();

        $oscTemplate->addContent($template, $this->group);
        
      }
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Shipping Methods Module', 'MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_STATUS', 'True', 'Should this module be shown on the checkout shipping page?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Width', 'MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_CONTENT_WIDTH', '12', 'What width container should the content be shown in?', '6', '1', 'tep_cfg_select_option(array(\'12\', \'11\', \'10\', \'9\', \'8\', \'7\', \'6\', \'5\', \'4\', \'3\', \'2\', \'1\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_SORT_ORDER', '300', 'Sort order of display. Lowest is displayed first.', '6', '1', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_STATUS', 'MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_CONTENT_WIDTH', 'MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_SORT_ORDER');
    }
  }
