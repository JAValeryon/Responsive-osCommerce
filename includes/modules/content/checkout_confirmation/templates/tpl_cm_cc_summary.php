<?php
/*
  $Id$

  Modular Checkout 1.02. by @raiwa
  info@oscaddons.com
  www.oscaddons.com
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/
?>
<div class="col-sm-<?php echo $content_width; ?> cm-cc-summary">

  <div class="row">
    <?php
    if ($sendto != false) {
      ?>
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading"><?php echo '<strong>' . MODULE_CONTENT_CHECKOUT_CONFIRMATION_SUMMARY_DELIVERY_ADDRESS . '</strong>' . tep_draw_button(TEXT_EDIT, 'fa fa-edit', tep_href_link('checkout_shipping_address.php', '', 'SSL'), NULL, NULL, 'pull-right btn-info btn-xs' ); ?></div>
          <div class="panel-body">
            <?php echo tep_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br />'); ?>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading"><?php echo '<strong>' . MODULE_CONTENT_CHECKOUT_CONFIRMATION_SUMMARY_BILLING_ADDRESS . '</strong>' . tep_draw_button(TEXT_EDIT, 'fa fa-edit', tep_href_link('checkout_payment_address.php', '', 'SSL'), NULL, NULL, 'pull-right btn-info btn-xs' ); ?></div>
        <div class="panel-body">
          <?php echo tep_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br />'); ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <?php
      if ($order->info['shipping_method']) {
        ?>
        <div class="panel panel-warning">
          <div class="panel-heading"><?php echo '<strong>' . MODULE_CONTENT_CHECKOUT_CONFIRMATION_SUMMARY_SHIPPING_METHOD . '</strong>' . tep_draw_button(TEXT_EDIT, 'fa fa-edit', tep_href_link('checkout_shipping.php', '', 'SSL'), NULL, NULL, 'pull-right btn-info btn-xs' ); ?></div>
          <div class="panel-body">
            <?php echo $order->info['shipping_method']; ?>
          </div>
        </div>
        <?php
      }
      ?>
      <div class="panel panel-warning">
        <div class="panel-heading"><?php echo '<strong>' . MODULE_CONTENT_CHECKOUT_CONFIRMATION_SUMMARY_PAYMENT_METHOD . '</strong>' . tep_draw_button(TEXT_EDIT, 'fa fa-edit', tep_href_link('checkout_payment.php', '', 'SSL'), NULL, NULL, 'pull-right btn-info btn-xs' ); ?></div>
        <div class="panel-body">
          <?php echo $order->info['payment_method']; ?>
        </div>
      </div>
    </div>
  </div>

</div>
