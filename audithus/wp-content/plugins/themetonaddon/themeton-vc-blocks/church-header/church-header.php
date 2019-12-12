<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0=""][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_custom_heading source="post_title" font_container="tag:h1|font_size:53|text_align:center|color:%231e1818" google_fonts="font_family:Playfair%20Display%20SC%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" el_class="mvb0" css=".vc_custom_1499402953115{margin-bottom: 30px !important;}"][vc_column_text]
<p style="text-align: center;"><span style="color: #666666;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur massa libero, feugiat pellentesque accumsan at, posuere eget justo. Etiam sit amet nulla sed metus auctor sodales nec et est. Etiam ut suscipit ante. Cras finibus feugiat nisl quis sollicitudin.</span></p>

[/vc_column_text][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row vc_row_height="457px" css=".vc_custom_1499403454786{margin-top: 20px !important;margin-bottom: 100px !important;background-image: url(http://next.themeton.com/church/wp-content/uploads/sites/11/2017/06/Layer-111.jpg?id=860) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][/vc_column][/vc_row]
CONTENT
);