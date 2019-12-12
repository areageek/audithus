<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Vision', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-vision.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1509355415277{padding-top: 70px !important;padding-bottom: 70px !important;background-image: url(http://next.themeton.com/medical/wp-content/uploads/sites/2/2017/03/about-us-background.jpg?id=1056) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2"][vc_custom_heading text="Our vision" font_container="tag:h2|font_size:30|text_align:left|color:%23171620" use_theme_fonts="yes"][vc_column_text 0=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur massa libero, feugiat pellentesque accumsan at, posuere eget justo. Etiam sit amet nulla sed metus auctor sodales nec et est.[/vc_column_text][vc_separator css=".vc_custom_1491216949045{margin-bottom: 0px !important;padding-top: 10px !important;padding-bottom: 10px !important;}"][vc_custom_heading text="Our misson" font_container="tag:h2|font_size:30|text_align:left|color:%23171620" use_theme_fonts="yes"][vc_column_text 0=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur massa libero, feugiat pellentesque accumsan at, posuere eget justo. Etiam sit amet nulla sed metus auctor sodales nec et est.[/vc_column_text][/vc_column][vc_column width="1/2"][/vc_column][/vc_row]

CONTENT
);