<?php /* Template Name: Directory */ get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/styles/pretty-tables.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js" charset="utf-8"></script>
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header page-no-header">
			<div class="page-title"><h1><?php the_title(); ?></h1></div> 
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		</header>
		<div id="directory" class="content" role="directory">
			<div><?php the_content(); ?></div>
			<div class="pretty-table temp-charts" data="#pretty-table-1">
				<div id="pretty-table-top"><a href="#top"><i class="fa fa-arrow-up"></i></a></div>
				<div id="pretty-table-control">
					<div id="pretty-table-search-options">
						<input id="pretty-table-search" type="text" style="height:24px;" placeholder="Type to Search">
						<div><p class="pretty-table-button san-serif" id="execute-search">Search</p></div>
						<div><p class="pretty-table-button san-serif" id="reset-search">Reset</p></div>
					</div>
				</div>	
				<div id="pretty-table-1"></div>				
			</div>	
		</div>
	</article>
	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
</section>
<script src="<?php echo get_template_directory_uri();?>/scripts/jquery.tablesorter.js"></script>
<script src="<?php echo get_template_directory_uri();?>/scripts/pretty-table.js"></script>

<?php get_footer(); ?>