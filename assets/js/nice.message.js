jQuery( document ).ready(function( $ ) {
	var display = parseInt( jQuery.cookie( 'noAdblockNiceMessage' ), 10 );
	if (isNaN( display )) {
		if ( typeof niceAdsCheck == 'undefined' ) {
			jQuery( 'body' ).prepend( '<div id="niceMessage" class="niceMessage"><div class="inner"><div class="text"><p><strong>' + niceMessageSetup.text[0].title + '</strong></p><p>' + niceMessageSetup.text[0].message + '</p><a onclick="jQuery(\'#niceMessage\').hide(); jQuery.cookie( \'noAdblockNiceMessage\',  1, { expires: 365, path: \'/\' } );" class="close" title="Cerrar"></a></div></div></div>' );
		}
	}
});