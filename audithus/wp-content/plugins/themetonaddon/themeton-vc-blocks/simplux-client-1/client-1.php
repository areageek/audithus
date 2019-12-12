<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative Clients-2 contents', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'client-1.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1500445800252{background-color: #ffffff !important;}"][vc_column width="1/6"][vc_single_image image="771" img_size="full"][/vc_column][vc_column width="1/6"][vc_single_image image="770" img_size="full"][/vc_column][vc_column width="1/6"][vc_single_image image="768" img_size="full"][/vc_column][vc_column width="1/6"][vc_single_image image="767" img_size="full"][/vc_column][vc_column width="1/6"][vc_single_image image="770" img_size="full"][/vc_column][vc_column width="1/6"][vc_single_image image="771" img_size="full"][/vc_column][/vc_row]
CONTENT
);