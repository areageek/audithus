<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1500534996895{border-top-width: 1px !important;border-bottom-width: 1px !important;background-color: #ffffff !important;border-top-color: #f3f3f3 !important;border-top-style: solid !important;border-bottom-color: #f3f3f3 !important;border-bottom-style: solid !important;}" el_class="model-page-title"][vc_column][vc_custom_heading source="post_title" font_container="tag:h1|font_size:160px|text_align:center|color:%23fac01e" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1500882231800{margin-top: 77px !important;}"][/vc_column][/vc_row]
CONTENT
);