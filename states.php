<?php

 require('includes/application_top.php');

  $country_id = (isset($_POST['country_id']) ? $_POST['country_id'] : '');
  $state_name = (isset($_POST['state_name']) ? $_POST['state_name'] : '');

  $check_query = tep_db_query("select count(*) as total from zones where zone_country_id = '" . (int)$country_id . "'");
  $check = tep_db_fetch_array($check_query);
  $entry_state_has_zones = ($check['total'] > 0);

  if ($entry_state_has_zones == true) {
    $zones_array = array();
    $zones_array[0] = array('id' => '', 'text' => PULL_DOWN_DEFAULT);
    $zones_query = tep_db_query("select zone_name from zones where zone_country_id = '" . (int)$country_id . "' order by zone_name");
    while ($zones_values = tep_db_fetch_array($zones_query)) {
      $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
    }
    echo tep_draw_pull_down_menu('state', $zones_array, $state_name, 'id="inputState" aria-required="true"');
    echo FORM_REQUIRED_INPUT;
  } else {
    echo tep_draw_input_field('state', NULL, 'id="inputState" placeholder="' . ENTRY_STATE_TEXT . '"');
    echo FORM_REQUIRED_INPUT;
  }
?>