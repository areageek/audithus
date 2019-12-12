<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate 404', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-404.jpg',
	'cat_display_name' => '404',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1510749969553{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/2"][vc_single_image image="2236" img_size="large"][/vc_column][vc_column width="1/2" css=".vc_custom_1510750037625{padding-top: 20px !important;}"][vc_column_text]
<h1 style="font-family: Poppins; font-size: 230px; text-align: center;">404</h1>
[/vc_column_text][vc_column_text css=".vc_custom_1510749914860{margin-top: 100px !important;}"]
<p style="font-size: 43px; font-family: Poppins; text-align: center;"><strong style="color: #f54983;">Oops</strong>, This page not found</p>
[/vc_column_text][con_button alignment="center" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Frealestate%2F|title:BACK%20TO%20HOME||" css=".vc_custom_1510750006298{margin-top: 40px !important;}"][/vc_column][/vc_row]
CONTENT
);