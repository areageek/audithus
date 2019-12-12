<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting about calltoaction', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-about-calltoaction.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1510561055848{padding-top: 30px !important;padding-bottom: 30px !important;background-color: #1c7bc3 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/3"][vc_custom_heading text="Start Building Your
Website Today!" font_container="tag:h2|font_size:28px%20|text_align:left|color:%23ffffff|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510561114205{margin-top: -20px !important;}"][/vc_column][vc_column width="1/3"][vc_row_inner][vc_column_inner width="1/3"][vc_single_image image="2903" img_size="large" alignment="right" css_animation="fadeIn"][/vc_column_inner][vc_column_inner width="2/3"][vc_column_text]
<p style="text-align: left; font-size: 18px; color: #fff;">Starting At Only <i style="font-style: normal; font-size: 38px;">$1.99</i>/MONTH</p>

[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/3"][con_button alignment="right" color="#ffffff" colortext="#000000" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhosting%2Fservice-item%2Fwordpress-hosting%2F|title:Get%20Started||" css=".vc_custom_1510562702856{margin-top: -38px !important;}"][/vc_column][/vc_row]
CONTENT
);