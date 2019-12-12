<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical News & Opinion', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-news.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491267326951{padding-top: 70px !important;}"][vc_column][vc_custom_heading text="News & Opinion" font_container="tag:h2|font_size:30|text_align:center|line_height:1" use_theme_fonts="yes" link="url:http%3A%2F%2Fdemo.themeton.com%2Fmedical%2Fservice-item%2Fgynecology%2F|||" css=".vc_custom_1491267291660{margin-bottom: 0px !important;}"][con_post categories="home-posts" count="3" style="4" ratio="2x1" excerpts="" pagination=""][/vc_column][/vc_row]
CONTENT
);