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

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
<div class="blogItem mix  col-xs-12 col-sm-6 col-md-4 <?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?><?php foreach ($this->item->tags as $tag): ?>
	<?php 
		$strippedTag=$tag->name;
		$strippedTag = preg_replace("/(\W)/", "", $strippedTag);
		echo strtolower($strippedTag);?>
	<?php endforeach; ?><?php endif; ?>" data-mh="blogCatItem">
	
	<a href="<?php echo $this->item->link; ?>">
		<div class="blogCatItemImage" <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>style="background-image: url(<?php echo $this->item->image; ?>);"<?php endif; ?>>
		<?php if ($this->item->params->get('catItemReadMore')): ?>
			<div class="blogItemReadMore text-center">
				<button class="btn btn-default btn-lg btn-green" >
					Read more <i class="fa fa-angle-double-right"></i>
				</button>
			</div>
		<?php endif; ?>
	</div>
	</a>
		
	<div class="blogCatItemContent">
	<?php if($this->item->params->get('catItemTitle')): ?>
		<h3><?php if ($this->item->params->get('catItemTitleLinked')): ?>
			<a href="<?php echo $this->item->link; ?>">
	  			<?php echo $this->item->title; ?>
	  		</a>
	  		<?php else: ?>
	  		<?php echo $this->item->title; ?>
		  	<?php endif; ?>
		</h3>
	<?php endif; ?>
	<?php if($this->item->params->get('catItemIntroText')): ?>
		<div class="blogItemIntro">
		  	<?php echo $this->item->introtext; ?>
		</div>
	<?php endif; ?>
	</div>
	
</div>
<!-- End K2 Item Layout -->
