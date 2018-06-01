<?php
/*
  $Id: cm_sc_product_listing.php
  $Loc: catalog/includes/modules/content/shopping_cart/
  Version 2.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2016 osCommerce

  Released under the GNU General Public License
*/

  class cm_sc_product_listing {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_SC_PRODUCT_LISTING_TITLE;
      $this->description = MODULE_CONTENT_SC_PRODUCT_LISTING_DESCRIPTION;

      if ( defined('MODULE_CONTENT_SC_PRODUCT_LISTING_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_SC_PRODUCT_LISTING_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_SC_PRODUCT_LISTING_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $cart, $products, $currencies, $languages_id, $any_out_of_stock;
	  
	  $content_width = (int)MODULE_CONTENT_SC_PRODUCT_LISTING_CONTENT_WIDTH;
	  
	  if ($cart->count_contents() > 0) {
	  	
	  	$any_out_of_stock = 0;
	  	$products = $cart->get_products();
      $products_name = NULL;
      
	  	for ($i=0, $n=sizeof($products); $i<$n; $i++) {
	  		// Push all attributes information in an array
	  		if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
	  		  foreach($products[$i]['attributes'] as $option => $value) {
	  				$products_name .= tep_draw_hidden_field('id[' . $products[$i]['id'] . '][' . $option . ']', $value);
	  				$attributes = tep_db_query("select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix
																				from products_options popt, products_options_values poval, products_attributes pa
																				where pa.products_id = '" . (int)$products[$i]['id'] . "'
																				and pa.options_id = '" . (int)$option . "'
																				and pa.options_id = popt.products_options_id
																				and pa.options_values_id = '" . (int)$value . "'
																				and pa.options_values_id = poval.products_options_values_id
																				and popt.language_id = '" . (int)$languages_id . "'
																				and poval.language_id = '" . (int)$languages_id . "'");
						$attributes_values = tep_db_fetch_array($attributes);

						$products[$i][$option]['products_options_name'] = $attributes_values['products_options_name'];
						$products[$i][$option]['options_values_id'] = $value;
						$products[$i][$option]['products_options_values_name'] = $attributes_values['products_options_values_name'];
						$products[$i][$option]['options_values_price'] = $attributes_values['options_values_price'];
						$products[$i][$option]['price_prefix'] = $attributes_values['price_prefix'];
					}
        }
      }
	  
      $products_name .= '<table class="table table-striped table-condensed">';
    	$products_name .= '  <tbody>';
      
      for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      	$products_name .= '   <tr>';

      	$products_name .= '      <td valign="top" align="center"><a href="' . tep_href_link('product_info.php', 'products_id=' . $products[$i]['id']) . '">' . tep_image('images/' . $products[$i]['image'], $products[$i]['name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></td>' .
                        	'      <td valign="top"><a href="' . tep_href_link('product_info.php', 'products_id=' . $products[$i]['id']) . '"><strong>' . $products[$i]['name'] . '</strong></a>';

        if (STOCK_CHECK == 'true') {
        	$stock_check = tep_check_stock($products[$i]['id'], $products[$i]['quantity']);
        	if (tep_not_null($stock_check)) {
        		$any_out_of_stock = 1;

        		$products_name .= $stock_check;
        	}
        }

        if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
          foreach($products[$i]['attributes'] as $option => $value) {
        		$products_name .= '<br /><small><i> - ' . $products[$i][$option]['products_options_name'] . ' ' . $products[$i][$option]['products_options_values_name'] . '</i></small>';
        	}
        }

        $products_name .= '<br>' . tep_draw_input_field('cart_quantity[]', $products[$i]['quantity'], 'style="width: 65px;" min="0"', 'number') . tep_draw_hidden_field('products_id[]', $products[$i]['id']) . ' ' . 
      									   tep_draw_button(CART_BUTTON_UPDATE, 'fas fa-sync', NULL, NULL, NULL, 'btn-info btn-xs') . ' ' . tep_draw_button(CART_BUTTON_REMOVE, 'fas fa-times', tep_href_link('shopping_cart.php', 'products_id=' . $products[$i]['id'] . '&action=remove_product'), NULL, NULL, 'btn-danger btn-xs');
      	$products_name .= '     </td>';

      	$products_name .= '     <td class="text-right"><strong>' . $currencies->display_price($products[$i]['final_price'], tep_get_tax_rate($products[$i]['tax_class_id']), $products[$i]['quantity']) . '</strong></td>' .
      									  '   </tr>';
      }
      
	    $products_name .= ' </tbody>';
	    $products_name .= '</table>';

      ob_start();
      	include('includes/modules/content/' . $this->group . '/templates/tpl_' . basename(__FILE__));
        $template = ob_get_clean();

        $oscTemplate->addContent($template, $this->group);
			} // end if $cart->count_contents() > 0
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_CONTENT_SC_PRODUCT_LISTING_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Shopping Cart Product Listing', 'MODULE_CONTENT_SC_PRODUCT_LISTING_STATUS', 'True', 'Do you want to add the module to your shop?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Width', 'MODULE_CONTENT_SC_PRODUCT_LISTING_CONTENT_WIDTH', '12', 'What width container should the content be shown in?', '6', '2', 'tep_cfg_select_option(array(\'12\', \'11\', \'10\', \'9\', \'8\', \'7\', \'6\', \'5\', \'4\', \'3\', \'2\', \'1\'), ', now())");
	  tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_SC_PRODUCT_LISTING_SORT_ORDER', '100', 'Sort order of display. Lowest is displayed first.', '6', '3', now())");
   }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_SC_PRODUCT_LISTING_STATUS', 'MODULE_CONTENT_SC_PRODUCT_LISTING_CONTENT_WIDTH', 'MODULE_CONTENT_SC_PRODUCT_LISTING_SORT_ORDER');
    }
  }
