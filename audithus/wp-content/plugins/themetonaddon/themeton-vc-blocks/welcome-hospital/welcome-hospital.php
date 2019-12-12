<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Welcome to Next Hospital', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'welcome-hospital.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1491265358224{padding-top: 70px !important;padding-bottom: 100px !important;background-color: #e8f4f6 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="7/12"][vc_column_text css=".vc_custom_1490335447537{padding-right: 50px !important;}"]

Welcome to NEXT Hospital

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries...[/vc_column_text][con_button color="#00b092" conbutton="url:%23|title:Book%20Consultation|target:%20_blank|"][/vc_column][vc_column width="5/12"][video_player url="https://www.youtube.com/watch?v=I0ZIaAAHPUM"][/vc_column][/vc_row]
CONTENT
);