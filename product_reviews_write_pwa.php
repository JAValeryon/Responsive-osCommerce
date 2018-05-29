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

  require('includes/application_top.php');

  require('includes/languages/' . $language . '/product_reviews_write.php');

// if the customer is not logged on, carry on, must be a guest
	if (!tep_session_is_registered('customer_id'))  {

  // catalog/product_reviews_write_pwa.php?products_id=nnnn&pwa_id=xxxxXXXXxxxx

	$pwa_id = (isset($_GET['pwa_id']) ? $_GET['pwa_id'] : '');

	if (!isset($_GET['pwa_id'])) {
    tep_redirect(tep_href_link('product_reviews.php', tep_get_all_get_params(array('action'))));
	}

  if (!isset($_GET['products_id'])) {
    tep_redirect(tep_href_link('product_reviews.php', tep_get_all_get_params(array('action'))));
  }

  //check that product exists
  $product_info_query = tep_db_query("select p.products_id, p.products_model, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name from products p, products_description pd where p.products_id = '" . (int)$_GET['products_id'] . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'");
  if (!tep_db_num_rows($product_info_query)) {
    tep_redirect(tep_href_link('product_reviews.php', tep_get_all_get_params(array('action'))));
  } else {
    $product_info = tep_db_fetch_array($product_info_query);
  }
// check that pwa_id exits
  $customer_query = tep_db_query("select customers_name, orders_id from orders where reviews_key = '" . $pwa_id . "'");
  if (!tep_db_num_rows($customer_query)) {
    tep_redirect(tep_href_link('product_reviews.php', tep_get_all_get_params(array('action'))));
	} else {
	$customer = tep_db_fetch_array($customer_query);
	}
// need to check that products_id relates to the pwa_id
	$orders_products_query = tep_db_query("select products_id from orders_products where orders_id = '" . tep_db_input($customer['orders_id']) . "'");
	$status = false;
	while($orders_products = tep_db_fetch_array($orders_products_query)) {
		if ((int)$_GET['products_id'] == $orders_products['products_id']) $status = true;
	}
	if ($status == false) {
		tep_redirect(tep_href_link('product_reviews.php', tep_get_all_get_params(array('action'))));
	}

  if (isset($_GET['action']) && ($_GET['action'] == 'process') && isset($_POST['formid']) && ($_POST['formid'] == $sessiontoken)) {
    $rating = tep_db_prepare_input($_POST['rating']);
    $review = tep_db_prepare_input($_POST['review']);

    $error = false;

    if (strlen($review) < REVIEW_TEXT_MIN_LENGTH) {
      $error = true;

      $messageStack->add('review', JS_REVIEW_TEXT);
    }

    if (($rating < 1) || ($rating > 5)) {
      $error = true;

      $messageStack->add('review', JS_REVIEW_RATING);
    }

    if ($error == false) {
      tep_db_query("insert into reviews (products_id, customers_id, customers_name, customers_guest, reviews_rating, date_added) values ('" . (int)$_GET['products_id'] . "', '" . (int)$customer_id . "', '" . tep_db_input($customer['customers_name']) . "', '1', '" . tep_db_input($rating) . "', now())");
      $insert_id = tep_db_insert_id();

      tep_db_query("insert into reviews_description (reviews_id, languages_id, reviews_text) values ('" . (int)$insert_id . "', '" . (int)$languages_id . "', '" . tep_db_input($review) . "')");

      $messageStack->add_session('product_reviews', TEXT_REVIEW_RECEIVED, 'success');
      tep_redirect(tep_href_link('product_reviews.php', tep_get_all_get_params(array('action'))));
    }
  }

  if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
    $products_price = '<del>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</del> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
  } else {
    $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
  }

  if (tep_not_null($product_info['products_model'])) {
    $products_name = $product_info['products_name'] . '<br /><small>[' . $product_info['products_model'] . ']</small>';
  } else {
    $products_name = $product_info['products_name'];
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link('product_reviews.php', tep_get_all_get_params()));

  require('includes/template_top.php');

  } else {
	  // customer logged on so not a guest
	      tep_redirect(tep_href_link('index.php'));
  }
