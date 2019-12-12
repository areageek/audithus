<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting home service 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-home-service1.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1499247001937{padding-top: 62px !important;padding-bottom: 18px !important;background-color: #f0f9fc !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/3" css=".vc_custom_1499246016101{padding-right: 40px !important;padding-left: 40px !important;}"][service_box style="style-center" icon_type="icon_image" image="2373" imagesize="138x138" size="large" title="Find your Domain" desc="Your business starts with a great domain. We make it easy and inexpensive to get the domain you want, fast." link="dddd"][/vc_column][vc_column width="1/3" css=".vc_custom_1499246876431{margin-top: -30px !important;padding-right: 30px !important;padding-left: 30px !important;}"][service_box style="style-center" icon_type="icon_image" image="2380" imagesize="166x166" size="large" title="Choose Hosting from Plans" desc="High performance hosting for your WordPress or other CMS sites, from personal projects to high profile clients." link="dddd"][/vc_column][vc_column width="1/3" css=".vc_custom_1499246188395{padding-right: 40px !important;padding-left: 40px !important;}"][service_box style="style-center" icon_type="icon_image" image="2379" imagesize="138x138" size="large" title="Build your Personal Site" desc="Professional grade virtual private servers, with or without your choice of control panel and operation systems." link="dddd"][/vc_column][/vc_row]
CONTENT
);