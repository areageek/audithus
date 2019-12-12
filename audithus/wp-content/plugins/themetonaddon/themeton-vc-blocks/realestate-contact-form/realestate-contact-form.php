<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate contact form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-contact-form.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_column_text]

[/vc_column_text][vc_custom_heading text="CONTACT DETAILS" font_container="tag:h1|font_size:25px|text_align:center|line_height:45px" use_theme_fonts="yes" css=".vc_custom_1510750717823{margin-bottom: 35px !important;padding-bottom: 0px !important;}"][/vc_column][vc_column][/vc_column][/vc_row][vc_row vc_row_container="uk-container" css=".vc_custom_1506491127338{margin-bottom: 15px !important;}" el_class="carcontact"][vc_column width="1/3"][service_box style="style-center" icon_type="icon_image" image="2321" imagesize="24x37" size="small" title="Address" desc="7920 Glenlake
Avenue Ankeny, IA 50023"][/vc_column][vc_column width="1/3"][service_box style="style-center" icon_type="icon_image" image="2322" imagesize="36x37" size="small" title="Email" desc="info@nextcharity.com
donate@nextcharity.com"][/vc_column][vc_column width="1/3"][service_box style="style-center" icon_type="icon_image" image="2323" imagesize="36x37" size="small" title="Phone" desc="Office : +9987 5628 6663
Donatons : (998) 004 225"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" content_placement="middle" css=".vc_custom_1510654008487{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;background-color: #ffffff !important;}"][vc_column width="1/4" css=".vc_custom_1506491026746{padding-top: 0px !important;}"][/vc_column][vc_column width="1/2"][vc_custom_heading text="MESSAGE US
" font_container="tag:h1|font_size:25px|text_align:center|line_height:45px" use_theme_fonts="yes" css=".vc_custom_1510748973340{padding-bottom: 0px !important;}"][contact-form-7 id="733"][/vc_column][vc_column width="1/4" css=".vc_custom_1506491032155{padding-top: 0px !important;}"][/vc_column][/vc_row]
CONTENT
);