<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency contact map', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-contact-map.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column 0=""][google_map lat=" 40.700936" lng="-73.712909" map_height="500" marker="1928" list="%5B%7B%22icon%22%3A%22fa%20fa-map-marker%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);