<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2016 osCommerce

  Released under the GNU General Public License
*/ 
?>
<div class="col-sm-<?php echo $content_width; ?> category-images"> 
  <h3 class="category-images-title"><?php echo MODULE_CONTENT_CATEGORY_IMAGES_HEADING; ?></h3>
  
  <div class="row list-group" itemtype="http://schema.org/ItemList">
    <meta itemprop="numberOfItems" content="<?php echo (int)$num_category_images; ?>" />
    <?php 
    while ($categories = tep_db_fetch_array($categories_query)) {  
    ?>
    <div class="col-sm-<?php echo MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_EACH; ?>" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
      <div class="thumbnail equal-height category-images-item">
        <a href="<?php echo tep_href_link('index.php', 'cPath=' . (int)$categories['categories_id']); ?>"><?php echo tep_image('images/' . $categories['categories_image'], $categories['categories_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'itemprop="image"'); ?></a>
        <hr>
        <div class="text-center category-images-name"><a href="<?php echo tep_href_link('index.php', 'cPath=' . (int)$categories['categories_id']); ?>"><?php echo $categories['categories_name']; ?></a></div>        
        <?php if (tep_not_null(MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_DESCRIPTION)) { ?> 
        <div class="text-center category-images-desc"><?php echo $categories['categories_description'] . '<span class="category-images-see-more"><a href="' . tep_href_link('index.php', 'cPath=' . (int)$categories['categories_id']); ?>"><?php echo MODULE_CONTENT_CATEGORY_IMAGES_SEE_MORE; ?></a></span></div>    
        <?php } ?>        
      </div>
    </div>
    <?php
  }
  ?>
  </div>  
</div>
         