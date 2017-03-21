<?php get_header(); /*Template Name: About*/ ?>

<!-- Featured image area -->
<?php get_template_part( 'templates/entry/entry', 'main_image' ) ?>

<main id="content" role="about">

	<!-- Bio area -->
	<?php get_template_part( 'templates/entry/entry', 'bio' ) ?>

	<!-- Pieces of history area -->
	<section class="entry-segment" role="about">
		<?php print centalpha_populate_about_details( get_field('ca_about_deets') ); ?>
	</section>

	<!-- types of work area -->
	<?php get_template_part( 'templates/entry/entry', 'about_work' ) ?>
	
	<!-- Skills area -->
	<?php get_template_part( 'templates/entry/entry', 'about_skills' ) ?>

	<!-- Contact area -->
	<?php get_template_part( 'templates/entry/entry', 'contact' ) ?>

</main>

<!-- main image script -->
<?php get_template_part( 'templates/scripts/script' , 'main_image' ); ?>

<?php get_footer(); ?>