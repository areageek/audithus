<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-testimonails.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491267630621{margin-bottom: 0px !important;}"][vc_column][vc_custom_heading text="Testimonials" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][vc_column_text css=".vc_custom_1491268457123{margin-bottom: 10px !important;}"]
<p style="text-align: center;margin: 0;font-weight: 500">Our Customers Say</p>

[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1491268498151{margin-bottom: 100px !important;}"][vc_column][testimonial_grid input_type="post" post_type="testimonials" excerpt_length="25" pager="yes"][/vc_column][/vc_row]
CONTENT
);