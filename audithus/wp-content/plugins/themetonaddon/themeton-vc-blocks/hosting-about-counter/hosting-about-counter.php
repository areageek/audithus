<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting about counter', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-about-counter.jpg',
	'cat_display_name' => 'counters',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_row_inner css=".vc_custom_1510562463218{margin-top: -30px !important;padding-left: 15px !important;}"][vc_column_inner css=".vc_custom_1499330663212{padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][con_counter align="1" list="%5B%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2225000%2B%22%2C%22body%22%3A%22Domain%20Registered%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22none%22%2C%22number%22%3A%2212000%2B%22%2C%22body%22%3A%22WordPress%20Hosting%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2255080%2B%22%2C%22body%22%3A%22Customers%22%2C%22icon_type%22%3A%22fontawesome%22%7D%5D" extra_class="hosting"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);