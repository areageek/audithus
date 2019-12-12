<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel home room slider', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-home-room-slider.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1492076156867{padding-top: 60px !important;padding-bottom: 90px !important;background-color: #f4f6ef !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column 0=""][vc_custom_heading text="Our Rooms" font_container="tag:h2|font_size:30|text_align:center" use_theme_fonts="yes" css=".vc_custom_1492077048820{margin-bottom: -45px !important;}"][mungu_hotelroom_slider][/vc_column][/vc_row]
CONTENT
);