?>
<script><!--
function checkForm() {
  var error = 0;
  var error_message = "<?php echo JS_ERROR; ?>";

  var review = document.product_reviews_write.review.value;

  if (review.length < <?php echo REVIEW_TEXT_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_REVIEW_TEXT; ?>";
    error = 1;
  }

  if ((document.product_reviews_write.rating[0].checked) || (document.product_reviews_write.rating[1].checked) || (document.product_reviews_write.rating[2].checked) || (document.product_reviews_write.rating[3].checked) || (document.product_reviews_write.rating[4].checked)) {
  } else {
    error_message = error_message + "<?php echo JS_REVIEW_RATING; ?>";
    error = 1;
  }

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
//--></script>

<div class="page-header">
  <h1 class="pull-right"><?php echo $products_price; ?></h1>
  <h1><?php echo $products_name; ?></h1>
</div>

<?php
  if ($messageStack->size('review') > 0) {
    echo $messageStack->output('review');
  }
?>

<?php echo tep_draw_form('product_reviews_write', tep_href_link('product_reviews_write_pwa.php', 'action=process&products_id=' . $_GET['products_id'] . '&pwa_id=' . $_GET['pwa_id']), 'post', 'class="form-horizontal" onsubmit="return checkForm();"', true); ?>

<div class="contentContainer">

<?php
  if (tep_not_null($product_info['products_image'])) {
?>

  <div class="pull-right text-center">
    <?php echo '<a href="' . tep_href_link('product_info.php', 'products_id=' . $product_info['products_id']) . '">' . tep_image('images/' . $product_info['products_image'], addslashes($product_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '</a>'; ?>

    <p><?php echo tep_draw_button(IMAGE_BUTTON_IN_CART, 'fa fa-shopping-cart', tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now')); ?></p>
  </div>

  <div class="clearfix"></div>

<?php
  }
?>

  <div class="contentText">
    <div class="row">
      <p class="col-xs-3 text-right"><strong><?php echo SUB_TITLE_FROM; ?></strong></p>
      <p class="col-xs-9"><?php echo tep_output_string_protected($customer['customers_name'] ); ?></p>
    </div>
    <div class="form-group has-feedback">
      <label for="inputReview" class="control-label col-xs-3"><?php echo SUB_TITLE_REVIEW; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_textarea_field('review', 'soft', 60, 15, NULL, 'required aria-required="true" id="inputReview" placeholder="' . SUB_TITLE_REVIEW . '"');
        echo FORM_REQUIRED_INPUT;
        ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-3"><?php echo SUB_TITLE_RATING; ?></label>
      <div class="col-xs-9">
        <label class="radio-inline">
          <?php echo tep_draw_radio_field('rating', '1'); ?>
        </label>
        <label class="radio-inline">
          <?php echo tep_draw_radio_field('rating', '2'); ?>
        </label>
        <label class="radio-inline">
          <?php echo tep_draw_radio_field('rating', '3'); ?>
        </label>
        <label class="radio-inline">
          <?php echo tep_draw_radio_field('rating', '4'); ?>
        </label>
        <label class="radio-inline">
          <?php echo tep_draw_radio_field('rating', '5', 1); ?>
        </label>
        <?php echo '<div class="help-block justify" style="width: 150px;">' . TEXT_BAD . '<p class="pull-right">' . TEXT_GOOD . '</p></div>'; ?>
      </div>
    </div>

  </div>

  <div class="buttonSet row">
    <div class="col-xs-6"><?php echo tep_draw_button(IMAGE_BUTTON_BACK, 'fa fa-chevron-left', tep_href_link('product_reviews.php', tep_get_all_get_params(array('reviews_id', 'action')))); ?></div>
    <div class="col-xs-6 text-right"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'fa fa-chevron-right', null, 'primary', null, 'btn-success'); ?></div>
  </div>
</div>

</form>

<?php
  require('includes/template_bottom.php');
  require('includes/application_bottom.php');
?>
