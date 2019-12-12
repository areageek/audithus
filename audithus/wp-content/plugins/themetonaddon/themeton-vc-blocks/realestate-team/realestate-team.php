<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes"][vc_column][vc_custom_heading text="OUR AGENTS" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][/vc_column][/vc_row][vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes"][vc_column][mungu_team carousel="" input_type="post" count="12"][/vc_column][/vc_row]
CONTENT
);