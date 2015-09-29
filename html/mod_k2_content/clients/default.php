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



?>
<span id="clientBlock" class="stupidAnchor"></span>
<div class="container">
	<div id="clientsModule" class="clientItemsModule">
		<?php if(count($items)): ?>
			<div class="row">
		    <?php foreach ($items as $key=>$item):	?>
			    <div class="col-xs-12 col-sm-4 clientPostItem">
				    <h3><?php echo $item->title; ?></h3>
					<?php if($params->get('itemIntroText')): ?>
						<?php echo $item->introtext; ?>
					<?php endif; ?>
			    </div>
		    <?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<script>
(function( $ ){
	// init Isotope
	var $grid = $('.clientItemsModule').isotope({
		itemSelector: '.clientPostItem',
		percentPosition: true,
		layoutMode: 'masonry'
	});
})( jQuery );
</script>
