<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry contact form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-contact-form.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1496909879529{padding-bottom: 60px !important;}"][vc_column width="1/4"][/vc_column][vc_column width="1/2"][vc_column_text]</p>
<h1 style="text-align: center;">MESSAGE US</h1>
<p>[/vc_column_text][contact-form-7 id="733"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]

CONTENT
);