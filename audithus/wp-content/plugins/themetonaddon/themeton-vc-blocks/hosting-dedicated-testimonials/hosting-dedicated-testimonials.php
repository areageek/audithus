<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting dedicated testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-dedicated-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510321490045{padding-top: 70px !important;padding-bottom: 0px !important;}"][vc_column][vc_custom_heading text="Testimonials" font_container="tag:h2|font_size:28px%20|text_align:left|color:%23000000" use_theme_fonts="yes" css=".vc_custom_1510321427905{margin-bottom: -30px !important;padding-left: 50px !important;}"][testimonial_grid input_type="post" style="with_feature" post_type="testimonials" column="1" excerpt_length="35" count="1"][/vc_column][/vc_row]

CONTENT
);