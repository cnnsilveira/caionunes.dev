<?php

$page_id      = cndev_section_id( '404' );
$page_content = '
		<a href="' . esc_url( home_url() ) . '" class="cndev_button">Voltar ao início</a>
';

cndev_section( 'section', $page_id, '', $page_content );
