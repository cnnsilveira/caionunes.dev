<?php
/**
 * caionunes.dev
 *
 * Generates the theme front page template
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

function cndev_front_page() {

    get_header();
    ?>

        <section id="front-page-hero">

            <div id="hero-content">

                <h1>Hello, world</h1>


            </div>

        </section>
        <main>
            <section>
                <p style="color: #000;">Dummy content</p>
            </section>

        </main>

    <?
    get_footer();

}