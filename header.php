<?php
/**
 * caionunes.dev
 *
 * This file generates the theme header.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
		<title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <?php wp_head(); ?>
		
    </head>
    <body <?php body_class();?>>