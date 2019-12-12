<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_9', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_9.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1509338868034{padding-top: 80px !important;padding-bottom: 65px !important;background: #141414 url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/10/^B1CBFCACBCCA62CCE2057FFBF3337541F131FFF6CA37F86AC1^pimgpsh_fullsize_distr.png?id=3656) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3" css=".vc_custom_1509339007030{padding-bottom: 400px !important;}"][vc_custom_heading text="The Right Simplux luxure<br />
at the Right Time" font_container="tag:h2|font_size:35|text_align:center|color:%23ffffff|line_height:1.3" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1509364944430{margin-top: -40px !important;margin-bottom: 4px !important;}" el_class="font24@s"][vc_btn title="<b>Buy on app store</b>" style="classic" shape="round" color="white" size="sm" align="center" i_icon_fontawesome="fa fa-apple" add_icon="true" css=".vc_custom_1507621668588{padding-top: 30px !important;padding-bottom: -10px !important;}"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);