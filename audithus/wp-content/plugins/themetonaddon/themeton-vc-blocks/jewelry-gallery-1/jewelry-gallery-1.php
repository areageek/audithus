<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry gallery column 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-gallery-1.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0=""][vc_column][mungu_portfolio count="3" column="1" title_position="none" space="uk-grid-collapse" hoverstyle="darken"][/vc_column][/vc_row]
CONTENT
);