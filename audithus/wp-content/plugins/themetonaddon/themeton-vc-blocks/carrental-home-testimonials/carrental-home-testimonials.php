<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental home testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-home-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510831564082{padding-bottom: 50px !important;}"][vc_column el_class="uk-light uk-text-center hr-light" css=".vc_custom_1506418520981{background-color: #fc8327 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_custom_heading text="Happy Clients" font_container="tag:h2|font_size:36|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1510909817166{margin-top: 30px !important;margin-bottom: 0px !important;}"][vc_custom_heading text="What our customers say about us" font_container="tag:h4|text_align:center|color:%235b676f" use_theme_fonts="yes" el_class="dash text-white" css=".vc_custom_1510909835567{padding-bottom: 40px !important;}"][mungu_content_testimonial input_type="post" arrows="hide" bullets_style="thumb_image" theme_type="car" excerpt_length="45"][/vc_column][/vc_row]

CONTENT
);