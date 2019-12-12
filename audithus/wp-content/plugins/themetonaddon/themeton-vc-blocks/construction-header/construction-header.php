<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content"][vc_column][vc_row_inner vc_row_flex="uk-flex" css=".vc_custom_1510021171290{margin-bottom: 10px !important;}"][vc_column_inner width="1/2" vc_column_flex_auto="uk-width-expand@m"][logo logo="custom_logo" css=".vc_custom_1510023611200{margin-left: 50px !important;}" image="1697" logo_width="200px" link="url:%2Fconstruction%2F|||"][/vc_column_inner][vc_column_inner width="1/6" vc_column_flex_auto="uk-width-auto@m" css=".vc_custom_1510021255528{padding-right: 30px !important;}"][vc_custom_heading text="EMAIL" font_container="tag:p|font_size:11|text_align:left|color:%23898a95" use_theme_fonts="yes" css=".vc_custom_1509944878238{margin-top: 0px !important;margin-bottom: -10px !important;}"][vc_custom_heading text="info@next.com" font_container="tag:h3|font_size:16|text_align:left|color:%231e1f2b" use_theme_fonts="yes" link="url:mailto%3Ainfo%40next.com|||" css=".vc_custom_1509944739672{margin-top: 0px !important;margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="1/6" vc_column_flex_auto="uk-width-auto@m" css=".vc_custom_1510021087736{padding-left: 20px !important;}"][vc_custom_heading text="PHONE" font_container="tag:p|font_size:11|text_align:left|color:%23898a95" use_theme_fonts="yes" css=".vc_custom_1509944887101{margin-top: 0px !important;margin-bottom: -10px !important;}"][vc_custom_heading text="905-669-2017" font_container="tag:h3|font_size:16|text_align:left|color:%231e1f2b" use_theme_fonts="yes" link="url:tel%3A905-669-2017|||" css=".vc_custom_1509944781479{margin-top: 0px !important;margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="1/6" vc_column_flex_auto="uk-width-1-6@m"][hamburger_button display="desktop"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);