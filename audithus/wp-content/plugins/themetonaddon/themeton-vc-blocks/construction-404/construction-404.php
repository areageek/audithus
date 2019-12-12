<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction 404', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-404.jpg',
	'cat_display_name' => '404',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row equal_height="yes" content_placement="middle"][vc_column width="1/2"][vc_single_image image="1695" img_size="full" alignment="right" css_animation="bounceIn"][/vc_column][vc_column width="1/2" css=".vc_custom_1510022399581{margin-top: 40px !important;margin-bottom: 40px !important;}"][vc_custom_heading text="404" font_container="tag:h1|font_size:180|text_align:center|color:%230a0a0a|line_height:1" use_theme_fonts="yes"][vc_custom_heading text="<i>Oop's</i> The nothing pound" font_container="tag:h2|text_align:center|line_height:1" use_theme_fonts="yes" el_class="errror" css=".vc_custom_1510022450287{margin-top: 0px !important;margin-bottom: 20px !important;}"][con_button alignment="center" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fconstruction%2F|title:Back%20to%20Home||"][/vc_column][/vc_row]
CONTENT
);