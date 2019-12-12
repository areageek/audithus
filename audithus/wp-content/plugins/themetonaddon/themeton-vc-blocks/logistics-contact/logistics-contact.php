<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Contact Form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-contact.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491548658562{margin-top: 50px !important;padding-left: 30px !important;}"][vc_column width="1/2" css=".vc_custom_1491551362337{margin-bottom: 0px !important;padding-right: 30px !important;}"][vc_custom_heading text="Message Us" font_container="tag:h3|font_size:24|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1491548739579{margin-bottom: 7px !important;}"][contact-form-7 id="733"][/vc_column][vc_column width="1/2" css=".vc_custom_1491206289409{margin-left: 10px !important;}"][vc_custom_heading text="Message Us" font_container="tag:h3|font_size:24|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1491236153500{margin-bottom: 0px !important;}"][vc_row_inner css=".vc_custom_1491551040754{margin-top: 40px !important;padding-top: 70px !important;padding-right: 70px !important;padding-bottom: 70px !important;padding-left: 70px !important;}" el_class="color-brand-bg"][vc_column_inner css=".vc_custom_1491550579186{padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_custom_heading text="ADDRESS" font_container="tag:h2|font_size:16px|text_align:left|color:%23853607|line_height:16px" use_theme_fonts="yes" el_class="no-decoration"][vc_custom_heading text="71 Pilgrim Avenue
Chevy Chase, MD 20815
5th floor." font_container="tag:p|font_size:18px|text_align:left|color:%23ffffff|line_height:28px" use_theme_fonts="yes" el_class="no-decoration mt0 mb0"][vc_custom_heading text="PHONE" font_container="tag:h2|font_size:16px|text_align:left|color:%23853607|line_height:16px" use_theme_fonts="yes" el_class="no-decoration"][vc_custom_heading text="+985 6698 5689
(0445) 5458 555" font_container="tag:p|font_size:18px|text_align:left|color:%23ffffff|line_height:28px" use_theme_fonts="yes" el_class="no-decoration mt0 mb0"][vc_custom_heading text="EMAIL" font_container="tag:h2|font_size:16px|text_align:left|color:%23853607|line_height:16px" use_theme_fonts="yes" el_class="no-decoration"][vc_custom_heading text="info@nextlogistics.com
career@nextlogistics.com" font_container="tag:p|font_size:18px|text_align:left|color:%23ffffff|line_height:28px" use_theme_fonts="yes" el_class="no-decoration mt0 mb0"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);