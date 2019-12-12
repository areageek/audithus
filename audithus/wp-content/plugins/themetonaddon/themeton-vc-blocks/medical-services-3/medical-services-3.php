<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Services 3 Column', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-services-3.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Medical Specilistes" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][vc_column_text css=".vc_custom_1491268125030{margin-bottom: 10px !important;}"]
<p style="text-align: center; margin: 0; font-weight: 500;">Dedicated Doctors</p>

[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][mungu_service_grid input_type="post" count="9" pager="yes"][/vc_column][/vc_row][vc_row css=".vc_custom_1491365051010{padding-top: 40px !important;padding-bottom: 70px !important;}"][vc_column][con_button alignment="center" color="#00b092" conbutton="url:http%3A%2F%2Fdemo.themeton.com%2Fmedical%2F|title:get%20in%20appointment||rel:nofollow"][/vc_column][/vc_row]
CONTENT
);