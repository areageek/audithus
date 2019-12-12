<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church footer', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-footer.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1510319796481{margin-right: 0px !important;margin-left: 0px !important;padding-right: 0px !important;padding-left: 0px !important;background-color: #3e3f43 !important;}"][vc_row vc_row_container="uk-container" css=".vc_custom_1510319787667{margin-top: 100px !important;}"][vc_column width="1/4"][logo][vc_widget_sidebar sidebar_id="footer1" el_class="top-space"][/vc_column][vc_column width="1/4"][vc_widget_sidebar sidebar_id="footer2" el_class="footer-recent-post"][/vc_column][vc_column width="1/4"][vc_widget_sidebar sidebar_id="footer3" el_class="footer_nav"][/vc_column][vc_column width="1/4"][vc_widget_sidebar sidebar_id="footer4" el_class="footer-mail"][header_container][vc_icon icon_fontawesome="fa fa-facebook-official" color="custom" size="xs" custom_color="#6a6b6f" link="url:%23|||"][vc_icon icon_fontawesome="fa fa-twitter-square" color="custom" size="xs" custom_color="#6a6b6f" link="url:%23|||"][vc_icon icon_fontawesome="fa fa-google-plus-square" color="custom" size="xs" custom_color="#6a6b6f" link="url:%23|||"][vc_icon icon_fontawesome="fa fa-youtube-square" color="custom" size="xs" custom_color="#6a6b6f" link="url:%23|||"][/header_container][/vc_column][/vc_row][vc_row vc_row_container="uk-container" css=".vc_custom_1499163937503{border-top-width: 1px !important;border-top-color: #4b4c50 !important;border-top-style: solid !important;}"][vc_column][vc_column_text css=".vc_custom_1509352421888{padding-top: 20px !important;}"]
<p style="text-align: center;">Copyright 2017. All Rights Reserved by Church</p>
[/vc_column_text][/vc_column][/vc_row][/vc_section]
CONTENT
);