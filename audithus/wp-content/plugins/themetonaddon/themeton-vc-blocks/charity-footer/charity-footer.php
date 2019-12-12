<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity footer', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-footer.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1509696188405{border-bottom-width: 1px !important;border-bottom-color: #413c3a !important;border-bottom-style: solid !important;}"][vc_column width="1/2"][vc_custom_heading text="Newsletter Signup" font_container="tag:h2|text_align:left|color:%23ffffff!important" use_theme_fonts="yes" css=".vc_custom_1509698641363{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_custom_heading text="Enter your email address &amp; subscribe daily newsletter" font_container="tag:p|text_align:left" use_theme_fonts="yes" css=".vc_custom_1509611636376{margin-top: 0px !important;margin-bottom: 0px !important;}"][/vc_column][vc_column width="1/2"][vc_widget_sidebar sidebar_id="footer4"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][vc_wp_custommenu title="Navigation" nav_menu="23"][/vc_column][vc_column width="1/4"][vc_widget_sidebar sidebar_id="footer3"][/vc_column][vc_column width="1/4"][vc_widget_sidebar sidebar_id="footer1"][/vc_column][vc_column width="1/4"][vc_widget_sidebar sidebar_id="footer2"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1509696562931{border-top-width: 1px !important;padding-top: 30px !important;padding-bottom: 30px !important;border-top-color: #413c3a !important;border-top-style: solid !important;}"][vc_column css=".vc_custom_1509696582603{padding-top: 0px !important;}"][vc_column_text el_class="element_remove_margin"]Copyright © 2017 Next Charity - Crafted by <a href="http://www.themeton.com">themeton.</a>[/vc_column_text][/vc_column][/vc_row]
CONTENT
);