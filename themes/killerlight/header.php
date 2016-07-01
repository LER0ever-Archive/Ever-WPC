<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,print" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/print.css" type="text/css" media="print" />
	<!--<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/xfade/xfade_o.css" type="text/css" media="screen" />-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon2.ico" type="image/x-icon" />
	
	<script src="<?php bloginfo('template_url'); ?>/xfade/xfade2.js" type="text/javascript"></script>
	<script type="text/javascript">
		xfadePath = '<?php bloginfo('template_url'); ?>/xfade/';
	</script>
	
	<?php wp_head(); ?>
</head>
<body>
	<!--[if lt IE 7]>
	<div id="browserWarning" class="topErrorMessage">
		<p>You are using an old version of Internet Explorer. You probably won't get the best experience until you upgrade to a later version (7 or 8),
		or get a better browser altogether for example <a href="http://www.mozilla.com/">Firefox</a> or <a href="http://www.opera.com/">Opera</a>.</p>
	</div>
	<![endif]-->
	<div id="animateAbortWarning" class="topWarningMessage" style="display: none;">
		<p>This site contains some fancy animation, but your computer can't quite handle it so it has been automatically disabled. <a href="#" onClick="document.getElementById('animateAbortWarning').style.display = 'none'; return false;">Hide this message</a></p>
	</div>
	<div id="bodyWrapper1">
		<div id="imageContainer">
			<img src="<?php bloginfo('template_url'); ?>/images/body-background-top-1-unbranded.png" />
			<img src="<?php bloginfo('template_url'); ?>/images/body-background-top-2-unbranded.png" />
			<img src="<?php bloginfo('template_url'); ?>/images/body-background-top-3-unbranded.png" />
		</div>
		<div id="page">			
			<div id="container">
				<div id="header">
					<h1><a href="<?php echo get_option('home'); ?>/"><span class="blogName"><?php bloginfo('name'); ?></span><span class="blogDescription"><?php bloginfo('description'); ?></span></a></h1>
					<div id="auxBox">
						<?php include (TEMPLATEPATH . '/searchform.php'); ?>
						<ul id="siteFeeds">
							<li><a href="<?php bloginfo('rss2_url'); ?>">Subscribe to <?php bloginfo('name'); ?> (RSS)</a></li>
							<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Subscribe to comments (RSS)</a></li>
						</ul>
					</div>
					<a id="enableDisableAnimation" href="#" onClick="xfade_toggle(); return false;">
						<img id="enableAnimationButton" src="<?php bloginfo('template_url'); ?>/images/button-enable-background-animation.png" alt="Enable background animation" />
						<img id="disableAnimationButton" src="<?php bloginfo('template_url'); ?>/images/button-disable-background-animation.png" alt="Disable background animation" />
					</a>
				</div>
				<div id="topNavigation">
					<ul>
						<li <?php if ($_SERVER['REQUEST_URI'] == '/') { echo 'class="current_page_item"'; }?>><a href="/">Home</a></li>
						<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
					</ul>
				</div>
				<div id="main">