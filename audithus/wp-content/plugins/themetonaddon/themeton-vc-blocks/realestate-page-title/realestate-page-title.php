<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1511495195961{background-image: url(http://next.themeton.com/realestate/wp-content/uploads/sites/20/2017/06/background.png?id=2319) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="uk-text-center"][vc_column][page_title fontfamily="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal" font_size="35px" text_align="center" extra_class="uk-text-uppercase"][/vc_column][/vc_row]
CONTENT
);