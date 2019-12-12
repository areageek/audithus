<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( ' agency portfolio column 3', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-portfolio-col3.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][mungu_portfolio column="3" filter="yes" title_position="none" space="uk-grid-small" hoverstyle="darken" excerpt_length=""][/vc_column][/vc_row]
CONTENT
);