<section class="entry-segment" role="skills">
	<h2 class="aligncenter">
		<?php print get_field( 'ca_about_skills_header' ); ?>
	</h2>
	<hr class="fancy-line" />
	<div role="flex">
		<?php print centalpha_populate_about_details( get_field('ca_about_skill_list') ); ?>
	</div>
</section>