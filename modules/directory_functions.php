<?php 

/* #1: Find the latest game directory post
================================================================================*/
function centalpha_latest_game_directory_post(){
	$ret = '';
	$q = centalpha_game_directory_query(1);

	//get date of latest post published
	while ($q->have_posts()) : $q->the_post();
		$d = get_the_date( 'U' );
		break;
	endwhile;

	$d = centalpha_determine_time_difference( $d );
	$d = centalpha_populate_time_difference( $d );

	$ret .= '<h2 class="aligncenter">';
		$ret .= $d[0];
	$ret .= '</h2>';
	$ret .= '<h3 class="aligncenter">';
		$ret .= $d[1] . ' since last update';
	$ret .= '</h3>';
	wp_reset_postdata();
	return $ret;

}

/* #2: Query game directory post type
================================================================================*/
function centalpha_game_directory_query( $count=null ){
	$args = array(
			'post_type'     => array( 'game_directory' ),
			'post_status'   => array( 'publish'),
			'cache_results' => true,
	);

	//posts to grab
	if ( $count !== null ){
		$add = array( 'posts_per_page' => $count );
		array_push( $args, $add );
	} else {
		$add = array( 'nopaging' => true );
		array_push( $args, $add );
	}

	$query = new WP_Query( $args );
	return $query;
}

/* #3: Populate game directory table
================================================================================*/
function centalpha_populate_directory_table(){
	$ret = '';
	$q = centalpha_game_directory_query();
	$direct = get_template_directory_uri() . '/assets/art/';

	$size = sizeof( $q->posts );
	foreach ( $q->posts as $post ) {
		//acf fields and content
		$year = get_field( 'ca_gd_year', $post->ID );
		$publish = get_field( 'ca_gd_publish', $post->ID );
		$develop = get_field( 'ca_gd_develop', $post->ID );
		$url = get_field( 'ca_gd_external_url', $post->ID );
		$genre = get_field( 'ca_gd_genre', $post->ID );
		$status = get_field( 'ca_gd_status', $post->ID );
		$news = get_field( 'ca_gd_news', $post->ID );

		$ret .= '<tr data-status="' . $status . '" data-genre="' . $genre . '" data-news="' . $news . '" data-year="' . $year . '">';
			$ret .= '<td role="icons">';

				//genre check
				if ( $genre === 'action' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-08.svg" alt="action game">';
				} elseif ( $genre === 'arcade' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-10.svg" alt="arcade game">';
				} elseif ( $genre === 'budget' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-07.svg" alt="budget game">';
				} elseif ( $genre === 'cyoa' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-14.svg" alt="choose your own adventure game">';
				} elseif ( $genre === 'other' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-11.svg" alt="uncategorized game">';
				} elseif ( $genre === 'puzzle' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-05.svg" alt="puzzle game">';
				} elseif ( $genre === 'quiz' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-06.svg" alt="quiz game">';
				} elseif ( $genre === 'simulation' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-13.svg" alt="simulation game">';
				} elseif ( $genre === 'strategy' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-09.svg" alt="strategy">';
				} elseif ( $genre === 'vr' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-12.svg" alt="virtual reality product">';
				} 

				//status check
				if ( $status === 'live' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-01.svg" alt="Game is live online">';
				} elseif ( $status === 'dead' ){
					$ret .=  '<img src="' . $direct . 'gd_icons-03.svg" alt="Game is no longer working">';
				} else {
					$ret .=  '<img src="' . $direct . 'gd_icons-02.svg" alt="Game must be purchased to play">';
				}

				//news check
				if ( $news === true ){
					$ret .=  '<img src="' . $direct . 'gd_icons-04.svg" alt="Commissioned by media company">';
				}

			$ret .= '</td>';
			$ret .= '<td role="year">';
				$ret .= $year;
			$ret .= '</td>';
			$ret .= '<td role="name">';
				$ret .= $post->post_title;
			$ret .= '</td>';
			$ret .= '<td role="publish">';
				$ret .= $publish;
			$ret .= '</td>';
			$ret .= '<td role="develop">';
				$ret .= $develop;
			$ret .= '</td>';
		$ret .= '</tr>';
	}
	return $ret;
}

/* #4: Populate directory years filter
================================================================================*/
function centalpha_populate_directory_filter_years(){
	$ret = '';
	global $wpdb;
	$years = $wpdb->get_col( $wpdb->prepare(
		"
		SELECT DISTINCT meta_value
		FROM $wpdb->postmeta
		WHERE meta_key = %s
		ORDER BY meta_value DESC
		",
		'ca_gd_year'
	));

	$size = sizeof($years);
	$ret .= '<select>';
	$ret .= '<option value="">All</option>';
	for ( $i=0 ;  $i < $size ;  $i++ ) { 
		$ret .= '<option value="' . $years[$i] . '">' . $years[$i] . '</option>';
	}
	$ret .= '<select>';
	return $ret;
}