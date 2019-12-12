<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry home slider products', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-home-products.jpg',
	'cat_display_name' => 'products',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0="" full_width="stretch_row" css=".vc_custom_1510751060411{margin-top: -100px !important;padding-top: 125px !important;padding-bottom: 70px !important;background-image: url(http://next.themeton.com/jewelry/wp-content/uploads/sites/16/2017/03/jewelry-half-background.png?id=1810) !important;}" el_class="background-full"][vc_column 0=""][mungu_woo_product count="10" pagination_align="uk-flex-right"][/vc_column][/vc_row]

CONTENT
);