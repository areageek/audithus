<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry home content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-home-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510751349524{margin-top: 70px !important;padding-bottom: 70px !important;background-image: url(http://next.themeton.com/jewelry/wp-content/uploads/sites/16/2017/03/z.jpg?id=1610) !important;}" el_class="bg-right-bottom bg-repeat"][vc_column width="1/2"][vc_custom_heading text="You deserve only the<br />
best on the biggest day " font_container="tag:h2|font_size:38|text_align:left|color:%23000000|line_height:51px" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][vc_column_text 0=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore esse cillum dolore[/vc_column_text][mungu_woo_product count="5" style="style2"][/vc_column][vc_column width="1/2"][/vc_column][/vc_row]

CONTENT
);