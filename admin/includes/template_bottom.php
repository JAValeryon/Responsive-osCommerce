<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2018 osCommerce

  Released under the GNU General Public License
*/
?>
			</main>
		</div>
	</div>
</div>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

<?php require('includes/footer.php'); ?>


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

<?php echo $oscTemplate->getBlocks('footer_scripts'); ?>


</body>
</html>
