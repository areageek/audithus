<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex" vc_row_height="200px" vc_row_themeton="yes" el_class="page-title uk-flex-center" css=".vc_custom_1509789108443{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column vc_column_text_alignment="uk-text-center" vc_column_valignment="uk-flex uk-flex-middle" vc_column_alignment="uk-flex uk-flex-around" vc_column_height="200px" vc_column_themeton="yes"][page_title default_font="yes" color="#ffffff" font_size="50px" text_align="center" extra_class="mb0"][/vc_column][/vc_row]
CONTENT
);