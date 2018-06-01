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
<div class="col-sm-<?php echo $content_width; ?> cm-csa-new-shipping-address">

  <h2 class="h3"><?php echo MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_NEW_SHIPPING_ADDRESS_TABLE_HEADING; ?></h2>

  <div class="alert alert-info"><?php echo MODULE_CONTENT_CHECKOUT_SHIPPING_ADDRESS_NEW_SHIPPING_ADDRESS_TEXT_CREATE_NEW_SHIPPING_ADDRESS; ?></div>

  <?php require('includes/modules/checkout_new_address.php'); ?>

</div>
