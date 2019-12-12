<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry about content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-about-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1502349939857{padding-top: 50px !important;}"][vc_column][vc_custom_heading text="Our Partners" font_container="tag:h2|font_size:38|text_align:center|line_height:51px" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1502350607196{padding-bottom: 30px !important;}"][carousel_anythings slidetype="container" items="5" arrow_show="false"][vc_row_inner][vc_column_inner][vc_single_image image="1542" img_size="large"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][vc_single_image image="1544" img_size="large"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][vc_single_image image="1543" img_size="large"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][vc_single_image image="1545" img_size="large"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][vc_single_image image="1546" img_size="large"][/vc_column_inner][/vc_row_inner][/carousel_anythings][/vc_column][/vc_row]
CONTENT
);