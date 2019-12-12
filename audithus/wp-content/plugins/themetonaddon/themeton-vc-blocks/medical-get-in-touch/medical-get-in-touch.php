<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Get in touch', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-get-in-touch.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Get in touch" font_container="tag:h1|font_size:30px|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1491235692398{margin-bottom: 0px !important;}"][vc_column_text]

For better services contact us today

[/vc_column_text][/vc_column][/vc_row][vc_row content_placement="bottom" css=".vc_custom_1490361445545{margin-right: 0px !important;margin-left: 0px !important;padding-top: 50px !important;padding-right: 100px !important;padding-bottom: 50px !important;padding-left: 100px !important;background-image: url(http://next.themeton.com/medical/wp-content/uploads/sites/2/2017/03/contact-bg.png?id=365) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/4"][vc_custom_heading text="Address" font_container="tag:h2|font_size:20|text_align:left|color:%23ffffff|line_height:0" use_theme_fonts="yes"][vc_separator color="custom" align="align_left" el_width="80" accent_color="#7c7273"][vc_column_text el_class="text-light" css=".vc_custom_1491201986276{margin-top: -15px !important;}"]7920 Glenlake Avenue
Ankeny, IA 50023[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1491201840880{margin-left: 50px !important;}"][vc_empty_space height="300px"][vc_custom_heading text="Phone" font_container="tag:h2|font_size:20|text_align:left|color:%23ffffff|line_height:0" use_theme_fonts="yes"][vc_separator color="custom" align="align_left" accent_color="#7c7273"][vc_column_text el_class="text-light" css=".vc_custom_1491201996134{margin-top: -15px !important;}"](235) 854 5568 5586
+91 5586 5585 6623[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1491235910371{margin-left: 50px !important;}"][vc_custom_heading text="Email" font_container="tag:h2|font_size:20|text_align:left|color:%23ffffff|line_height:0" use_theme_fonts="yes"][vc_separator color="custom" align="align_left" accent_color="#7c7273"][vc_column_text el_class="text-light" css=".vc_custom_1491202004216{margin-top: -15px !important;}"]info@next.com
info@nextcareer.com[/vc_column_text][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);