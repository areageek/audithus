<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Appoinment', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-appoinment.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Schedule an Appointment" font_container="tag:h1|font_size:30px|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1491199431562{margin-bottom: 0px !important;}"][vc_column_text]
<p style="text-align: center"><strong>Fill our booking form below</strong></p>
[/vc_column_text][contact-form-7 id="188"][/vc_column][/vc_row]
CONTENT
);