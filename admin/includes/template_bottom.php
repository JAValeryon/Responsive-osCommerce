<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/
?>

</div>

<?php require('includes/footer.php'); ?>

<br />
<script type="text/javascript" src="<?php echo tep_href_link('ext/ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo tep_href_link('ext/ckeditor/adapters/jquery.js'); ?>"></script>
<script type="text/javascript">
$(function() {
var $editors = $('textarea');
if ($editors.length) {
$editors.each(function() {
var editorID = $(this).attr("id");
var instance = CKEDITOR.instances[editorID];
if (instance) { CKEDITOR.remove(instance); }
CKEDITOR.replace(editorID);
});
}
});
</script>
</body>
</html>
