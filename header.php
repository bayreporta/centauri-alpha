<!DOCTYPE html>
<!--
#### CENTAURI By John Osborn D'Agostino ####
-->	
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_site_url();?>/favicon.ico">
	<script src="https://use.typekit.net/cta0jll.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/style.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/centauri/scripts/master.js"></script>

</head>
<body <?php body_class(); ?>>
	<?php edit_post_link(); ?>
	<div id="wrapper" class="hfeed">
		<div id="burger-menu"><a href="#"><i class="fa fa-bars"></i></a><?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?></div>
		<header id="header" role="banner">
			<section id="branding">
				<div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'sol' ); ?>" rel="home"><img src="http://bayreporta.com/wp-content/uploads/2015/04/WzsT_QA_400x400.png"></a><div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'sol' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></div></div>
			</section>
			<nav id="menu" role="navigation">				
				<a href="#"><i class="fa fa-bars"></i></a>
			</nav>
			<ul id="social-head">
				<li><a href="mailto:bayreporta@gmail.com"><i class="fa fa-envelope"></i></a></li>
				<li><a href="//github.com/bayreporta?tab=repositories"><i class="fa fa-github"></i></a></li>
				<li><a href="//twitter.com/bayreporta"><i class="fa fa-twitter"></i></a></li>
				<li><a href="//linkedin.com/profile/preview?vpa=pub&locale=en_US"><i class="fa fa-linkedin"></i></a></li>
			</ul>
			<ul id="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</ul>
		</header>
		<div id="container">