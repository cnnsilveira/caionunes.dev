class Header {

    constructor() {
        this.events();
    }

    events() {
        jQuery( function( $ ) {
            if ( $( window ).scrollTop() > 0 && ! $( window ).hasClass( 'small' ) ) {
                $( 'header' ).addClass( 'small' );
            }
            $( window ).scroll( function() {
                if ( $( this ).scrollTop() > 0 ) {
                    $( 'header' ).addClass( 'small' );
                } else {
                    $( 'header' ).removeClass( 'small' );
                }
            });
        });
    }
}

export default Header;