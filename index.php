<?php
/**
 * @package     Joostrap.Template
 * @subpackage  Joostrap v3.1.6
 *
 * @copyright   Copyright (C) 2005 - 2014 Joostrap. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
require_once __DIR__ . '/functions/tpl-init.php';
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="<?php echo $htmlLang; ?>" >
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php echo $htmlLang; ?>" >
<!--<![endif]-->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if ($loadJquery == 1) : ?>
			<script src="<?php echo getDebugAssetUrl($tplUrl . '/js/jquery.min.js'); ?>" type="text/javascript"></script>
			<script src="<?php echo getDebugAssetUrl($tplUrl . '/js/jquery-noconflict.js'); ?>" type="text/javascript"></script>
			<script src="<?php echo getDebugAssetUrl($tplUrl . '/js/jquery-migrate.min.js'); ?>" type="text/javascript"></script>
		<?php elseif ($loadJquery == 2) : ?>
			<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<?php endif; ?>
		<?php if ($loadBootstrap == 1) : ?>
			<script src="<?php echo getDebugAssetUrl($tplUrl . '/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
		<?php elseif ($loadBootstrap == 2) : ?>
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<?php endif; ?>
		<!--[if lt IE 9]>
		<script src="<?php echo $tplUrl; ?>/js/html5shiv.js" type="text/javascript"></script>
		<script src="<?php echo $tplUrl; ?>/js/respond.min.js" type="text/javascript"></script>
	    <![endif]-->
		<script src="<?php echo $tplUrl; ?>/js/modernizr.custom.js" type="text/javascript"></script>
		<script src="<?php echo $tplUrl; ?>/js/template.js" type="text/javascript"></script>
		<script src="<?php echo $tplUrl; ?>/js/j-backbone.js" type="text/javascript"></script>
		<!-- Place apple-touch-icon(s) in the site root directory -->
		<?php if ($loadBootstrap == 1) : ?>
			<link rel="stylesheet" href="<?php echo getDebugAssetUrl($tplUrl . '/css/bootstrap.min.css'); ?>">
		<?php elseif ($loadBootstrap == 2) : ?>
			<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<?php endif; ?>
		<?php if ($this->params->get('fontawesomecss')) : ?>
			<link rel="stylesheet" href="<?php echo getDebugAssetUrl($tplUrl . '/css/font-awesome.min.css'); ?>">
		<?php endif; ?>
		<link rel="stylesheet" href="<?php echo getDebugAssetUrl($tplUrl . '/css/animate.css'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo getDebugAssetUrl($tplUrl . '/css/template.css'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo getDebugAssetUrl($tplUrl . '/css/j-backbone.css'); ?>" type="text/css" media="screen" />
		
		<jdoc:include type="head" />

		
		<link rel="stylesheet" href="<?php echo $tplUrl; ?>/css/custom.css" type="text/css" media="screen" />
		

		<link rel="stylesheet" href="<?php echo getDebugAssetUrl($tplUrl . '/css/jquery.mmenu.all.css'); ?>">
		<script src="<?php echo $tplUrl; ?>/js/jquery.mmenu.min.all.js" type="text/javascript"></script>
		<?php if (null !== $customColorsCss) : ?>
			<style type="text/css" charset="utf-8">
				<?php echo $customColorsCss; ?>
			</style>
		<?php endif; ?>
		<?php if (@filesize('templates/' . $this->template . '/js/analytics-head.js') > 5): ?>
			   <?php include_once('templates/' . $this->template . '/js/analytics-head.js'); ?>
		<?php endif; ?>

		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic' rel='stylesheet' type='text/css'>
		
	</head>
    <body class="<?php echo $bodyclass. " " .$pageclass. " parentid-" .$parentId. " " .$parentName. " " .$option. " view-" .$view. " " .$frontpage. " itemid-" .$itemid. " " .$loggedin. " " .$rtl_detection; ?>">	
	    <div class="body-wrapper" id="page">
		<header id="header">
			<div class="container">
				<div class="logo pull-left">
					<?php echo $logo; ?>
				</div>
				<?php if ($this->countModules('navSearch')): ?>
					<div id="navSearch" class="pull-right">
							<jdoc:include type="modules" name="navSearch" style="standard" />
					</div>
				<?php endif; ?>
				<?php if ($this->countModules('menu')): ?>
					<nav id="menu" class="wasclearfix hidden-xs">
						<div class="container">
							<div class="navbar-collapse collapse">
								<jdoc:include type="modules" name="menu" style="basic" />
								<div class="social hidden-sm">
									<jdoc:include type="modules" name="social" style="basic" />
								</div>
							</div>
							
						</div>

					</nav>
				<?php endif; ?>
				
				<a href="#sidebar">
					<div type="button" class="navbar-toggle navbar-btn pull-right visible-xs">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</div>
				</a>
				
			</div>
		</header>
	<?php if ($this->countModules('slideshow')): ?>
		<div id="slider">
				<jdoc:include type="modules" name="slideshow" style="standard" />
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('header')): ?>
		<div id="topHeader" class="clearfix">
				<jdoc:include type="modules" name="header" style="standard" />
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('breadcrumbs')): ?>
		<div id="breadcrumbs">
			<div class="container">
				<jdoc:include type="modules" name="breadcrumbs" style="standard" />
			</div>
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('top')): ?>
		<div id="top" class="clearfix">
				<jdoc:include type="modules" name="top" style="standard" />
		</div>
	<?php endif; ?>
		<!-- Mainbody -->
		<div id="mainbody" class="clearfix">
			<div class="container">
				<div class="row">
				<?php if ($this->countModules('left')): ?>
					<div class="sidebar-left col-md-<?php echo $left; ?>">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="left" style="standard" />
						</div>
					</div>
				<?php endif; ?>
					<!-- Content Block -->
					<div id="content" class="col-md-<?php echo $span;?>">
						<div id="message-component">
							<jdoc:include type="message" />
						</div>
					<?php if ($this->countModules('above-content')): ?>
						<div id="above-content">
							<jdoc:include type="modules" name="above-content" style="standard" />
						</div>
					<?php endif; ?>
					<?php
						$app = JFactory::getApplication();
						$menu = $app->getMenu();

							if ($frontpageshow){
							// show on all pages
							?>
							<div id="content-area">
								<jdoc:include type="component" />
							</div>
							<?php
								}
								else {
								  if ($menu->getActive() !== $menu->getDefault()) {
								  // show on all pages but the default page
									?>
									<div id="content-area">
										<jdoc:include type="component" />
									</div>
							<?php
								    }
								}
							?>
					<?php if ($this->countModules('below-content')): ?>
						<div id="below-content">
							<jdoc:include type="modules" name="below-content" style="standard" />
						</div>
					<?php endif; ?>
					</div>
					<?php if ($this->countModules('right')) : ?>
					<aside class="sidebar-right col-md-<?php echo $right; ?>">
						<jdoc:include type="modules" name="right" style="standard" />
					</aside>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php if ($this->countModules('testimonials')): ?>
		<div id="testimonials" class="clearfix">
			<jdoc:include type="modules" name="testimonials" style="standard" />
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('blogmodule')): ?>
		<div id="blogModule" class="clearfix">
			<div class="container">
				<jdoc:include type="modules" name="blogmodule" style="standard" />
			</div>
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('aboutModules')): ?>
		<div id="aboutModules" class="clearfix">
			<jdoc:include type="modules" name="aboutModules" style="standard" />
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('bottom')): ?>
		<div id="bottom1" class="clearfix">
			<div class="container">
				<jdoc:include type="modules" name="bottom" style="standard" />
			</div>
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('footer')): ?>
		<div id="bottom2" class="clearfix">
			<div class="container">
				<jdoc:include type="modules" name="footer" style="standard" />
			</div>
		</div>
	<?php endif; ?>
		<footer id="footer" class="clearfix">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-4">
						<jdoc:include type="modules" name="terms" style="standard" />
					</div>
				</div>
			</div>
			<?php if ($totop) : ?>
					<a href="#" class="go-top">Back to Top <i class="fa fa-arrow-circle-up"></i></a>
					<?php endif; ?>
		</footer>
<div id="sidebar">
					<div id="panel-overview">
					<div style="text-align: center;"><a href="<?php echo $this->baseurl ?>/" class="<?php echo $icon1; ?>"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#page" class="<?php echo $icon6; ?>"></a></div>
					<?php if ($this->countModules('mob-menu-above')): ?>
					<div class="mob-menu-above">
							<jdoc:include type="modules" name="mob-menu-above" style="standard" />
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('menu')): ?>
		         <jdoc:include type="modules" name="menu" style="none" />
		      <?php endif; ?>
		      <?php if ($this->countModules('mob-menu-below')): ?>
		      <div class="mob-menu-below">
						<jdoc:include type="modules" name="mob-menu-below" style="standard" />
					</div>
		      <?php endif; ?>
					</div>
				</div>
			</div>
		<script type="text/javascript">
			jQuery( document ).ready(function() {
				jQuery('.tooltip').tooltip({
				    html: true
				});
			});
	    </script>
	    <script type="text/javascript">
	    	jQuery(function() {
				jQuery('div#sidebar').mmenu({
					classes		: 'mm-light',
					position	: '<?php echo $menuslide; ?>',
					header		: true
				});
			});
	    </script>
	    <script src="<?php echo $tplUrl; ?>/js/jquery.matchHeight-min.js" type="text/javascript"></script>
	    <script src="<?php echo $tplUrl; ?>/js/classie.js"></script>
	    <script src="<?php echo $tplUrl; ?>/js/uisearch.js"></script>
	    <script type="text/javascript">
		    new UISearch( document.getElementById( 'sb-search' ) );
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top - 0}, 500);
				});
			});
	    </script>
		<?php if (@filesize('templates/' . $this->template . '/js/analytics-bottom.js') > 5): ?>
			<script src="<?php echo $tplUrl; ?>/js/analytics-bottom.js" type="text/javascript"></script>
		<?php endif; ?>
    </body>
</html>