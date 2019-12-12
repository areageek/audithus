<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction home testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-home-testimonails.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes" css=".vc_custom_1496836234935{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][vc_custom_heading text="Happy Clients" font_container="tag:h2|font_size:34|text_align:center" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" link="url:http%3A%2F%2Fnext.themeton.com%2Fconstruction%2Ftestimonials-item%2Fneet-and-cleaning%2F|title:Happy%20Clients||"][testimonial_grid input_type="post" layout="list" post_type="testimonials" excerpt_length="35" count="1"][vc_custom_heading text="Full Testimonials" font_container="tag:p|font_size:24|text_align:right|color:%23f54983" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" link="url:http%3A%2F%2Fnext.themeton.com%2Fconstruction%2Fpages%2Ftestimonials%2F|||" css=".vc_custom_1496837902071{margin-top: -115px !important;}"][/vc_column][/vc_row]
CONTENT
);