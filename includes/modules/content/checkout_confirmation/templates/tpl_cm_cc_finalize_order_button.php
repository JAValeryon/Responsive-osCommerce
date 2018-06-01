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
<div class="col-sm-<?php echo $content_width; ?> cm-cs-finalize-order-button">

  <div class="buttonSet">
    <div class="text-right">
      <?php
      if (is_array($payment_modules->modules)) {
        echo $payment_modules->process_button();
      }
      echo tep_draw_button(IMAGE_BUTTON_FINALISE_ORDER, 'fas fa-check-circle', null, 'primary', null, 'btn-success btn-block btn-lg');
      ?>
    </div>
  </div>

</div>
