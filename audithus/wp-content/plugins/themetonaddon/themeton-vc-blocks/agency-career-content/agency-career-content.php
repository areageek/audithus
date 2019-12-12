<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency career content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-career-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1509930162054{margin-bottom: 0px !important;background-color: #ecefee !important;background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}"][vc_column][vc_row_inner css=".vc_custom_1509930187548{padding-top: 80px !important;}"][vc_column_inner][vc_custom_heading text="our team" font_container="tag:h2|font_size:28px%20|text_align:center" use_theme_fonts="yes" css=".vc_custom_1509930243103{margin-bottom: 25px !important;}" el_class="uk-text-bold uk-text-uppercase career"][vc_column_text]

Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since.

[/vc_column_text][con_button alignment="center" color="#191919" colortext="#ffffff" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fagency%2Fteam%2F|title:Join%20our%20team||"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1517982986274{background-image: url(http://next.themeton.com/agency/wp-content/uploads/sites/6/2017/03/team-career.jpg?id=1898) !important;}"][vc_column_inner][vc_empty_space height="730px"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);