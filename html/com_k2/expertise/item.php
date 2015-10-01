<?php
/**
 * @version		3.0.0
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ;

// Dependencies
$document = JFactory::getDocument();
if($this->item->extraFields->titletag->value != ''):
	$document->setTitle($this->item->extraFields->titletag->value);
endif; 
if($this->item->extraFields->metadescription->value != ''):
	$document->setMetaData('description', $this->item->extraFields->metadescription->value);
endif;
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/picturefill/2.3.1/picturefill.js');
?>

<!-- Start K2 Item Layout -->

<article id="k2Container" class="itemView<?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if ($this->params->get('pageclass_sfx'))echo ' '.$this->params->get('pageclass_sfx');?>" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />

	<?php if($this->params->get('show_page_heading')): ?><h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1><?php endif; ?>
	<header class="itemHeader">
		<?php if($this->params->get('itemTitle')): ?><h2 class="itemTitle" itemprop="name"><?php echo $this->item->title; ?></h2><?php endif; ?>
	</header>

	<div class="itemBody"  itemprop="articleBody">
	<?php if($this->params->get('itemImage') && $this->item->image): ?>
		<figure class="itemImageBlock">
			<span class="itemImage">
				<a class="k2Modal" href="<?php echo $this->item->images['modal']->src; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>">
			  		<img src="<?php echo $this->item->image->src; ?>" alt="<?php echo $this->escape($this->item->image->alt); ?>" style="width:<?php echo $this->item->image->width; ?>px; height:auto;" itemprop="image"
					srcset="<?php echo $this->item->images['XS']->src; ?> 320w,
							<?php echo $this->item->images['S']->src; ?> 600w, 
							<?php echo $this->item->images['M']->src; ?> 900w, 
							<?php echo $this->item->images['L']->src; ?> 1100w,
							<?php echo $this->item->images['XL']->src; ?> 2x"
			  		/>
			  	</a>
			</span>

			<?php if($this->params->get('itemImageMainCaption') && $this->item->image->caption): ?>
			<!-- Image caption -->
			<figcaption class="itemImageCaption"><?php echo $this->item->image->caption; ?></figcaption>
			<?php endif; ?>
			
			<?php if($this->params->get('itemImageMainCredits') && $this->item->image->credits): ?>
			<!-- Image credits -->
			<span class="itemImageCredits"><?php echo $this->item->image->credits; ?></span>
			<?php endif; ?>
		  
		</figure>
	<?php endif; ?>
		
	<?php if($this->params->get('itemIntroText') && $this->item->introtext): ?>
		<div class="itemIntroText"<?php if($this->item->canEdit && !$this->print): ?> data-k2-editable="introtext" data-k2-item="<?php echo $this->item->id; ?>" <?php endif; ?>>
		  	<?php echo $this->item->introtext; ?>
		</div>
	<?php endif; ?>
	  
	<?php if($this->params->get('itemFullText') && $this->item->fulltext): ?>
		<div class="itemFullText"<?php if($this->item->canEdit && !$this->print): ?> data-k2-editable="fulltext" data-k2-item="<?php echo $this->item->id; ?>" <?php endif; ?>>
		  	<?php echo $this->item->fulltext; ?>
		</div>
	<?php endif; ?>
	 

	<?php if($this->params->get('itemExtraFields') && count($this->item->extraFieldsGroups)): ?>
		<div class="itemExtraFields">
			<h3><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h3>
			<?php foreach ($this->item->extraFieldsGroups as $extraFieldGroup): ?>
			<h4><?php echo $extraFieldGroup->name; ?></h4>
			<ul>
				<?php foreach ($extraFieldGroup->fields as $key=>$extraField): ?>
					<?php if($extraField->output): ?>
						<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
							<span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span>
							<span class="itemExtraFieldsValue"><?php echo $extraField->output; ?></span>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	</div>

</article>
<!-- End K2 Item Layout -->
