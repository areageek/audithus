<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate footer', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-footer.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510567383092{margin-bottom: -15px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-image: url(http://next.themeton.com/realestate/wp-content/uploads/sites/20/2017/11/footer.png?id=2063) !important;background-position: 0 0 !important;background-repeat: no-repeat !important;}" el_class="opacity06"][vc_column css=".vc_custom_1510567250915{padding-top: 0px !important;}"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1510566940292{padding-top: 70px !important;background-color: #12161f !important;}"][vc_column width="3/12"][vc_custom_heading text="CONTACT INFO" font_container="tag:h2|font_size:20|text_align:left|color:%23ffffff!important" google_fonts="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal"][vc_column_text]70 Bowman St.

South Windsor, CT 06074

Email : <a href="mailto:info@next.com">info@next.com </a>

Phone : <a href="tel:586 101 262">+586 101 262</a>[/vc_column_text][/vc_column][vc_column width="4/12"][vc_custom_heading text="NAVIGATIONS" font_container="tag:h2|font_size:20|text_align:left|color:%23ffffff!important" google_fonts="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal"][header_container][vc_widget_sidebar sidebar_id="footer1"][vc_widget_sidebar sidebar_id="footer2" el_class="margin-left50"][/header_container][/vc_column][vc_column width="5/12"][vc_custom_heading text="SUBSCRIBE NEWS LETTER" font_container="tag:h2|font_size:20|text_align:left|color:%23ffffff!important" google_fonts="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal"][vc_custom_heading text="Enter your email address &amp; get daily newsletter" font_container="tag:p|font_size:15|text_align:left|color:%236b6e75" use_theme_fonts="yes"][vc_widget_sidebar sidebar_id="footer3"][/vc_column][/vc_row][vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1510566661513{border-top-width: 1px !important;padding-top: 20px !important;padding-bottom: 20px !important;background-color: #12161f !important;border-top-color: #272b34 !important;border-top-style: solid !important;}"][vc_column width="1/2" css=".vc_custom_1510566048226{padding-top: 0px !important;padding-left: 0px !important;}"][vc_custom_heading text="©2017 allright reserved by next" font_container="tag:p|text_align:left" use_theme_fonts="yes"][/vc_column][vc_column width="1/2" css=".vc_custom_1510566054617{padding-top: 0px !important;padding-right: 0px !important;}"][header_container halign="uk-flex-top" align="uk-flex-right"][vc_widget_sidebar sidebar_id="footer4"][/header_container][/vc_column][/vc_row]
CONTENT
);