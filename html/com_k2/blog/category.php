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
<div id="blogView" class="blogListView <?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<!-- Page title -->
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if($this->params->get('catFeedIcon')): ?>
	<!-- RSS feed icon -->
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
		
	</div>
	<?php endif; ?>

	<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
	<!-- Blocks for current category and subcategories -->
	<div class="itemListCategoriesBlock row">

		<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>
		<!-- Category block -->
		<div class="itemListCategory col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-offset-2">

			<?php if($this->category->canAdd): ?>
			<!-- Item add link -->
			<span class="catItemAddLink">
				<a href="<?php echo $this->category->addLink; ?>">
					<?php echo JText::_('K2_ADD_A_NEW_ITEM_IN_THIS_CATEGORY'); ?>
				</a>
			</span>
			<?php endif; ?>

			<?php if($this->params->get('catImage') && $this->category->image): ?>
			<!-- Category image -->
			<img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
			<?php endif; ?>

			<?php if($this->params->get('catTitle')): ?>
			<!-- Category title -->
			<h2><?php echo $this->category->name; ?><?php if($this->params->get('catTitleItemCounter')) echo ' ('.$this->pagination->total.')'; ?></h2>
			<?php endif; ?>

			<?php if($this->params->get('catDescription')): ?>
			<!-- Category description -->
			<div class="blogDescription"><?php echo $this->category->description; ?></div>
			<?php endif; ?>

			<!-- K2 Plugins: K2CategoryDisplay -->
			<?php echo $this->category->event->K2CategoryDisplay; ?>

			
		</div>
		<?php endif; ?>

		<?php if($this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories)): ?>
		<!-- Subcategories -->
		<div class="itemListSubCategories">
			<h3><?php echo JText::_('K2_CHILDREN_CATEGORIES'); ?></h3>

			<?php foreach($this->subCategories as $key=>$subCategory): ?>

			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('subCatColumns'))==0))
				$lastContainer= ' subCategoryContainerLast';
			else
				$lastContainer='';
			?>

			<div class="subCategoryContainer<?php echo $lastContainer; ?>"<?php echo (count($this->subCategories)==1) ? '' : ' style="width:'.number_format(100/$this->params->get('subCatColumns'), 1).'%;"'; ?>>
				<div class="subCategory">
					<?php if($this->params->get('subCatImage') && $subCategory->image): ?>
					<!-- Subcategory image -->
					<a class="subCategoryImage" href="<?php echo $subCategory->link; ?>">
						<img alt="<?php echo K2HelperUtilities::cleanHtml($subCategory->name); ?>" src="<?php echo $subCategory->image; ?>" />
					</a>
					<?php endif; ?>

					<?php if($this->params->get('subCatTitle')): ?>
					<!-- Subcategory title -->
					<h2>
						<a href="<?php echo $subCategory->link; ?>">
							<?php echo $subCategory->name; ?><?php if($this->params->get('subCatTitleItemCounter')) echo ' ('.$subCategory->numOfItems.')'; ?>
						</a>
					</h2>
					<?php endif; ?>

					<?php if($this->params->get('subCatDescription')): ?>
					<!-- Subcategory description -->
					<div><?php echo $subCategory->description; ?></div>
					<?php endif; ?>

					<!-- Subcategory more... -->
					<a class="subCategoryMore" href="<?php echo $subCategory->link; ?>">
						<?php echo JText::_('K2_VIEW_ITEMS'); ?>
					</a>

					
				</div>
			</div>
			<?php if(($key+1)%($this->params->get('subCatColumns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>

			
		</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

	<div class="row">
		<div class="blogSearch  col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-offset-2">
		<?php 
			$doc      = JFactory::getDocument();
			$renderer = $doc->loadRenderer( 'modules' );
			$raw      = array( 'style' => 'raw' );
			echo $renderer->render('blogSearch', $raw, null);
			?>
		</div>
	</div>
	
	
	<div class="row resourceButtons">
		<div class="resourceFilter  col-xs-12">
			<div class="btn-group btn-group-justified filter-button-group" role="group">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter="*">Latest</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".stakeholderengagement">Stakeholder engagement</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".researchinsights ">Research &amp; insights </button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".brandpositioningstrategy, .brandstorytoneofvoicekeymessaging, .customervaluepropositioncvp">Brand strategy</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".brandarchitecture">Brand architecture</button>
				</div>
			</div>
			<div class="btn-group btn-group-justified filter-button-group" role="group">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".employeebrandingemployeevaluepropositionevp">Employee branding</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".brandnaming">Brand naming</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".brandlogoidentitydesign">Brand design</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".marketingcommunication, .brandmanagementmaintenancemeasurement">Marketing comms</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default btn-dark filter" data-filter=".brandcommentary">Brand commentary</button>
				</div>
			</div>
		</div>
	</div>

	<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
	<!-- Item list -->
	<div class="itemList">

		<?php if(isset($this->leading) && count($this->leading)): ?>
		<div id="itemListLeading"  class="row blogGrid">
			<?php // Fetching multiple items based on filters
				// Get items from categories which have the IDs 33 and 40
				$model = K2Model::getInstance('items');
				// Apply publishing and ACL
				$model->setState('site', true);
				$model->setState('category', 5);
				$model->setState('sorting', 'created.reverse');
				$items = $model->getRows();

				foreach ( $items as $item ) {
					$this->item = $item; echo $this->loadItemlistLayout();
				} ?>
		</div>
		<?php endif; ?>

		<?php if(isset($this->primary) && count($this->primary)): ?>
		<!-- Primary items -->
		<div id="itemListPrimary">
			<?php foreach($this->primary as $key=>$item): ?>
			
			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('num_primary_columns'))==0) || count($this->primary)<$this->params->get('num_primary_columns') )
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			?>
			
			<div class="itemContainer<?php echo $lastContainer; ?>"<?php echo (count($this->primary)==1) ? '' : ' style="width:'.number_format(100/$this->params->get('num_primary_columns'), 1).'%;"'; ?>>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			</div>
			<?php if(($key+1)%($this->params->get('num_primary_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			
		</div>
		<?php endif; ?>

		<?php if(isset($this->secondary) && count($this->secondary)): ?>
		<!-- Secondary items -->
		<div id="itemListSecondary">
			<?php foreach($this->secondary as $key=>$item): ?>
			
			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('num_secondary_columns'))==0) || count($this->secondary)<$this->params->get('num_secondary_columns') )
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			?>
			
			<div class="itemContainer<?php echo $lastContainer; ?>"<?php echo (count($this->secondary)==1) ? '' : ' style="width:'.number_format(100/$this->params->get('num_secondary_columns'), 1).'%;"'; ?>>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			</div>
			<?php if(($key+1)%($this->params->get('num_secondary_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			
		</div>
		<?php endif; ?>

		<?php if(isset($this->links) && count($this->links)): ?>
		<!-- Link items -->
		<div id="itemListLinks">
			<h4><?php echo JText::_('K2_MORE'); ?></h4>
			<?php foreach($this->links as $key=>$item): ?>

			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('num_links_columns'))==0) || count($this->links)<$this->params->get('num_links_columns') )
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			?>

			<div class="itemContainer<?php echo $lastContainer; ?>"<?php echo (count($this->links)==1) ? '' : ' style="width:'.number_format(100/$this->params->get('num_links_columns'), 1).'%;"'; ?>>
				<?php
					// Load category_item_links.php by default
					$this->item=$item;
					echo $this->loadTemplate('item_links');
				?>
			</div>
			<?php if(($key+1)%($this->params->get('num_links_columns'))==0): ?>
			
			<?php endif; ?>
			<?php endforeach; ?>
			
		</div>
		<?php endif; ?>

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
<!--<script src="<?php echo $tplUrl; ?>/js/jquery.mixitup.min.js" type="text/javascript"></script>-->
<!--<script src="<?php echo $tplUrl; ?>/js/jquery.lazyload.min.js" type="text/javascript"></script>-->
<script src="<?php echo $tplUrl; ?>/js/jquery.infinitescroll.min.js" type="text/javascript"></script>
<script>
(function( $ ){
	
	
		function getHashFilter() {
			var hash = location.hash;
			// get filter=filterName
			var matches = location.hash.match( /filter=([^&]+)/i );
			var hashFilter = matches && matches[1];
			return hashFilter && decodeURIComponent( hashFilter );
		}
		
		
		$( function() {
	
			var $container = $('.blogGrid');
	
			// bind filter button click
			var $filters = $('.filter-button-group').on( 'click', 'button', function() {
				var filterAttr = $( this ).attr('data-filter');
				// set filter in hash
				location.hash = 'filter=' + encodeURIComponent( filterAttr );
			});
			
			var isIsotopeInit = false;
			
			function onHashchange() {
				var hashFilter = getHashFilter();
				if ( !hashFilter && isIsotopeInit ) {
					return;
				}
				isIsotopeInit = true;
				// filter isotope
				$container.isotope({
					itemSelector: '.blogItem',
					percentPosition: true,
					layoutMode: 'fitRows',
					animationEngine: 'best-available',
					filter: hashFilter
				});
				// set selected class on button
				if ( hashFilter ) {
					$filters.find('.is-checked').removeClass('is-checked');
					$filters.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
				}
			}
			
			$(window).on( 'hashchange', onHashchange );
			// trigger event handler to init Isotope
			onHashchange();
		});
		
		
		
		
		/*// init Isotope
		var $grid = $('.blogGrid').isotope({
			percentPosition: true,
			itemSelector: '.blogItem',
			layoutMode: 'fitRows',
			resizesContainer: true
		});
		// filter items on button click
		$('.filter-button-group').on( 'click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
		});*/
		
		
		
		/*// infinitescroll() is called on the element that surrounds 
		// the items you will be loading more of
		  $('#itemListLeading').infinitescroll({
		 
		    navSelector  : ".k2Pagination",            
		                   // selector for the paged navigation (it will be hidden)
		    nextSelector : ".pagination-next a",    
		                   // selector for the NEXT link (to page 2)
		    itemSelector : ".blogItem",          
		                   // selector for all items you'll retrieve
	       // call Isotope as a callback
	        function( newElements ) {
	          $container.isotope( 'appended', $( newElements ) );
			   $container.isotope('layout');
	        }
		  });*/
		
		
		
		
		/*// JSCROLL
		$('.blogListView').jscroll({
		    debug: true,
		    contentSelector: '.blogItem',
		    nextSelector: '.pagination-next a',
		    callback( newElements ){
			    $grid.isotope( 'appended', $( newElements ) ); 
		    }
		});*/
		
		
		///* MIX IT UP */
		/* $(function(){
		    $('#itemListLeading').mixItUp({
			    load: {
					filter: 'all'
				}
		    });
		});		*/
	$(document).ready(function(){
		$container.isotope();
	});
})( jQuery );
</script>

