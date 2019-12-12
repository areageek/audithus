<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel gallery column 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-gallery-1column.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_column_text]
<h1 style="text-align: center;">Hotel Gallery</h1>
&nbsp;

[gallery columns="1" size="full" link="none" ids="1523,1521,1516,1510,1507"]

[/vc_column_text][/vc_column][/vc_row]
CONTENT
);