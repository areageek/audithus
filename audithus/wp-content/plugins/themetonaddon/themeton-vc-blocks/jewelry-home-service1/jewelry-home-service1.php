<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry home products', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-home-service1.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510718355703{padding-top: 100px !important;padding-bottom: 0px !important;}"][vc_column 0=""][vc_custom_heading text="New arrivels" font_container="tag:h2|font_size:38|text_align:center|color:%23000000" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row][vc_row 0="" css=".vc_custom_1510719076394{padding-right: 90px !important;padding-left: 90px !important;}"][vc_column 0=""][vc_basic_grid post_type="product" max_items="3" item="1598" grid_id="vc_gid:1511427617702-17841a4d-c7f7-4" taxonomies="47"][/vc_column][/vc_row]

CONTENT
);