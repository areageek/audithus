<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative simplux content-2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'content-2.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row equal_height="yes" content_placement="middle" css=".vc_custom_1491897665548{margin-right: 0px !important;margin-bottom: 100px !important;margin-left: 0px !important;}"][vc_column width="1/2" css=".vc_custom_1500447900663{background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/04/blog-04.jpg?id=2109) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_empty_space height="400px"][/vc_column][vc_column width="1/2" css=".vc_custom_1491897444084{padding-top: 35px !important;padding-right: 0px !important;padding-left: 35px !important;}"][vc_custom_heading text="What Design for Kenneth Sheckler’s." font_container="tag:h2|font_size:44px|text_align:right|line_height:54px" use_theme_fonts="yes"][vc_column_text el_class="uk-text-right"]Proactively develop reliable users and intermandated systems. Essentials for procrastinate corporate experiences vis-a-vis multidisciplinary.[/vc_column_text][con_button alignment="right" conbutton="url:http%3A%2F%2Fexample.com|title:Visit%20Here||"][/vc_column][/vc_row]
CONTENT
);