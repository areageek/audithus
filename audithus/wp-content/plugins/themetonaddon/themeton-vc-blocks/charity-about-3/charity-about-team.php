<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity about team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-about-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1493382748679{padding-top: 60px !important;}"][vc_column 0=""][vc_custom_heading text="OUR TEAM" font_container="tag:h2|text_align:center|color:%23000000" use_theme_fonts="yes"][mungu_team carousel="" space="yes" input_type="post" count="8" column="4"][/vc_column][/vc_row][vc_row 0="" css=".vc_custom_1497512343882{margin-bottom: 100px !important;}"][vc_column css=".vc_custom_1493382647526{margin-top: 50px !important;}"][con_button alignment="center" colortext="#fa6950" border="1" borderwidth="2px" colorborder="#fa6950" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcharity%2Fbecome-a-volunteer%2F|title:become%20a%20volunteer||"][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]</i></i>[/vc_column_text][/vc_column][/vc_row]
CONTENT
);