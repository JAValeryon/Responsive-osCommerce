<?php
/*
  $Id$

  Purchase without Account for Bootstrap
  Version 3.0 BS 
  by @raiwa 
  info@oscaddons.com
  www.oscaddons.com

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/
?>

<div class="col-sm-12 cm-cs-pwa-products-purchased">
  <div class="panel panel-success">
    <div class="panel-heading"><?php echo MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_PUBLIC_TITLE; ?></div>
    <div class="panel-body">
      <p class="keepAccount">
        <div class="form-group has-feedback">
           <div class="col-sm-12">
             <label class="radio-inline">
               <?php echo tep_draw_radio_field('pwa_account', 'true', NULL, 'required aria-required="true"') . ' ' . MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_TEXT_SET_PASSWORD; ?>
             </label>
           </div>
           <div class="col-sm-12">
            <label class="radio-inline">
               <?php echo tep_draw_radio_field('pwa_account', 'false') . ' ' . MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_TEXT_DELETE_ACCOUNT; ?>
            </label> 
           </div>
        </div>
      </p>
    </div>
  </div>
</div>
