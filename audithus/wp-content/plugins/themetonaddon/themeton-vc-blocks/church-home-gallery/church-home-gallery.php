<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church home gallery', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-home-gallery.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1498558395091{margin-top: 100px !important;}"][vc_column 0=""][vc_row_inner css=".vc_custom_1510131967447{background-color: #c5841e !important;}"][vc_column_inner css=".vc_custom_1498558631902{padding-top: 94px !important;padding-bottom: 27px !important;}"][vc_custom_heading text="OUR GALLERY" font_container="tag:h2|font_size:30|text_align:center|color:%23ffffff" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1498558437829{margin-bottom: 20px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" vc_row_overlay="yes" vc_row_overlay_color="rgba(0,0,0,0.36)" css=".vc_custom_1517894756117{background-image: url(http://next.themeton.com/church/wp-content/uploads/sites/11/2017/06/l2.jpg?id=1387) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_row_inner vc_row_container="uk-container" vc_row_height="300px" css=".vc_custom_1517895435053{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_inner][vc_gallery interval="3" images="1259,1260,1258,1255" img_size="1192x500" onclick=""][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);