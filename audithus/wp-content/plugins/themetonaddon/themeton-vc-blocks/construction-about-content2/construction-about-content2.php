<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction about content2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-about-content2.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1496842221995{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column width="1/4"][/vc_column][vc_column width="1/2"][vc_row_inner vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex" vc_row_themeton="yes"][vc_column_inner width="1/3" css=".vc_custom_1496835047528{margin-right: -35px !important;}"][vc_column_text css=".vc_custom_1496835137511{margin-right: -50px !important;}"]
<h5 style="color: #968aff; text-align: right; font-size: 22px;"><strong style="font-family: 'arial'; line-height: 1;">100%</strong>
CLIENT SATISFACTION</h5>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][vc_single_image image="1402" alignment="center"][/vc_column_inner][vc_column_inner width="1/3"][vc_column_text css=".vc_custom_1509948267041{margin-left: -50px !important;}"]
<h5 style="text-align: left; font-size: 24px; text-decoration: underline; line-height: 1;"><a style="color: #f54983;" href="#">Start
Your project</a></h5>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT
);