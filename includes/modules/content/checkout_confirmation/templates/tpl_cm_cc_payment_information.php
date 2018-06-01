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
<div class="col-sm-<?php echo $content_width; ?> cm-cc-payment-information">

  <h2 class="h3"><?php echo MODULE_CONTENT_CHECKOUT_CONFIRMATION_PAYMENT_INFORMATION_HEADING; ?></h2>

  <div class="contentText">
<?php
    if (tep_not_null($confirmation['title'])) {
      echo '<div class="alert alert-danger">';
      echo $confirmation['title'];
      echo '</div>';
    }
?>
<?php
      if (isset($confirmation['fields'])) {
        echo '<div class="alert alert-info">';
        $fields = '';
        for ($i=0, $n=sizeof($confirmation['fields']); $i<$n; $i++) {
          $fields .= $confirmation['fields'][$i]['title'] . ' ' . $confirmation['fields'][$i]['field'] . '<br>';
        }
        if (strlen($fields) > 4) echo substr($fields,0,-4);
        echo '</div>';
      }
?>
  </div>

</div>
