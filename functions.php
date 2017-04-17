<?php

/* #1: Include core theme files and directories
---------------------------------------------------------------------------*/
define( 'CENT_SLUG', 'centauri' );
define( 'CENT_PATH', get_template_directory() );
define( 'CENT_URL', get_template_directory_uri() );
define( 'CENT_MODULE_PATH', CENT_PATH . '/modules' );
define( 'CENT_MODULE_URL', CENT_URL . '/modules' );
define( 'CENT_TEMPLATE_PATH', CENT_PATH . '/templates' );
define( 'CENT_TEMPLATE_URL', CENT_URL . '/templates' );
define( 'CENT_QUERY_PATH', CENT_TEMPLATE_PATH . '/queries' );
define( 'CENT_QUERY_URL', CENT_TEMPLATE_URL . '/queries' );

foreach ( glob( CENT_MODULE_PATH . '/*.php' ) as $filename ) { 
	require_once( $filename ); 
}


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
add_action( 'wp_enqueue_scripts', 'centalpha_load_scripts' );
function centalpha_load_scripts(){
    wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery' , '/wp-content/themes/centauri-alpha/scripts/jquery-3.2.1.min.js' );
    
	wp_enqueue_script( 'tiny_mce' );
	wp_enqueue_script( 'pym' , '/wp-content/themes/centauri-alpha/scripts/pym.v1.min.js' );

	wp_enqueue_script( 'ca-typekit' , 'https://use.typekit.net/cta0jll.js' );
	wp_add_inline_script( 'ca-typekit' , 'try{Typekit.load({ async: true });}catch(e){}' );

	wp_enqueue_script( 'fontawesome' , 'https://use.fontawesome.com/4ac2a9e804.js' );
}

/* #4: Comment-related functions
---------------------------------------------------------------------------*/
add_action( 'comment_form_before', 'centalpha_enqueue_comment_reply_script' );
function centalpha_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
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
add_action( 'wp_ajax_nopriv_ajax_pagination', 'centalpha_load_more_index_posts' );
add_action( 'wp_ajax_ajax_pagination', 'centalpha_load_more_index_posts' );

function centalpha_load_more_index_posts() {
	//query posts
   	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
    $query_vars['paged'] = $_POST['page'];
    $posts = new WP_Query( $query_vars );
    $GLOBALS['wp_query'] = $posts;

    if( $posts->have_posts() ) {         
        while ( $posts->have_posts() ) { 
            $posts->the_post();
            get_template_part( 'templates/entry/entry' , 'index' );
        }
    }
    die();
}

function centalpha_localize_ajax_script($args){
	wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/scripts/ajax-index.js', array( 'jquery' ) , false, true );
	wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'query_vars' => json_encode( $args )
	));
}
add_action('wp_print_footer_scripts', 'centalpha_localize_ajax_script');

/* #6: Simple Random Functions
---------------------------------------------------------------------------*/
function centalpha_random_number( $floor, $ceil ){
	$rand = rand( $floor, $ceil);
	return $rand;
}

/* #7: Determine time between two dates
===============================================================*/
function centalpha_determine_time_difference($target){
    $current = time();

    $target = date_create_from_format( 'U', $target );

    $current = date_create_from_format( 'U', $current );
    $current->setTimeZone( new DateTimeZone( 'America/Los_Angeles' ) );

    $difference = date_diff( $current, $target );

    return $difference;
}

function centalpha_populate_time_difference($d){
    $ret = [];

    // find the first time value and return that
    if ( $d->y !== 0 ) {
        $ret[] = $d->y;
        $ret < 2 ? $ret[] = ' year' : $ret[] = ' years';
    } elseif ( $d->m !== 0 ) {
        $ret[] = $d->m;
        $ret < 2 ? $ret[] = ' month' : $ret[] = ' months';
    } elseif ( $d->d !== 0 ) {
        $ret[] = $d->d;
        $ret < 2 ? $ret[] = ' day' : $ret[] = ' days';
    } elseif ( $d->h !== 0 ) {
        $ret[] = $d->h;
        $ret < 2 ? $ret[] = ' hour' : $ret[] = ' hours';
    } elseif ( $d->i !== 0 ) {
        $ret[] = $d->i;
        $ret < 2 ? $ret[] = ' minute' : $ret[] = ' minutes';
    } elseif ( $d->s !== 0 ) {
        $ret[] = $d->s;
        $ret < 2 ? $ret[] = ' second' : $ret[] = ' seconds';
    }
    return $ret;
}