<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Our Medical Specialists', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-specialists.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1491266186505{border-top-width: 1px !important;padding-top: 60px !important;padding-bottom: 60px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;border-top-color: #dfebed !important;border-top-style: solid !important;border-radius: 1px !important;}"][vc_column][vc_custom_heading text="Our Medical Specialists" font_container="tag:h2|font_size:30|text_align:center" use_theme_fonts="yes" css=".vc_custom_1491267282778{margin-bottom: 0px !important;}"][mungu_team carousel="" input_type="post" count="4" column="4"][vc_btn title="Check all doctors" style="custom" custom_background="" custom_text="#009eb3" shape="square" size="lg" align="center" link="url:http%3A%2F%2Fdemo.themeton.com%2Fmedical%2Fdoctors%2F|title:Check%20all%20doctors|target:%20_blank|"][/vc_column][/vc_row]
CONTENT
);