<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity home content 3', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-home-content-3.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1509767611175{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #eeeeee !important;}"][vc_column 0=""][vc_column_text]
<h2 style="color: #000;">NEWS &amp; EVENTS</h2>
[/vc_column_text][vc_row_inner 0="" css=".vc_custom_1498025603138{margin-top: -50px !important;}"][vc_column_inner 0=""][con_post count="3" style="4" pagination=""][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);