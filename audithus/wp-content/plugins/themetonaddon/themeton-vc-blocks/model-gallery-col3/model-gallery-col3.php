<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model gallery col 3', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-gallery-col3.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1500887509927{padding-right: 100px !important;padding-left: 100px !important;}"][vc_column][vc_media_grid style="pagination" items_per_page="9" gap="35" paging_design="pagination_default" item="mediaGrid_FadeInWithIcon" grid_id="vc_gid:1511161123559-d0a63318-252e-7" include="1638,1639,1640,1641,1642,1643,1644,1647,1648,1649,1651" el_class="model_gallery"][/vc_column][/vc_row]

CONTENT
);