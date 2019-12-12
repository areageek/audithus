<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model about testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-about-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1500433694915{margin-top: 100px !important;margin-bottom: 70px !important;border-top-width: 1px !important;border-top-color: #ededed !important;border-top-style: solid !important;}"][vc_column width="1/12"][/vc_column][vc_column width="5/6"][vc_custom_heading text="Testimonials" font_container="tag:h1|font_size:51px|text_align:center|color:%23000000" use_theme_fonts="yes" css=".vc_custom_1500433655154{margin-top: 60px !important;margin-bottom: 30px !important;}"][mungu_content_testimonial input_type="post" arrows="hide" qoute="none" rating="show" bullets="hide" theme_type="center_modern" excerpt_length="50" count="3"][/vc_column][vc_column width="1/12"][/vc_column][/vc_row]

CONTENT
);