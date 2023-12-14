<?php

$markup = '
		<a href="' . esc_url( home_url() ) . '" class="cndev__button">' . esc_html__( 'Voltar ao início', 'cndev' ) . '</a>
';

cndev__section(
	array(
		'tag'     => 'section',
		'content' => $markup,
		'data'    => array(
			'content' => '404',
		),
	)
);
