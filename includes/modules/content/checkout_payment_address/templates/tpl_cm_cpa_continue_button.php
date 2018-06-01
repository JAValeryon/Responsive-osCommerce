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
<div class="col-sm-<?php echo $content_width; ?> cm-cpa-continue-button">

  <div class="buttonSet">
<?php
  if ($process == true) {
?>
      <div class="col-xs-6"><?php echo tep_draw_button(IMAGE_BUTTON_BACK, 'fa fa-angle-left', tep_href_link('checkout_payment_address.php', '', 'SSL')); ?></div>
      <div class="col-xs-6 text-right"><?php echo tep_draw_hidden_field('action', 'submit') . tep_draw_button(IMAGE_BUTTON_CONTINUE, 'fa fa-angle-right', null, 'primary', null, 'btn-success'); ?></div>
<?php
  } else {
?>
      <div class="text-right"><?php echo tep_draw_hidden_field('action', 'submit') . tep_draw_button(IMAGE_BUTTON_CONTINUE, 'fa fa-angle-right', null, 'primary', null, 'btn-success'); ?></div>
<?php
  }
?>    
  </div>

</div>
