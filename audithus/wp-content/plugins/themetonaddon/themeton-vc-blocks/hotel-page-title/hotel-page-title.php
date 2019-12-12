<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" vc_row_themeton="yes" css=".vc_custom_1509592805858{background-image: url(http://next.themeton.com/hotel/wp-content/uploads/sites/4/2017/04/Layer-30.png?id=1141) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="hotel-title"][vc_column vc_column_themeton="yes" css=".vc_custom_1509592829024{padding-bottom: 60px !important;}"][vc_empty_space height="160px"][vc_custom_heading source="post_title" font_container="tag:h1|font_size:42px|text_align:center|color:%23ffffff|line_height:1.2em" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1509696307004{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_empty_space height="70px"][/vc_column][/vc_row]
CONTENT
);