<?php get_header(); /*Template Name: Resume*/ ?>

<main id="content" role="services">
	<header>
		<h1><?php print get_the_title(); ?></h1>
		<hr>	
		<p>References can be <a href="mailto:bayreporta@gmail.com">provided upon request</a> by contacting me.</p>
	</header>

	<!-- Services List area -->
	<?php get_template_part( 'templates/entry/entry', 'resume' ) ?>
	
	<!-- Awards and Honors -->
	<section class="entry-segment" role="resume">
		<h2 class="aligncenter">Awards and Honors</h2>
		<hr class="fancy-line" />	
		<?php print centalpha_populate_awards( get_field( 'awards_and_honors' ) ); ?>
	</section>	



</main>

<?php get_footer(); ?>