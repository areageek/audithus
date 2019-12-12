<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity home content 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-home-content-1.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1493371347077{padding-top: 70px !important;padding-bottom: 100px !important;background-image: url(http://next.themeton.com/charity/wp-content/uploads/sites/5/2017/03/about1.jpg?id=1291) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column 0=""][vc_column_text 0=""]
<p style="text-align: center; color: #fa6950;">THIS MONTH RECEIVED</p>

<h1 style="text-align: center; font-size: 66px; color: #fa6950; line-height: 1;">586648 USD</h1>
[/vc_column_text][con_button alignment="center" color="rgba(0,0,0,0.01)" colortext="#fa6950" border="1" borderwidth="2px" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcharity%2Four-causes-list%2F|title:Full%20causes||"][/vc_column][/vc_row]
CONTENT
);