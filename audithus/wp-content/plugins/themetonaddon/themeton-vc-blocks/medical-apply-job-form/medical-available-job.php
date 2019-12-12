<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Available Job', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-apply-job-form.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1490614376345{background-color: #deecea !important;}"][vc_column css=".vc_custom_1490618505862{padding-right: 100px !important;padding-left: 100px !important;}"][vc_empty_space height="60px"][contact-form-7 id="432"][vc_empty_space height="100px"][/vc_column][/vc_row]
CONTENT
);