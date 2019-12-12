<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry 404', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-404.jpg',
	'cat_display_name' => '404',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="bottom" css=".vc_custom_1510126430581{padding-top: 620px !important;padding-bottom: 0px !important;background-image: url(http://next.themeton.com/laundry/wp-content/uploads/sites/10/2017/11/404.jpg?id=2375) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_empty_space height="55px"][/vc_column][/vc_row][vc_row css=".vc_custom_1510126439831{margin-top: -140px !important;margin-bottom: 100px !important;}"][vc_column][con_button alignment="center" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Flaundry%2F|title:Back%20to%20Home%20page||"][/vc_column][/vc_row]
CONTENT
);