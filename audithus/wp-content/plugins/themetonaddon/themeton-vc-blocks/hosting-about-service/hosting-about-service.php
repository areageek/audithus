<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting about service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-about-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510562948357{padding-top: 70px !important;padding-bottom: 100px !important;background-color: #f0f9fc !important;}"][vc_column][vc_custom_heading text="Popular Hosting" font_container="tag:h2|font_size:30px|text_align:center|color:%23181620" use_theme_fonts="yes" css=".vc_custom_1510562961247{margin-bottom: 35px !important;}"][carousel_anythings slidetype="posttype" post_type="service" ratio="1x1" excerpt_length="13" items_tablet="3" thumbnails="true" arrow_show="false"][vc_row_inner 0=""][vc_column_inner 0=""][/vc_column_inner][/vc_row_inner][vc_row_inner 0=""][vc_column_inner 0=""][/vc_column_inner][/vc_row_inner][vc_row_inner 0=""][vc_column_inner 0=""][/vc_column_inner][/vc_row_inner][/carousel_anythings][/vc_column][/vc_row]
CONTENT
);