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
<span id="testimonialBlock" class="stupidAnchor"></span>
<div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
<?php if(count($items)): ?>
	<ol class="carousel-indicators">
	<?php foreach ($items as $key=>$item):	?>
	    <li data-target="#testimonialCarousel" data-slide-to="<?php echo $key; ?>" <?php if($key==0):?>class="active"<?php endif; ?>></li>
	<?php endforeach; ?>
	</ol>
<?php endif; ?>
<?php if(count($items)): ?>
	<div class="carousel-inner" role="listbox">
		<?php foreach ($items as $key=>$item):	?>
		<div class="item <?php if($key==0):?>active<?php endif; ?>">
			<div class="container">
				<div class="carousel-caption">
					<?php if(isset($item->extraFields->clientlogo->value)): ?><div class="clientLogo"><?php echo $item->extraFields->clientlogo->value; ?></div><?php endif; ?>
					<?php if($params->get('itemIntroText')): ?>
						<p><?php echo $item->introtext; ?></p>
					<?php endif; ?>
					<?php if($params->get('itemTitle')): ?>
					<p><small><?php echo $item->title; ?></small></p>
					<?php endif; ?>
            	</div>
          	</div>
        </div>
        <?php endforeach; ?>
	</div>
<?php endif; ?>
	<a class="left carousel-control" href="#testimonialCarousel" role="button" data-slide="prev">
		<span class="icon-left-open-big" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#testimonialCarousel" role="button" data-slide="next">
		<span class="icon-right-open-big" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	<?php if($params->get('itemCustomLink')): ?>
	<div class="testimonialButtons">
		<div class="text-center bannerButtons">
			<a class="btn btn-default btn-lg btn-grey-white matchWidth" href="<?php echo $params->get('itemCustomLinkURL'); ?>"><?php echo $params->get('itemCustomLinkTitle'); ?></a>
			<a class="btn btn-default btn-lg btn-grey-white matchWidth" href="<?php echo $params->get('itemCustomLinkURL'); ?>#clientBlock">Our clients <i class="fa fa-angle-double-right"></i></a>
		</div>
	</div>
	<?php endif; ?>
</div><!-- /.carousel -->






