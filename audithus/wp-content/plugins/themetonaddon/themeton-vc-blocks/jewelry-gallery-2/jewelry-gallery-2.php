<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry gallery 2 column', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-gallery-2.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0=""][vc_column 0=""][vc_column_text 0=""]
<h1 style="text-align: center">COLLUMN 2</h1>
[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1497239027134{margin-bottom: 50px !important;}"][vc_column 0=""][mungu_portfolio column="2" title_position="none" space="uk-grid-medium" hoverstyle="darken"][/vc_column][/vc_row]
CONTENT
);