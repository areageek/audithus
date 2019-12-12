<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel contact address', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-contact-address.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" content_placement="middle" css=".vc_custom_1492576161115{padding-top: 0px !important;padding-bottom: 0px !important;background-color: #f4f6ef !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2" css=".vc_custom_1498703709722{padding-top: 455px !important;background-image: url(http://next.themeton.com/hotel/wp-content/uploads/sites/4/2017/03/Contact-Us.jpg?id=1306) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][vc_column width="1/3" el_class="pl0@m" css=".vc_custom_1509435830208{padding-left: 90px !important;}"][vc_column_text]
<h2 style="text-align: left">Address</h2>
<p style="text-align: left"><strong>70 Bowman St.</strong>
<strong>South Windsor, CT 06074</strong>
<strong>Second Street, Canada</strong>

Phone : +5866 5586 005
Email : info@nexthote.com[/vc_column_text][con_button color="#aab198" colortext="#ffffff" border="1" colorborder="#aab198" conbutton="|title:Location%20map|target:%20_blank|" css=".vc_custom_1509435626217{margin-bottom: 45px !important;}"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);