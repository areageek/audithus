<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_attr__( 'Content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'content-9.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" css=".vc_custom_1493783527090{margin-right: 0px !important;margin-bottom: 60px !important;margin-left: 0px !important;background-color: #292b31 !important;}"][vc_column width="1/2" css=".vc_custom_1500448228944{background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/04/blog-07.jpg?id=2104) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_empty_space height="400px"][/vc_column][vc_column width="1/2" css=".vc_custom_1491902836163{padding-top: 120px !important;padding-right: 250px !important;padding-bottom: 120px !important;padding-left: 100px !important;}" el_class="text-white"][vc_custom_heading text="What Design for Kenneth Sheckler’s." font_container="tag:h2|font_size:44px|text_align:right|color:%23ffffff|line_height:54px" use_theme_fonts="yes"][vc_column_text el_class="uk-text-right"]Proactively develop reliable users and intermandated systems. Essentials for procrastinate corporate experiences vis-a-vis multidisciplinary.[/vc_column_text][con_button alignment="right" conbutton="url:http%3A%2F%2Fexample.com|title:Visit%20Here||"][/vc_column][/vc_row]
CONTENT
);