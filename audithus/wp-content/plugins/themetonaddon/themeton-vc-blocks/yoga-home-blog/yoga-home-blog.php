<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga home blog', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-home-blog.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1513916676846{margin-top: 100px !important;border-top-width: 1px !important;border-top-color: #efefef !important;border-top-style: solid !important;}"][vc_column css=".vc_custom_1513916670653{padding-top: 0px !important;}"][con_post count="2" style="9" pagination=""][/vc_column][/vc_row]
CONTENT
);