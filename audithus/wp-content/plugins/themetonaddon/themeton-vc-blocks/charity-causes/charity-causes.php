<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity causes', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-causes.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][mungu_cause layout="grid" column="3" count="8"][/vc_column][/vc_row]
CONTENT
);