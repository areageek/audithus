<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_2.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1509360595367{margin-top: 100px !important;margin-bottom: 65px !important;border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;padding-top: 52px !important;padding-bottom: 38px !important;border-left-color: #f4f4f4 !important;border-left-style: solid !important;border-right-color: #f4f4f4 !important;border-right-style: solid !important;border-top-color: #f4f4f4 !important;border-top-style: solid !important;border-bottom-color: #f4f4f4 !important;border-bottom-style: solid !important;border-radius: 10px !important;}" el_class="pr7 pl7 pr1@s pl1@s"][vc_column][vc_custom_heading text="It's the Bright One, it's the Right One, that's Simple luxure website. Simple luxure website Makes Everything Better" font_container="tag:h2|font_size:42|text_align:center|color:%23222222|line_height:1.2" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1509360658303{padding-bottom: 20px !important;}" el_class="font24@s"][con_button alignment="center" color="#2b47e8" extra_class="border-radius30px" conbutton="url:%23|title:Purchase%20for%20%241500||"][/vc_column][/vc_row]

CONTENT
);