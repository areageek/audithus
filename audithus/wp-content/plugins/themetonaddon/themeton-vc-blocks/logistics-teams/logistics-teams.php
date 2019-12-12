<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Teams ', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-teams.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading source="post_title" font_container="tag:h2|font_size:30|text_align:left|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][/vc_column][/vc_row][vc_row][vc_column][mungu_team carousel="" input_type="post" image_type="circle" count="12" column="4"][/vc_column][/vc_row]
CONTENT
);