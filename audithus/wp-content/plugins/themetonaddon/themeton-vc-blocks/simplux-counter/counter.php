<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Counter', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'counter.jpg',
	'cat_display_name' => 'counters',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="middle" parallax="content-moving-fade" parallax_speed_bg="2" vc_row_overlay="yes" vc_row_overlay_color="rgba(71,174,137,0.3)" vc_row_overlay_alpha="0.6" css=".vc_custom_1500445838876{padding-top: 100px !important;padding-bottom: 120px !important;background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/07/jay-wennington-373-min.jpg?id=2084) !important;}"][vc_column][con_counter size="3" list="%5B%7B%22layout%22%3A%22icon%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22number%22%3A%221980m%22%2C%22body%22%3A%22Credibly%20reintermediate%20revolutionary%20testing%20%20procedures%20with%20revolutionary.%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22number%22%3A%22%243450%22%2C%22body%22%3A%22Credibly%20reintermediate%20revolutionary%20testing%20%20procedures%20with%20revolutionary.%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22number%22%3A%22150k%22%2C%22body%22%3A%22Credibly%20reintermediate%20revolutionary%20testing%20%20procedures%20with%20revolutionary.%22%7D%5D" extra_class="text-white"][/vc_column][/vc_row]
CONTENT
);