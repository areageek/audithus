<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental faq', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-faq.jpg',
	'cat_display_name' => 'faqs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_column_text]

[/vc_column_text][/vc_column][/vc_row][vc_row vc_row_container="uk-container" css=".vc_custom_1506491127338{margin-bottom: 15px !important;}" el_class="carcontact"][vc_column width="1/3"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-map-o" size="small" title="Address" desc="7920 Glenlake
Avenue Ankeny, IA 50023"][/vc_column][vc_column width="1/3"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-envelope-o" size="small" title="Email" desc="info@nextcharity.com
donate@nextcharity.com"][/vc_column][vc_column width="1/3"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-phone" size="small" title="Phone" desc="Office : +9987 5628 6663
Donatons : (998) 004 225"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" content_placement="middle" css=".vc_custom_1506491835286{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;background-color: #f2f2f2 !important;}"][vc_column width="1/6" css=".vc_custom_1506491026746{padding-top: 0px !important;}"][/vc_column][vc_column width="1/3"][vc_custom_heading text="Message Us

Contact Our head office

" font_container="tag:h2|font_size:36|text_align:left|line_height:25px" google_fonts="font_family:Alegreya%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" el_class="dash" css=".vc_custom_1506491828003{padding-bottom: 0px !important;}"][contact-form-7 id="733"][/vc_column][vc_column width="1/2" css=".vc_custom_1506491032155{padding-top: 0px !important;}"][google_map lat="40.718155" lng="-73.354287" map_height="600" marker="1162" list="%5B%7B%22icon%22%3A%22fa%20fa-map-marker%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);