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
	    <div class="col-xs-12 col-sm-4 caseStudyItem">
		    <?php if(($isFrontPage) && ($ualayout != "mobile")):?>
		    <a title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo htmlspecialchars($item->title); ?>&quot;" type="button" data-toggle="collapse" data-target="#caseStudyContent-<?php echo $key;?>" aria-expanded="false" aria-controls="caseStudyContent" data-parent="#caseStudiesHome" class="caseStudyButton">
		    <?php else: ?>
		    <a href="<?php echo $item->link; ?>">
		    <?php endif; ?>
			    <div class="caseStudyButton">
			    <?php if($params->get('itemImage') && $item->image): ?>
			    	<img src="<?php echo $item->image->src; ?>" alt="<?php echo htmlspecialchars($item->image->alt); ?>" class="img-responsive"/>
		    	<?php endif; ?>
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
		    <div class="caseStudyContent collapse" id="caseStudyContent-<?php echo $key;?>">
			    <div class="row">
				    <div class="col-xs-12 col-sm-8 col-md-6 pull-right caseStudyImage">
					    <?php if(isset($item->extraFields->secondaryimage->value)):
						    echo $item->extraFields->secondaryimage->value;
						    endif; ?>
						<a class="closeCaseStudy"><i class="icon-close"></i></a>
				    </div>
				    <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2 push-left caseStudyContentCol">
					    <h3><?php echo $item->title; ?></h3>
					    <?php if($params->get('itemIntroText')): ?>
							<?php echo $item->introtext; ?>
						<?php endif; ?>
						<?php if(($params->get('itemReadMore') && $item->fulltext) || ($params->get('itemCategory'))): ?>
							<div class="bannerButtons text-center">
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
