<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency services icon', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-services-icon.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][mungu_service_grid input_type="post" image_type="icon" count="12"][vc_row_inner css=".vc_custom_1498626331360{margin-top: 50px !important;}"][vc_column_inner][con_button alignment="center" color="#000000" colortext="#ffffff" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fagency%2Fpages%2Fcontact-us%2F|title:CONTACT%20US||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);