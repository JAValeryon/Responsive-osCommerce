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

  require('includes/application_top.php');

// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link('login.php', '', 'SSL'));
  }

// if there is nothing in the customers cart, redirect them to the shopping cart page
  if ($cart->count_contents() < 1) {
    tep_redirect(tep_href_link('shopping_cart.php'));
  }

// address processing moved to cm_csh_shipping_address.php

// module and quote processing moved to cm_csh_shipping_methods.php

  require('includes/languages/' . $language . '/checkout_shipping.php');

// define redirect_to_payment array
  $redirect_to_payment = array();

  $page_content = $oscTemplate->getContent('checkout_shipping');

// redirect to payment page if modules flag true 
  if ( in_array(true, $redirect_to_payment) && !in_array(false, $redirect_to_payment) ) {
    tep_redirect(tep_href_link('checkout_payment.php', '', 'SSL'));
  }

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link('checkout_shipping.php', '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link('checkout_shipping.php', '', 'SSL'));

  require('includes/template_top.php');
?>

<?php echo tep_draw_form('checkout_address', tep_href_link('checkout_shipping.php', '', 'SSL'), 'post', 'class="form-horizontal"', true) . tep_draw_hidden_field('action', 'process'); ?>

<div class="contentContainer">
  <div class="row">
    <?php echo $page_content; ?>
  </div>
</div>

</form>

<?php
  require('includes/template_bottom.php');
  require('includes/application_bottom.php');
?>
