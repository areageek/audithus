<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model gallery masonry', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-gallery-masonry.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_masonry_media_grid gap="30" item="masonryMedia_SimpleBlurWithScale" grid_id="vc_gid:1511161124509-379e710a-cff2-3" include="1638,1647,1651,1645,1648,1644,1641,1640,1642,1643,1639"][/vc_column][/vc_row]
CONTENT
);