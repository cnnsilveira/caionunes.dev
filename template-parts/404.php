<?php

$markup = '
		<a href="' . esc_url( home_url() ) . '" class="cndev_button">Voltar ao início</a>
';

cndev_section(
	array(
		'tag'     => 'section',
		'content' => $markup,
		'data'    => array(
			'content' => '404',
		),
	)
);
