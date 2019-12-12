<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row content_placement="middle"][vc_column width="1/4"][logo logo="custom_logo" image="20" link="url:http%3A%2F%2Fnext.themeton.com%2Fsingleproduct%2Fhome-2%2F|||"][/vc_column][vc_column width="3/4"][header_container halign="uk-flex-middle" align="uk-flex-right"][menu menu="Main Menu" extra_class="uk-visible@m" menu_id="primary-nav" css=".vc_custom_1510292392940{margin-right: 30px !important;}"][vc_btn title="Buy Now" style="custom" custom_background="#00d463" custom_text="#ffffff" shape="round" link="url:http%3A%2F%2Fnext.themeton.com%2Fsingleproduct%2Fproduct%2Four-product%2F|||" css=".vc_custom_1511495970124{margin-bottom: 0px !important;margin-left: 10px !important;}"][/header_container][/vc_column][/vc_row]
CONTENT
);