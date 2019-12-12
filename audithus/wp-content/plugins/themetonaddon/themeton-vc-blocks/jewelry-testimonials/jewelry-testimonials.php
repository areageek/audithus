<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row"][vc_column 0=""][vc_custom_heading text="Buyers Review" font_container="tag:h2|font_size:36px|text_align:center|line_height:1.5em" use_theme_fonts="yes" css=".vc_custom_1510677003831{margin-bottom: 0px !important;}"][testimonial_rating style="1" color="#f2bd03" text_align="center"][testimonial_grid input_type="post" style="with_feature" post_type="testimonials" column="2" excerpt_length="15" count="8"][/vc_column][/vc_row]
CONTENT
);