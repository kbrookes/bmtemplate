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

/*
Important note:
If you wish to use the live search option, it's important that you maintain the same class names for wrapping elements, e.g. the wrapping div and form.
*/
if($params->get('moduleclass_sfx')):
	$searchCss=$params->get('moduleclass_sfx');
	if(strpos($searchCss, 'search-expanding') !== FALSE):
		$searchType='expanding';
	else:
		$searchType='standard';
	endif;
endif;
?>

<?php if($searchType=='expanding'):?>
<div id="sb-search" class="k2SearchBlock <?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); if($params->get('liveSearch')) echo ' k2LiveSearchBlock'; ?>">
	<form action="<?php echo $search->action; ?>" method="get" autocomplete="off" class="k2SearchBlockForm" data-mh="formButton">
		<input class="sb-search-input searchInput" placeholder="Search brandmatters.com.au" type="text" value="" name="searchword" id="search">
		<input class="sb-search-submit" type="submit" value="">
		<span class="sb-icon-search"><i class="fa fa-search"></i></span>
	</form>
	<span class="sb-icon-close">X</span>
</div>
<?php else: ?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2SearchBlock <?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); if($params->get('liveSearch')) echo ' k2LiveSearchBlock'; ?>">
	<form action="<?php echo $search->action; ?>" method="get" autocomplete="off" class="k2SearchBlockForm" data-mh="formButton">

		<input class="searchInput" type="text" placeholder="<?php echo $search->text; ?>" name="searchword" maxlength="<?php echo $search->maxLength; ?>" size="<?php echo $search->width; ?>" alt="<?php echo $search->buttonText; ?>" />

		<?php if($search->button): ?>
			
		<?php if($search->imageButton): ?>
		<input type="image" value="<?php echo $search->buttonText; ?>" class="button" src="<?php echo JURI::base(true); ?>/components/com_k2/images/fugue/search.png" />
		<?php else: ?>
		<input type="submit" value="&#xf002;" class="button searchSubmit" />
		<?php endif; ?>
		
		<?php endif; ?>

		<input type="hidden" name="categories" value="<?php echo $search->filter; ?>" />
		
		<?php if($params->get('liveSearch')): ?>
		<input type="hidden" name="format" value="html" />
		<input type="hidden" name="t" value="" />
		<?php endif; ?>
	</form>

	<?php if($params->get('liveSearch')): ?>
	<div class="k2LiveSearchResults"></div>
	<script type="text/template" id="k2LiveSearchTemplate" data-site="<?php echo JURI::root(true); ?>">
		<ul class="liveSearchResults">
			<% _.each(items, function(item) { %>
				<li><a href="<%- item.link %>"><%= item.title %></a></li>
			<% }); %>
		</ul>
	</script>
	<?php endif; ?>
</div>
<?php endif; ?>