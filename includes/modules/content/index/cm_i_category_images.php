<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2016 osCommerce

  Released under the GNU General Public License
*/

  class cm_i_category_images {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_CATEGORY_IMAGES_TITLE;
      $this->description = MODULE_CONTENT_CATEGORY_IMAGES_DESCRIPTION;

      if ( defined('MODULE_CONTENT_CATEGORY_IMAGES_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_CATEGORY_IMAGES_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_CATEGORY_IMAGES_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate, $languages_id;
      
      $content_width = MODULE_CONTENT_CATEGORY_IMAGES_CONTENT_WIDTH;
      $desc_lgth = tep_not_null(MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_DESCRIPTION) ? MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_DESCRIPTION : '1000';
      $sort_order = MODULE_CONTENT_CATEGORY_IMAGES_SORT_ON == 'name' ? 'cd.categories_name' : 'c.sort_order';
     
      $categories_query = tep_db_query ("select c.categories_id, 
                                                c.categories_image, 
                                                cd.categories_name,
                                                SUBSTRING(" . MODULE_CONTENT_CATEGORY_IMAGES_CAT_DESC_SOURCE . ", 1, " . $desc_lgth . ") as categories_description
                                         from categories_description cd left join categories c on c.categories_id = cd.categories_id 
                                         where c.parent_id = '0'                                          
                                           and cd.language_id = '" . (int)$languages_id . "' 
                                         order by " . $sort_order . "
                                         limit " . MODULE_CONTENT_CATEGORY_IMAGES_MAX_DISPLAY                                       
                                       );
                                                       
       if (tep_db_num_rows($categories_query)) {
         ob_start();
         include('includes/modules/content/' . $this->group . '/templates/category_images.php');
         $template = ob_get_clean(); 
         
         $oscTemplate->addContent($template, $this->group);
       }
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_CONTENT_CATEGORY_IMAGES_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable New Products Module', 'MODULE_CONTENT_CATEGORY_IMAGES_STATUS', 'True', 'Do you want to enable this module?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Width', 'MODULE_CONTENT_CATEGORY_IMAGES_CONTENT_WIDTH', '12', 'What width container should the content be shown in? (12 = full width, 6 = half width).', '6', '2', 'tep_cfg_select_option(array(\'12\', \'11\', \'10\', \'9\', \'8\', \'7\', \'6\', \'5\', \'4\', \'3\', \'2\', \'1\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum Display', 'MODULE_CONTENT_CATEGORY_IMAGES_MAX_DISPLAY', '6', 'Maximum Number of categories that should show in this module?', '6', '3', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Category Width', 'MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_EACH', '4', 'What width container should each category be shown in? (12 = full width, 6 = half width).', '6', '4', 'tep_cfg_select_option(array(\'12\', \'11\', \'10\', \'9\', \'8\', \'7\', \'6\', \'5\', \'4\', \'3\', \'2\', \'1\'), ', now())");     
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Show Description', 'MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_DESCRIPTION', '100', 'Should the category description be shown? Leave blank to not display. Otherwise, enter the number of characters to display.', '6', '5', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Category Description Source', 'MODULE_CONTENT_CATEGORY_IMAGES_CAT_DESC_SOURCE', 'categories_description', 'This is the sort order used in the output.', '1', '4', 'tep_cfg_select_option(array(\'categories_description\', \'categories_htc_description\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Sort Order', 'MODULE_CONTENT_CATEGORY_IMAGES_SORT_ON', 'sort_order', 'This is the sort order used in the output.', '1', '4', 'tep_cfg_select_option(array(\'name\', \'sort_order\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_CATEGORY_IMAGES_SORT_ORDER', '400', 'Sort order of display. Lowest is displayed first.', '6', '5', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_CATEGORY_IMAGES_STATUS', 'MODULE_CONTENT_CATEGORY_IMAGES_CONTENT_WIDTH', 'MODULE_CONTENT_CATEGORY_IMAGES_MAX_DISPLAY', 'MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_EACH', 'MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_DESCRIPTION', 'MODULE_CONTENT_CATEGORY_IMAGES_CAT_DESC_SOURCE', 'MODULE_CONTENT_CATEGORY_IMAGES_SORT_ON', 'MODULE_CONTENT_CATEGORY_IMAGES_SORT_ORDER');
    }
  }