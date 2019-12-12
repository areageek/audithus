<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_4', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_4.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" vc_row_overlay="yes" vc_row_overlay_color="rgba(0,0,0,0.4)" css=".vc_custom_1508471100109{margin-top: 100px !important;margin-bottom: 100px !important;padding-top: 50px !important;background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/05/mountain.jpg?id=2403) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3" css=".vc_custom_1507615455156{padding-bottom: 50px !important;}"][vc_custom_heading text="Simple Building a Better Now" font_container="tag:h2|font_size:42|text_align:center|color:%23ffffff|line_height:1" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1508405747164{margin-top: -10px !important;padding-bottom: 15px !important;}"][vc_row_inner 0=""][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text 0=""]</p>
<p style="text-align: center;">We Liked The Simple luxure website So Much, I Bought The Company!</p>
<p>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][vc_btn title="get started for $150" shape="round" color="blue" align="center"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);