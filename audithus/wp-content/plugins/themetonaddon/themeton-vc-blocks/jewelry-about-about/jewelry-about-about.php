<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry about about', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-about-about.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="1/6"][/vc_column][vc_column width="2/3" css=".vc_custom_1502262654273{margin-bottom: 30px !important;padding-right: 10px !important;padding-left: 10px !important;}"][vc_custom_heading text="About us" font_container="tag:h2|font_size:38|text_align:center|line_height:51px" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1502430370348{margin-top: -20px !important;margin-bottom: 20px !important;}"][vc_column_text css=".vc_custom_1502357692271{padding-right: 15px !important;padding-left: 15px !important;}"]</p>
<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
<p>[/vc_column_text][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row][vc_column][vc_gallery interval="3" images="1530,1776,1777" img_size="full"][/vc_column][/vc_row]
CONTENT
);