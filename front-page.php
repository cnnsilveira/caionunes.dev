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

if ( cndev__is_admin() ) {
	get_template_part( 'template-parts/front-page/projects' );
	get_template_part( 'template-parts/front-page/contact' );
} else {
	cndev__section(
		array(
			'tag'     => 'section',
			'title'   => 'Work in progress...',
			'content' => '
				<div class="cndev__wip">
					<span>I\'m cooking up some digital magic behind the scenes. Stay tuned for the grand unveiling!</span>
					<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
					<svg width="350px" height="350px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
					
					<defs>
					
					<style>.cls-1{fill:#dd5891;}.cls-2{fill:#f0f4f7;}.cls-3{fill:#748a95;}.cls-4{fill:#617880;}.cls-5{fill:#efc89d;}</style>
					
					</defs>
					
					<g id="Magician">
					
					<path class="cls-1" d="M43.78,51.76a7.19,7.19,0,1,1,11.12-6h0a7.17,7.17,0,0,1-3.25,6l-3.93,1.62Z" id="path327974-7"/>
					
					<path class="cls-2" d="M13.74,48.42a15,15,0,0,0-3.58,5.17c-.53,1.26.61,2.41,2,2.41h25c1.37,0,2.51-1.15,2-2.41a15.08,15.08,0,0,0-3.58-5.17Z" id="path57980-6-6"/>
					
					<path class="cls-3" d="M25.63,52.9A9.29,9.29,0,0,0,28.1,52C33.47,49.31,38,48.2,38,45a9,9,0,0,0-3.76-7H15a9,9,0,0,0-3.76,7c0,3.25,4.55,4.36,9.93,7.06a9.3,9.3,0,0,0,2.46.88l1-1Z" id="path56511-7-5"/>
					
					<path class="cls-4" d="M24.63,46.82a1,1,0,0,0-1,1v5.07a5.38,5.38,0,0,0,2,0V47.82A1,1,0,0,0,24.63,46.82Z" id="path61228-9-9"/>
					
					<path class="cls-5" d="M34.57,35.45a17.39,17.39,0,0,1-.85,4.6c-1.64,4.12-5.1,7.77-9.09,7.77s-7.44-3.65-9.08-7.77a16.62,16.62,0,0,1-.85-4.6l9.93-2.64Z" id="path41635-0-4"/>
					
					<path class="cls-1" d="M30.73,8a1.06,1.06,0,0,0-.35.09l-4.56,2.06a10.94,10.94,0,0,0-5.36,5.31L15.57,26l9.05,2.47L33.67,26l-4.8-10.18a3.32,3.32,0,0,1,.56-3.65L31.6,9.79A1.06,1.06,0,0,0,30.73,8Z" id="rect49460-5-5"/>
					
					<path class="cls-2" d="M15.57,26l-2.39,5.14,11.45,2,11.46-2L33.67,26Z" id="path54734-5-6"/>
					
					<path class="cls-3" d="M27.19,28.54A2.57,2.57,0,1,1,24.62,26,2.57,2.57,0,0,1,27.19,28.54Z" id="path54838-4-9"/>
					
					<path class="cls-1" d="M9.16,34a4.33,4.33,0,0,1,4.1-2.89H36A4.34,4.34,0,0,1,40.11,34a1.16,1.16,0,0,1-1.23,1.45H10.39A1.15,1.15,0,0,1,9.16,34Z" id="rect40308-61-3"/>
					
					<path class="cls-3" d="M44.68,51.52h6.07a1.87,1.87,0,0,1,1.87,1.87v.74A1.87,1.87,0,0,1,50.75,56H44.68a1.86,1.86,0,0,1-1.87-1.87v-.74A1.87,1.87,0,0,1,44.68,51.52Z" id="rect328161-5"/>
					
					<path class="cls-2" d="M51.49,45.87a1,1,0,0,0,0,2,1,1,0,0,0,0-2Z" id="path329365"/>
					
					<path class="cls-2" d="M45.17,44.22a1,1,0,1,0,1,1A1,1,0,0,0,45.17,44.22Z" id="path329510"/>
					
					<path class="cls-1" d="M51.39,33.26a1,1,0,0,0-.7.29,1,1,0,0,0,0,1.41l.24.25-.24.24a1,1,0,0,0,0,1.42,1,1,0,0,0,1.41,0l.25-.25.24.25a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.41l-.25-.25L54,35a1,1,0,0,0,0-1.41,1,1,0,0,0-1.42,0l-.24.25-.25-.25A1,1,0,0,0,51.39,33.26Z" id="path156269"/>
					
					<path class="cls-1" d="M44.7,29.61a1,1,0,0,0-1,1V31h-.34a1,1,0,1,0,0,2h.34v.35a1,1,0,0,0,2,0V33h.35a1,1,0,0,0,0-2H45.7v-.34A1,1,0,0,0,44.7,29.61Z" id="path156267"/>
					
					<path class="cls-1" d="M49.83,24.2a1,1,0,0,0-.7.29,1,1,0,0,0,0,1.42l.24.24-.24.25a1,1,0,0,0,1.41,1.41l.25-.24.24.24a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.41l-.25-.25.25-.24A1,1,0,0,0,51,24.49l-.24.25-.25-.25A1,1,0,0,0,49.83,24.2Z" id="path329545"/>
					
					</g>
					
					</svg>
				</div>
			',
			'data'    => array(
				'content' => 'dev',
			),
		)
	);
	?>
	
	<style>
		.cndev__section[data-content="dev"] .cndev__section--title {
			margin-bottom: 30px;
		}
		.cndev__section[data-content="dev"] .cndev__wip {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			gap: 20px;
			font-size: 20px;
		}
		/**/
	</style>
	
	<?php
}
cndev__main_tag( false );

get_footer();
