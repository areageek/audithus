<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel home clients slider', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-home-clients-slider.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1492577953883{padding-top: 60px !important;padding-bottom: 10px !important;background-color: #ffffff !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;border-radius: 1px !important;}"][vc_column 0=""][vc_custom_heading text="Happy Clients" font_container="tag:h2|font_size:30|text_align:center" use_theme_fonts="yes"][mungu_content_testimonial input_type="post" arrows_position="middle" qoute="none" rating="show" bullets="hide" excerpt_length="25"][/vc_column][/vc_row]
CONTENT
);