<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  class flat7 {
    var $code, $title, $description, $icon, $enabled;

// class constructor
    function __construct() {
      global $order;

      $this->code = 'flat7';
      $this->title = MODULE_SHIPPING_FLAT7_TEXT_TITLE;
      $this->description = MODULE_SHIPPING_FLAT7_TEXT_DESCRIPTION;
      if ( defined('MODULE_SHIPPING_FLAT7_STATUS') ) {
          $this->sort_order = MODULE_SHIPPING_FLAT7_SORT_ORDER;
          $this->icon = '';
          $this->tax_class = MODULE_SHIPPING_FLAT7_TAX_CLASS;
          $this->enabled = ((MODULE_SHIPPING_FLAT7_STATUS == 'True') ? true : false);
      }

      if ( ($this->enabled == true) && ((int)MODULE_SHIPPING_FLAT7_ZONE > 0) ) {
        $check_flag = false;
        $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_SHIPPING_FLAT7_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
        while ($check = tep_db_fetch_array($check_query)) {
          if ($check['zone_id'] < 1) {
            $check_flag = true;
            break;
          } elseif ($check['zone_id'] == $order->delivery['zone_id']) {
            $check_flag = true;
            break;
          }
        }

        if ($check_flag == false) {
          $this->enabled = false;
        }
      }
      
      
      // disable the module if the order contains a product not valid for canarias
      if ($this->enabled == true) {
          $this->enabled = $this->getCanariasShipStatus();
      }	      
      
    }

function getCanariasShipStatus() {
        global $order;
        $whereclause = "";
        $id = 0;
        $primero = true;
        $n=0;
        
        if(is_array($order->products)){
          $n = sizeof($order->products);
        }

        if ($n > 0) {
            for ($i = 0, $n; $i < $n; $i++) {
                $id = $order->products[$i]['id'];
                if ($primero == true) {
                    $whereclause = "(products_id = '" . $id . "' )";
                    $primero = false;
                } else {
                    $whereclause = $whereclause . "OR (products_id = '" . $id . "' )";
                }
            }

            $uship_check_query = tep_db_query("select sum(products_canarias_status) as uship2 from products where " . $whereclause);
            $check = tep_db_fetch_array($uship_check_query);

            if ($check['uship2'] >= 1) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }    
    
    
// class methods
    function quote($method = '') {
      global $order;

      $this->quotes = array('id' => $this->code,
                            'module' => MODULE_SHIPPING_FLAT7_TEXT_TITLE,
                            'methods' => array(array('id' => $this->code,
                                                     'title' => MODULE_SHIPPING_FLAT7_TEXT_WAY,
                                                     'cost' => MODULE_SHIPPING_FLAT7_COST)));

      if ($this->tax_class > 0) {
        $this->quotes['tax'] = tep_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
      }

      if (tep_not_null($this->icon)) $this->quotes['icon'] = tep_image($this->icon, $this->title);

      return $this->quotes;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_FLAT7_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Flat Shipping', 'MODULE_SHIPPING_FLAT7_STATUS', 'True', 'Do you want to offer flat rate shipping?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Shipping Cost', 'MODULE_SHIPPING_FLAT7_COST', '5.00', 'The shipping cost for all orders using this shipping method.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_FLAT7_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'tep_get_tax_class_title', 'tep_cfg_pull_down_tax_classes(', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_FLAT7_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '0', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_FLAT7_SORT_ORDER', '0', 'Sort order of display.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_SHIPPING_FLAT7_STATUS', 'MODULE_SHIPPING_FLAT7_COST', 'MODULE_SHIPPING_FLAT7_TAX_CLASS', 'MODULE_SHIPPING_FLAT7_ZONE', 'MODULE_SHIPPING_FLAT7_SORT_ORDER');
    }
  }
?>
