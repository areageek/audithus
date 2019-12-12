<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Next Medical Testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-testimonail.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1490344768477{padding-top: 60px !important;padding-bottom: 90px !important;}"][vc_column][vc_custom_heading text="Testimonials" font_container="tag:h2|font_size:30|text_align:center" use_theme_fonts="yes"][mungu_content_testimonial input_type="post" arrows="hide" excerpt_length="42" count="3" post_type="testimonials"][/vc_column][/vc_row]
CONTENT
);