<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel our rooms list', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-our-rooms-list.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Our Rooms" font_container="tag:h2|font_size:30|text_align:center"][/vc_column][/vc_row][vc_row][vc_column][mungu_hotelroom count="4"][/vc_column][/vc_row]
CONTENT
);