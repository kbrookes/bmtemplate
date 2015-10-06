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
$textIntro = $this->item->introtext;
$textIntro = strip_tags($textIntro);
?>

<article class="itemlistItemView <?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>" itemscope itemtype="http://schema.org/Article">
	
	<div class="row">
		<div class="hidden-xs col-sm-4 col-md-3 col-lg-2 resultImage">
		<?php if($this->params->get('listItemImage') && $this->item->image): ?>
			<figure class="itemImageBlock">
				<a href="<?php echo $this->item->link; ?>" title="<?php echo $this->escape($this->item->image->alt); ?>">
			  		<img src="<?php echo $this->item->image->src; ?>" alt="<?php echo $this->escape($this->item->image->alt); ?>" style="width:<?php echo $this->item->image->width; ?>px; height:auto;" itemprop="image"
					srcset="<?php echo $this->item->images['XS']->src; ?> 320w,
							<?php echo $this->item->images['S']->src; ?> 400w, 
							<?php echo $this->item->images['M']->src; ?> 600w, 
							<?php echo $this->item->images['L']->src; ?> 768w,
							<?php echo $this->item->images['XL']->src; ?> 2x"
		  		/>
			  	</a>
			</figure>
		<?php endif; ?>
		<?php if($this->params->get('listItemCategory')): ?>
			<div class="itemCategory">
				<a href="<?php echo $this->item->category->link; ?>" class="btn btn-sm btn-default btn-green"><?php echo $this->item->category->title; ?> <i class="fa fa-angle-double-right"></i></a>
			</div>
		<?php endif; ?>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 resultText">
			<header class="itemHeader">
			<?php if($this->params->get('listItemTitle')): ?>
				<h2 class="itemTitle" itemprop="name"><?php if ($this->params->get('listItemTitleLinked')): ?><a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a><?php else: ?><?php echo $this->item->title; ?><?php endif; ?></h2>
			<?php endif; ?>
		
			<?php if($this->params->get('listItemDateCreated') && $this->item->category->title=='WhatMatters Blog'): ?>
			<span class="itemDateCreated" itemprop="dateCreated">
				<?php echo JHtml::_('date', $this->item->created, JText::_('K2_DATE_FORMAT_LC2')); ?>
			</span>
			<?php endif; ?>
			</header>

			<div class="itemBody" itemprop="articleBody">
			<?php if(!empty($this->item->fulltext)): ?>
				<?php if($this->params->get('listItemIntroText')): ?>
					<div class="itemIntroText" itemprop="description">
						<?php echo $this->item->introtext; ?>
					</div>
				<?php endif; ?>
				<?php if($this->params->get('listItemFullText')): ?>
					<div class="itemFullText">
						<?php echo $this->item->fulltext; ?>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="itemFullText">
				  	<?php echo $textIntro = substr($textIntro,0,240).'...'; ?>

				</div>
			<?php endif; ?>
			
			</div>  
		</div>
    </div>
</article>
