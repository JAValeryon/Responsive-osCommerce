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
  <h4 class="category-images-title"><?php echo MODULE_CONTENT_CATEGORY_IMAGES_HEADING; ?></h4>
  
  <div class="card-group" itemscope itemtype="http://schema.org/ItemList">
    <meta itemprop="numberOfItems" content="<?php echo (int)$num_category_images; ?>" />
    <?php
    $item = 1;
    while ($categories = tep_db_fetch_array($categories_query)) {  
    ?>
    
    <div class="card text-center border-light" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
      <div class="card-img-top thumbnail category-images-item">
          <a itemprop="url" href="<?php echo tep_href_link('index.php', 'cPath=' . (int)$categories['categories_id']); ?>"><?php echo tep_image('images/' . $categories['categories_image'], $categories['categories_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'itemprop="image"'); ?></a>
      </div>

      <div class="card-body bg-transparent border-light">
        <div class="card-title category-images-name"><a href="<?php echo tep_href_link('index.php', 'cPath=' . (int)$categories['categories_id']); ?>"><?php echo $categories['categories_name']; ?></a></div>        
      </div>
      
    </div>
    <?php
      if ( $item%MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_ROW_SM == 0 ) echo '<div class="w-100 d-none d-sm-block d-md-none"></div>' . PHP_EOL; 
      if ( $item%MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_ROW_MD == 0 ) echo '<div class="w-100 d-none d-md-block d-lg-none"></div>' . PHP_EOL; 
      if ( $item%MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_ROW_LG == 0 ) echo '<div class="w-100 d-none d-lg-block d-xl-none"></div>' . PHP_EOL;
      if ( $item%MODULE_CONTENT_CATEGORY_IMAGES_DISPLAY_ROW_XL == 0 ) echo '<div class="w-100 d-none d-xl-block"></div>' . PHP_EOL;
      $item++;    
  }
  ?>
  </div>  
</div>
         