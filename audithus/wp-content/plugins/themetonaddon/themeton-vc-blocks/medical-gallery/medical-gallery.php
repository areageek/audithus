<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Gallery', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-gallery.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row][vc_column]<h1 style="text-align: center;">Our Gallery</h1>
[gallery columns="1" size="medium" ids="575,576,577,578,579,580"][/vc_column][/vc_row]
CONTENT
);