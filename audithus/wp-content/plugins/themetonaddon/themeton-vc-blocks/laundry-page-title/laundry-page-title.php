<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" el_class="page-title" css=".vc_custom_1510040424029{background-image: url(http://next.themeton.com/laundry/wp-content/uploads/sites/10/2017/03/page-title2.png?id=1861) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}"][vc_column vc_column_text_alignment="uk-text-center" vc_column_themeton="yes"][vc_custom_heading source="post_title" font_container="tag:h1|font_size:39px%20|text_align:center|color:%231e1f2b" use_theme_fonts="yes" css=".vc_custom_1510040397239{margin-bottom: 5px !important;padding-top: 130px !important;padding-bottom: 80px !important;}" el_class="uk-text-bold uk-text-uppercase career"][/vc_column][/vc_row]
CONTENT
);