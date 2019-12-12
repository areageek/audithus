<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex" vc_row_height="170px" vc_row_themeton="yes" el_class="page-title" css=".vc_custom_1501061111711{background-image: url(http://next.themeton.com/agency/wp-content/uploads/sites/6/2017/05/Layer-1.jpg?id=1433) !important;}"][vc_column][page_title default_font="yes" color="#ffffff" css=".vc_custom_1511500901911{margin-bottom: 0px !important;}"][/vc_column][/vc_row]
CONTENT
);