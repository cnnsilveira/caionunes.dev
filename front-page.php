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

echo '<main>';
get_template_part( 'template-parts/front-page/hero' );
get_template_part( 'template-parts/front-page/content' );
echo '</main>';

get_footer();
