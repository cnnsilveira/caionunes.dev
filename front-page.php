<?php
/**
 * Caionunes.dev
 *
 * Generates and outputs the front page template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

get_header();

get_template_part( 'template-parts/particles' );
cndev__main_tag( true );
get_template_part( 'template-parts/front-page/hero' );
get_template_part( 'template-parts/front-page/about' );
get_template_part( 'template-parts/front-page/projects' );
cndev__main_tag( false );

get_footer();
