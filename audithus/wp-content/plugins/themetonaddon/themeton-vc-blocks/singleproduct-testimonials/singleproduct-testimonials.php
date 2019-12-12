<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="1/3"][vc_row_inner css=".vc_custom_1505206542451{margin-right: 60px !important;padding-top: 20px !important;padding-bottom: 50px !important;background-color: #2f9df4 !important;}"][vc_column_inner css=".vc_custom_1510805297013{padding-top: 60px !important;padding-bottom: 30px !important;}"][testimonial_rating color="#ffffff" text_align="center" fontfamily="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" fontsize="58px" css=".vc_custom_1510805344945{margin-bottom: 15px !important;}"][testimonial_rating style="1" color="#ffffff" text_align="center" css=".vc_custom_1510805242287{margin-bottom: 0px !important;}"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1505206936976{margin-top: 30px !important;margin-right: 60px !important;padding-top: 10px !important;padding-bottom: 30px !important;padding-left: 20px !important;background-color: #00d463 !important;}"][vc_column_inner][vc_custom_heading text="Most Recent" font_container="tag:h3|font_size:20px|text_align:left|color:%23ffffff" use_theme_fonts="yes"][vc_custom_heading text="Positive" font_container="tag:h3|font_size:20px|text_align:left|color:%23ffffff" use_theme_fonts="yes"][vc_custom_heading text="Negative" font_container="tag:h3|font_size:20px|text_align:left|color:%23ffffff" use_theme_fonts="yes"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="2/3"][testimonial_grid input_type="post" style="default" post_type="testimonials" column="1"][/vc_column][/vc_row][vc_row][vc_column][vc_empty_space height="100px"][/vc_column][/vc_row]
CONTENT
);