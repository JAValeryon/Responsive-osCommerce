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
<div class="col-sm-<?php echo $content_width; ?> cm-cs-shipping-methods">

  <h2 class="h3"><?php echo MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_TABLE_HEADING; ?></h2>

<?php
    if (sizeof($quotes) > 1 && sizeof($quotes[0]) > 1) {
?>

  <div class="contentText">
    <div class="alert alert-warning">
      <div class="row">
        <div class="col-xs-8">
          <?php echo MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_TEXT_CHOOSE; ?>
        </div>
        <div class="col-xs-4 text-right">
          <?php echo '<strong>' . MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_TITLE_PLEASE_SELECT . '</strong>'; ?>
        </div>
      </div>
    </div>
  </div>

<?php
    } elseif ($free_shipping == false) {
?>

  <div class="contentText">
    <div class="alert alert-info"><?php echo MODULE_CONTENT_CHECKOUT_SHIPPING_SHIPPING_METHODS_TEXT_ENTER_SHIPPING_INFORMATION; ?></div>
  </div>

<?php
    }
?>

  <div class="contentText">
    <table class="table table-striped table-condensed table-hover">
      <tbody>

<?php
    if ($free_shipping == true) {
?>

    <div class="contentText">
      <div class="panel panel-success">
        <div class="panel-heading"><strong><?php echo FREE_SHIPPING_TITLE; ?></strong>&nbsp;<?php echo $quotes[$i]['icon']; ?></div>
        <div class="panel-body">
          <?php echo sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)) . tep_draw_hidden_field('shipping', 'free_free'); ?>
        </div>
      </div>
    </div>

<?php
    } else {
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) {
        for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
// set the radio button to be checked if it is the method chosen
          $checked = (($quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'] == $shipping['id']) ? true : false);         

?>
      <tr class="table-selection">
        <td>
          <strong><?php echo $quotes[$i]['module']; ?></strong>
          <?php
          if (isset($quotes[$i]['icon']) && tep_not_null($quotes[$i]['icon'])) echo '&nbsp;' . $quotes[$i]['icon'];
          ?>

          <?php
          if (isset($quotes[$i]['error'])) {
            echo '<div class="help-block">' . $quotes[$i]['error'] . '</div>';
          }
          ?>

          <?php
          if (tep_not_null($quotes[$i]['methods'][$j]['title'])) echo '<div class="help-block">' . $quotes[$i]['methods'][$j]['title'] . '</div>';
          ?>
          </td>

<?php
            if ( ($n > 1) || ($n2 > 1) ) {
?>

        <td align="right">
          <?php
          if (isset($quotes[$i]['error'])) {
            // nothing
            echo '&nbsp;';
          } else {
            echo $currencies->format(tep_add_tax($quotes[$i]['methods'][$j]['cost'], (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0))); ?>&nbsp;&nbsp;<?php echo tep_draw_radio_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'], $checked, 'required aria-required="true"');
          }
          ?>
        </td>

<?php
            } else {
?>

        <td align="right"><?php echo $currencies->format(tep_add_tax($quotes[$i]['methods'][$j]['cost'], (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0))) . tep_draw_hidden_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id']); ?></td>

<?php
            }
?>

      </tr>

<?php
        }
      }
    }
?>

      </tbody>
    </table>
  </div>

</div>
