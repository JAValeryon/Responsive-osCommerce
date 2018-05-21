<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  class ht_country_state_jquery {
	var $code = 'ht_country_state_jquery';
    var $group = 'footer_scripts';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->title = MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_TITLE;
      $this->description = MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_DESCRIPTION;

      if ( defined('MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_STATUS') ) {
        $this->sort_order = MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_SORT_ORDER;
        $this->enabled = (MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_STATUS == 'True');
      }
    }

    function execute() {
      global $PHP_SELF, $oscTemplate;

      if (tep_not_null(MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_PAGES)) {
        $pages_array = array();

        foreach (explode(';', MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_PAGES) as $page) {
          $page = trim($page);

          if (!empty($page)) {
            $pages_array[] = $page;
          }
        }

        if (in_array(basename($PHP_SELF), $pages_array)) {

          if (MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_DEFAULT_COUNTRY == 'True') {
            $oscTemplate->addBlock('<script>$(document).ready(function(){if($("#inputCountry").val()==""){$("#inputCountry").val('.STORE_COUNTRY.');}if($("#inputCountry").val()!=""){$("label[for=\'inputState\']+div").html(\''.MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_TEXT. ' <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>\'),id_country=$("#inputCountry").val(),$.post("states.php",{country_id:id_country,state_name:ds},function(a){$("label[for=\'inputState\']+div").html(a)})}});</script>' . "\n", $this->group);
          }

          $oscTemplate->addBlock('<script>if($("#inputState").val()!=""){var ds=$("#inputState").val();}$("#inputCountry").change(function(){$("label[for=\'inputState\'] + div").html(\'<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>\'),id_country=$("#inputCountry").val(),$.post("states.php",{country_id:id_country,state_name:ds},function(a){$("label[for=\'inputState\'] + div").html(a)})});</script>' . "\n", $this->group);

        }
      }
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_STATUS');
    }

    function install() {
	  define('MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_OTHER_PAGES', 'account_pwa.php');

      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Country/State Selector Module', 'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_STATUS', 'True', 'Do you want to enable the Country/State module?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Default Country', 'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_DEFAULT_COUNTRY', 'True', 'Do you want to use your Country by default in the Country/State module?', '6', '2', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Pages', 'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_PAGES', '" . implode(';', $this->get_default_pages()) . "', 'Select the pages where you want to add the Country/State Selector.', '6', '3', 'ht_country_state_jquery_show_pages', 'ht_country_state_jquery_edit_pages(', now())");
	  tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Add Other Pages', 'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_OTHER_PAGES', '" . tep_db_input(MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_OTHER_PAGES) . "', 'Add pages to the Pages list above. NOTE: After adding/deleting pages, SAVE then click EDIT again to enable/activate them. Separate each filename with a comma. Example: page_one.php, page_two.php', '6', '4', null, null, now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '5', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_STATUS', 
	  			   'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_DEFAULT_COUNTRY', 
				   'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_PAGES', 
				   'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_OTHER_PAGES', 
				   'MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_SORT_ORDER');
    }

    function get_default_pages() {
      return array('address_book_process.php', 
                   'checkout_shipping_address.php', 
                   'checkout_payment_address.php', 
                   'create_account.php');
    }
  }

  function ht_country_state_jquery_show_pages($text) {
    return nl2br(implode("\n", explode(';', $text)));
  }

  function ht_country_state_jquery_edit_pages($values, $key) {
    global $PHP_SELF;
	
	$files_array = array('address_book_process.php', 
                         'checkout_shipping_address.php', 
                   		 'checkout_payment_address.php', 
                   		 'create_account.php');
	
	$page_other_array = '';
	if (tep_not_null(MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_OTHER_PAGES)) {
		$page_other_array = explode(", ", MODULE_HEADER_TAGS_COUNTRY_STATE_JQUERY_OTHER_PAGES);
		$files_array = array_unique(array_merge($files_array, $page_other_array), SORT_REGULAR);
	}
	sort($files_array);

    $values_array = explode(';', $values);

    $output = '';
    foreach ($files_array as $file) {
      $output .= tep_draw_checkbox_field('ht_country_state_jquery_file[]', $file, in_array($file, $values_array)) . '&nbsp;' . tep_output_string($file) . '<br />';
    }

    if (!empty($output)) {
      $output = '<br />' . substr($output, 0, -6);
    }

    $output .= tep_draw_hidden_field('configuration[' . $key . ']', '', 'id="htrn_files"');

    $output .= '<script>
                function htrn_update_cfg_value() {
                  var htrn_selected_files = \'\';

                  if ($(\'input[name="ht_country_state_jquery_file[]"]\').length > 0) {
                    $(\'input[name="ht_country_state_jquery_file[]"]:checked\').each(function() {
                      htrn_selected_files += $(this).attr(\'value\') + \';\';
                    });

                    if (htrn_selected_files.length > 0) {
                      htrn_selected_files = htrn_selected_files.substring(0, htrn_selected_files.length - 1);
                    }
                  }

                  $(\'#htrn_files\').val(htrn_selected_files);
                }

                $(function() {
                  htrn_update_cfg_value();

                  if ($(\'input[name="ht_country_state_jquery_file[]"]\').length > 0) {
                    $(\'input[name="ht_country_state_jquery_file[]"]\').change(function() {
                      htrn_update_cfg_value();
                    });
                  }
                });
                </script>';

    return $output;
  }
?>