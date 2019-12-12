<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity contact map', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-contact-map.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces"][vc_column][google_map lat="40.728259" lng="-73.354397" map_height="600" marker="1162" list="%5B%7B%22icon%22%3A%22fa%20fa-map-marker%22%2C%22text%22%3A%227920%20Glenlake%20Avenue%20Ankeny%2C%20IA%2050023%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);