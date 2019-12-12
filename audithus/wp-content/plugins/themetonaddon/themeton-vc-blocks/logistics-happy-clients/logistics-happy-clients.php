<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Happy Clients', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-happy-clients.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1491482627675{border-top-width: 1px !important;padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ff5e00 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;border-top-color: #dfebed !important;border-top-style: solid !important;border-radius: 1px !important;}"][vc_column 0=""][vc_custom_heading text="Happy Clients" font_container="tag:h2|font_size:30|text_align:left|color:%23ffffff" use_theme_fonts="yes" css=".vc_custom_1491531825595{margin-left: 15px !important;}" el_class="text-white"][mungu_content_testimonial input_type="post" theme_type="left" excerpt_length="55" post_type=""][/vc_column][/vc_row]
CONTENT
);