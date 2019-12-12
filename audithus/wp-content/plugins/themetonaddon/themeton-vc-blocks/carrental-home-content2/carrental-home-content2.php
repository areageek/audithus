<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental home content 2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-home-content2.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_section full_width="stretch_row" css=".vc_custom_1512472630373{padding-top: 100px !important;padding-bottom: 100px !important;background-color: #f2f2f2 !important;}"][vc_row][vc_column width="1/3"][vc_row_inner css=".vc_custom_1506425743908{padding-left: 30px !important;}"][vc_column_inner][vc_custom_heading text="Hot deals" font_container="tag:h2|font_size:36|text_align:left|line_height:1" use_theme_fonts="yes" css=".vc_custom_1512528401860{margin-bottom: 5px !important;}"][vc_custom_heading text="Daily spacial offers" font_container="tag:h4|text_align:left|color:%235b676f" use_theme_fonts="yes" el_class="dash" css=".vc_custom_1512528427730{margin-top: 0px !important;}"][vc_column_text]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="2/3"][carousel_anythings slidetype="posttype" post_type="rent" count="7" items="2" items_desktop_small="1" thumbnails="trueleft" arrow_show="false"][vc_row_inner][vc_column_inner][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][/vc_column_inner][/vc_row_inner][/carousel_anythings][/vc_column][/vc_row][/vc_section]
CONTENT
);