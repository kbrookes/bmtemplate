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

?>

<!-- Start K2 Item Layout -->
<a title="<?php $this->item->title; ?>" class="caseStudyButton animsition-link">
<div class="caseStudiesItem mix col-xs-12 col-sm-4">
	    <div class="caseStudyButton">
	    <?php if($this->item->params->get('catItemImage') && $this->item->image): ?>
	    	<img src="<?php echo $this->item->image->src; ?>" alt="<?php echo htmlspecialchars($this->item->image->alt); ?>" class="img-responsive"/>
    	<?php endif; ?>
	    </div>
</div>
</a>
<!-- End K2 Item Layout -->
