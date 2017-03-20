<section class="entry-segment" role="work">
	<h2 class="aligncenter">
		<?php print get_field( 'ca_about_work_header' ); ?>
	</h2>
	<hr class="fancy-line" />	
	<div role="flex">
		<?php get_template_part( 'templates/queries/query', 'about_work' ) ?>
	</div>
</section>