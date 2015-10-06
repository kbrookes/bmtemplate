<?php
/**
 * @version		3.0.0
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ; ?>

<div id="resourcesHome" class="resourcesModule ">
<?php if(count($items)): ?>
	<div class="row">
    <?php foreach ($items as $key=>$item):	?>
    	<?php if($params->get('itemAttachments') && count($item->attachments)): ?><?php foreach ($item->attachments as $attachment): ?><a title="<?php echo htmlspecialchars($attachment->title); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a><?php endforeach; ?>
    	<?php else: ?>
    	<a href="<?php echo $item->link; ?>">
    	<?php endif; ?>
		    <div class="col-xs-12 col-sm-4 resourceItem <?php if($item->featured):?>featuredResource<?php endif; ?>" <?php if($item->featured):?>data-mh="resourceItemTall"<?php else:?>data-mh="resourceItemShort"<?php endif;?>>
			    <div class="resourceInnerWrap">
				    <h3 data-mh="resourceTitle"><?php echo $item->title;?></h3>
				    <?php if($params->get('itemImage') && $item->image  && $item->featured): ?>
				    <div class="resourceImage">
				    	<img src="<?php echo $item->image->src; ?>" alt="<?php echo htmlspecialchars($item->image->alt); ?>" class="img-responsive"/>
			    	</div>
			    	<?php endif; ?>
					<span class="resourceDownloadIcon"></span>
			    </div>
		    </div>
    	</a>
    <?php endforeach; ?>
	</div>
<?php endif; ?>
<?php if($params->get('itemCustomLink')): ?>
<div class="text-center bannerButtons">
	<a class="btn btn-default btn-lg btn-dark" href="<?php echo $params->get('itemCustomLinkURL'); ?>"><?php echo $params->get('itemCustomLinkTitle'); ?></a>
</div>
<?php endif; ?>
<div class="row">
	<div class="col-xs-12 text-center scrollBlock">
		<a href="#testimonialBlock" class="scroll"><i class="icon-down-open-big"></i></a>
	</div>
</div>
</div>


