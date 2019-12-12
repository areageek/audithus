<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry about service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-about-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1510284137725{padding-top: 30px !important;padding-bottom: 30px !important;}"][vc_column width="1/6"][logo 0=""][/vc_column][vc_column width="1/6"][wp_search group="%5B%7B%7D%5D"][/vc_column][vc_column width="2/3"][header_container halign="uk-flex-middle" align="uk-flex-right"][menu menu="Main Menu" extra_class="uk-visible@m mungu-jewellry-menu" menu_id="primary-nav" sticky="no"][hamburger_button 0=""][login icon_type="fontawesome" css=".vc_custom_1511181576015{margin-left: 60px !important;}"][vc_single_image image="1866" img_size="full" onclick="custom_link" css=".vc_custom_1510903911190{margin-bottom: 0px !important;border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 8px !important;padding-right: 12px !important;padding-bottom: 2px !important;padding-left: 12px !important;border-left-color: rgba(255,255,255,0.87) !important;border-left-style: solid !important;border-right-color: rgba(255,255,255,0.87) !important;border-right-style: solid !important;border-top-color: rgba(255,255,255,0.87) !important;border-top-style: solid !important;border-bottom-color: rgba(255,255,255,0.87) !important;border-bottom-style: solid !important;border-radius: 35px !important;}" link="http://next.themeton.com/jewelry/shop"][/header_container][/vc_column][/vc_row]

CONTENT
);