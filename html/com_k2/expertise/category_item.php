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
$isFirstItem=0;
if($this->item->title=='Stakeholder engagement' || $this->item->title=='Brand positioning & strategy' || $this->item->title=='Graphic design'):
	$isFirstItem=1;
	else:
	$isFirstItem=0;
endif;
?>

<!-- Start K2 Item Layout -->
<div class="panel panel-default expertiseCatItem">
    <div class="panel-heading" role="tab" id="heading<?php echo $this->item->id; ?>">
	    <a role="button" data-toggle="collapse" data-parent="#accordion<?php echo $this->item->category->title; ?>" href="#collapse<?php echo $this->item->id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $this->item->id; ?>">
			<h4 class="panel-title"><?php echo $this->item->title; ?> <span class="pull-right"><i class="indicator fa fa-plus-circle"></i></span></h4>
        </a>
    </div>
	<div id="collapse<?php echo $this->item->id; ?>" class="panel-collapse collapse<?php if($isFirstItem):?> in<?php endif; ?> " role="tabpanel" aria-labelledby="heading<?php echo $this->item->id; ?>">
		<div class="panel-body">
		<?php if($this->item->params->get('catItemIntroText')): ?>
		  	<?php echo $this->item->introtext; ?>
		<?php endif; ?>
		<?php if($this->item->extraFields->blogcategorieslink->value != ''): echo $this->item->extraFields->blogcategorieslink->value; endif; ?>
		</div>
    </div>
</div>
<!-- End K2 Item Layout -->
