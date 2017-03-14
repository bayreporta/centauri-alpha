<?php 

/* #1: Populate home featured clips
================================================================================*/
function ca_populate_home_clips($data){
	$ret = '';

	$size = sizeof($data);
	for ( $i = 0 ; $i < $size ; $i++ ){
		$ret .= '<div class="home-clip">';
			$ret .= '<div role="image">';
				$ret .= '<img src="' . $data[$i]['image']['sizes']['large'] . '">';
			$ret .= '</div>';
			$ret .= '<div role="content">';
				$ret .= '<h3>' . $data[$i]['headline'] . '</h3>';
				$ret .= '<h4>' . $data[$i]['subhead'] . '</h4>';
				$ret .= '<hr />';
				$ret .= $data[$i]['content'];
				$ret .= '<div class="button-container">';
					$ret .= '<a href="' . $data[$i]['link'] . '"><div class="button">Explore</div></a>';
				$ret .= '</div>';
			$ret .= '</div>';		
		$ret .= '</div>';
	}	
	unset($data);
	return $ret;
}

/* #2: Populate home service items
================================================================================*/
function ca_populate_home_services($data){
	$ret = '';
	$size = sizeof($data);
	for ( $i = 0 ; $i < $size ; $i++ ){
		$ret .= '<div class="home-service">';
			$ret .= '<div role="image">';
				$ret .= '<img src="' . $data[$i]['image']['sizes']['thumbnail'] . '">';
			$ret .= '</div>';
			$ret .= '<div role="content">';
				$ret .= '<div>';
					$ret .= '<h3>' . $data[$i]['header'] . '</h3>';
				$ret .= '</div>';
				$ret .= '<div>';
					$ret .= $data[$i]['content'];
				$ret .= '</div>';		
			$ret .= '</div>';
			$ret .= '<div class="button-container">';
				$ret .= '<a href="' . $data[$i]['link'] . '"><div class="button">Learn More</div></a>';
			$ret .= '</div>';
		$ret .= '</div>';
	}
	unset($data);
	return $ret;
}

/* #3: Randomly grab a testimonial(s) and populate home page
================================================================================*/
function ca_populate_home_testimonial($data){
	$ret = '';
	$rand = rand(0, sizeof($data) - 1);

	// build element
	$ret .= '<div class="home-test">';
		$ret .= '<div role="image">';
			$ret .= '<img src="' . $data[$rand]['image']['sizes']['medium'] . '">';
		$ret .= '</div>';
		$ret .= '<div role="content">';
			$ret .= '<div>';
				$ret .= '<i class="fa fa-quote-left" aria-hidden="true"></i>';
				$ret .= '<p>' . $data[$rand]['quote'] . '</p>';
			$ret .= '</div>';
			$ret .= '<div>';
				$ret .= '<p>- ' . $data[$rand]['byline'] . '</p>';
			$ret .= '</div>';
		$ret .= '</div>';
	$ret .= '</div>';

	unset($data);
	return $ret;
}
