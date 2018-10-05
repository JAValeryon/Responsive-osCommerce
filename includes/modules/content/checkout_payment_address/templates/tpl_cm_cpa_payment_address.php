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
<div class="col-sm-<?php echo $content_width; ?> cm-cpa-payment-address">

  <h2 class="h3"><?php echo MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_PAYMENT_ADDRESS_TABLE_HEADING; ?></h2>

  <div class="contentText row">
    <div class="col-sm-8">
      <div class="alert alert-warning"><?php echo MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_PAYMENT_ADDRESS_TEXT_SELECTED_PAYMENT_DESTINATION; ?></div>
    </div>
    <div class="col-sm-4">
      <div class="card border-primary mb-3">
        <div class="card-header bg-primary"><?php echo MODULE_CONTENT_CHECKOUT_PAYMENT_ADDRESS_PAYMENT_ADDRESS_TITLE_PAYMENT_ADDRESS; ?></div>

        <div class="card-body">
          <?php echo tep_address_label($customer_id, $billto, true, ' ', '<br />'); ?>
        </div>
      </div>
    </div>
  </div>

</div>
