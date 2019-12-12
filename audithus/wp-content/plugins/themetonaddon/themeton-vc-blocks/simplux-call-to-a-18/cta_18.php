<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_18', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_18.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1508137736693{padding-top: 60px !important;padding-bottom: 85px !important;background-color: #141414 !important;}"][vc_column 0=""][vc_custom_heading text="Simple free better than best" font_container="tag:h2|font_size:42|text_align:center|color:%23fcfcfc|line_height:1" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1509371181954{padding-bottom: 15px !important;}" el_id="font30@s"][vc_row_inner 0=""][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][vc_column_text 0=""]</p>
<p style="text-align: center;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
<p>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1508137617114{margin-top: 20px !important;}"][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="1/6"][vc_btn title="twitter" style="outline" shape="round" color="info" size="lg" align="center" i_icon_fontawesome="fa fa-twitter" add_icon="true"][/vc_column_inner][vc_column_inner width="1/6"][vc_btn title="facebook" style="outline" shape="round" color="blue" size="lg" align="center" i_icon_fontawesome="fa fa-facebook-official" add_icon="true"][/vc_column_inner][vc_column_inner width="1/6"][vc_btn title="google" style="outline" shape="round" color="danger" size="lg" align="center" i_icon_fontawesome="fa fa-google-plus" add_icon="true"][/vc_column_inner][vc_column_inner width="1/6"][vc_btn title="dribbble" style="outline" shape="round" color="purple" size="lg" align="center" i_icon_fontawesome="fa fa-dribbble" add_icon="true"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);