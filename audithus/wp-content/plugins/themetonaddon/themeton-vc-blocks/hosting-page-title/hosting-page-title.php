<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" content_placement="middle" css=".vc_custom_1510631476713{padding-top: 50px !important;padding-bottom: 80px !important;background-image: url(http://next.themeton.com/hosting/wp-content/uploads/sites/13/2017/07/hosting-page-title-image.jpg?id=3010) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][header_container halign="uk-flex-middle" align="uk-flex-center"][breadcrumb extra_class="host-breadcrumb"][/header_container][page_title default_font="yes" color="#ffffff" font_size="37px" text_align="center" extra_class="uk-text-uppercase" css=".vc_custom_1510889522161{margin-top: 0px !important;margin-bottom: 0px !important;}"][/vc_column][/vc_row]
CONTENT
);