/* dynamically load index posts
=============================================*/
(function(jQuery) {

	function resolve_pagination( e ) {
		var p;

		if (e.attr( 'data-direction' ) === 'next'){
			p = parseInt( e.attr( 'data-page-next' ) );
			jQuery( '.index-button' ).attr({
				'data-page-next': p + 1,
				'data-page-prev': p + 1,
			}); 
		}
		else {
			p = parseInt( e.attr('data-page-prev') );
			jQuery( '.index-button' ).attr({
				'data-page-next': p - 1,
				'data-page-prev': p - 1,
			});
		}
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
				jQuery(' #content>div ').find( 'article' ).remove();
				jQuery(' #content>div ').append( html );
				jQuery(' .button-container i ').css( 'display' , 'none' );
				loader.removeClass( 'loader-spin' );
			},
			done: function(){

			}
		})
	})
})(jQuery);