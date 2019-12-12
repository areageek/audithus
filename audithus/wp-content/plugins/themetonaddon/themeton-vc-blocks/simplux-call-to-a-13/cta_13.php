<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_13', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_13.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" css=".vc_custom_1508726884061{padding-top: 50px !important;padding-bottom: 50px !important;background-color: #2b47e6 !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/6"][vc_custom_heading text="It’s the Bright One, that’s Simple luxure website. Simple luxure website Makes Everything Better." font_container="tag:h2|font_size:26|text_align:center|color:%23ffffff|line_height:1.2" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1509369413791{padding-top: 5px !important;}" el_class="font24@s"][/vc_column][vc_column width="1/6" el_class="align_c@s"][vc_btn title="get started" style="custom" custom_background="#ffffff" custom_text="#2b47e6" size="sm" align="right" el_class="p_capitalize align_c@s"][/vc_column][vc_column width="1/6" el_class=" align_c@s"][vc_btn title="learn more" style="outline" color="white" size="sm" el_class="p_capitalize"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);