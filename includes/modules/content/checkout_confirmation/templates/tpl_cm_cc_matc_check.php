<?php
/*
  $Id$

  MATC Check by @JAVAleryon
  
  Based on Must Accept Terms and Conditions module by @mattjt83
  https://apps.oscommerce.com/snpJh
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/
?>
<div class="col-sm-<?php echo $content_width; ?> cm-cc-matc-check">
    <div class="contentText">
        <div class="text-right">
            <?php echo '<div style="margin:5px 0 5px;">' . tep_draw_checkbox_field('matc', '', false, 'id="matc"') . sprintf(MATC_TEXT, tep_href_link('conditions.php', tep_get_all_get_params(), 'SSL'), tep_href_link('privacy.php', tep_get_all_get_params(), 'SSL')) . '</div>'; ?>
            <br />
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
$('form[name=checkout_confirmation]').submit(function(){
var return_value = false;

if (!$('#matc').is(':checked')){
alert("<?php echo MATC_TERMS_ALERT;?>");
}else{
return_value = true;
}

return return_value;
});
});

</script> 
