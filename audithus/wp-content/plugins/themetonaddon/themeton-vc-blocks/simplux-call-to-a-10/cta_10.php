<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative with icon call to actions cta_10', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_10.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1507623902070{padding-top: 100px !important;padding-bottom: 65px !important;}"][vc_column][vc_custom_heading text="get started" font_container="tag:h2|font_size:14|text_align:center|color:%23131313" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal" el_class="uppercase" css=".vc_custom_1507622420618{padding-top: 5px !important;}"][vc_custom_heading text="Do it with Your simple web." font_container="tag:h2|font_size:42|text_align:center|color:%23131313|line_height:1" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1509366534289{margin-top: -10px !important;padding-bottom: 15px !important;}" el_class="font24@s"][vc_row_inner][vc_column_inner width="1/3"][vc_icon type="entypo" icon_entypo="entypo-icon entypo-icon-thumbs-up" color="custom" size="xl" align="right" custom_color="#e0e4e5" el_class="font30 align_c@s" css=".vc_custom_1509367290285{padding-right: 20px !important;}"][vc_btn title="<b>download</b>" style="outline-custom" outline_custom_color="#5865f4" outline_custom_hover_background="#919af5" outline_custom_hover_text="#ffffff" size="sm" align="right" el_class="align_c@s"][/vc_column_inner][vc_column_inner width="1/3"][vc_icon icon_fontawesome="fa fa-apple" color="custom" size="xl" align="center" custom_color="#e0e4e5" el_class="font30 align_c@s"][vc_btn title="<b>download</b>" style="outline-custom" outline_custom_color="#5865f4" outline_custom_hover_background="#919af5" outline_custom_hover_text="#ffffff" size="sm" align="center" el_class="align_c@s align_c@s"][/vc_column_inner][vc_column_inner width="1/3"][vc_icon icon_fontawesome="fa fa-windows" color="custom" size="xl" custom_color="#e0e4e5" el_class="font30 align_c@s" css=".vc_custom_1509366469226{padding-left: 20px !important;}"][vc_btn title="<b>download</b>" style="outline-custom" outline_custom_color="#5865f4" outline_custom_hover_background="#919af5" outline_custom_hover_text="#ffffff" size="sm" align="left" el_class="align_c@s"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);