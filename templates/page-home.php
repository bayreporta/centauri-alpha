<?php /* Template Name: Home Page */ get_header(); ?>
<div id="home-image">
	<img src="">
</div>
<div id="home-content" class="content home" role="main">
	<section id="home-bio" class="">
		<div type="text">
			<h2 class="aligncenter"><strong>Welcome to my digital vault.</strong></h2>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php wp_reset_postdata(); ?>
			<?php endwhile; endif; ?>
		</div>
		<div class="button"><a href="<?php echo get_site_url();?>/about-me/">Read More...</a></div>
	</section>
	<hr class="thick">

	<!-- BLOG -->
	<section id="home-blog">
		<div class="aligncenter"><h2 class="uppercase">Recent Posts</h2></div>
		<div>
			<?php 
				$args = array('posts_per_page' => '5','cat' => '544');
				$the_query = new WP_Query($args); ?>
				
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php get_template_part( 'templates/queries/query', 'homeblog' ); ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>	
		</div>
		<div class="button"><a class="aligncenter" href="<?php echo get_site_url();?>/category/bloggin/">All Posts</a></div>
	</section>
	<hr class="thick">

	<!-- PROJECTS -->
	<section id="home-projects">
		<div class="aligncenter"><h2 class="uppercase">Types of Work</h2></div>
		<p>	All my work is organized by the areas I've worked in. Each page will link you my work in that area.
			Updated more frequently than my blog.</p>
		<div class="flex">
			<?php 
				$args = array('category__and' => array( 493, 504 ));
				$the_query = new WP_Query($args); ?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php get_template_part( 'templates/queries/query', 'homeproj' ); ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>	
		</div>
	</section>
	<hr class="thick">

	<!-- CATEGORIES -->
	<section id="home-cats">
		<?php 
			//BUILD CATEGORIES ARRAY
			$categories = get_categories(); $cat = array();
			for ($i=0 ; $i < sizeof($categories); $i++){
				$cat[$i]['name'] = $categories[$i]->name;
				$cat[$i]['slug'] = $categories[$i]->slug;
				$cat[$i]['count'] = $categories[$i]->count;
				$cat[$i]['parent'] = $categories[$i]->parent;
			}

			//SORT BY COUNT
			usort($cat, function($a, $b) {return $b['count'] - $a['count'];});

			print '<!--';var_dump($cat);print '-->'; 
		?>
		<div class="home-cat">
			<h2 class="uppercase aligncenter">Where my work has appeared</h2>
			<div class="column-three">
				<?php 
					foreach ($cat as $c){if ($c['parent'] === 568){print '<a href="'.$siteURL.'\/category/'.$c['slug'].'">'.$c['name'].'</a><br>';}} 
				?>
			</div>
		</div>
		<hr class="thin">
		<div class="home-cat">
			<h2 class="uppercase aligncenter">What projects I've worked on</h2>
			<div class="column-three">
				<?php foreach ($cat as $c){if ($c['parent'] === 493){print '<a href="'.$siteURL.'\/category/'.$c['slug'].'">'.$c['name'].'</a><br>';}} ?>
			</div>
		</div>
		<hr class="thin">
		<div class="home-cat">
			<h2 class="uppercase aligncenter">What skills I have</h2>
			<div class="column-three">
				<?php foreach ($cat as $c){if ($c['parent'] === 569){print '<a href="'.$siteURL.'\/category/'.$c['slug'].'">'.$c['name'].'</a><br>';}} ?>
			</div>
		</div>
		<hr class="thin">
		<div class="home-cat">
			<h2 class="uppercase aligncenter">What formats I work in</h2>
			<div class="column-three">
				<?php foreach ($cat as $c){if ($c['parent'] === 570){print '<a href="'.$siteURL.'\/category/'.$c['slug'].'">'.$c['name'].'</a><br>';}} ?>
			</div>
		</div>
		<hr class="thin">
		<div class="home-cat">
			<h2 class="uppercase aligncenter">What tools I've built</h2>
			<div class="column-three">
				<?php foreach ($cat as $c){if ($c['parent'] === 571){print '<a href="'.$siteURL.'\/category/'.$c['slug'].'">'.$c['name'].'</a><br>';}} ?>
			</div>
		</div>
		<hr class="thin">
	</section>
</div>
<script type="text/javascript">
	
	jQuery(document).ready(function(){

		/* LOAD HOME IMAGE
		======================================*/
		var srcSize = window.innerWidth || document.body.clientWidth;
		srcSize >= 768 ? jQuery('#home-image img').attr('src', 'http://bayreporta.com/wp-content/uploads/2015/04/home-head.jpg') : jQuery('#home-image img').attr('src', 'http://bayreporta.com/wp-content/uploads/2016/01/home-img-mobile.png');
		
	})

</script>
<?php get_footer(); ?>