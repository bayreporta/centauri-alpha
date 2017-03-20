/* dynamically load index posts
=============================================*/
(function(jQuery) {

	function resolve_pagination( e ) {
		var p = parseInt( e.attr( 'data-page' ) );
		e.attr( 'data-page' , p + 1 );
		return p;
	}

	jQuery(document).on( 'click' , '.index-button' , function( event ) {
		event.preventDefault();

		//enable loading
		var loader = jQuery( this ).children(' div ');
		loader = loader.children(' i ');
		loader.css( 'display' , 'block' ).addClass( 'loader-spin' );

		page = resolve_pagination( jQuery( this ) );

		jQuery.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: ajaxpagination.query_vars,
				page: page
			},
			success: function( html ) {
				var parent = jQuery(' #content>div ');
				parent.append( html );
				parent.find( '.button-container' ).appendTo(parent);				
				
				jQuery(' .button-container i ').css( 'display' , 'none' );
				loader.removeClass( 'loader-spin' );
			}
		})
	})
})(jQuery);