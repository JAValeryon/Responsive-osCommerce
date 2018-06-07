<?php
/*
  $Id$

  Modified for:
  Purchase without Account for Bootstrap
  Version 3.0.4 BS 
  by @raiwa 
  info@oscaddons.com
  www.oscaddons.com

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/

  class cm_cs_pwa_keep_account {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_TITLE;
      $this->description = MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_DESCRIPTION;
      $this->description .= '<p>by @raiwa <u><a target="_blank" href="http://www.oscaddons.com">www.oscaddons.com</a></u></p>';

      if (!defined('MODULE_HEADER_TAGS_PWA_STATUS') || defined('MODULE_HEADER_TAGS_PWA_STATUS') && MODULE_HEADER_TAGS_PWA_STATUS != 'True' ) {
        $this->description = '<div class="secWarning">' . 
                                 MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_HT_MODULE_WARNING . 
                             '  <a href="modules.php?set=header_tags&module=ht_pwa&action=install">' . MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_INSTALL_NOW . '</a>
                             </div>' . 
                             $this->description;
      }

      if (!defined('MODULE_CONTENT_PWA_LOGIN_STATUS') || defined('MODULE_CONTENT_PWA_LOGIN_STATUS') && MODULE_CONTENT_PWA_LOGIN_STATUS != 'True' ) {
        $this->description = '<div class="secWarning">' . 
                                 MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_PWA_LOGIN_WARNING . 
                             '  <a href="modules_content.php?module=cm_pwa_login&action=install">' . MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_INSTALL_NOW . '</a>
                             </div>' . 
                             $this->description;
      }

      if ( defined('MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $customer_id;
      
      if (tep_session_is_registered('customer_is_guest')) {

        if ( isset($_GET['action']) && $_GET['action'] == 'update' && isset($_POST['pwa_account']) && $_POST['pwa_account'] == 'true' ) {
          if ( isset($_POST['notify']) && is_array($_POST['notify']) && !empty($_POST['notify']) ) {
            $notify = array_unique($_POST['notify']);

            foreach ( $notify as $n ) {
              if ( is_numeric($n) && ($n > 0) ) {
                $check_query = tep_db_query("select products_id from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . (int)$n . "' and customers_id = '" . (int)$customer_id . "' limit 1");

                if ( !tep_db_num_rows($check_query) ) {
                  tep_db_query("insert into " . TABLE_PRODUCTS_NOTIFICATIONS . " (products_id, customers_id, date_added) values ('" . (int)$n . "', '" . (int)$customer_id . "', now())");
                }
              }
            }
          }
          tep_redirect(tep_href_link('ext/modules/content/account/set_password.php', '', 'SSL'));
        }

        ob_start();
        
        include('includes/modules/content/' . $this->group . '/templates/tpl_' . basename(__FILE__));
        $template = ob_get_clean();
  
        $oscTemplate->addContent($template, $this->group);
      }
    }

    function isEnabled() {
      if ( defined('MODULE_HEADER_TAGS_PWA_STATUS') && MODULE_HEADER_TAGS_PWA_STATUS == 'True' ) {
    		return $this->enabled;
    	} else {
    		$this->enabled = false;
    	}
    }

    function check() {
      return defined('MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Current Version', 'MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_VERSION', '3.0.4 BS', 'Version info. It is read only.', '6', '1', 'tep_version_readonly(', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PWA Checkout Module', 'MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS', 'True', 'Must enable if PWA Login module is active to integrate within checkout success page.', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_SORT_ORDER', '600', 'Sort order of display. Lowest is displayed first.  Due to disabling product notifications, this module requires being installed above said module.', '6', '3', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_VERSION', 'MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS','MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_SORT_ORDER');
    }
  }
  
// function show the version read only  
  if(!function_exists('tep_version_readonly')) {
  	function tep_version_readonly($value){
  		$version_text = '<br>Version ' . $value;
      return $version_text;
    }
  }
?>