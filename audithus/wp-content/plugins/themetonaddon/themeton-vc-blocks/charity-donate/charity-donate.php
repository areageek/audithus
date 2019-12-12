<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity donate', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-donate.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="1/4"][/vc_column][vc_column width="1/2"][vc_column_text]
<h3 style="text-align: center; color: #171620; font-size: 26px;">Donate Now</h3>
<p style="text-align: center;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>
[/vc_column_text][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][/vc_column][vc_column width="1/2"][contact-form-7 id="1545"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT
);