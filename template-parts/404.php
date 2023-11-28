<?php

$markup = '
		<a href="' . esc_url( home_url() ) . '" class="cndev__button">Voltar ao início</a>
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
