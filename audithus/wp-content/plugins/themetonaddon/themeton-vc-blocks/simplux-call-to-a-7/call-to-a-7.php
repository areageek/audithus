<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative icon call to actions cta_7', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_7.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1507617847159{padding-top: 100px !important;padding-bottom: 65px !important;}"][vc_column][vc_icon icon_fontawesome="fa fa-qrcode" color="custom" background_style="rounded-less" background_color="custom" align="center" custom_color="#ffffff" custom_background_color="#141414" css=".vc_custom_1507617701465{margin-bottom: 31px !important;}"][vc_row_inner vc_row_container="uk-container"][vc_column_inner width="3/12"][/vc_column_inner][vc_column_inner width="6/12"][vc_custom_heading text="<b>Simple</b> Luxure" font_container="tag:h2|font_size:30|text_align:center|color:%23131313" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" css=".vc_custom_1508406648967{margin-bottom: 4px !important;}"][vc_column_text css=".vc_custom_1509364486788{margin-top: 20px !important;margin-bottom: 30px !important;}"]</p>
<p style="text-align: center;">It's the Bright One,  that's Simple luxure website. Simple luxure website Makes Everything Better.</p>
<p>[/vc_column_text][vc_btn title="<b>Download on App Store</b>" style="outline-custom" outline_custom_color="#ff7471" outline_custom_hover_background="#ff7471" outline_custom_hover_text="#ffffff" shape="round" size="sm" align="center" i_icon_fontawesome="fa fa-apple" add_icon="true" css=".vc_custom_1508406703588{margin-top: -15px !important;}" el_class="p_capitalize"][/vc_column_inner][vc_column_inner width="3/12"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);