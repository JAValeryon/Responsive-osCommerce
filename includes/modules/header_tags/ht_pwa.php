<?php
/*
  $Id$

  Purchase without Account for Bootstrap
  Version 3.0 BS 
  by @raiwa 
  info@oscaddons.com
  www.oscaddons.com

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/

  class ht_pwa {
    var $code = 'ht_pwa';
    var $group = 'header_tags';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->title = MODULE_HEADER_TAGS_PWA_TITLE;
      $this->description = MODULE_HEADER_TAGS_PWA_DESCRIPTION;
      $this->description .= '<p>by @raiwa <u><a target="_blank" href="http://www.oscaddons.com">www.oscaddons.com</a></u></p>';

      if (!defined('MODULE_CONTENT_PWA_LOGIN_STATUS') || defined('MODULE_CONTENT_PWA_LOGIN_STATUS') && MODULE_CONTENT_PWA_LOGIN_STATUS != 'True' ) {
        $this->description = '<div class="secWarning">' . 
                                 MODULE_HEADER_TAGS_PWA_LOGIN_WARNING . 
                             '  <a href="modules_content.php?module=cm_pwa_login&action=install">' . MODULE_HEADER_TAGS_PWA_INSTALL_NOW . '</a>
                             </div>' . 
                             $this->description;
      }

      if ( defined('MODULE_HEADER_TAGS_PWA_STATUS') ) {
        $this->sort_order = MODULE_HEADER_TAGS_PWA_SORT_ORDER;
        $this->enabled = (MODULE_HEADER_TAGS_PWA_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $PHP_SELF, $sessiontoken, $navigation, $customer_id, $messageStack, $payment_modules;
      
      // check if guest account (e-mail) exists and remove if a new guest account is created
      if ( basename($PHP_SELF) == 'create_account.php' && isset($_POST['action']) && ($_POST['action'] == 'process') && isset($_POST['formid']) && ($_POST['formid'] == $sessiontoken ) )  {
        if (tep_db_num_rows(tep_db_query("select * from information_schema.columns where table_schema='". DB_DATABASE . "' and table_name='orders' and column_name like 'customers_guest'")) == 1 ) {
          $email_address = tep_db_prepare_input($_POST['email_address']);
          $check_guest_query = tep_db_query("select customers_id from customers where customers_email_address = '". tep_db_input($email_address) . "' and customers_guest = '1'");
          $check_guest = tep_db_fetch_array($check_guest_query);
          if ( tep_not_null($check_guest) ) {
            tep_db_query("delete from customers where customers_id = '". $check_guest['customers_id'] . "' and customers_guest = '1'");
            tep_db_query("delete from address_book where customers_id = '". $check_guest['customers_id'] . "' and customers_guest = '1'");
// reload the page after deleting previous guest account for a new e-mail exist check
?>
<script>
location.reload();
</script>
<?php
          }
        }
      }

  // use pwa payment class extension
      if ( basename($PHP_SELF) == 'checkout_payment.php' && tep_session_is_registered('customer_is_guest') ) {
        $payment_modules = new payment_pwa;
      }
      
  // session unregister and delete account for guests
      if ( basename($PHP_SELF) == 'checkout_success.php' && tep_session_is_registered('customer_is_guest') ) {
        $navigation->set_snapshot();
        // flag guest order
        tep_db_query("update orders set customers_guest = '1' where customers_id = '" . (int)$customer_id . "'");
        if ( isset($_GET['action']) && ($_GET['action'] == 'update') ) {
          // redirect to set password if selected
          if (!isset($_POST['pwa_account']) || ($_POST['pwa_account'] != 'true') ) {
            // delete guest account if selected
            $this->delete_guest_account();
          }
        } elseif ( (!defined('MODULE_CONTENT_PWA_LOGIN_KEEP_ACCOUNT') || MODULE_CONTENT_PWA_LOGIN_KEEP_ACCOUNT != 'True') && DOWNLOAD_ENABLED != 'true' ) {
          // delete guest account
          $this->delete_guest_account();
        }
        
        $guest_account_script = '
<script>
$(document).ready(function() {
  $("input:checkbox[name^=\'notify\']").hide().attr("disabled", true);
  $(".cm-cs-product-notifications .panel-heading").html(\'' . MODULE_HEADER_TAGS_PWA_TEXT_PRODUCTS . '\');
  $(".cm-cs-thank-you .panel-body p:nth-of-type(2)").text(\'\');' . "\n";
  
        if ( defined('MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS') && MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS == 'True' ) {
        $guest_account_script .= '
  $(".module-downloads .panel-body p").html(\'<p>' . MODULE_HEADER_TAGS_PWA_DOWNLOAD . '</p>\');' . "\n";
        } else {
        $guest_account_script .= '
  $(".module-downloads .panel-body p").text(\'\');' . "\n";
        }
        $guest_account_script .= '
  $("input:radio[name=\'pwa_account\']").click(function() {
    if($("input:radio[name=\'pwa_account\'][value=\'false\']").is(\':checked\')) {
      console.log(\'selected\');
      $("input:checkbox[name^=\'notify\']").hide().attr("disabled", true);
      $(".cm-cs-product-notifications .panel-heading").html(\'' . MODULE_HEADER_TAGS_PWA_TEXT_PRODUCTS . '\');
      } else {
      console.log(\'notselected\');
      $("input:checkbox[name^=\'notify\']").show().removeAttr("disabled", true);
      $(".cm-cs-product-notifications .panel-heading").html(\'' . MODULE_CONTENT_CHECKOUT_SUCCESS_PRODUCT_NOTIFICATIONS_TEXT_NOTIFY_PRODUCTS . '\');
    }
  });
});
</script>
        ' . "\n";
        
        $oscTemplate->addBlock($guest_account_script, 'footer_scripts');
      }
      
      // do things if a guest comes from checkout success
 	    if ( tep_session_is_registered('customer_is_guest') && isset($navigation->snapshot['page']) && $navigation->snapshot['page'] == 'checkout_success.php' ) {
        if ( defined('MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS') && MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS == 'True' && 
             basename($PHP_SELF) == 'account.php' && strpos($messageStack->output('account'), 'alert-success') ) { 
          // Unregister and remove guest from customers table if password is successful set
          tep_session_unregister('customer_is_guest');
          tep_db_query("update customers set customers_guest = '0' where customers_id = '" . (int)$customer_id . "'");
        } elseif ( basename($PHP_SELF) != 'download.php' && basename($PHP_SELF) != 'set_password.php' && substr(basename($PHP_SELF), 0, 8) != 'checkout' ) {
          // else delete guest account
          $this->delete_guest_account();
        }
      }
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_HEADER_TAGS_PWA_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Current Version', 'MODULE_HEADER_TAGS_PWA_VERSION', '3.0 BS', 'Version info. It is read only.', '6', '1', 'tep_version_readonly(', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PWA Guest Account Module?', 'MODULE_HEADER_TAGS_PWA_STATUS', 'True', 'Required module which adds scripts for PWA Guest Checkout.', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_HEADER_TAGS_PWA_SORT_ORDER', '1001', 'Sort order of display. Lowest is displayed first.', '6', '2', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_HEADER_TAGS_PWA_VERSION',
                   'MODULE_HEADER_TAGS_PWA_STATUS',
                   'MODULE_HEADER_TAGS_PWA_SORT_ORDER'
                  );
    }
    
    function delete_guest_account() {
      global $customer_id;
      tep_db_query("delete from customers where customers_id = '" . (int)$customer_id . "' and customers_guest = '1'");
      tep_db_query("delete from address_book where customers_id = '" . (int)$customer_id . "'");
      tep_db_query("delete from customers_info where customers_info_id = '" . (int)$customer_id . "'");
      tep_db_query("delete from products_notifications where customers_id = '" . (int)$customer_id . "'");

      tep_session_unregister('customer_default_address_id');
      tep_session_unregister('customer_first_name');
      tep_session_unregister('customer_country_id');
      tep_session_unregister('customer_zone_id');
      tep_session_unregister('customer_id');
      tep_session_unregister('customer_is_guest');
    }
    
  } // end ht class

  
// Begin pwa payment class extension
  if (class_exists('payment')) {
    class payment_pwa extends payment {
      public $modules;
      public $selected_module;

// class constructor
      function __construct($module = '') {
        global $payment, $language, $PHP_SELF;
        global $cart, $customer_id, $customer_is_guest; // PWA Guest Checkout
  
        if (defined('MODULE_PAYMENT_INSTALLED') && tep_not_null(MODULE_PAYMENT_INSTALLED)) {
          // wholesale (SPPC Lite) BEGIN
          $temp_payment_array = null;
          if ( defined('MODULE_STORE_WHOLESALE_STATUS') && MODULE_STORE_WHOLESALE_STATUS == 'True' ) {
            $check_customer_query = tep_db_query("select customers_wholesale from customers where customers_id = '" . (int)$customer_id . "'");
            $check_customer = tep_db_fetch_array($check_customer_query);
            if (tep_session_is_registered('customer_id') && $check_customer['customers_wholesale'] == '1' && tep_not_null(MODULE_STORE_WHOLESALE_WHOLESALER_PAYMENT_MODULES)) {
              $temp_payment_array = explode(';', MODULE_STORE_WHOLESALE_WHOLESALER_PAYMENT_MODULES); // wholesalers exclude array
            } else if (tep_not_null(MODULE_STORE_WHOLESALE_RETAILER_PAYMENT_MODULES) ) {
              $temp_payment_array = explode(';', MODULE_STORE_WHOLESALE_RETAILER_PAYMENT_MODULES); // retailers exclude array
            }
          }
          // wholesale (SPPC Lite) END
          // PWA Guest Checkout BEGIN
          if ( defined('MODULE_CONTENT_PWA_LOGIN_STATUS') && MODULE_CONTENT_PWA_LOGIN_STATUS == 'True' ) {
            if (tep_session_is_registered('customer_id') && tep_session_is_registered('customer_is_guest') && $cart->get_content_type() != 'physical' && tep_not_null(MODULE_CONTENT_PWA_LOGIN_PAYMENT_MODULES)) {
              if ( tep_not_null($temp_payment_array) ) {
                $temp_payment_array = array_merge(explode(';', MODULE_CONTENT_PWA_LOGIN_PAYMENT_MODULES), $temp_payment_array); // combine wholesale and guest and virtual products exclude array
              } else {
                $temp_payment_array = explode(';', MODULE_CONTENT_PWA_LOGIN_PAYMENT_MODULES); // guest and virtual products exclude array
              }
            }
          }
          // PWA Guest Checkout END
          if (tep_not_null($temp_payment_array)) { // remove excluded payment modules
            $installed_modules = explode(';', MODULE_PAYMENT_INSTALLED);
            for ($n = 0; $n < sizeof($installed_modules) ; $n++) {
              // check to see if a payment method is not de-installed
              if ( !in_array($installed_modules[$n], $temp_payment_array ) ) {
                $payment_array[] = $installed_modules[$n];
              }
            } // end for loop
            $this->modules = $payment_array;
          } else { // default
            $this->modules = explode(';', MODULE_PAYMENT_INSTALLED); // original code
          }
  
          $include_modules = array();
  
          if ( (tep_not_null($module)) && (in_array($module . '.' . substr($PHP_SELF, (strrpos($PHP_SELF, '.')+1)), $this->modules)) ) {
            $this->selected_module = $module;
  
            $include_modules[] = array('class' => $module, 'file' => $module . '.php');
          } else {
            foreach($this->modules as $value) {
              $class = substr($value, 0, strrpos($value, '.'));
              $include_modules[] = array('class' => $class, 'file' => $value);
            }
          }
  
          for ($i=0, $n=sizeof($include_modules); $i<$n; $i++) {
            $GLOBALS[$include_modules[$i]['class']] = new $include_modules[$i]['class'];
          }
  
  // if there is only one payment method, select it as default because in
  // checkout_confirmation.php the $payment variable is being assigned the
  // $_POST['payment'] value which will be empty (no radio button selection possible)
          if ( (tep_count_payment_modules() == 1) && (!isset($GLOBALS[$payment]) || (isset($GLOBALS[$payment]) && !is_object($GLOBALS[$payment]))) ) {
            $payment = $include_modules[0]['class'];
          }
  
          if ( (tep_not_null($module)) && (in_array($module, $this->modules)) && (isset($GLOBALS[$module]->form_action_url)) ) {
            $this->form_action_url = $GLOBALS[$module]->form_action_url;
          }
        }
      }
    } // end class
  } // end if class exists
// End payment class extension      

// function show the version read only  
  if(!function_exists('tep_version_readonly')) {
  	function tep_version_readonly($value){
  		$version_text = '<br>Version ' . $value;
      return $version_text;
    }
  }
?>