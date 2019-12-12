<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Frequently', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-frequently.jpg',
	'cat_display_name' => 'faqs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Frequently Asked Questions" font_container="tag:h3|font_size:30px|text_align:center|line_height:32px" use_theme_fonts="yes" css=".vc_custom_1490670610854{margin-bottom: 0px !important;}"][vc_column_text]
<p style="text-align: center;">Most wanted questions &amp; answers</p>
[/vc_column_text][mungu_faq image="515"][/vc_column][/vc_row]
CONTENT
);