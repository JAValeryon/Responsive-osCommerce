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

  class cm_csa_address_book_entries {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_TITLE;
      $this->description = MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_DESCRIPTION;
      $this->description .= '<div class="secWarning">' . MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION . '</div>';

      if ( defined('MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $process, $addresses_count, $customer_id, $sendto, $sessiontoken, $redirect_to_shipping;
      
      $content_width = (int)MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_CONTENT_WIDTH;

// process the selected shipping destination
      if ( isset($_POST['action']) && ($_POST['action'] == 'submit') && isset($_POST['formid']) && ($_POST['formid'] == $sessiontoken) ) { 
        $process = true;
        if ( (!tep_not_null($_POST['firstname']) && !tep_not_null($_POST['lastname']) && !tep_not_null($_POST['street_address'])) && isset($_POST['address']) ) {
          $reset_shipping = false;
          if (tep_session_is_registered('sendto')) {
            if ($sendto != $_POST['address']) {
              if (tep_session_is_registered('shipping')) {
                $reset_shipping = true;
              }
            }
          } else {
            tep_session_register('sendto');
          }
    
          $sendto = $_POST['address'];
    
          $check_address_query = tep_db_query("select count(*) as total from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' and address_book_id = '" . (int)$sendto . "'");
          $check_address = tep_db_fetch_array($check_address_query);
    
          if ($check_address['total'] == '1') {
            if ($reset_shipping == true) tep_session_unregister('shipping');
            $redirect_to_shipping[] = true;
          } else {
            tep_session_unregister('sendto');
          }
        }
      }
      
      $addresses_count = tep_count_customer_address_book_entries();

      if ( $process == false && $addresses_count > 1 ) {
        $addresses_query = tep_db_query("select address_book_id, entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "'");
        
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
      return defined('MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Address Book Entries Module', 'MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_STATUS', 'True', 'Should this module be shown on the checkout shipping address page?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Width', 'MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_CONTENT_WIDTH', '12', 'What width container should the content be shown in?', '6', '1', 'tep_cfg_select_option(array(\'12\', \'11\', \'10\', \'9\', \'8\', \'7\', \'6\', \'5\', \'4\', \'3\', \'2\', \'1\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_SORT_ORDER', '300', 'Sort order of display. Lowest is displayed first.', '6', '1', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_STATUS', 'MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_CONTENT_WIDTH', 'MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_ADDRESS_BOOK_ENTRIES_SORT_ORDER');
    }
  }
