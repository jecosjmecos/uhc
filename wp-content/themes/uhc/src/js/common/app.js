( function( $ ){
    'use strict';

	/**
	 * When Document is ready.
	 * Please place only functions calls here.
	 */
	$( function(){
		// 'object-fit' CSS property fix for IE (node_modules/object-fit-images/dist/ofi.js).
		objectFitImages( 'img' );

		// someFunc( 'abc', 5 );
	} );

	/**
	 * Please place all functions declarations below (or in other files).
	 */

	/**
	 * Function declaration example:
	 *
	 * Function description.
	 *
	 * @param	{string}	param1	- param1 description.
	 * @param	{number}	param2	- param2 description.
	 */
	function someFunc( param1, param2 ){
		// do something here...
	}
} )( jQuery );