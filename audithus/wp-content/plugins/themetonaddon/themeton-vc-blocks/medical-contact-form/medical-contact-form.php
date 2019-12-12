<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Contact Form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-contact-form.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491236164137{margin-top: 50px !important;}"][vc_column width="1/2"][vc_custom_heading text="Message Us" font_container="tag:h3|font_size:24|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1491236153500{margin-bottom: 0px !important;}"][contact-form-7 id="733"][/vc_column][vc_column width="1/2" css=".vc_custom_1491206289409{margin-left: 10px !important;}"][vc_empty_space height="39px"][google_map lat="-37.831208" lng="144.998499" color="rgba(53,234,234,0.83)" zoom="10" map_height="345" marker="650" list="%5B%7B%22icon%22%3A%22fa%20fa-map-marker%22%2C%22text%22%3A%22szdfsf%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);