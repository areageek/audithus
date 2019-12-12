<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga gallery tree', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-gallery-tree.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][mungu_portfolio count="9" column="3" filter="yes" title_position="none" space="uk-grid-medium" hoverstyle="darken"][/vc_column][/vc_row]
CONTENT
);