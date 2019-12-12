<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative background-image call to actions cta_8', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_8.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" vc_row_overlay="yes" vc_row_overlay_color="rgba(0,0,0,0.46)" css=".vc_custom_1508483334448{padding-top: 40px !important;padding-bottom: 65px !important;background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/07/about-me-bg.jpg?id=2119) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_icon icon_fontawesome="fa fa-qrcode" color="custom" background_style="rounded-less" background_color="custom" size="lg" align="center" custom_color="#ffffff"][vc_row_inner vc_row_container="uk-container"][vc_column_inner width="3/12"][/vc_column_inner][vc_column_inner width="6/12"][vc_custom_heading text="<b>Simple</b> Luxure" font_container="tag:h2|font_size:30|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1508483188879{margin-top: -30px !important;margin-bottom: 25px !important;}"][vc_column_text css=".vc_custom_1509364745108{margin-top: 20px !important;margin-bottom: 40px !important;}"]</p>
<p style="text-align: center;">It's the Bright One,  that's Simple luxure website. Simple luxure website Makes Everything Better.</p>
<p>[/vc_column_text][vc_btn title="<b>Apple Store</b>" style="outline-custom" outline_custom_color="#ffffff" outline_custom_hover_background="#ffffff" outline_custom_hover_text="#ffffff" size="sm" align="center" i_icon_fontawesome="fa fa-mobile" add_icon="true" css=".vc_custom_1509364725526{margin-top: -15px !important;}" el_class="apple_bttn"][/vc_column_inner][vc_column_inner width="3/12"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);