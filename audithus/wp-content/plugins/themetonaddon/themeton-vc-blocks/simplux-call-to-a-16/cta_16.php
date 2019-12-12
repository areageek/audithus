<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_16', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_16.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1509370202197{margin-top: 50px !important;margin-bottom: 50px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #ededce !important;}"][vc_column 0=""][vc_row_inner equal_height="yes" content_placement="middle" vc_row_container="uk-container"][vc_column_inner width="1/2"][vc_custom_heading text="Follow us on socials " font_container="tag:h2|font_size:26|text_align:center|color:%23000000|line_height:1.2" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1508131343037{padding-top: 5px !important;}"][/vc_column_inner][vc_column_inner el_class="text_align_right align_c@s" width="1/4"][vc_btn title="<b>follow @twittuser</b>" style="outline" color="peacoc" size="sm" i_icon_fontawesome="fa fa-twitter" add_icon="true" el_class="p_capitalize"][/vc_column_inner][vc_column_inner el_class="align_c@s" width="1/4"][vc_btn title="<b>follow on facebook</b>" style="outline" color="blue" size="sm" i_icon_fontawesome="fa fa-facebook-official" add_icon="true" el_class="p_capitalize"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);