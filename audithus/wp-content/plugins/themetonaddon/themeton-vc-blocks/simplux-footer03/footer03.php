<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Footer layout 3', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'footer-03.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row][vc_column][vc_column_text css=".vc_custom_1507618112292{margin-bottom: 0px !important;}"]
<p style="text-align: center">SIMPLUX Portfolio Theme. All Right Reserved. 2017</p>
[/vc_column_text][/vc_column][/vc_row]
CONTENT
);