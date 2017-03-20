<section class="entry-segment" role="clips">
	<h2 class="aligncenter">
		<?php print get_field( 'ca_clip_header' ); ?>
	</h2>
	<hr class="fancy-line" />	
	<?php print ca_populate_clips( get_field( 'ca_clip_list' ) ); ?>
</section>