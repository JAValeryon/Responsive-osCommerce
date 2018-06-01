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

// needs to be included earlier to set the success message in the messageStack
  require('includes/languages/' . $language . '/checkout_payment_address.php');

  $process = false;

// define redirect_to_shipping array
  $redirect_to_payment_page = array();

  $page_content = $oscTemplate->getContent('checkout_payment_address');

// redirect to payment page if modules flag true 
  if ( in_array(true, $redirect_to_payment_page) && !in_array(false, $redirect_to_payment_page) ) {
    tep_redirect(tep_href_link('checkout_payment.php', '', 'SSL'));
  }

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link('checkout_payment.php', '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link('checkout_payment_address.php', '', 'SSL'));

  require('includes/template_top.php');
?>

<?php
  if ($messageStack->size('checkout_address') > 0) {
    echo $messageStack->output('checkout_address');
  }
?>

<?php echo tep_draw_form('checkout_address', tep_href_link('checkout_payment_address.php', '', 'SSL'), 'post', 'class="form-horizontal"', true); ?>

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
