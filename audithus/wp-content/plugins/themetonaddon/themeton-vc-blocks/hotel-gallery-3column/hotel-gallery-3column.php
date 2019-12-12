<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel gallery 3column', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-gallery-3column.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_column_text]
<h1 style="text-align: center;">Hotel Gallery</h1>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][mungu_portfolio count="9" excerpt_length="3" categories="35"][/vc_column][/vc_row]
CONTENT
);