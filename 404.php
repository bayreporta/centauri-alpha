<html>
<head>
	<title>Lost beyond the wall | DataViz, Interactives, Websites</title>
	<link rel="shortcut icon" href="<?php echo get_site_url();?>/favicon.ico">
	<meta name="author" content="John Osborn D'Agostino">
	<meta name="copyright" content="John Osborn D'Agostino">
	<meta name="description" content="Davis-based web developer, journalist, and designer specializing in creating web-based interactives, data visualizations, and custom Wordpress themes and plugins.">
	<meta http-equiv="content-language" content="en">
	<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
	<meta name="robots" content="index,follow">
	<meta name="revisit-after" content="1 days">
	<meta name="revisit" content="after 1 days">
	<meta name="keywords" lang="en" content="Wordpress development, data visualization, front end development, portfolio, journalist, web developer, San Francisco Bay Area, California, Sacramento, Davis">
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/style.css" />

	<?php wp_head(); ?>
</head>
<body>
	<div id="winter-is-coming-404">
		<div id="header-one-404" class="fade-in-404">
			<h1>404</h1>
		</div>
		<div id="ice-404" class="ice-cometh">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 949.4 194.8"><path class="st0" d="M948.1 97.6c0.4 0 0.9 0 1.3 0l-1.3-0.2c-0.2-3.8-1.3-21-9-27.9 -10.2-4.9-41.3 9.3-48.2 12.8 -0.1-0.2-0.2-0.4-0.4-0.7L813 79.6l0-0.1c0 0 0 0.1 0 0.1L747.2 78l0-0.1c0 0 0 0 0 0.1l-5.1-0.1 0-1.2c0-20.8-6.7-41.6-28.2-71.8 -1.2-2-2.2-3.5-3-4.2 -0.2-0.2-0.3-0.4-0.5-0.7l0.2 0.4c-0.3-0.2-0.6-0.3-0.8-0.2l-22.9 18.9C705 35 718 56.5 717.3 75.2c-18.4 5.3-26.3 3.1-42.2-2.3l-15.7 0 0-0.2c0 0.1 0 0.2 0 0.2L126 73.6c-61.3 0-85.3 3.2-126 24.3C41.6 119.4 66.9 122 126 122l533.5-0.7c0 0 0 0 0 0v0l15.7 0c16.3-5.6 24.7-7.3 41.9-2.5 3.5 19.6-10.6 42.1-30.4 54.9l21.3 21c0.6 0.3 1.6-0.1 2.7-1.3 0.1-0.1 0.2-0.2 0.3-0.3 0.1-0.1 0.1-0.1 0.2-0.2l0.2-0.2 1.1-1.4 0.8-1c-0.2 0.3-0.4 0.5-0.5 0.8 0 0 0.6-0.7 1.8-2.4l0 0 0 0c0.1-0.1 0.1-0.2 0.2-0.3 0.1-0.1 0.1-0.2 0.2-0.3 0.2-0.2 0.3-0.5 0.5-0.7l0 0 0 0c0.9-1.4 2-3 3.3-4.8 0.2-0.3 0.4-0.7 0.7-1l0 0 0 0c0.6-0.9 1.3-1.9 2-3 0 0 0 0 0 0v0c0.4-0.7 0.8-1.3 1.3-2h0v0c2.1-3.3 4-6.6 5.7-9.7h0v0c10.7-19.3 14.4-34.8 14.4-50.2l0-0.4 15.2-0.2c0 0 0.1 0.1 0.1 0.1l0-0.1 13.6-0.2 12.5-0.2c0 0 0 0 0 0l0 0L811 115c0.1 0.1 0.1 0.2 0.2 0.2l-0.1-0.3 79-1.3c0.1-0.2 0.2-0.3 0.3-0.5 0.2 0.1 0.4 0.2 0.5 0.2 0.1 0.2 0.2 0.3 0.4 0.5l-0.1-0.3c6.9 3.1 25.1 10.4 37.3 12.4 2.9 0.6 6 1 9.6 1.2l0.6-1.9c8.3-7.4 9.4-25.6 9.3-27.4C948.1 97.8 948.1 97.7 948.1 97.6z"/></svg>
		</div>
		<div id="header-two-404" class="fade-in-404">
			<h1>is coming</h1>
		</div>
		<div id="escape-404" class="fade-in-404-button">
			<a href="/"><p>Break the wheel</p></a>
		</div>
	</div>
</body>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var winWidth 	= jQuery(window).width(),
			winHeight 	= jQuery(window).height(),
			snowing		= true,
			parent		= jQuery('#winter-is-coming-404');

		setTimeout( winterHasCome, 2000 );

		function winterHasCome(){
			setInterval( function(){
				for (var i = 0 ; i < 5 ; i++ ){
					var maxX		= Math.floor( winWidth ),
						randX		= Math.floor( Math.random() * maxX ),
						snowflake	= jQuery('<div>*</div>')
										.addClass( 'snowflake' )
										.css({
											'left': randX,
											'top': 	'-30px'
										});
					parent.append( snowflake );
				}
			}, 3000);

			setInterval( function(){
				var snowflakes = jQuery( '.snowflake' ),
					count = snowflakes.length;

				for (var i = 0 ; i < count ; i++ ){
					var minX 		= -10,
						maxX		= 10,
						randX 		= Math.random() * ( maxX - minX ) + minX,
						snowflake   = jQuery( '.snowflake:eq(' + i + ')' ),
						y    		= snowflake.css( 'top' ),
						yNum		= y.split( 'px' ),
						randY   	= Math.random() * ( 20 - 5 ) + 5;
					
					//Never 1px or less y
					if ( randY < 1 ) {
						randY = 1;
					}

					//destroy if off screen
					if ( parseInt(yNum[0] ) > winHeight ) {
						snowflake.remove();
						continue;
					}

					//animate
					snowflake.animate({
						'left': 	'+=' + randX + 'px',
						'top':      '+=' + randY + 'px'  
					}, 1000, 'linear' );
				}

			}, 1000 );

		}
	});
</script>
</html>