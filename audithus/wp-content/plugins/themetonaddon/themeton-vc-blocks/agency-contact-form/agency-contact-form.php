<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency contact form', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-contact-form.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1498711209552{margin-bottom: 50px !important;padding-top: 20px !important;padding-bottom: 0px !important;background-color: #ffffff !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/4" css=".vc_custom_1498711366886{margin-top: -100px !important;}"][vc_column_text 0=""]
<h3 style="font-weight: bold;">Address:</h3>
&nbsp;
<h3 style="font-weight: bold;">Contact:</h3>
&nbsp;
<h3 style="font-weight: bold;">Social media:</h3>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1498711413540{margin-top: -100px !important;border-left-width: 1px !important;border-left-color: #dddfe0 !important;border-left-style: solid !important;}"][vc_column_text css=".vc_custom_1494407830069{padding-left: 30px !important;}"]70 Bowman St.
South Windsor, CT 06074
Second Street, Canada

Phone : +5866 5586 005
Email : info@nexthote.com[/vc_column_text][vc_empty_space height="30px"][vc_row_inner 0=""][vc_column_inner css=".vc_custom_1494571048253{padding-left: 35px !important;}"][vc_icon icon_fontawesome="fa fa-facebook" color="white" background_style="rounded" background_color="blue" size="xs" el_class="contact_icons" link="url:https%3A%2F%2Fwww.facebook.com%2F|||"][vc_icon icon_fontawesome="fa fa-linkedin" color="white" background_style="rounded" background_color="custom" size="xs" el_class="contact_icons" custom_background_color="#1379b7" link="url:https%3A%2F%2Fwww.linkedin.com%2F|||"][vc_icon icon_fontawesome="fa fa-twitter" color="white" background_style="rounded" background_color="sky" size="xs" el_class="contact_icons" link="url:https%3A%2F%2Ftwitter.com%2F%3Flang%3Den|||"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4" vc_column_themeton="yes" css=".vc_custom_1498711987117{margin-top: -330px !important;margin-left: 100px !important;}"][vc_column_text 0=""]
<h3 style="font-weight: bold;">Message Us:</h3>
[/vc_column_text][/vc_column][vc_column width="1/4"][contact-form-7 id="1798"][/vc_column][/vc_row]
CONTENT
);