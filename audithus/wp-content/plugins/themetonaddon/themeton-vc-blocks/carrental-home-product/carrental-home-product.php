<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental home product', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-home-product.jpg',
	'cat_display_name' => 'products',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row el_class="uk-text-center" css=".vc_custom_1510907709238{margin-top: 100px !important;}"][vc_column][vc_custom_heading text="List of Our Cars" font_container="tag:h2|font_size:36|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1510907648597{margin-bottom: 0px !important;}"][vc_custom_heading text="All types of cars for every occasion" font_container="tag:h4|text_align:center|color:%235b676f" use_theme_fonts="yes" el_class="dash" css=".vc_custom_1510907670894{padding-bottom: 40px !important;}"][/vc_column][/vc_row][vc_row vc_row_container="uk-container"][vc_column][mungu_carrental layout="grid" filter_widget="no" rent_type="style2" column="3" count="3"][/vc_column][/vc_row][vc_row][vc_column][con_button alignment="center" color="#fc8327" colortext="#ffffff" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcarrental%2Fhot-deals%2F|title:VIEW%20ALL%20CARS||"][/vc_column][/vc_row]
CONTENT
);