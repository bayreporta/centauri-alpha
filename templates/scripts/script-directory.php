<script type="text/javascript">
	jQuery(document).ready(function(){	
		var directoryFilters = {
			genre: 	'',
			status: '',
			news: 	'',
			year: 	''
		}	

		/* DIRECTORY FILTERS
		======================================*/ 
		jQuery( '.directory-filter select' ).change(function(){
			var value 	= jQuery(this).val(),
				select 	= jQuery(this).attr( 'role' );

			//update the filter list
			directoryFilters[select] = value;

			//update filters
			if ( value === ''){
				jQuery( '#tb-directory tbody tr' ).css( 'display', 'table-row' );
			}
			else {
				jQuery( '#tb-directory tbody tr' ).css( 'display', 'none' );
				jQuery( '#tb-directory tbody tr[data-' + select + '="' + directoryFilters[select] + '"]').css( 'display', 'table-row' );
			}		


			//retrieve the rest
			if ( directoryFilters['genre'] !== '' && select != 'genre' ){
				console.log('gen');
				jQuery( '#tb-directory tbody tr[data-genre!="' + directoryFilters['genre'] + '"]').css( 'display', 'none' );
			}

			if ( directoryFilters['status'] !== '' && select != 'status' ){
				console.log('s');

				jQuery( '#tb-directory tbody tr[data-status!="' + directoryFilters['status'] + '"]').css( 'display', 'none' );
			}

			if ( directoryFilters['year'] !== '' && select != 'year' ){
				console.log('geyrn');

				jQuery( '#tb-directory tbody tr[data-year!="' + directoryFilters['year'] + '"]').css( 'display', 'none' );
			}

			if ( directoryFilters['news'] !== '' && select != 'news' ){
				console.log('ne');

				jQuery( '#tb-directory tbody tr[data-news!="' + directoryFilters['news'] + '"]').css( 'display', 'none' );
			}


		});

		/* CONFIGURE TABLESORTER
		======================================*/ 
		jQuery( '#tb-directory' ).tablesorter({
			sortList:[[1,0]],
			headers:{
				0: {
					sorter: false
				}
			}
		});

	});
</script>