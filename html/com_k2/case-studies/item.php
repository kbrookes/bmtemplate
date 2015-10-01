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
$doc = JFactory::getDocument();
if($this->item->extraFields->titletag->value != ''):
	$doc->setTitle($this->item->extraFields->titletag->value);
endif; 
if($this->item->extraFields->metadescription->value != ''):
	$doc->setMetaData('description', $this->item->extraFields->metadescription->value);
endif;
$sharingLink=rawurlencode('http://'.$_SERVER['SERVER_NAME'].$this->item->link);
$shareLinkFB="https://www.facebook.com/sharer/sharer.php?u=";
$shareLinkTwitter="https://twitter.com/intent/tweet";
$shareLinkGoogle="https://plus.google.com/share";
$shareLinkLinkedIn="http://www.linkedin.com/shareArticle?mini=true";
$summaryStripped=strip_tags($this->item->introtext);
$summaryText=rawurlencode($summaryStripped);

$sharerFB=$shareLinkFB.$sharingLink;
$sharerTwit=$shareLinkTwitter.'?text='.$this->item->title.'&url='.$sharingLink;
$sharerGoogle=$shareLinkGoogle.'?url='.$sharingLink;
$sharerLinkedIn=$shareLinkLinkedIn.'&url='.$sharingLink.'&title='.$this->item->title.'&summary='.$summaryText;
?>



<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>
<div id="workWrap" class="animisition">
	<span id="returnTop" class="returnToCaseStudies animsition-link"><a href="/index.php/work/"><i class="icon-close"></i></a></span>
	<div class="container">
		
		<div id="caseStudyView" class="caseStudyItemView col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-offset-2 <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
				
			
				<?php if($this->item->params->get('itemTitle')): ?>
					<h2 class="itemTitle"><?php echo $this->item->title; ?></h2>
				<?php endif; ?>
			
				<div class="itemHeader">
				<?php if($this->item->params->get('itemDateCreated')): ?>
					<span class="itemDateCreated">
						<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
					</span>
				<?php endif; ?>
				</div>
			
				<div class="itemBody">
			
			
				  <?php if(!empty($this->item->fulltext)): ?>
				  <?php if($this->item->params->get('itemIntroText')): ?>
				  <!-- Item introtext -->
				  <div class="itemIntroText">
				  	<?php echo $this->item->introtext; ?>
				  </div>
				  <?php endif; ?>
				  <?php if($this->item->params->get('itemFullText')): ?>
				  <!-- Item fulltext -->
				  <div class="itemFullText">
				  	<?php echo $this->item->fulltext; ?>
				  </div>
				  <?php endif; ?>
				  <?php else: ?>
				  <!-- Item text -->
				  <div class="itemFullText">
				  	<?php echo $this->item->introtext; ?>
				  </div>
				  <?php endif; ?>
			
					
			
				  
			  </div>
		
		
		
			
		
			
			<?php if($this->params->get('itemNavigation') && !$this->print && ($this->item->next || $this->item->previous)): ?>
				<nav class="itemNavigation bannerButtons text-center clearfix">
				<?php if($this->item->previous): ?>
					<a class="btn btn-default btn-dark btn-hover-green matchWidth pull-left" href="<?php echo $this->item->previous->link; ?>">
						<i class="fa fa-angle-double-left"></i> <span class="visible-xs">Prev</span><span class="hidden-xs">Previous</span>
					</a>
				<?php endif; ?>
					
								
				<?php if($this->item->next): ?>
					<a class="btn btn-default btn-dark btn-hover-green matchWidth pull-right" href="<?php echo $this->item->next->link; ?>">
						Next <i class="fa fa-angle-double-right"></i>
					</a>
				<?php endif; ?>
		
				</nav>
			<?php endif; ?>	
			
			<div class="servicesUsedBlock">
				<div class="row">
					<div class="col-xs-12">
						<h5>BrandMatters services used:</h5>
						<div class="row">
							<div class="col-xs-12 col-sm-4 serviceCol">
								<h4>Consult</h4>
								<?php if($this->item->extraFields->servicesconsult->value != ''):
									echo $this->item->extraFields->servicesconsult->value;
								endif; ?>
							</div>
							<div class="col-xs-12 col-sm-4 serviceCol">
								<h4>Create</h4>
								<?php if($this->item->extraFields->servicescreate->value != ''):
									echo $this->item->extraFields->servicescreate->value;
								endif; ?>
							</div>
							<div class="col-xs-12 col-sm-4 serviceCol">
								<h4>Create</h4>
								<?php if($this->item->extraFields->servicesexpress->value != ''):
									echo $this->item->extraFields->servicesexpress->value;
								endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="socialToolbar row">
				<div class="sharingCode col-xs-12 col-sm-8 col-md-9 col-lg-10">
					<span class="share">Share</span>
					<span class="socialIcons">
						<a href="#" onClick="window.open('<?php echo $sharerLinkedIn;?>','<?php echo $this->item->title;?>','resizable,height=600,width=600'); return false;"><span class="socialShare share-gp"><i class="icon-linkedin"></i></span></a>
						
		                <a href="#" onClick="window.open('<?php echo $sharerTwit;?>','<?php echo $this->item->title;?>','resizable,height=360,width=570'); return false;"><span class="socialShare share-tw"><i class="icon-twitter"></i></span></a>
		                <a href="#" onClick="window.open('<?php echo $sharerFB;?>','<?php echo $this->item->title;?>','resizable,height=360,width=570'); return false;"><span class="socialShare share-fb"><i class="icon-facebook"></i></span></a> 
		                
		                <span class="email">
							<a class="itemEmailLink" rel="nofollow" href="<?php echo $this->item->emailLink; ?>" onclick="window.open(this.href,'emailWindow','width=400,height=350,location=no,menubar=no,resizable=no,scrollbars=no'); return false;">
								<span class="socialShare share-email">
									<i class="icon-email"></i>
								</span>
						</a>
						</span>
					</span>
				</div>
				<div class="closePage col-xs-12 col-sm-2 col-md-3 col-lg-2">
					<span id="returnBottom" class="pull-right"><a href="/index.php/work/" class="animsition-link"><i class="icon-close"></i></a></span>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- End K2 Item Layout -->
<?php
$doc = JFactory::getDocument();
$app = JFactory::getApplication();

$tplUrl = JURI::root() . 'templates/' . JFactory::getApplication()->getTemplate();?>
<script src="<?php echo $tplUrl; ?>/js/animsition.min.js" type="text/javascript"></script>

<script>
</script>

