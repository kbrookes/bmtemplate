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
if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)):
	$resourceTypes = $this->item->extraFields->resourcetype->value;
	$resourceTypes = str_replace("           ",",",$resourceTypes);
$dom = new DOMDocument;
$dom->loadHTML($resourceTypes);
$xpath = new DomXpath($dom);
$abc = (string)$dom->getElementsByTagName('div')->item(0)->nodeValue;
$abc = trim(preg_replace('/\s\s+/', ' ', $abc));

	$flat = call_user_func_array('array_merge', $result);
endif;
?>

<!-- Start K2 Item Layout -->
<div class="resourceItem col-xs-6 col-sm-4 col-md-3 <?php echo ltrim($abc,',');?> ">
<!-- LINK TO ARTICLE -->
<?php if($this->item->featured):?>
	<a href="<?php echo $this->item->link; ?>">
		<div class="resourceCatItemImage" <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>style="background-image: url(<?php echo $this->item->image; ?>);"<?php endif; ?>>
		<?php if ($this->item->params->get('catItemReadMore')): ?>
			<div class="resourceItemReadMore text-center">
				<button class="btn btn-default btn-lg btn-green" >
					Download now <i class="fa fa-angle-double-right"></i>
				</button>
			</div>
		<?php endif; ?>
	</div>
	</a>
		
	<div class="resourceCatItemContent">
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
		<div class="resourceItemIntro">
		  	<?php echo $this->item->introtext; ?>
		</div>
	<?php endif; ?>
	</div>
<!-- /LINK TO ARTICLE -->
<!-- LINK TO DOWNLOAD -->
<?php else: ?>
<?php foreach ($this->item->attachments as $attachment): ?>
	<a href="<?php echo $attachment->link; ?>">
		<div class="resourceCatItemImage" <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>style="background-image: url(<?php echo $this->item->image; ?>);"<?php endif; ?>>
		<?php if ($this->item->params->get('catItemReadMore')): ?>
			<div class="resourceItemReadMore text-center">
				<button class="btn btn-default btn-lg btn-green" >
					Download now <i class="fa fa-angle-double-right"></i>
				</button>
			</div>
		<?php endif; ?>
	</div>
	</a>
		
	<div class="resourceCatItemContent">
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
		<div class="resourceItemIntro">
		  	<?php echo $this->item->introtext; ?>
		</div>
	<?php endif; ?>
	</div>
<?php endforeach; ?>
<!-- /LINK TO DOWNLOAD -->
<?php endif; ?>
</div>
<!-- End K2 Item Layout -->

