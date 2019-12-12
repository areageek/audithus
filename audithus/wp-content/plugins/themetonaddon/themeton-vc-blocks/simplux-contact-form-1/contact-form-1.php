<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( ' contact  form-1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'contact-form-1.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1503634249942{padding-top: 80px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_column][vc_custom_heading text="Contact Me" font_container="tag:h2|font_size:40px|text_align:left|line_height:48px" use_theme_fonts="yes"][vc_column_text]
	
	Proactively develop reliable users and intermandated systems.
	Enthusiastically procrastinate corporate experiences.
	
	[/vc_column_text][contact-form-7 id="715"][/vc_column][/vc_row]
CONTENT
);
