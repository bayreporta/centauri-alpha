<!DOCTYPE html>
<!--
#### CENTAURI ALPHA By John Osborn D'Agostino ####
-->	
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_site_url();?>/favicon.ico">
	<meta name="author" content="John Osborn D'Agostino">
	<meta name="copyright" content="John Osborn D'Agostino">
	<meta name="description" content="Davis-based web developer and data journalist specializing in creating online interactives, data visualizations, and custom Wordpress themes and plugins. ">
	<meta http-equiv="content-language" content="en">
	<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
	<meta name="robots" content="index,follow">
	<meta name="revisit-after" content="1 days">
	<meta name="revisit" content="after 1 days">
	<meta name="keywords" lang="en" content="Wordpress development, data visualization, front end development, portfolio, web developer, Bay Area, California, Sacramento, Davis">
	<meta name="viewport" content="width=device-width" />

	<!-- Typekit, font awesome, main stylesheet loads -->
	<script src="https://use.typekit.net/cta0jll.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/style.css" />
	<script src="https://use.fontawesome.com/4ac2a9e804.js"></script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php edit_post_link(); ?>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<section id="branding">
				<div id="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'centalpha' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</div>
			</section>
			<nav id="main-menu" role="navigation">				
				<div id="burger"><i class="fa fa-bars" aria-hidden="true"></i></div>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</nav>			
		</header>
		<div id="container">