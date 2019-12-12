<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction home content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-home-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes" css=".vc_custom_1496839185639{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][vc_custom_heading text="Latest news" font_container="tag:h2|font_size:34|text_align:center" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" link="url:http%3A%2F%2Fnext.themeton.com%2Fconstruction%2Fblog%2F|title:Happy%20Clients||"][vc_row_inner css=".vc_custom_1510049043264{padding-top: 30px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1496839998432{padding-top: 30px !important;}"][con_post categories="new" count="1" pagination=""][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1510049484349{padding-top: 30px !important;}"][con_post count="2" style="8" ratio="1x1" pagination=""][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);