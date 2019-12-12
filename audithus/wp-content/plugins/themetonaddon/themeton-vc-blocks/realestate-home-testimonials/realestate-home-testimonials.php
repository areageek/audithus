<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate home testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-home-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
 [vc_row full_width="stretch_row" css=".vc_custom_1511185909099{margin-top: 50px !important;padding-top: 0px !important;padding-bottom: 45px !important;background-image: url(http://next.themeton.com/realestate/wp-content/uploads/sites/20/2017/11/Happy-clients.jpg?id=2258) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column css=".vc_custom_1507889107966{padding-top: 20px !important;padding-bottom: 20px !important;}"][vc_custom_heading text="happy clients" font_container="tag:h3|font_size:25|text_align:center|color:%23000000|line_height:1em" google_fonts="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal" el_class="uk-text-uppercase" css=".vc_custom_1507800668690{padding-top: 50px !important;padding-bottom: 10px !important;}"][mungu_content_testimonial input_type="post" arrows="hide" qoute="none" bullets="hide" theme_type="style4" excerpt_length="25"][/vc_column][/vc_row] 

CONTENT
);