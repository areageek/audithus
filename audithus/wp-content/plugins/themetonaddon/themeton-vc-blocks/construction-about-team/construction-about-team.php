<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction about team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-about-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1509957943242{margin-right: -40px !important;margin-left: -40px !important;padding-top: 20px !important;padding-bottom: 80px !important;background-color: #e9f0f3 !important;}"][vc_column 0="" css=".vc_custom_1491199747510{padding-top: 20px !important;}"][vc_row_inner vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes"][vc_column_inner][vc_custom_heading text="Our Team" font_container="tag:h2|font_size:34|text_align:center|color:%23171620" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1496842287935{margin-top: 30px !important;}"][mungu_team carousel="" input_type="post" bulletposition="left"][vc_custom_heading text="Full Team

" font_container="tag:h2|font_size:24|text_align:center|color:%23f54983" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1498111906989{margin-top: 40px !important;}" link="url:http%3A%2F%2Fnext.themeton.com%2Fconstruction%2Fpages%2Fteam%2F|title:Full%20team||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);