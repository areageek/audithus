<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex" vc_row_themeton="yes" css=".vc_custom_1509943094345{padding-top: 100px !important;padding-bottom: 100px !important;background-image: url(http://next.themeton.com/construction/wp-content/uploads/sites/8/2017/05/Layer-2.jpg?id=1275) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="page-title"][vc_column vc_column_flex_auto="uk-width-expand" vc_column_valignment="uk-flex-middle" vc_column_alignment="uk-flex uk-flex-center" vc_column_themeton="yes"][page_title fontfamily="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" color="#ffffff" font_size="64px" line_height="1" text_align="center"][/vc_column][/vc_row]
CONTENT
);