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
<div class="testimonialItem mix col-xs-12 col-sm-6 col-md-6 col-lg-4">
	<div class="testimonialItemWrap">
		<span class="quote"><i class="icon-quotes"></i></span>
		<blockquote>
			<?php echo $this->item->introtext; ?>
			<footer>
				<cite><?php if($this->item->extraFields->testimonialcite->value != ''): echo $this->item->extraFields->testimonialcite->value; endif; ?></cite>
			</footer>
		</blockquote>
	</div>
</div>
<!-- End K2 Item Layout -->
