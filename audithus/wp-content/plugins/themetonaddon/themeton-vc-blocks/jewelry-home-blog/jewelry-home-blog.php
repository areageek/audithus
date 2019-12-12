<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry home blog', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-home-blog.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510286959206{margin-bottom: -110px !important;padding-top: 50px !important;padding-bottom: 100px !important;background-color: #f6f6f6 !important;}"][vc_column 0=""][vc_custom_heading text="Blog updates" font_container="tag:h2|font_size:38|text_align:center|color:%23000000|line_height:51px" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][con_post count="5" style="7" pagination=""][vc_row_inner css=".vc_custom_1510286968200{margin-bottom: 50px !important;}"][vc_column_inner css=".vc_custom_1510286026941{padding-right: 60px !important;}"][con_button alignment="right" color="rgba(0,0,0,0.01)" border="" extra_class="jewelry-button pr4" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fjewelry%2Fshop%2F|title:Visit%20Blog||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT
);