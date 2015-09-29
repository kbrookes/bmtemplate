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

<div id="alsoLikeModuleAbout" class="alsoLikeItemsModule">
	<div class="container">
	<?php if(count($items)): ?>
		<div class="row">
	    <?php foreach ($items as $key=>$item):	?>
		    <div class="col-xs-12 col-md-4 alsoLikePostItem">
			    <div class="alsoLikeItemWrap" data-mh="alsoLikePostItem">
				    <h3><?php echo $item->title; ?></h3>
					<?php if($params->get('itemIntroText')): ?>
						<?php echo $item->introtext; ?>
					<?php endif; ?>
					<?php if($item->extraFields->learnmorelink->value != ''): ?>
					<div class="bannerButtons text-center">
						<?php echo $item->extraFields->learnmorelink->value; ?>
					</div>
					<?php endif; ?>
			    </div>
		    </div>
	    <?php endforeach; ?>
		</div>
	<?php endif; ?>
	</div>
</div>

