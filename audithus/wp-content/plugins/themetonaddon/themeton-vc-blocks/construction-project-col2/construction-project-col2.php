<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction project col2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-project-col2.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes" css=".vc_custom_1496829763930{margin-bottom: 70px !important;}"][vc_column][mungu_portfolio count="6" column="2" pager="yes" space="uk-grid-medium" hoverstyle="darken" excerpt_length="3"][/vc_column][/vc_row]
CONTENT
);