<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model about calltoaction', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-about-calltoaction.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1500362916167{background-color: #fff5da !important;}"][vc_column 0=""][vc_custom_heading text="VIEW PORTFOLIO" font_container="tag:h1|font_size:130px|text_align:center|color:%23feebb8" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1500363501935{margin-top: -40px !important;}"][vc_btn title="CHECK PORTFOLIO" shape="square" color="white" size="lg" align="center" el_class="model_btn" css=".vc_custom_1510209705464{margin-top: 100px !important;margin-bottom: 100px !important;}" link="url:http%3A%2F%2Fnext.themeton.com%2Fmodel%2Fgallery-2%2F|||"][/vc_column][/vc_row]

CONTENT
);