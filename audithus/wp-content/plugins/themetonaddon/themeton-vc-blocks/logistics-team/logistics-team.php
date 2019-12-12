<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1491538895127{margin-top: 60px !important;padding-top: 80px !important;padding-bottom: 80px !important;background-color: #e9f0f3 !important;}"][vc_column 0="" width="1/4" css=".vc_custom_1491199747510{padding-top: 20px !important;}"][vc_custom_heading text="Our Team" font_container="tag:h2|font_size:30|text_align:left|color:%23171620" use_theme_fonts="yes" css=".vc_custom_1491538903071{margin-top: 30px !important;}"][vc_column_text]When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only.[/vc_column_text][con_button extra_class="color-brand-bg" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Flogistics%2Fpages%2Fteam%2F|title:OUR%20FULL%20TEAM||"][/vc_column][vc_column width="3/4"][mungu_team contentposition="left" input_type="post" count="5" bulletposition="left"][/vc_column][/vc_row]
CONTENT
);