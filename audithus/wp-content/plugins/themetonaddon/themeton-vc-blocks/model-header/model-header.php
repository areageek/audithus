<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_container="uk-container" vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex" el_id="header" css=".vc_custom_1500617131241{margin-top: 20px !important;margin-bottom: 20px !important;}"][vc_column width="1/2" vc_column_flex_auto="uk-width-auto@m" vc_column_valignment="uk-flex uk-flex-middle"][logo][/vc_column][vc_column width="1/2" vc_column_flex_auto="uk-width-expand@m" vc_column_valignment="uk-flex uk-flex-middle" vc_column_alignment="uk-flex uk-flex-right"][hamburger_button display="desktop" style="style1"][/vc_column][/vc_row]
CONTENT
);