<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Google Map', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-google.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][vc_empty_space height="100px"][google_map lat="-37.831208" lng="144.998499" color="rgba(53,234,234,0.83)" zoom="10" map_height="550" marker="650" list="%5B%7B%22icon%22%3A%22fa%20fa-map-marker%22%2C%22text%22%3A%22Next%3A%20Logistic%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);