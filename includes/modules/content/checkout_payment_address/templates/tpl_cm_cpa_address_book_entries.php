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
?>
<div class="col-sm-<?php echo $content_width; ?> cm-cpa-address-book-entries">

  <h2 class="h3"><?php echo MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_ADDRESS_BOOK_ENTRIES_TABLE_HEADING; ?></h2>
  
  <div class="alert alert-info"><?php echo MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_ADDRESS_BOOK_ENTRIES_TEXT_SELECT_OTHER_PAYMENT_DESTINATION; ?></div>

  <div class="contentText row">

<?php
      $radio_buttons = 0;

      $addresses_query = tep_db_query("select address_book_id, entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "'");
      while ($addresses = tep_db_fetch_array($addresses_query)) {
        $format_id = tep_get_address_format_id($addresses['country_id']);


?>
      <div class="col-sm-4">
        <div class="panel panel-<?php echo ($addresses['address_book_id'] == $billto) ? 'primary' : 'default'; ?>">
          <div class="panel-heading"><?php echo tep_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']); ?></strong></div>
          <div class="panel-body">
            <?php echo tep_address_format($format_id, $addresses, true, ' ', '<br />'); ?>
          </div>
          <div class="panel-footer text-center"><?php echo tep_draw_radio_field_css('address','class="radio2x"', $addresses['address_book_id'], ($addresses['address_book_id'] == $billto)); ?></div>
        </div>
      </div>

<?php
        $radio_buttons++;
      }
?>

  </div>

</div>
