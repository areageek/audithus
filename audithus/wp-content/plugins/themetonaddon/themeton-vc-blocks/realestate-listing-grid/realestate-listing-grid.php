<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate listing grid product', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-listing-grid.jpg',
	'cat_display_name' => 'products',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][mungu_carrental layout="grid" rent_type="style3" pager="yes"][/vc_column][/vc_row]
CONTENT
);