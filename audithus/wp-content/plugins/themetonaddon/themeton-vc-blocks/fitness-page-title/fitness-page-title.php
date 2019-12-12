<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'fitness page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'fitness-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex" vc_row_height="300px" vc_row_themeton="yes" css=".vc_custom_1501061402986{background-image: url(http://next.themeton.com/fitness/wp-content/uploads/sites/9/revslider/home/image.jpg?id=1151) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column vc_column_flex_auto="uk-width-expand" vc_column_valignment="uk-flex-bottom" vc_column_alignment="uk-flex uk-flex-center" vc_column_height="100%" vc_column_themeton="yes" css=".vc_custom_1496740728910{padding-bottom: 0px !important;}"][vc_custom_heading source="post_title" font_container="tag:h1|font_size:84|text_align:center|color:%23ffffff|line_height:1" google_fonts="font_family:Sintony%3Aregular%2C700|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1510050842832{margin-bottom: -14px !important;}" el_class="letter-spacing-1"][/vc_column][/vc_row]
CONTENT
);