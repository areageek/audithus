<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental footer', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-footer.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1511160833093{background-color: #344655 !important;}" el_id="carfooter"][vc_column width="1/3" css=".vc_custom_1511181063054{padding-right: 120px !important;}"][vc_widget_sidebar sidebar_id="footer1"][/vc_column][vc_column width="1/3"][vc_widget_sidebar sidebar_id="footer2"][/vc_column][vc_column width="1/3"][vc_widget_sidebar sidebar_id="footer3"][/vc_column][/vc_row][vc_row css=".vc_custom_1511160807550{background-color: #344655 !important;}"][vc_column width="1/3"][vc_widget_sidebar sidebar_id="footer4"][/vc_column][vc_column width="1/3"][vc_custom_heading text="Download Mob App" font_container="tag:h2|font_size:24|text_align:left|color:%23ffffff!important|line_height:18px" google_fonts="font_family:Alegreya%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][header_container][vc_single_image image="2078" img_size="full" onclick="custom_link" link="#" css=".vc_custom_1511161947108{margin-bottom: 0px !important;}"][vc_single_image image="2079" img_size="full" onclick="custom_link" link="#" css=".vc_custom_1511161872621{margin-bottom: 0px !important;}"][/header_container][/vc_column][vc_column width="1/3"][vc_custom_heading text="Follow US" font_container="tag:h2|font_size:24|text_align:left|color:%23ffffff!important|line_height:18px" google_fonts="font_family:Alegreya%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][vc_widget_sidebar sidebar_id="social-sidebar"][/vc_column][/vc_row][vc_row content_placement="middle" css=".vc_custom_1511180912582{margin-right: -215px !important;margin-left: -215px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-color: #2a3b48 !important;}"][vc_column css=".vc_custom_1506570830834{padding-top: 22px !important;padding-bottom: 2px !important;}"][vc_custom_heading text="2017 next © All Rights Reserved" font_container="tag:p|font_size:16|text_align:center|color:%238799a8|line_height:16px" google_fonts="font_family:Alegreya%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row]
CONTENT
);