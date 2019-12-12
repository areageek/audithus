<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491267630621{margin-bottom: 0px !important;}"][vc_column][vc_custom_heading text="Happy Clients" font_container="tag:h2|font_size:30|text_align:left|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][/vc_column][/vc_row][vc_row css=".vc_custom_1491268498151{margin-bottom: 100px !important;}"][vc_column][testimonial_grid input_type="post" style="lined" post_type="testimonials" column="2" excerpt_length="25"][/vc_column][/vc_row]
CONTENT
);