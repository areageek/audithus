<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row equal_height="yes" content_placement="middle" el_class="header-laundry"][vc_column width="1/6"][logo 0=""][/vc_column][vc_column width="1/4" css=".vc_custom_1509349788633{border-right-width: 1px !important;border-left-width: 1px !important;border-left-color: #e2e3ea !important;border-left-style: solid !important;border-right-color: #e2e3ea !important;border-right-style: solid !important;}"][header_container halign="uk-flex-middle" align="uk-flex-center"][vc_custom_heading text="PHONE:" font_container="tag:h2|font_size:14px%20|text_align:left|color:%23898a95" use_theme_fonts="yes" css=".vc_custom_1509349513158{margin-bottom: 0px !important;}" el_class="uk-text-bold uk-text-uppercase"][vc_custom_heading text="586-958-5545" font_container="tag:h2|font_size:14px%20|text_align:left|color:%233d3d3d" use_theme_fonts="yes" css=".vc_custom_1510038704280{margin-top: 0px !important;margin-bottom: 0px !important;margin-left: 10px !important;}" el_class="uk-text-bold uk-text-uppercase" link="url:tel%3A586-958-5545|||"][/header_container][/vc_column][vc_column width="7/12"][header_container halign="uk-flex-middle" align="uk-flex-right"][menu select="style2" menu="Main Menu" extra_class="uk-visible@m" menu_id="primary-nav"][/header_container][/vc_column][/vc_row]
CONTENT
);