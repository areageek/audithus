<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church home testimonial', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-home-testimonial.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510395866808{margin-top: 60px !important;}"][vc_column css=".vc_custom_1498730670266{padding-right: 0px !important;padding-left: 0px !important;}"][vc_custom_heading text="TESTIMONIAL" font_container="tag:h2|font_size:30|text_align:center|color:%230a0a0a" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1510389889944{margin-bottom: -35px !important;}"][mungu_content_testimonial input_type="post" arrows_position="top" bullets="hide" theme_type="boxed" excerpt_length="30" view_per="3"][/vc_column][/vc_row]
CONTENT
);