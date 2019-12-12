<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity causes list', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-causes-list.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1497514703162{padding-bottom: 60px !important;}"][vc_column][mungu_cause count="4" pager="yes"][/vc_column][/vc_row]
CONTENT
);