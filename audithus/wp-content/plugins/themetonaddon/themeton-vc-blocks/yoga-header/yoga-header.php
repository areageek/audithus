<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row content_placement="middle"][vc_column width="1/4"][logo 0="" logo="custom_logo" image="291" logo_width="120px"][/vc_column][vc_column width="3/4"][header_container halign="uk-flex-middle" align="uk-flex-right"][menu menu="Main Menu" extra_class="uk-visible@m" menu_id="primary-nav"][/header_container][/vc_column][/vc_row]
CONTENT
);