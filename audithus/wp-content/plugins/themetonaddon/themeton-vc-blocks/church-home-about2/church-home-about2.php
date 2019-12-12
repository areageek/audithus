<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church home about 2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-home-about2.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" equal_height="yes" el_class="church-about" css=".vc_custom_1498098148909{margin-top: 100px !important;}"][vc_column width="1/12"][/vc_column][vc_column width="10/12" css=".vc_custom_1498037908112{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #c5841e !important;}"][vc_row_inner vc_row_container="uk-container" vc_row_themeton="yes" css=".vc_custom_1498105004625{padding-top: 30px !important;}"][vc_column_inner 0=""][vc_custom_heading text="ABOUT US" font_container="tag:h2|font_size:30|text_align:center|color:%23ffffff" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1498098281182{margin-bottom: 20px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/12" css=".vc_custom_1498037925769{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #c5841e !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1498105120572{margin-top: -283px !important;}"][vc_column 0=""][mungu_service_bordered style="mungu-style-church" count="3" excerpt_length="8"][/vc_column][/vc_row]
CONTENT
);