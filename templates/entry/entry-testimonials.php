<section class="entry-segment" role="testimonials">
	<?php 
		if ( get_the_ID() === 4507 ){
			print ca_determine_testimonial_output( get_field( 'ca_testimonial_list' , 4507 ) );
		} else {
			print ca_determine_testimonial_output( get_field( 'ca_testimonial_list' , 4507 ), true );
			print '<div class="button-container">';
				print '<a href="' . get_site_url() . '/services"><div class="button">Read More</div></a>';
			print '</div>';
		}
	?>	
</section>