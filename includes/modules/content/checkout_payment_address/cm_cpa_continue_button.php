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

  class cm_cpa_continue_button {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_TITLE;
      $this->description = MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_DESCRIPTION;
      $this->description .= '<div class="secWarning">' . MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION . '</div>';

      if ( defined('MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $process;
      
      $content_width = (int)MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_CONTENT_WIDTH;

        ob_start();
        include('includes/modules/content/' . $this->group . '/templates/tpl_' . basename(__FILE__));
        $template = ob_get_clean();

        $oscTemplate->addContent($template, $this->group);
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Continue Button Module', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_STATUS', 'True', 'Should this module be shown on the checkout payment address page?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Width', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_CONTENT_WIDTH', '12', 'What width container should the content be shown in?', '6', '1', 'tep_cfg_select_option(array(\'12\', \'11\', \'10\', \'9\', \'8\', \'7\', \'6\', \'5\', \'4\', \'3\', \'2\', \'1\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Button alignment', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_ALIGNMENT', 'right', 'The alignment of the button.', '6', '1', 'tep_cfg_select_option(array(\'left\', \'right\', \'center\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_SORT_ORDER', '500', 'Sort order of display. Lowest is displayed first.', '6', '1', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_STATUS', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_CONTENT_WIDTH', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_ALIGNMENT', 'MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_CONTINUE_BUTTON_SORT_ORDER');
    }
  }
