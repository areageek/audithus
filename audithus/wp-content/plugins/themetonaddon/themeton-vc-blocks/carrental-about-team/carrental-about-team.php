<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental about team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-about-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row el_class="uk-text-center" css=".vc_custom_1506485211130{padding-top: 100px !important;}"][vc_column][vc_custom_heading text="Team" font_container="tag:h2|font_size:36|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1510887038180{margin-bottom: 0px !important;}"][vc_custom_heading text="Check out our customer support team" font_container="tag:h4|text_align:center|color:%235b676f" use_theme_fonts="yes" el_class="dash" css=".vc_custom_1510887284660{padding-bottom: 40px !important;}"][/vc_column][/vc_row][vc_row vc_row_container="uk-container" css=".vc_custom_1506485201477{padding-bottom: 100px !important;}"][vc_column][mungu_team input_type="post" image_type="octogon" count="9" column="4"][/vc_column][/vc_row]

CONTENT
);