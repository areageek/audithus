<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction services col2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-services-col2.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes" css=".vc_custom_1496835814154{margin-bottom: 70px !important;}"][vc_column][mungu_service_grid input_type="post" count="6" column="2"][/vc_column][/vc_row]
CONTENT
);