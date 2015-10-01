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
$session = JFactory::getSession();
$ualayout = $session->get('ualayout');
$app = JFactory::getApplication();
$menu = $app->getMenu();
$isFrontPage='';
if ($menu->getActive() == $menu->getDefault()) {
	$isFrontPage='yes';
} else {
	$isFrontPage=null;
}
?>
<span id="featuredCaseStudies" class="stupidAnchor"></span>
<div id="caseStudiesHome" class="caseStudiesModule ">
<?php if(count($items)): ?>
	<div class="row no-gutters">
    <?php foreach ($items as $key=>$item):	?>
	    <div class="col-xs-12 col-sm-4 caseStudyItem" style="background-image: url(<?php echo $item->image->src; ?>);">
		    <?php if(($isFrontPage) && ($ualayout != "mobile")):?>
		    <a title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo htmlspecialchars($item->title); ?>&quot;" type="button" data-toggle="collapse" data-target="#caseStudyContent-<?php echo $key;?>" aria-expanded="false" aria-controls="caseStudyContent" data-parent="#caseStudiesHome" class="caseStudyButton collapsed button<?php echo $key; ?>">
		    <?php else: ?>
		    <a href="<?php echo $item->link; ?>">
		    <?php endif; ?>
			    <div class="caseStudyButtonInner">
			    <?php if($item->extraFields->casestudiesclientlogo->value != ''): 
				    echo $item->extraFields->casestudiesclientlogo->value;
			    endif; ?>
			    </div>
		    </a>
	    </div>
    <?php endforeach; ?>
	</div>
<?php endif; ?>
<?php if($isFrontPage):?>
	<?php if(($ualayout == "desktop") || ($ualayout == "tablet")){?>
		<?php if(count($items)): ?>
		    <?php foreach ($items as $key=>$item):	?>
		    <div class="caseStudyContent collapse" id="caseStudyContent-<?php echo $key;?>" <?php if(isset($item->extraFields->teaserheroimage->value)):?>style="background-image: url(<?php echo $item->extraFields->teaserheroimage->value; ?>)"<?php endif; ?>>
			    <a class="closeCaseStudy"><i class="icon-close"></i></a>
			    <div class="row">
				    <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-6 col-md-offset-1 col-lg-5 col-lg-offset-1 caseStudyContentCol">
					    <?php if($params->get('itemIntroText')): ?>
							<?php echo $item->introtext; ?>
						<?php endif; ?>
						<?php if(($params->get('itemReadMore') && $item->fulltext) || ($params->get('itemCategory'))): ?>
							<div class="bannerButtons verticalButtons">
								<?php if($params->get('itemReadMore') && $item->fulltext): ?>
									<a href="<?php echo $item->link; ?>" class="btn btn-default btn-lg btn-dark matchWidth">Read more <i class="fa fa-angle-double-right"></i></a>
								<?php endif; ?>
								<?php if($params->get('itemCategory')): ?>
									<a class="btn btn-default btn-lg btn-dark matchWidth" href="/work">More <?php echo $item->category->title; ?> <i class="fa fa-angle-double-right"></i></a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
				    </div>
				    
			    </div>
		    </div>
		    <?php endforeach; ?>
		<?php endif; ?>
	<?php } ?>
	</div>
	<script>
	(function( $ ){
		$('.caseStudyButton').on('click',function(){$('.collapse.in').collapse('hide');})
		$('.closeCaseStudy').on('click',function(){$('.collapse.in').collapse('hide');})
	})( jQuery );
	</script>
<?php endif; ?>
</div>
