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

<div id="blogView" class="blogItemView row <?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-offset-2">
		<div class="imageHeader">
	<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
		<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" class="img-responsive" />
	
	<?php endif; ?>	
	</div>
	
		<div class="socialToolbar row">
			<div class="commentAnchor hidden-xs col-sm-4 col-md-3 col-lg-2">
				<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
					Comment
				</a>
			</div>
			<div class="sharingCode col-xs-12 col-sm-8 col-md-9 col-lg-10">
				<span class="share">Share</span>
				<span class="socialIcons">
					<span class="email">
						<a class="itemEmailLink" rel="nofollow" href="<?php echo $this->item->emailLink; ?>" onclick="window.open(this.href,'emailWindow','width=400,height=350,location=no,menubar=no,resizable=no,scrollbars=no'); return false;">
						<i class="icon-email"></i>
					</a>
					</span>
					<a href="#" onClick="window.open('<?php echo $sharerFB;?>','<?php echo $this->item->title;?>','resizable,height=360,width=570'); return false;"><span class="socialShare share-fb"><i class="icon-facebook"></i></span></a> 
	                <a href="#" onClick="window.open('<?php echo $sharerTwit;?>','<?php echo $this->item->title;?>','resizable,height=360,width=570'); return false;"><span class="socialShare share-tw"><i class="icon-twitter"></i></span></a>
	                <a href="#" onClick="window.open('<?php echo $sharerLinkedIn;?>','<?php echo $this->item->title;?>','resizable,height=600,width=600'); return false;"><span class="socialShare share-gp"><i class="icon-linkedin"></i></span></a>
				</span>
			</div>
		</div>
	
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



	  <?php if($this->params->get('itemComments') && $this->params->get('comments')): ?>
  <!-- K2 Plugins: K2CommentsBlock -->
  <?php echo $this->item->events->K2CommentsBlock; ?>
  <?php endif; ?>
  
  <?php if($this->params->get('itemComments') && $this->params->get('comments') && empty($this->item->events->K2CommentsBlock)): ?>
  <a name="itemCommentsAnchor" id="itemCommentsAnchor"></a>

  <div data-widget="k2comments" data-itemid="<?php echo $this->item->id; ?>"></div>
  
	<script type="text/template" id="k2CommentsTemplate">
		<div class="item__comments">
	
			<!-- Item comments -->
			<% if(comments.length) { %>
			<h3 class="item__comments__counter" itemprop="commentCount">
			<span><%= pagination.total %></span> 
			<% if(pagination.total > 1) { %>
			<?php echo JText::_('K2_COMMENTS'); ?>
			<% } else { %>
			<?php echo JText::_('K2_COMMENT'); ?>
			<% } %>
			</h3>
			
			<ul class="item__comments__list">
				<% _(comments).each(function(comment) { %>
				<li class="<% if(comment.isAuthorResponse) print('authorResponse'); if(comment.state == 0) print(' unpublishedComment'); %> item__comment" itemprop="comment">
		
			    	<span class="item__comment__link">
				    	<a href="<?php echo $this->item->link; ?>#comment<%- comment.id %>" name="comment<%- comment.id %>" id="comment<%- comment.id %>">
				    		<?php echo JText::_('K2_COMMENT_LINK'); ?>
				    	</a>
				    </span>
		
					<% if(comment.user.image) { %>
					<img data-image-url="<%= comment.user.image.src %>" alt="<%- comment.user.name %>" width="<?php echo $this->params->get('commenterImgWidth'); ?>" />
					<% } %>
		
					<span class="item__comment__date"><%- comment.date %></span>
		
				    <span class="item__comment__author">
					    <?php echo JText::_('K2_POSTED_BY'); ?>
					   <% if(comment.user.link) { %>
					    <a data-user-link="<%= comment.user.link %>" title="<%- comment.user.name %>" target="_blank" rel="nofollow">
					    	<%= comment.user.name %>
					    </a>
					    <% } else { %>
					    <%= comment.user.name %>
					    <% } %>
				    </span>
		
				    <p><%= comment.text %></p>
				    
				    <% if(comment.canEdit || comment.canReport) { %>
					<span class="item__comment__toolbar">
						
						<% if(comment.canEdit) { %>
							
						<% if(comment.state < 1) { %>
						<button data-action="publish" data-id="<%- comment.id %>" class="commentApproveLink"><?php echo JText::_('K2_APPROVE')?></button>
						<% } %>
		
						<button data-action="delete" data-id="<%- comment.id %>" class="commentRemoveLink"><?php echo JText::_('K2_REMOVE')?></button>
		
						<% } %>
						
						<% if(comment.state == 1 && comment.canReport) { %>
						<button data-action="report" data-id="<%- comment.id %>"><?php echo JText::_('K2_REPORT')?></button>
						<% } %>
						
						<% if(comment.canReportUser) { %>
						<button data-action="report.user" data-id="<%- comment.userId %>" class="k2ReportUserButton"><?php echo JText::_('K2_FLAG_AS_SPAMMER'); ?></button>
						<% } %>
		
					</span>
					<% } %>
				    
		
					<div class="clr"></div>
			    </li>					
				<% }); %>
			</ul>
			
			<% if(pagination.total > pagination.limit) { %>
			<div class="item__comments__pagination" data-role="pagination">
				<ul>
					<li><a data-page="1" href="#" class="item__comments_pstart"><?php echo JText::_('K2_START'); ?></a></li>
					<% if((pagination.pagesCurrent - 1) > 0) { %>
					<li><a data-page="previous" href="#" class="item__comments__pprevious"><?php echo JText::_('K2_PREVIOUS'); ?></a></li>
					<% } %>
					<% for(i = pagination.pagesStart; i <= pagination.pagesStop; i++) { %>
					<li <% if(pagination.pagesCurrent == i) { %> class="active" <% } %>><a data-page="<%= i %>" href="#"><%= i %></a></li>
					<% } %>
					<% if((pagination.pagesCurrent + 1) <= pagination.pagesTotal) { %>
					<li><a data-page="next" href="#" class="item__comments__pnext"><?php echo JText::_('K2_NEXT'); ?></a></li>
					<% } %>
					<li><a data-page="<%= pagination.pagesTotal %>" href="#" class="item__comments__pend"><?php echo JText::_('K2_END'); ?></a></li>
				</ul>
				<div class="clr"></div>
			</div>
			<% } %>

			<% } %>
			

			<!-- Item comments form -->
			<div class="item__comments__form">
				<h3><?php echo JText::_('K2_LEAVE_A_COMMENT') ?></h3>

				<?php if($this->params->get('commentsFormNotes')): ?>
				<p class="item__comments__formnotes">
					<?php if($this->params->get('commentsFormNotesText')): ?>
					<?php echo nl2br($this->params->get('commentsFormNotesText')); ?>
					<?php else: ?>
						Your email address will not be published. All fields are required.
					<?php endif; ?>
				</p>
				<?php endif; ?>
				
				<form action="<?php echo JRoute::_('index.php'); ?>" method="post" data-form="comments" class="form">
					
					
					
					
					<?php if($this->user->guest): ?>
					<input type="text" name="name" id="k2CommentName" placeholder="Name" class="form-control" />
					<?php else : ?>
					<input type="text" name="name" id="k2CommentName" value="<?php echo htmlspecialchars($this->user->name); ?>" readonly="readonly" />
					<?php endif; ?>
					
					
					<?php if($this->user->guest): ?>
					<input type="email" name="email" id="k2CommentEmail" placeholder="Email" class="form-control" />
					<?php else : ?>
					<input type="email" name="email" id="k2CommentEmail" value="<?php echo htmlspecialchars($this->user->email); ?>" readonly="readonly" />
					<?php endif; ?>
					
					<textarea rows="10" cols="20" placeholder="Commet" name="text" id="k2CommentText" class="form-control"></textarea>
					
					<?php echo K2HelperCaptcha::display(); ?>
					
					<button type="submit" data-action="create" class="btn btn-default btn-green"><?php echo JText::_('K2_SUBMIT_COMMENT'); ?></button>
					
					<input type="hidden" name="itemId" value="<?php echo $this->item->id; ?>" />
					
					<span data-role="log"></span>
					
				</form>
			</div>

	

		</div>
		

		<form action="<?php echo JRoute::_('index.php'); ?>" method="post" data-form="report">
			<label for="reportName"><?php echo JText::_('K2_YOUR_NAME'); ?></label>
			<input type="text" id="reportName" name="reportName" value="" />

			<label for="reportReason"><?php echo JText::_('K2_REPORT_REASON'); ?></label>
			<textarea name="reportReason" id="reportReason" cols="60" rows="10"></textarea>

			<?php if($this->params->get('recaptcha') && $this->user->guest): ?>
			<label class="formRecaptcha"><?php echo JText::_('K2_PLEASE_VERIFY_THAT_YOU_ARE_HUMAN'); ?></label>
			<div id="recaptcha"></div>
			<?php endif; ?>
			
			<?php echo K2HelperCaptcha::display(); ?>
			
			<button data-action="report.send"><?php echo JText::_('K2_SEND_REPORT'); ?></button>
			<span data-role="log"></span>
			<input type="hidden" name="id" value="" />
			<input type="hidden" name="task" value="comments.report" />
			<input type="hidden" name="format" value="json" />
			<?php echo JHTML::_('form.token'); ?>
		</form>
  	
  </script>
  <?php endif; ?>	

	
	<?php if($this->params->get('itemNavigation') && !$this->print && ($this->item->next || $this->item->previous)): ?>
		<nav class="itemNavigation text-center">
		<?php if($this->item->previous): ?>
			<a class="btn btn-default btn-dark btn-hover-green pull-left" href="<?php echo $this->item->previous->link; ?>">
				<i class="fa fa-angle-double-left"></i> <span class="visible-xs">Prev</span><span class="hidden-xs">Previous</span>
			</a>
			<?php endif; ?>
			
			<a class="btn btn-default btn-dark btn-hover-green" href="/blog">
				<i class="fa fa-angle-double-left"></i> Blog home
			</a>
			
			<?php if($this->item->next): ?>
			<a class="btn btn-default btn-dark btn-hover-green pull-right" href="<?php echo $this->item->next->link; ?>">
				Next <i class="fa fa-angle-double-right"></i>
			</a>
		<?php endif; ?>

		</nav>
	<?php endif; ?>	
	
</div>
<!-- End K2 Item Layout -->
