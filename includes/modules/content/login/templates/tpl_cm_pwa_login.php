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

<div class="pwa_login <?php echo (MODULE_CONTENT_PWA_LOGIN_CONTENT_WIDTH == 'Half') ? 'col-sm-6' : 'col-sm-12'; ?>">
  <div class="card">

        <div class="card-header">
          <?php echo MODULE_CONTENT_PWA_LOGIN_HEADING; ?>
        </div>
        <div class="card-body">
<?php 
        echo MODULE_CONTENT_PWA_LOGIN_TEXT_1;
if ( defined('MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS') && MODULE_CONTENT_CHECKOUT_SUCCESS_PWA_KEEP_ACCOUNT_STATUS != 'True' ) {
        echo MODULE_CONTENT_PWA_LOGIN_TEXT_3;
} else {
        echo MODULE_CONTENT_PWA_LOGIN_TEXT_2;
}
?>   

        <p class="text-right"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'fa fa-chevron-right', tep_href_link('account_pwa.php', '', 'SSL'), null, null, 'btn-primary btn-block'); ?></p>  
    </div>
  </div>
</div>
