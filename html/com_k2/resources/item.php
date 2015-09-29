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



<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="resourceView" class="resourceItemView row <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	
	<div class="imageHeader col-xs-12 col-sm-4 col-md-3 col-lg-3">
	<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
		<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" class="img-responsive" />
	<?php endif; ?>	
	</div>
		
	<div class="resourceContent col-xs-12 col-sm-8 col-md-9 col-lg-9">		
	<?php if($this->item->params->get('itemTitle')): ?>
		<h2 class="itemTitle"><?php echo $this->item->title; ?></h2>
	<?php endif; ?>
	
		<div class="itemBody">
	
	
		  <?php if(!empty($this->item->fulltext)): ?>
		  <?php if($this->item->params->get('itemIntroText')): ?>
		  <!-- Item introtext -->
		  <div class="itemIntroText">
		  	<?php echo $this->item->introtext; ?>
		  </div>
		  <?php endif; ?>
		  <?php if($this->item->params->get('itemFullText')): ?>
		  <!-- Item fulltext -->
		  <div class="itemFullText">
		  	<?php echo $this->item->fulltext; ?>
		  </div>
		  <?php endif; ?>
		  <?php else: ?>
		  <!-- Item text -->
		  <div class="itemFullText">
		  	<?php echo $this->item->introtext; ?>
		  </div>
		  <?php endif; ?>
	
			
	
		  
	  </div>
	</div>	
</div>
<!-- End K2 Item Layout -->
