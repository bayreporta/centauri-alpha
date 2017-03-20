<section class="entry-segment" role="service-list">
	<h2 class="aligncenter">
		<?php print get_field( 'ca_service_header', 4433 ); ?>
	</h2>	
	<hr class="fancy-line" />	
	<?php print ca_populate_services_list( get_field( 'ca_services_list', 4433 ) ); ?>
</section>