<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency home blog', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-home-blog.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1494590575164{padding-top: 90px !important;padding-bottom: 90px !important;}"][vc_column][vc_custom_heading text="From Our blog" font_container="tag:h2|font_size:28|text_align:center|color:%230c0c0c|line_height:0" use_theme_fonts="yes" el_class="uk-text-bold uk-text-uppercase"][con_post count="3" style="4" hover_style="thumb_backound" pagination=""][/vc_column][/vc_row]	
CONTENT
);