<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1493629761108{margin-bottom: 30px !important;}"][vc_column][vc_custom_heading source="post_title" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][/vc_column][/vc_row][vc_row css=".vc_custom_1493629724154{margin-bottom: 70px !important;}"][vc_column][mungu_team carousel="" space="yes" input_type="post" count="12" column="4"][/vc_column][/vc_row][vc_row][vc_column][con_button alignment="center" color="rgba(0,0,0,0.01)" colortext="#fa6950" border="1" borderwidth="2px" colorborder="#fa6950" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcharity%2Fbecome-a-volunteer%2F|title:Become%20a%20volumteer||"][/vc_column][/vc_row]
CONTENT
);