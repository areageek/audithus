<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency home team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-home-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1494590085606{margin-top: 90px !important;padding-top: 10px !important;padding-bottom: 90px !important;background-color: #ecefee !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/3"][vc_custom_heading text="Our Team" font_container="tag:h2|font_size:28|text_align:left|color:%230c0c0c|line_height:0" use_theme_fonts="yes" el_class="uk-text-bold uk-text-uppercase"][vc_row_inner css=".vc_custom_1494590352627{padding-top: 30px !important;}"][vc_column_inner css=".vc_custom_1494590397807{padding-right: 40px !important;}"][vc_column_text]We provide our experience, innovative creation, the latest know how in design and best in class technology at your ideas, you’ve got all you need for your business.[/vc_column_text][/vc_column_inner][/vc_row_inner][con_button color="#1d1d1f" colortext="#ffffff" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fagency%2Fteam%2F|title:Full%20team||"][/vc_column][vc_column width="2/3"][mungu_team carousel="" input_type="post" ratio="1x1" count="2" column="2" categories="43" extra_class="bordernone home-team"][/vc_column][/vc_row]
CONTENT
);