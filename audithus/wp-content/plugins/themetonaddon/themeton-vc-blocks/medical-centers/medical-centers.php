<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Centres of Excellence', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-centers.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491381638926{padding-top: 60px !important;padding-bottom: 90px !important;}"][vc_column][vc_custom_heading text="Centres of Excellence" font_container="tag:h2|font_size:30|text_align:center|line_height:1" use_theme_fonts="yes" link="url:http%3A%2F%2Fdemo.themeton.com%2Fmedical%2Fservice-item%2Fgynecology%2F|||" el_class="mvb0"][vc_column_text]
The best clinical talent and skills
[/vc_column_text][mungu_service_grid carousel="yes" input_type="post" arrows="hide" count="7" column="5"][/vc_column][/vc_row]
CONTENT
);