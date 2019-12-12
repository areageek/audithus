<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model gallery col 2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-gallery-col2.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_media_grid style="pagination" items_per_page="6" element_width="6" gap="30" paging_design="pagination_default" item="mediaGrid_FadeInWithIcon" grid_id="vc_gid:1511161122559-c47ba0df-23bb-5" include="1648,1644,1647,1643,1638,1639,1641,1642,1640,1649,1651" el_class="model_gallery"][/vc_column][/vc_row]

CONTENT
);