<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_15', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_15.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1508729957996{margin-top: 100px !important;margin-bottom: 65px !important;border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 20px !important;padding-bottom: 30px !important;border-left-color: #f3f3f3 !important;border-left-style: solid !important;border-right-color: #f3f3f3 !important;border-right-style: solid !important;border-top-color: #f3f3f3 !important;border-top-style: solid !important;border-bottom-color: #f3f3f3 !important;border-bottom-style: solid !important;border-radius: 15px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][vc_icon icon_fontawesome="fa fa-slack" color="custom" size="xl" align="center" custom_color="#bbc5c7" css=".vc_custom_1508128039153{margin-bottom: 0px !important;}"][vc_custom_heading text="connect with slack" font_container="tag:h2|font_size:28|text_align:center|color:%23232323" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" el_class="uppercase p_capitalize" css=".vc_custom_1508128360568{padding-top: 0px !important;}"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text css=".vc_custom_1508128000204{margin-bottom: 30px !important;}"]</p>
<p style="text-align: center;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
<p>[/vc_column_text][vc_btn title="get started" style="outline" color="primary" size="sm" align="center"][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);