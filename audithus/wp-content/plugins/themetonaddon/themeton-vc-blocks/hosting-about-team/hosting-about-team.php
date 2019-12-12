<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting about team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-about-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510561261052{margin-top: 30px !important;margin-bottom: 100px !important;}"][vc_column 0=""][vc_row_inner][vc_column_inner][vc_custom_heading text="Dedicated Team" font_container="tag:h2|font_size:30px|text_align:center|color:%23181620" use_theme_fonts="yes" css=".vc_custom_1499416929568{margin-bottom: 34px !important;}"][mungu_team carousel="" input_type="post" count="4" column="4" extra_class="hosting_team"][/vc_column_inner][/vc_row_inner][con_button alignment="center" color="#ffffff" colortext="#000000" border="1" colorborder="#14bb75" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhosting%2Fpages%2Fteam%2F|title:JOIN%20OUR%20TEAM||" css=".vc_custom_1510561464771{margin-top: 50px !important;}"][/vc_column][/vc_row]
CONTENT
);