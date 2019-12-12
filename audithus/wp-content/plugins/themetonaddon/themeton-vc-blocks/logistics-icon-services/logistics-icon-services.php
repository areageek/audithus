<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Services', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-icon-services.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row][vc_column width="1/3"][service_box style="style-boxed" bgcolor="#ffffff" icon_type="fontawesome" icon_fontawesome="fa fa-map-o" title="Real Time Tracking" desc="Unknown printer took a galley of type and scrambled it to make a type specimen book survived."][/vc_column][vc_column width="1/3"][service_box style="style-boxed" bgcolor="#ffffff" icon_type="fontawesome" icon_fontawesome="fa fa-umbrella" title="Insurance Coverage" desc="Unknown printer took a galley of type and scrambled it to make a type specimen book survived."][/vc_column][vc_column width="1/3"][service_box style="style-boxed" bgcolor="#ffffff" icon_type="fontawesome" icon_fontawesome="fa fa-clock-o" title="Ontime Delivery" desc="Unknown printer took a galley of type and scrambled it to make a type specimen book survived."][/vc_column][/vc_row][vc_row][vc_column width="1/3"][/vc_column][vc_column width="1/3"][con_button alignment="center" color="#ff5e00" conbutton="url:http%3A%2F%2Fdemo.themeton.com%2Fmedical%2Fpages%2Fappointment%2F|title:GET%20A%20QUOTE||"][/vc_column][vc_column width="1/3"][/vc_column][/vc_row]
CONTENT
);