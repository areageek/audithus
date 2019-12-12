<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel reservation', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-reservation.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_custom_heading text="Book your Room" font_container="tag:h1|font_size:30px|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1492597295980{margin-bottom: 0px !important;}"][contact-form-7 id="188"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);