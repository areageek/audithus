<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity home service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-home-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491402189020{padding-top: 98px !important;padding-bottom: 88px !important;}"][vc_column][mungu_cause layout="grid" causetitle="show" morelink="FULL CAUSES" link="http://next.themeton.com/charity/our-causes-list/" column="3" count="3"][/vc_column][/vc_row]
CONTENT
);