class Header {

    constructor() {
        this.events();
    }

    events() {
        jQuery( function( $ ) {
			// Scroll event.
            if ( $( window ).scrollTop() > 0 && ! $( window ).hasClass( 'small' ) ) {
                $( 'header' ).addClass( 'small' );
            }
            $( window ).scroll( function() {
                if ( $( this ).scrollTop() > 250 ) {
                    $( 'header' ).addClass( 'small' );
                } else {
                    $( 'header' ).removeClass( 'small' );
                }
            });
			// Header logo.
			$('header .cndev_logo').on('click', () => {
				$('html, body').animate({
                    scrollTop: 0
                }, 0);
			})
        });
    }
}

export default Header;