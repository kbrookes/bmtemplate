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

<div id="singleModuleAbout" class="singleItemsModule">
	<div class="container">
	<?php if(count($items)): ?>
	    <?php foreach ($items as $key=>$item):	?>
		    <div class="singleItemWrap" >
				<?php if($params->get('itemIntroText')): ?>
					<?php echo $item->introtext; ?>
				<?php endif; ?>
		    </div>
	    <?php endforeach; ?>
	<?php endif; ?>
		<div class="row">
			<div class="col-xs-12 text-center bannerButtons">
				<a class="btn btn-default btn-lg btn-dark" href="<?php echo $params->get('itemCustomLinkURL'); ?>"  data-mh="formButton"><?php echo $params->get('itemCustomLinkTitle'); ?> <i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
	</div>
</div>

