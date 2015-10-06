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

<div id="blogModuleHome" class="blogItemsModule">
<?php if(count($items)): ?>
	<div class="row blogModuleContent">
    <?php foreach ($items as $key=>$item):	?>
	    <div class="col-xs-12 col-sm-6 blogPostItem" data-mh="blogPostItem">
		    <a title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo htmlspecialchars($item->title); ?>&quot;"  href="<?php echo $item->link; ?>" class="blogPostButton">
			    <div class="blogPostButton" >
				    <?php if($params->get('itemImage')  && ($item->image)): ?>
				    	<img src="<?php echo $item->image->src; ?>" class="blogItemImage" />
			    	<?php endif; ?>
			    	<div class="blogItemReadMore text-center">
						<button class="btn btn-default btn-lg btn-green" >
							Read more <i class="fa fa-angle-double-right"></i>
						</button>
					</div>
			    </div>
		    </a>
		    <h3><a title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo htmlspecialchars($item->title); ?>&quot;"  href="<?php echo $item->link; ?>" class="blogPostButton"><?php echo $item->title; ?></a></h3>
			<?php if($params->get('itemIntroText')): ?>
				<?php echo $item->introtext; ?>
			<?php endif; ?>
	    </div>
    <?php endforeach; ?>
	</div>
<?php endif; ?>
	<div class="row blogModuleButtons">
		<div class="col-xs-12 col-sm-6">
			<a class="btn btn-default btn-lg btn-dark pull-right" href="<?php echo $params->get('itemCustomLinkURL'); ?>"  data-mh="formButton"><?php echo $params->get('itemCustomLinkTitle'); ?></a>
		</div>
		<div class="col-xs-12 col-sm-6">
			<?php 
				$doc      = JFactory::getDocument();
				$renderer = $doc->loadRenderer( 'modules' );
				$raw      = array( 'style' => 'raw' );
				echo $renderer->render('blogSearch', $raw, null);
				?>
		</div>
	</div>
</div>
