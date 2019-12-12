<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga contact', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-contact.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1510314236128{margin-bottom: 30px !important;border-bottom-width: 1px !important;border-bottom-color: #e5e5e5 !important;border-bottom-style: solid !important;}"][vc_column width="1/3" css=".vc_custom_1510314268675{padding-top: 60px !important;padding-right: 30px !important;padding-left: 30px !important;}"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-map-marker" title="ADDRESS" desc="7920 Glenlake<br />
Avenue Ankeny, IA 50023"][/vc_column][vc_column width="1/3" css=".vc_custom_1510314274790{border-right-width: 1px !important;border-left-width: 1px !important;padding-top: 60px !important;padding-right: 30px !important;padding-left: 30px !important;border-left-color: #e5e5e5 !important;border-left-style: solid !important;border-right-color: #e5e5e5 !important;border-right-style: solid !important;}"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-envelope-open" title="EMAIL" desc="info@nextfitness.com<br />
info@nextfitness.com"][/vc_column][vc_column width="1/3" css=".vc_custom_1510314280458{padding-top: 60px !important;padding-right: 30px !important;padding-left: 30px !important;}"][service_box style="default" icon_type="fontawesome" icon_fontawesome="fa fa-volume-control-phone" title="PHONE" desc="Gym : +9987 5628 6663<br />
Helpline : (998) 004 225"][/vc_column][/vc_row]
CONTENT
);