<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical About', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-about.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="7/12"][vc_custom_heading source="post_title" font_container="tag:h2|font_size:30|text_align:left|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][vc_column_text css=".vc_custom_1491386371130{margin-bottom: 20px !important;}"]
<p style="margin: 0; font-weight: 500;">We are successfully finished 13 years</p>

[/vc_column_text][vc_column_text 0=""]<span style="color: #666666;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur massa libero, feugiat pellentesque accumsan at, posuere eget justo. Etiam sit amet nulla sed metus auctor sodales nec et est. Etiam ut suscipit ante. Cras finibus feugiat nisl quis sollicitudin. Nam tempor metus et purus malesuada aliquet. Ut varius massa id nibh luctus, dapibus rhoncus metus suscipit. Aliquam dignissim libero id suscipit finibus Nullam semper.</span>[/vc_column_text][/vc_column][vc_column width="5/12" css=".vc_custom_1490624368435{margin-left: -30px !important;padding-right: 30px !important;padding-left: 30px !important;}"][vc_row_inner css=".vc_custom_1490624677814{margin-left: 30px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1490624612621{margin-bottom: 30px !important;background-color: #eeebfd !important;}"][vc_custom_heading text="Ambulance
Services" font_container="tag:h3|font_size:18|text_align:center|color:%237f7a94|line_height:25px" use_theme_fonts="yes" css=".vc_custom_1490622878662{margin-bottom: 30px !important;}"][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1490624627783{margin-bottom: 30px !important;margin-left: 30px !important;background-color: #e2f7fa !important;}"][vc_custom_heading text="Health
Services" font_container="tag:h3|font_size:18|text_align:center|color:%23619198|line_height:25px" use_theme_fonts="yes" css=".vc_custom_1491386495095{margin-bottom: 30px !important;}"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1490624535550{margin-left: 30px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1490624636738{background-color: #e5edec !important;}"][vc_custom_heading text="Qualified
Doctors" font_container="tag:h3|font_size:18|text_align:center|color:%2362716f|line_height:25px" use_theme_fonts="yes" css=".vc_custom_1491386516327{margin-bottom: 30px !important;}"][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1490624642029{margin-left: 30px !important;background-color: #fcf4e9 !important;}"][vc_custom_heading text="100% Happy
Patients" font_container="tag:h3|font_size:18|text_align:center|color:%23937e60|line_height:25px" use_theme_fonts="yes" css=".vc_custom_1491386540447{margin-bottom: 30px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1491199607664{padding-top: 60px !important;padding-bottom: 30px !important;}"][vc_column 0=""][vc_separator color="custom" accent_color="#dfebed" css=".vc_custom_1490624005367{margin-bottom: 65px !important;}"][vc_custom_heading text="Hospital Gallery" font_container="tag:h2|font_size:30|text_align:center|color:%23171620" use_theme_fonts="yes" css=".vc_custom_1491365997321{padding-bottom: 15px !important;}"][mungu_post_images post_type="service" count="5"][/vc_column][/vc_row]
CONTENT
);