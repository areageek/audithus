<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church about team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-about-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510595733277{padding-top: 80px !important;padding-bottom: 58px !important;background-color: #e2e8e5 !important;}"][vc_column css=".vc_custom_1491199747510{padding-top: 20px !important;}"][vc_custom_heading text="OUR TEAM" font_container="tag:h1|font_size:30|text_align:center|color:%231e1818" google_fonts="font_family:Playfair%20Display%20SC%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" el_class="mvb0" css=".vc_custom_1499410427701{margin-bottom: -30px !important;}"][mungu_team carousel="" input_type="post" image_type="circle" count="4" column="4" extra_class="about-team"][/vc_column][/vc_row]
CONTENT
);