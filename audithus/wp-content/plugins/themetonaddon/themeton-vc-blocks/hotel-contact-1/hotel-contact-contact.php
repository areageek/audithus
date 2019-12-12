<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel contact contact', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-contact-contact.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1492576078448{padding-top: 10px !important;padding-bottom: 95px !important;}"][vc_column][vc_custom_heading text="Message Us" font_container="tag:h2|font_size:30|text_align:center|color:%23000000" use_theme_fonts="yes"][contact-form-7 id="733"][/vc_column][/vc_row]
CONTENT
);