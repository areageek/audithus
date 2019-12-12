<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model contract form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-contract-form.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1500369318094{margin-bottom: 100px !important;border-top-width: 1px !important;border-top-color: #e2e9ea !important;border-top-style: solid !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_custom_heading text="Message Me" font_container="tag:h1|font_size:51|text_align:center" use_theme_fonts="yes" css=".vc_custom_1500882054225{margin-top: 50px !important;}"][contact-form-7 id="733"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]

CONTENT
);