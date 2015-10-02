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
<span id="team" class="stupidAnchor"></span>
<div id="teamModuleHome" class="teamItemsModule">
	<div class="container">
	<?php if(count($items)): ?>
		<div class="row">
	    <?php foreach ($items as $key=>$item):	?>
		    <div class="col-xs-12 col-sm-4 teamPostItem" data-mh="teamPostItem">
			    <a tabindex="<?php echo $key;?>"  class="teamPostButton" id="teamMember<?php echo $key; ?>"  data-toggle="modal" data-backdrop="false" data-escape="true" data-keyboard="true" data-target="#teamModal<?php echo $key; ?>">
				    <div class="teamPostButton">
				    <?php if($params->get('itemImage') && $item->image): ?>
				    	<img src="<?php echo $item->image->src; ?>" alt="<?php echo htmlspecialchars($item->image->alt); ?>" id="teamPic<?php echo $key; ?>" class="img-responsive"/>
			    	<?php endif; ?>
				    </div>
			    </a>
			    <script>
				(function( $ ){
					$('#teamMember<?php echo $key; ?>').click(function(){
						$('#teamPic<?php echo $key; ?>').attr('src', '<?php echo $item->extraFields->headshoton->value; ?>');
	    			});
				})( jQuery );
				</script>
			    <div class="teamMemberTitles">
				    <h3><?php echo $item->title; ?></h3>
				    <h4><?php echo $item->extraFields->title->value; ?></h4>
					<?php if(($item->extraFields->linkedinurl->value != '')):?>
						<a href="<?php echo $item->extraFields->linkedinurl->value; ?>" target="_blank" class="linkedInIcon"><i class="fa fa-linkedin"></i></a>
					<?php endif; ?>
			    </div>
		    </div>
	    <?php endforeach; ?>
		</div>
	<?php endif; ?>
	</div>
</div>
<?php if(count($items)): ?>
<?php foreach ($items as $key=>$item):	?>
	 <?php if($params->get('itemIntroText')): ?>
		<div class="modal fade teamModalBox" tabindex="<?php echo $key; ?>" role="dialog" aria-labelledby="teamModal<?php echo $key; ?>" id="teamModal<?php echo $key; ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icon-close"></i></span></button>
						<h3><?php echo $item->title; ?></h3>
					    <h4><?php echo $item->extraFields->title->value; ?></h4>
						
					</div>
					<div class="modal-body">
						<?php echo $item->introtext; ?>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<script>
(function( $ ){
/**
 * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
 */

    function reposition() {
        var modal = $(this),
            dialog = modal.find('.modal-dialog');
			modal.css('display', 'block');
        
        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
    }
	    // Reposition when a modal is shown
	    $('.modal').on('show.bs.modal', reposition);
	    // Reposition when the window is resized
	    $(window).on('resize', function() {
	        $('.modal:visible').each(reposition);
	    });
    
    <?php if(count($items)): ?>
		<?php foreach ($items as $key=>$item):	?>
		$('#teamModal<?php echo $key; ?>').on('hidden.bs.modal', function (e) {
		  $('#teamPic<?php echo $key; ?>').attr('src', '<?php echo $item->image->src; ?>');
		})
		<?php endforeach; ?>
	<?php endif; ?>
})( jQuery );
</script>

