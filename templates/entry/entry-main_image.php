<section class="main-image">
	<div role="image"><img alt="" src=""></div>
	<div role="main-head">
		<h1 class="aligncenter">
			<?php print get_field( 'ca_main_header' ); ?>		
		</h1>
	</div>
	<div role="second-head">
		<h2 class="aligncenter">
			<?php get_field( 'ca_second_header' ) === '' ? print get_bloginfo( 'description' ) : print get_field( 'ca_second_header' ); ?>	
		</h2>
	</div>	
</section>