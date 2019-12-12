<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental home call to action', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-home-calltoaction.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row content_placement="middle" vc_row_container="uk-container" css=".vc_custom_1506411388740{padding-top: 90px !important;}"][vc_column width="1/2"][vc_single_image image="1767" img_size="large" css_animation="bounceIn"][/vc_column][vc_column width="1/2"][vc_custom_heading text="Get our APP on mobile" font_container="tag:h2|font_size:36|text_align:left|line_height:1" use_theme_fonts="yes" css=".vc_custom_1510909980717{margin-bottom: 0px !important;}"][vc_custom_heading text="Now available on" font_container="tag:h4|text_align:left|color:%235b676f" use_theme_fonts="yes" el_class="dash" css=".vc_custom_1510910001547{margin-top: 5px !important;}"][vc_column_text]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500.[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][vc_single_image image="1763" img_size="medium" onclick="custom_link" img_link_target="_blank" link="#"][/vc_column_inner][vc_column_inner width="1/3"][vc_single_image image="1768" img_size="medium" onclick="custom_link" link="#"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT
);