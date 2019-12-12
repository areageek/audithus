<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency about team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-about-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1494844414054{padding-top: 55px !important;padding-bottom: 95px !important;background-color: #ecefee !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_custom_heading text="Our Team" font_container="tag:h2|font_size:30|text_align:left|color:%23161720" use_theme_fonts="yes" el_class="uk-text-bold uk-text-uppercase"][mungu_team carousel="" input_type="post" count="4" column="4"][vc_row_inner][vc_column_inner css=".vc_custom_1492576788062{padding-top: 30px !important;}"][con_button alignment="center" color="#1d1d1f" colortext="#ffffff" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fagency%2Fteam%2F|title:Full%20team|target:%20_blank|"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);