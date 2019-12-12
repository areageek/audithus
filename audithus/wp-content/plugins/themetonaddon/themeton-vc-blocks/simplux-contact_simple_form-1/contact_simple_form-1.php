<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative contact simplux form-1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'contact_simple_form-1.png',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" vc_row_overlay="yes" vc_row_overlay_color="rgba(0,0,0,0.59)" css=".vc_custom_1508732132605{padding-top: 100px !important;padding-bottom: 90px !important;background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/07/blog3-1-1024x678.jpg?id=2896) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column 0=""][vc_custom_heading text="Get Your Contact Here" font_container="tag:h2|font_size:28|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:400%20regular%3A400%3Anormal" el_class="p_capitalize"][vc_row_inner 0=""][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][contact-form-7 id="3274"][vc_text_separator title="SAY CALL US" color="custom" el_class="separator_h4" accent_color="#808080" css=".vc_custom_1508213857015{padding-top: 40px !important;}"][vc_custom_heading text="(425)555-1212" font_container="tag:h2|font_size:28|text_align:center|color:%23ffffff" google_fonts="font_family:Anaheim%3Aregular|font_style:400%20regular%3A400%3Anormal" el_class="p_capitalize"][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);