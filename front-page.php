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

echo '<section class="cndev_particles" id="particles-js"></section><!-- .cndev_particles -->';
cndev_main_tag( true, '--front-page' );
get_template_part( 'template-parts/front-page/hero' );
get_template_part( 'template-parts/front-page/about' );
// get_template_part( 'template-parts/front-page/projects' );
cndev_main_tag( false );

get_footer();
