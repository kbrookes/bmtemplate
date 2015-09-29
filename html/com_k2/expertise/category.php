<?php
/**
 * @version		3.0.0
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die; ?>

<section id="k2Container" class="categoryView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

		
	<?php if(isset($this->category) || ( $this->params->get('subCategories') && count($this->category->children) )): ?>
	<!-- Blocks for current category and subcategories -->
	<div class="expertiseCategories">
	<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->events->K2CategoryDisplay )): ?>
		<div class="expertiseHeader">
			<div class="container">
				<header>
				<?php if($this->params->get('catDescription')): ?>
					<?php echo $this->category->description; ?>
				<?php endif; ?>
				
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-offset-1 col-lg-8 col-lg-offset-2">
							<div class="row expertiseButtons">
							<?php $counter = 0; foreach($this->category->children as $child): ?>
								<div class="col-xs-4">
									<a href="#<?php echo strtolower($child->title); ?>Anchor" class="scroll">
										<h3><?php echo $child->title; ?></h3>
										<h4><i class="icon-<?php echo strtolower($child->title); ?>"></i></h4>
										<button class="btn btn-lg btn-default btn-green matchWidth">View more</button>
									</a>
								</div>
							<?php $counter++; endforeach; ?>
							</div>
						</div>	
					</div>
					
					<div class="nextSection text-center">
						<a class="scroll" href="#consultAnchor"><i class="fa fa-chevron-down"></i></a>
					</div>
				</header>
			</div>
		</div>
	<?php endif; ?>

	<?php if($this->params->get('subCategories') && count($this->category->children)): ?>
		
		<?php $counter = 0; foreach($this->category->children as $child): ?>
		<div id="subCat<?php echo strtolower($child->title); ?>" class="expertiseSubCategory subCat<?php echo strtolower($child->title); ?>">
			<span id="<?php echo strtolower($child->title); ?>Anchor" class="stupidAnchor"></span>
			<div class="container">
				<div class="subCatIcon"><i class="icon-<?php echo strtolower($child->title); ?>"></i></div>
				<h2><?php echo $child->title; ?></h2>
				<?php if($this->params->get('subCatDescription')): ?>
					<?php echo $child->description; ?>
				<?php endif; ?>
			
				<?php $model = K2Model::getInstance('items');
					// Apply publishing and ACL
					$model->setState('site', true);
					$model->setState('category', array($child->id));
					$model->setState('sorting', 'ordering');
					$items = $model->getRows();?>
			
				<?php if(count($items)): ?>
				<div class="itemList">
					<div class="panel-group" id="accordion<?php echo $child->title; ?>" role="tablist" aria-multiselectable="true">
					<?php foreach ( $items as $item ): 
							$this->item = $item; echo $this->loadItemlistLayout();
					 endforeach; ?>
					</div>
					 <script>
					(function( $ ){
					    function toggleChevron(e) {
						    $(e.target)
						        .prev('.panel-heading')
						        .find("i.indicator")
						        .toggleClass('fa-plus-circle fa-minus-circle');
						}
						$('#accordion<?php echo $child->title; ?>').on('hidden.bs.collapse', toggleChevron);
						$('#accordion<?php echo $child->title; ?>').on('shown.bs.collapse', toggleChevron);
					})( jQuery );
					</script>
				</div>
				<?php endif; ?>
				
				<?php if($child->title=='Consult'): ?>
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
						<div class="row expertiseButtons">
							<div class="col-xs-6">
								<a href="#createAnchor" class="scroll">
									<h3>Create</h3>
									<h4><i class="icon-create"></i></h4>
								</a>
							</div>
							<div class="col-xs-6">
								<a href="#expressAnchor" class="scroll">
									<h3>Express</h3>
									<h4><i class="icon-express"></i></h4>
								</a>
							</div>
						</div>
					</div>	
				</div>
				
				<div class="nextSection text-center">
					<a class="scroll" href="#createAnchor"><i class="fa fa-chevron-down"></i></a>
				</div>
				
				<?php elseif($child->title=='Create'): ?>
				
				<div class="row expertiseButtons">
					<div class="col-xs-12 text-center">
						<a href="#expressAnchor" class="scroll">
							<h3>Express</h3>
							<h4><i class="icon-express"></i></h4>
						</a>
					</div>	
				</div>
				
				<div class="nextSection text-center">
					<a class="scroll" href="#expressAnchor"><i class="fa fa-chevron-down"></i></a>
				</div>
				
				<?php endif; ?>
					
			</div>
			
		</div>
		<?php $counter++; endforeach; ?>
		
	<?php endif; ?>

	</div>
	<?php endif; ?>

	
	
</section>