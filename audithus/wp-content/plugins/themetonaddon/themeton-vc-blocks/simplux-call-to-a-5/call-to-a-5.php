<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative with icon call to actions cta_5', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_5.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" vc_row_overlay="yes" vc_row_overlay_color="rgba(0,0,0,0.5)" css=".vc_custom_1509361326345{padding-top: 310px !important;padding-bottom: 300px !important;background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/07/026-1.jpg?id=2872) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column 0=""][header_container align="uk-flex-center" extra_class="uk-child-width-auto@m uk-child-width-1-1@s uk-grid"][vc_custom_heading text="<b>Simple</b> Luxure Rules" font_container="tag:h2|font_size:30|text_align:right|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:400%20regular%3A400%3Anormal" el_class="mr0@s align_c@s" css=".vc_custom_1509371724150{margin-top: 20px !important;margin-bottom: 20px !important;}"][vc_btn title="" style="custom" custom_background="#ffffff" custom_text="#000000" shape="round" size="lg" align="center" i_type="entypo" i_icon_entypo="entypo-icon entypo-icon-right-dir" add_icon="true" el_class="round_icon_button pl3 pr3"][vc_custom_heading text="It Could Be Simple <b> Luxure</b> " font_container="tag:h2|font_size:30|text_align:left|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1509371736496{margin-top: 20px !important;margin-bottom: 20px !important;margin-left: 0px !important;}" el_class="align_c@s"][/header_container][/vc_column][/vc_row]
CONTENT
);