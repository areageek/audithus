<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex"][vc_column width="1/6" vc_column_flex_auto="uk-width-auto@m"][logo 0=""][/vc_column][vc_column width="3/6" vc_column_flex_auto="uk-width-expand@m" css=".vc_custom_1510309311554{margin-right: 50px !important;}"][header_container halign="uk-flex-middle" align="uk-flex-right"][menu menu="Main Primary" extra_class="uk-visible@m realestate-menu" menu_id="primary-nav"][/header_container][/vc_column][vc_column width="2/6" vc_column_flex_auto="uk-width-auto@m"][header_container halign="uk-flex-middle" align="uk-flex-right"][con_button color="#cdf6fb" colortext="#24b9cd" border="" extra_class="left-button" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Frealestate%2Fsign-up%2F|title:signup||"][login icon_type="fontawesome" extra_class="right_btn"][/header_container][/vc_column][/vc_row]
CONTENT
);