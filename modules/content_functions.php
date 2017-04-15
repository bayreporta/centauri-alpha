<?php 

/* #1: Populate featured clips style
================================================================================*/
function centalpha_populate_clips( $data, $id=null ){
	$ret = '';

	//array of current or singular
	$id === null ? $current = get_field( 'ca_current_featured_clips' ) : $current = array(array( 'id' => $id ));
	$size = sizeof($current);

	for ( $i = 0 ; $i < $size ; $i++ ){
		//grab only the relavant items
		foreach ($data as $key => $val) {
			if ( $val['id'] === $current[$i]['id'] ){
				$item = $val;
				break;
			}
		}

		$ret .= '<div class="clip">';
			$ret .= '<div role="image">';
				$ret .= '<img src="' . $item[ 'image' ][ 'sizes' ][ 'large' ] . '">';
			$ret .= '</div>';
			$ret .= '<div role="content">';
				$ret .= '<h3>' . $item[ 'headline' ] . '</h3>';
				$ret .= '<h4>' . $item[ 'subhead' ] . '</h4>';
				$ret .= '<hr />';
				$ret .= $item[ 'content' ];
				$ret .= '<div class="button-container">';
					$ret .= '<a href="' . $item[ 'link' ] . '"><div class="button">Explore</div></a>';
				$ret .= '</div>';
			$ret .= '</div>';		
		$ret .= '</div>';
	}	
	unset( $data );
	return $ret;
}

/* #2: Populate service items
================================================================================*/
function ca_populate_services_list( $data, $home=true ){
	$ret = '';
	$size = sizeof($data);

	for ( $i = 0 ; $i < $size ; $i++ ){
		$hashtag = explode( '#', $data[$i][ 'link' ] );
		$home === true ? $link = $data[$i][ 'link' ] : $link = '#' . $hashtag[1];

		$ret .= '<div class="service-list-item">';
			$ret .= '<div role="image">';
				$ret .= '<img src="' . $data[$i][ 'image' ][ 'sizes' ][ 'thumbnail' ] . '">';
			$ret .= '</div>';
			$ret .= '<div role="content">';
				$ret .= '<div>';
					$ret .= '<h3>' . $data[$i][ 'header' ] . '</h3>';
				$ret .= '</div>';
				$ret .= '<div>';
					$ret .= $data[$i][ 'content' ];
				$ret .= '</div>';		
			$ret .= '</div>';
			$ret .= '<div class="button-container">';
				$ret .= '<a href="' . $data[$i][ 'link' ] . '"><div class="button">Learn More</div></a>';
			$ret .= '</div>';
		$ret .= '</div>';
	}
	unset( $data );
	return $ret;
}

/* #3: For testimonials, random or list of all marked
================================================================================*/
function ca_determine_testimonial_output( $data, $random = null ){
	if ( $data === false ) {
		return;
	}

	if ( $random === true ){
		$rand = centalpha_random_number( 0, sizeof( $data ) - 1 );
		$data = array( $data[ $rand ] );
	} 
	$ret = ca_populate_testimonials( $data );
	return $ret;
}

/* #4: Populate testimonials
================================================================================*/
function ca_populate_testimonials( $data ){
	$ret = '';
	$size = sizeof( $data );
	for ( $i = 0 ; $i < $size ; $i++ ){
		$ret .= '<div class="testimonial">';
			$ret .= '<div role="image">';
				$ret .= '<img src="' . $data[$i][ 'image' ][ 'sizes' ][ 'medium' ] . '">';
			$ret .= '</div>';
			$ret .= '<div role="content">';
				$ret .= '<div>';
					$ret .= '<i class="fa fa-quote-left" aria-hidden="true"></i>';
					$ret .= $data[$i][ 'quote' ];
				$ret .= '</div>';
				$ret .= '<div>';
					$ret .= '<p>- ' . $data[$i][ 'byline' ] . '</p>';
				$ret .= '</div>';
			$ret .= '</div>';
		$ret .= '</div>';
	}
	unset( $data );
	return $ret;
}

/* #5: Populate service details on Services page
================================================================================*/
function ca_populate_services_details( $data ){
	$ret = '';
	$size = sizeof( $data );
	for ( $i = 0 ; $i < $size ; $i++ ){
		$ret .= '<div id="' . $data[$i]['id'] . '" class="service-item">';
			$ret .= '<h2>' . $data[$i][ 'header' ] . '</h2>';
			$ret .= '<div role="top">';
				$ret .= '<div>';
					$ret .= $data[$i][ 'content' ];
				$ret .= '</div>';				
			$ret .= '</div>';
			$ret .= '<div role="bottom">';	
				$ret .= centalpha_populate_clips( get_field( 'ca_featured_clips', 4433 ),  $data[$i][ 'featured_id' ] );
				$ret .= '<div>';
					$ret .= '<h3 class="aligncenter">what I can do for you</h3>';
					$ret .= '<ul>';
						foreach ( $data[$i]['points'] as $p ) {
							$ret .= '<li>' . $p[ 'content' ] . '</li>';
						}				
					$ret .= '</ul>';
				$ret .= '</div>';
			$ret .= '</div>';
		$ret .= '</div>';
	}
	unset( $data, $image, $url );
	return $ret;
}

/* #6: Populate about details on about page
================================================================================*/
function centalpha_populate_about_details($data){
	$ret = '';
	$size = sizeof( $data );
	for ( $i = 0 ; $i < $size ; $i++ ){
		$ret .= '<div class="about-details">';
			$ret .= '<h3>' . $data[$i][ 'header' ] . '</h3>';	
			$ret .= $data[$i][ 'content' ];		
		$ret .= '</div>';
	}
	unset( $data );
	return $ret;
}

/* #7: Populate awards on resume page
================================================================================*/
function centalpha_populate_awards($data){
	$ret = '';
	$size = sizeof( $data );
	$ret .= '<ul>';
	for ( $i = 0 ; $i < $size ; $i++ ){
		$ret .= '<a href="' . $data[$i][ 'link' ] . '">';
			$ret .= '<li>' . $data[$i][ 'item' ] . '</li>';
		$ret .= '</a>';	
	}
	$ret .= '</ul>';
	unset( $data );
	return $ret;
}

/* #8: Populate contact boxage
================================================================================*/
function centalpha_populate_contact_box( $img, $quote ){
	$ret = '';
	
	//random image
	$rand = centalpha_random_number( 0, sizeof( $img ) - 1 );
	$ret .= '<img src="' . $img[$rand]['image'] . '">';

	//random quote
	$rand = centalpha_random_number( 0, sizeof( $quote ) - 1 );
	$ret .= '<h3>' . $quote[$rand]['quote'] . '</h3>';

	return $ret;
}