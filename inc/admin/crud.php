<?php

if ( cndev__is_admin() ) {
	if ( isset( $_POST['cndev__contact_update'] ) ) {
		add_action( 'init', 'cndev__contact_crud', 99 );
	}
}

function cndev__contact_crud() {
	// Valid options.
	$valid_options = array(
		'cndev__contact_pin_curriculum',
		'cndev__contact_pin_email',
		'cndev__contact_pin_whatsapp',
		'cndev__contact_form_selector',
	);
	// POST loop.
	foreach ( $_POST as $option_id => $option_value ) {
		// Valid options validation.
		if ( in_array( $option_id, $valid_options ) ) {
			// DB update.
			$operation = update_option( $option_id, $option_value );
			// Redirection path.
			$redir_path = $_SERVER['HTTP_REFERER'];
			// WP error validation.
			if ( is_wp_error( $operation ) ) {
				add_query_arg( 'op_status', 'error', $redir_path );
			}
			// Redirection.
			wp_safe_redirect( $redir_path );
		}
	}
}
