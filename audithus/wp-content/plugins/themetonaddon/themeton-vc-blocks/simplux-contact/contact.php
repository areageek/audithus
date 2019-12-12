<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative contact form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'contact.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row equal_height="yes"][vc_column width="5/12" css=".vc_custom_1503891831279{margin-top: 70px !important;}"][icon_heading extra_class="right-yellow-full-contact" heading_text="
	
	" image="2394" contents="asd asd asd " text="contact us"][/vc_column][vc_column width="7/12"][vc_empty_space el_class="uk-hidden@m"][contact-form-7 id="2370"][vc_empty_space el_class="uk-hidden@m"][/vc_column][/vc_row]
CONTENT
);