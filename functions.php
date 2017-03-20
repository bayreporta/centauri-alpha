<?php

/* #1: Include core theme files and directories
---------------------------------------------------------------------------*/
define("CENT_SLUG", "centauri");
define("CENT_PATH", get_template_directory());
define("CENT_URL", get_template_directory_uri());
define("CENT_MODULE_PATH", CENT_PATH . "/modules");
define("CENT_MODULE_URL", CENT_URL . "/modules");
define("CENT_TEMPLATE_PATH", CENT_PATH . "/templates");
define("CENT_TEMPLATE_URL", CENT_URL . "/templates");
define("CENT_QUERY_PATH", CENT_TEMPLATE_PATH . "/queries");
define("CENT_QUERY_URL", CENT_TEMPLATE_URL . "/queries");

foreach (glob(CENT_MODULE_PATH."/*.php") as $filename) { require_once($filename); }


/* #2: Initialize the theme options
---------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'centalpha_setup' );
function centalpha_setup(){
	centalpha_theme_support();
	centalpha_nav_menus();	
}

function centalpha_theme_support(){
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
}

function centalpha_nav_menus(){
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'laniakea' ) )
	);
}

/* #3: Include core script files
---------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'cantalpha_load_scripts' );
function cantalpha_load_scripts()
{
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'tiny_mce' );
	wp_enqueue_script( 'pym' , '/wp-content/themes/centauri-alpha/scripts/pym.v1.min.js' );
	wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/scripts/ajax-index.js', array( 'jquery' ) );
	
	//AJAX calls for posts
	global $wp_query;
	wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'query_vars' => json_encode( $wp_query->query )
	));
}


/* #4: Comment-related functions
---------------------------------------------------------------------------*/
add_action( 'comment_form_before', 'centalpha_enqueue_comment_reply_script' );
function centalpha_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

function centalpha_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
add_filter( 'get_comments_number', 'centalpha_comments_number' );

function centalpha_comments_number( $count ){
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

/* #5: Dynamic loading of index page posts
---------------------------------------------------------------------------*/
add_action( 'wp_ajax_nopriv_ajax_pagination', 'ca_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'ca_ajax_pagination' );

function ca_ajax_pagination() {
    echo get_bloginfo( 'title' );
    die();
}



function ca_load_more_index_posts() {

   /* $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

    $query_vars['paged'] = $_POST['page'];


    $posts = new WP_Query( $query_vars );
    $GLOBALS['wp_query'] = $posts;

    add_filter( 'editor_max_image_size', 'my_image_size_override' );

    if( ! $posts->have_posts() ) { 
        get_template_part( 'content', 'none' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post();
            get_template_part( 'content', get_post_format() );
        }
    }
    remove_filter( 'editor_max_image_size', 'my_image_size_override' );

    the_posts_pagination( array(
        'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
        'next_text'          => __( 'Next page', 'twentyfifteen' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
    ) );

    die();*/
}

/*function my_image_size_override() {
    return array( 825, 510 );
}*/