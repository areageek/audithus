<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity event counter', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-event-counter.jpg',
	'cat_display_name' => 'counters',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1509340421196{padding-top: 30px !important;padding-bottom: 30px !important;}"][vc_column width="1/4"][logo 0=""][/vc_column][vc_column width="3/4"][header_container halign="uk-flex-middle" align="uk-flex-right"][menu menu="Main Menu" extra_class="uk-visible@m" menu_id="primary-nav"][vc_btn title="DONATE" style="custom" custom_background="#fa6950" custom_text="#ffffff" shape="round" size="sm" link="url:http%3A%2F%2Fnext.themeton.com%2Fcharity%2Fdonate%2F|||" css=".vc_custom_1510130316641{margin-bottom: 0px !important;}" el_class="charity-button"][/header_container][/vc_column][/vc_row]
CONTENT
);