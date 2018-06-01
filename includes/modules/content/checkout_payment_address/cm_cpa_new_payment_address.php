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

  class cm_cpa_new_payment_address {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_TITLE;
      $this->description = MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_DESCRIPTION;
      $this->description .= '<div class="secWarning">' . MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION . '</div>';

      if ( defined('MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $process, $customer_id, $entry_state_has_zones, $addresses_count, $country, $messageStack, $billto, $sessiontoken, $redirect_to_payment_page;
      
      $content_width = (int)MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_CONTENT_WIDTH;

      $error = false;
// process a new billing address
      if ( isset($_POST['action']) && ($_POST['action'] == 'submit') && isset($_POST['formid']) && ($_POST['formid'] == $sessiontoken) && 
           tep_not_null($_POST['firstname']) && tep_not_null($_POST['lastname']) && tep_not_null($_POST['street_address']) ) {
        $process = true;
  
        if (ACCOUNT_GENDER == 'true') $gender = tep_db_prepare_input($_POST['gender']);
        if (ACCOUNT_COMPANY == 'true') $company = tep_db_prepare_input($_POST['company']);
        $firstname = tep_db_prepare_input($_POST['firstname']);
        $lastname = tep_db_prepare_input($_POST['lastname']);
        $street_address = tep_db_prepare_input($_POST['street_address']);
        if (ACCOUNT_SUBURB == 'true') $suburb = tep_db_prepare_input($_POST['suburb']);
        $postcode = tep_db_prepare_input($_POST['postcode']);
        $city = tep_db_prepare_input($_POST['city']);
        $country = tep_db_prepare_input($_POST['country']);
        if (ACCOUNT_STATE == 'true') {
          if (isset($_POST['zone_id'])) {
            $zone_id = tep_db_prepare_input($_POST['zone_id']);
          } else {
            $zone_id = false;
          }
          $state = tep_db_prepare_input($_POST['state']);
        }
  
        if (ACCOUNT_GENDER == 'true') {
          if ( ($gender != 'm') && ($gender != 'f') ) {
            $error = true;
  
            $messageStack->add('checkout_address', ENTRY_GENDER_ERROR);
          }
        }
  
        if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
          $error = true;
  
          $messageStack->add('checkout_address', ENTRY_FIRST_NAME_ERROR);
        }
  
        if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
          $error = true;
  
          $messageStack->add('checkout_address', ENTRY_LAST_NAME_ERROR);
        }
  
        if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
          $error = true;
  
          $messageStack->add('checkout_address', ENTRY_STREET_ADDRESS_ERROR);
        }
  
        if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
          $error = true;
  
          $messageStack->add('checkout_address', ENTRY_POST_CODE_ERROR);
        }
  
        if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
          $error = true;
  
          $messageStack->add('checkout_address', ENTRY_CITY_ERROR);
        }
  
        if (ACCOUNT_STATE == 'true') {
          $zone_id = 0;
          $check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "'");
          $check = tep_db_fetch_array($check_query);
          $entry_state_has_zones = ($check['total'] > 0);
          if ($entry_state_has_zones == true) {
            $zone_query = tep_db_query("select distinct zone_id from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' and (zone_name = '" . tep_db_input($state) . "' or zone_code = '" . tep_db_input($state) . "')");
            if (tep_db_num_rows($zone_query) == 1) {
              $zone = tep_db_fetch_array($zone_query);
              $zone_id = $zone['zone_id'];
            } else {
              $error = true;
  
              $messageStack->add('checkout_address', ENTRY_STATE_ERROR_SELECT);
            }
          } else {
            if (strlen($state) < ENTRY_STATE_MIN_LENGTH) {
              $error = true;
  
              $messageStack->add('checkout_address', ENTRY_STATE_ERROR);
            }
          }
        }
  
        if ( (is_numeric($country) == false) || ($country < 1) ) {
          $error = true;
  
          $messageStack->add('checkout_address', ENTRY_COUNTRY_ERROR);
        }
  
        if ($error == false) {
          $sql_data_array = array('customers_id' => $customer_id,
                                  'entry_firstname' => $firstname,
                                  'entry_lastname' => $lastname,
                                  'entry_street_address' => $street_address,
                                  'entry_postcode' => $postcode,
                                  'entry_city' => $city,
                                  'entry_country_id' => $country);
  
          if (ACCOUNT_GENDER == 'true') $sql_data_array['entry_gender'] = $gender;
          if (ACCOUNT_COMPANY == 'true') $sql_data_array['entry_company'] = $company;
          if (ACCOUNT_SUBURB == 'true') $sql_data_array['entry_suburb'] = $suburb;
          if (ACCOUNT_STATE == 'true') {
            if ($zone_id > 0) {
              $sql_data_array['entry_zone_id'] = $zone_id;
              $sql_data_array['entry_state'] = '';
            } else {
              $sql_data_array['entry_zone_id'] = '0';
              $sql_data_array['entry_state'] = $state;
            }
          }
  
          if (!tep_session_is_registered('billto')) tep_session_register('billto');
  
          tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);
  
          $billto = tep_db_insert_id();
  
          if (tep_session_is_registered('payment')) tep_session_unregister('payment');
  
          $redirect_to_payment_page[] = true;
        }
      }
      
      if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
        
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
      return defined('MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable New Payment Address Module', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_STATUS', 'True', 'Should this module be shown on the checkout shipping address page?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Width', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_CONTENT_WIDTH', '12', 'What width container should the content be shown in?', '6', '1', 'tep_cfg_select_option(array(\'12\', \'11\', \'10\', \'9\', \'8\', \'7\', \'6\', \'5\', \'4\', \'3\', \'2\', \'1\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_SORT_ORDER', '400', 'Sort order of display. Lowest is displayed first.', '6', '1', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_STATUS', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_CONTENT_WIDTH', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_NEW_PAYMENT_ADDRESS_SORT_ORDER');
    }
  }
