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

<div id="valuesModuleAbout" class="valuesItemsModule">
	<div class="container">
	<?php if(count($items)): ?>
		<div class="row">
	    <?php foreach ($items as $key=>$item):	?>
		    <div class="col-xs-12 col-sm-6 col-md-4 valuesPostItem">
			    <div class="valueItemWrap" data-mh="valuesPostItem">
				    <h3><?php echo $item->title; ?><span class="green-text">Matters</span></h3>
					<?php if($params->get('itemIntroText')): ?>
						<?php echo $item->introtext; ?>
					<?php endif; ?>
			    </div>
		    </div>
	    <?php endforeach; ?>
		</div>
	<?php endif; ?>
		<div class="row">
			<div class="col-xs-12 text-center bannerButtons">
				<a class="btn btn-default btn-lg btn-white" href="<?php echo $params->get('itemCustomLinkURL'); ?>"  data-mh="formButton"><?php echo $params->get('itemCustomLinkTitle'); ?> <i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
		<div class="scrollNext text-center">
			<a class="scroll" href="#whenToCall"><i class="icon-down-open-big"></i></a>
		</div>
	</div>
</div>

