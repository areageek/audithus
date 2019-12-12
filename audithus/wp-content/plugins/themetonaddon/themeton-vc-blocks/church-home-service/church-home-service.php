<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church home service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-home-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" equal_height="yes" css=".vc_custom_1498115851166{margin-top: 61px !important;}"][vc_column width="1/12" css=".vc_custom_1498115800681{background-color: #3b3c42 !important;}"][/vc_column][vc_column width="10/12" css=".vc_custom_1498115813016{background-color: #3b3c42 !important;}"][vc_row_inner vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes" css=".vc_custom_1498200748466{padding-top: 60px !important;padding-bottom: 27px !important;}"][vc_column_inner][vc_custom_heading text="UPCOMING EVENTS" font_container="tag:h2|font_size:30|text_align:center|color:%23ffffff" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1498115961887{margin-bottom: 20px !important;}"][/vc_column_inner][/vc_row_inner][vc_row_inner vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes"][vc_column_inner][mungu_events style="2" columns="1" category="events" count="4" email="info@next.com"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/12"][/vc_column][/vc_row]
CONTENT
);