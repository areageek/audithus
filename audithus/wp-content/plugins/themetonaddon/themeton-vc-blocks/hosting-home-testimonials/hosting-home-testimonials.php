<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting home testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-home-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1499514519263{padding-bottom: 100px !important;}"][vc_column][vc_custom_heading text="Client Testimonials" font_container="tag:h2|font_size:30px|text_align:center|color:%23000000|line_height:30px" use_theme_fonts="yes" css=".vc_custom_1500191490213{margin-bottom: 35px !important;padding-top: 40px !important;}" el_class="uk-text-capitalize"][mungu_content_testimonial input_type="post" arrows="hide" excerpt_length="35" count="3"][/vc_column][/vc_row]

CONTENT
);