<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church about vision', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-about-vision.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510595747932{margin-bottom: 80px !important;border-top-width: 1px !important;padding-top: 50px !important;border-top-color: #dbd7d6 !important;border-top-style: solid !important;}"][vc_column][vc_custom_heading text="OUR VISIONS" font_container="tag:h1|font_size:30|text_align:center|color:%231e1818" google_fonts="font_family:Playfair%20Display%20SC%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" el_class="mvb0" css=".vc_custom_1499408570826{margin-bottom: 30px !important;}"][mungu_service_grid input_type="post" count="3" extra_class="church-about"][/vc_column][/vc_row]
CONTENT
);