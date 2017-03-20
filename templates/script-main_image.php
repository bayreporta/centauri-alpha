<script type="text/javascript">
	jQuery(document).ready(function(){		

		/* Adjust featured image for home page based on device width */
		var srcSize		= window.innerWidth || document.body.clientWidth,
			mainElm		= jQuery( '.main-image img' ),
			mainImg 	= <?php echo json_encode( get_the_post_thumbnail_url()); ?> ,
			mainImgTab 	= <?php echo json_encode( get_the_post_thumbnail_url(null, 'large' )); ?>, 
			mainImgMob	= <?php echo json_encode( get_the_post_thumbnail_url(null, 'medium' )); ?>;

		if ( srcSize >= 1028 ) { 
			mainElm.attr( 'src', mainImg ); 
		}
		else if ( srcSize >= 768 ) { 
			mainElm.attr( 'src', mainImgTab ); 
		}
		else { 
			mainElm.attr( 'src', mainImgMob ); 
		}
	});
</script>