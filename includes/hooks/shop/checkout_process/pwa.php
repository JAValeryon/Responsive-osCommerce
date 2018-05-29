<?php
/*
  $Id: pwa_hooks.php
  $Loc: catalog/includes/hooks/shop/pwa/

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Purchase without Account for Bootstrap
  Version 3.0 BS 
  by @raiwa 
  info@oscaddons.com
  www.oscaddons.com

  Copyright (c) 2018 Rainer Schmied

  Released under the GNU General Public License
*/

class hook_shop_checkout_process_pwa {

  function listen_PwaCheckoutMailMod() {
    global $order, $customer_id, $insert_id, $language, $email_order;
    
    $products_review_links = constant('MODULE_CONTENT_PWA_REVIEWS_' . strtoupper($language)) . "\n";
    
    if(tep_session_is_registered('customer_is_guest')) {
      $email_order = str_replace(EMAIL_TEXT_INVOICE_URL . ' ' . tep_href_link('account_history_info.php', 'order_id=' . $insert_id, 'SSL', false) . "\n", '', $email_order);
      $email_order .= constant('MODULE_CONTENT_PWA_EMAIL_WARNING_' . strtoupper($language)) . "\n\n" . 
                      EMAIL_SEPARATOR . "\n"; 
      if($order->content_type != 'physical') {         
        $email_order .= constant('MODULE_CONTENT_PWA_DOWNLOAD_' . strtoupper($language)) . "\n" . 
                        EMAIL_SEPARATOR . "\n";
      }
      $reviews_key = tep_create_random_value(12);
      tep_db_query("update orders set reviews_key = '" . $reviews_key . "' where customers_id = '" . (int)$customer_id . "' and orders_id = '" . (int)$insert_id . "'");
      if(MODULE_CONTENT_PWA_LOGIN_CHECKOUT_GUEST_REVIEW_LINKS == 'True') {
        for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
          $products_review_links .=  '<a href="' . tep_href_link('product_reviews_write_pwa.php', 'products_id=' . tep_get_prid($order->products[$i]['id']) . '&pwa_id=' . $reviews_key, 'SSL', false) . '">' . $order->products[$i]['name'] . '</a>' . "\n";
        }      
        $email_order .= $products_review_links . "\n" . 
                        EMAIL_SEPARATOR . "\n";
      }
    } elseif (MODULE_CONTENT_PWA_LOGIN_CHECKOUT_REGISTERED_REVIEW_LINKS == 'True') {
      for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
        $products_review_links .= '<a href="' . tep_href_link('product_reviews_write.php', 'products_id=' . tep_get_prid($order->products[$i]['id']), 'SSL', false) . '">' . $order->products[$i]['name'] . '</a>' . "\n";
      }      
      $email_order .= $products_review_links . "\n" . 
                      EMAIL_SEPARATOR . "\n";
      }
  }
}
