<section class="entry-segment" role="bio">
	<h2 class="aligncenter">
		<?php print get_field( 'ca_bio_header', 4433 ); ?>
	</h2>
	<hr class="fancy-line" />	
	<div role="image">
		<img src="<?php echo get_field( 'ca_bio_image', 4433 ); ?>">
	</div>
	<div role="content">
		<?php print get_field( 'ca_bio_content', 4433 ); ?>
		<?php if ( get_the_ID() === 4433 ) : ?>
			<div class="button-container">
				<a href="<?php echo get_site_url(); ?>/about-me/"><div class="button">Learn More</div></a>
			</div>	
		<?php endif; ?>
	</div>
</section>