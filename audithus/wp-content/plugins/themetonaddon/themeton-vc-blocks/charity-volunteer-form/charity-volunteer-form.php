<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity volunteer form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-volunteer-form.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1493891222184{padding-bottom: 100px !important;}"][vc_column][contact-form-7 id="432"][/vc_column][/vc_row]
CONTENT
);