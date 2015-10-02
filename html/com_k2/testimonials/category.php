<?php
/**
 * @version		3.0.0
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2015 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<!-- Start K2 Category Layout -->
<div id="testimonialsView" class="testimonialsListView <?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
<span id="testimonialsList" class="stupidAnchor"></span>
	<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
	<!-- Blocks for current category and subcategories -->
	<div class="itemListCategoriesBlock row">

		<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>
		<!-- Category block -->
		<div class="itemListCategory col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-offset-2">


			<?php if($this->params->get('catDescription')): ?>
			<!-- Category description -->
			<div class="resourceDescription"><?php echo $this->category->description; ?></div>
			<?php endif; ?>
			
		</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

	
	<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
	<!-- Item list -->
	<div class="container">
		<div class="itemList">
	
			<?php if(isset($this->leading) && count($this->leading)): ?>
			<!-- Leading items -->
			<div id="itemListLeading"  class="row testimonialsGrid">
				<?php foreach($this->leading as $key=>$item): ?>
					<?php
						// Load category_item.php by default
						$this->item=$item;
						echo $this->loadTemplate('item');
					?>
				<?php endforeach; ?>
				
			</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="k2Pagination">
		<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
	</div>
	<?php endif; ?>
	
	<?php endif; ?>
</div>
<!-- End K2 Category Layout -->

<?php
$doc = JFactory::getDocument();
$app = JFactory::getApplication();

$tplUrl = JURI::root() . 'templates/' . JFactory::getApplication()->getTemplate();?>

<script src="<?php echo $tplUrl; ?>/js/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="<?php echo $tplUrl; ?>/js/isotope-layout.js" type="text/javascript"></script>
<script src="<?php echo $tplUrl; ?>/js/jquery.infinitescroll.min.js" type="text/javascript"></script>
<script>
(function( $ ){
	// init Isotope
	var $grid = $('.testimonialsGrid').isotope({
		itemSelector: '.testimonialItem',
		percentPosition: true,
		layoutMode: 'masonry'
	});
	// infinitescroll() is called on the element that surrounds 
	// the items you will be loading more of
	  $('#itemListLeading').infinitescroll({
	 
	    navSelector  : "div.k2Pagination",            
	                   // selector for the paged navigation (it will be hidden)
	    nextSelector : ".pagination-next a",    
	                   // selector for the NEXT link (to page 2)
	    itemSelector : ".testimonialItem",
	                   // selector for all items you'll retrieve
		debug : true
	  });
})( jQuery );
</script>
