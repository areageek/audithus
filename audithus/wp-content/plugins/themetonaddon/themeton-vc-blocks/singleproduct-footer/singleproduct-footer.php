<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct footer', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-footer.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510751312549{padding-top: 50px !important;padding-bottom: 50px !important;background-color: #2f9df4 !important;}" el_class="footer-row-arrow"][vc_column width="1/4"][logo logo="custom_logo" image="175"][vc_column_text el_class="single-footer-address" css=".vc_custom_1506923104675{padding-top: 35px !important;}"]

71 Pilgrim Avenue

Chevy Chase, MD 20815

[/vc_column_text][vc_btn title="Contact us" style="outline-custom" outline_custom_color="#ffffff" outline_custom_hover_background="" outline_custom_hover_text="#ffffff" i_align="right" i_icon_fontawesome="fa fa-angle-right" add_icon="true" link="url:http%3A%2F%2Fnext.themeton.com%2Fsingleproduct%2Fcontact-us%2F|||"][/vc_column][vc_column width="5/12"][vc_widget_sidebar sidebar_id="footer1"][vc_row_inner content_placement="middle"][vc_column_inner width="1/3"][vc_icon icon_fontawesome="fa fa-dribbble" color="white" css=".vc_custom_1505199075559{margin-bottom: 0px !important;}" el_class="max-float-left"][vc_custom_heading text="DRIBBBLE" font_container="tag:p|font_size:14px|text_align:left|color:%23ffffff" use_theme_fonts="yes" css=".vc_custom_1505199382357{margin-top: 15px !important;margin-bottom: 0px !important;}" el_class="max-float-left"][/vc_column_inner][vc_column_inner width="1/3"][vc_icon icon_fontawesome="fa fa-twitter" color="white" el_class="max-float-left" css=".vc_custom_1505199416214{margin-bottom: 0px !important;}"][vc_custom_heading text="TWITTER" font_container="tag:p|font_size:14px|text_align:left|color:%23ffffff" use_theme_fonts="yes" css=".vc_custom_1505199408699{margin-top: 15px !important;margin-bottom: 0px !important;}" el_class="max-float-left"][/vc_column_inner][vc_column_inner width="1/3"][vc_icon icon_fontawesome="fa fa-youtube-play" color="white" css=".vc_custom_1505199436309{margin-bottom: 0px !important;}" el_class="max-float-left"][vc_custom_heading text="YOUTUBE" font_container="tag:p|font_size:14px|text_align:left|color:%23ffffff" use_theme_fonts="yes" css=".vc_custom_1506923214946{margin-top: 15px !important;margin-bottom: 0px !important;}" el_class="max-float-left"][/vc_column_inner][/vc_row_inner][vc_custom_heading text="Next © 2017 allright reserved" font_container="tag:p|font_size:15px|text_align:left|color:%23ffffff" use_theme_fonts="yes" el_class="copywrite-text"][/vc_column][vc_column width="1/12"][/vc_column][vc_column width="3/12"][vc_row_inner][vc_column_inner width="1/2"][vc_wp_custommenu nav_menu="17"][/vc_column_inner][vc_column_inner width="1/2"][vc_wp_custommenu nav_menu="18"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);