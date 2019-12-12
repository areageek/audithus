<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental about gallery', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-about-gallery.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1510887398736{padding-top: 40px !important;padding-bottom: 80px !important;background-color: #f2f2f2 !important;}" el_class="uk-text-center"][vc_column][vc_custom_heading text="Gallery" font_container="tag:h2|font_size:36|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1512527934252{margin-bottom: 5px !important;}"][vc_custom_heading text="Our featured gallery" font_container="tag:h4|text_align:center|color:%235b676f" use_theme_fonts="yes" el_class="dash" css=".vc_custom_1510887276460{padding-bottom: 40px !important;}"][vc_row_inner vc_row_container="uk-container"][vc_column_inner][mungu_portfolio count="3" column="3" title_position="none" space="uk-grid-small" hoverstyle="darken" post_type="portfolio"][/vc_column_inner][/vc_row_inner][con_button alignment="center" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcarrental%2Fgallery-3%2F|title:FULL%20GALLERY||"][/vc_column][/vc_row]
CONTENT
);