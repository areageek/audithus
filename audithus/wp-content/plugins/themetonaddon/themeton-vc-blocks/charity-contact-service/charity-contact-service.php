<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity contact service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-contact-service.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1493113255778{margin-bottom: 25px !important;}"][vc_column width="1/4"][/vc_column][vc_column width="1/2"][vc_column_text][contact-form-7 id="1158"][/vc_column_text][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT
);