<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Contact simplux form-2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'contact-form-2.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1503987829485{padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_column width="2/3"][vc_custom_heading text="Contact Me" font_container="tag:h2|font_size:40px|text_align:left|line_height:48px" use_theme_fonts="yes"][vc_column_text]
	
	Proactively develop reliable users and intermandated systems.
	Enthusiastically procrastinate corporate experiences.
	
	[/vc_column_text][contact-form-7 id="715"][/vc_column][vc_column width="1/3"][vc_column_text]
	
	Our location
	
	1668 Cheshire Road, Sindiaka street
	Stratford, CT 06497, Charlstone bridge
	Standard venue[/vc_column_text][vc_column_text]
	
	Open hours
	
	Monday: 08 AM - 18 PM.
	Tuesday: 08 AM - 18 PM.
	Wednesday: 08 AM - 18 PM.
	Thursday: 08 AM - 18 PM.
	Friday: 08 AM - 18 PM.
	Saturday: 08 AM - 18 PM.
	Sunday: closed.[/vc_column_text][vc_column_text]
	
	Career info
	
	I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo contact@simplux.com[/vc_column_text][/vc_column][/vc_row]
CONTENT
);
