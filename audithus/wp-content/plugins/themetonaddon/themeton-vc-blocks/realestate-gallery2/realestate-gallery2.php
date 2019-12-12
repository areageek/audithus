<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate gallery 2 column', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-gallery2.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Check Our Portfolio" font_container="tag:h2|font_size:36|text_align:center|line_height:36px" use_theme_fonts="yes"][/vc_column][/vc_row][vc_row vc_row_container="uk-container" css=".vc_custom_1505708592613{padding-top: 30px !important;}"][vc_column][mungu_portfolio count="6" column="2" title_position="none" space="uk-grid-medium" hoverstyle="darken"][/vc_column][/vc_row]
CONTENT
);