<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model home blog', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-home-blog.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510209561438{margin-bottom: 100px !important;}"][vc_column][vc_custom_heading text="Blog" font_container="tag:h1|font_size:245px|text_align:right|color:%23f3f3f3" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1501054712420{margin-top: -90px !important;margin-left: -240px !important;}" el_class="uk-position-absolute"][vc_row_inner][vc_column_inner][vc_btn title="VISIT BLOG" shape="square" color="white" css=".vc_custom_1510207996934{border-top-width: 2px !important;border-right-width: 2px !important;border-bottom-width: 2px !important;border-left-width: 2px !important;border-left-color: #c8c8c8 !important;border-left-style: solid !important;border-right-color: #c8c8c8 !important;border-right-style: solid !important;border-top-color: #c8c8c8 !important;border-top-style: solid !important;border-bottom-color: #c8c8c8 !important;border-bottom-style: solid !important;border-radius: 4px !important;}" link="url:http%3A%2F%2Fnext.themeton.com%2Fmodel%2Fblog%2F|||" el_class="shop_btn model-right"][vc_custom_heading text="Blog updates" font_container="tag:h1|font_size:51px|text_align:left|color:%23000000" use_theme_fonts="yes" el_class="z-text uk-position-relative"][/vc_column_inner][/vc_row_inner][con_post count="3" style="6" ratio="8x7" pagination=""][/vc_column][/vc_row]

CONTENT
);