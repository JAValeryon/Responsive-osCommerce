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
<div class="col-sm-<?php echo $content_width; ?> cm-cc-products">

  <div class="contentText">
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo '<strong>' . MODULE_CONTENT_CHECKOUT_CONFIRMATION_PRODUCTS_HEADING . '</strong>' . tep_draw_button(TEXT_EDIT, 'fa fa-edit', tep_href_link('shopping_cart.php'), NULL, NULL, 'pull-right btn-info btn-xs' ); ?></div>
      <div class="panel-body">
        <table width="100%" class="table-hover order_confirmation">
          <tbody>
<?php
  for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
?>
          <tr>
            <td align="right" valign="top" width="30"><?= $order->products[$i]['qty'] ?>&nbsp;x&nbsp;</td>
            <td valign="top"><?= $order->products[$i]['name'] ?>
<?php
    if (STOCK_CHECK == 'true') {
      echo tep_check_stock($order->products[$i]['id'], $order->products[$i]['qty']);
    }

    if ( (isset($order->products[$i]['attributes'])) && (sizeof($order->products[$i]['attributes']) > 0) ) {
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
?>
<br /><nobr><small>&nbsp;<i> - <?= $order->products[$i]['attributes'][$j]['option'] ?>: <?= $order->products[$i]['attributes'][$j]['value'] ?></i></small></nobr>
<?php
      }
    }
?>
</td>
<?php
    if (sizeof($order->info['tax_groups']) > 1)  {
?>
            <td valign="top" align="right"><?= tep_display_tax_value($order->products[$i]['tax']) ?>%</td>
<?php
    }
?>
            <td align="right" valign="top"><?= $currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']) ?></td>
          </tr>
<?php
  }
?>
        </tbody>
      </table>
      <hr>
      <table width="100%" class="pull-right">
<?php
  if (MODULE_ORDER_TOTAL_INSTALLED) {
    echo $order_total_modules->output();
  }
?>
      </table>
      </div>
    </div>
  </div>

</div>
