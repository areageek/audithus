<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry home service 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-home-service1.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1498208290813{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column 0=""][vc_custom_heading text="SERVICES" font_container="tag:h2|font_size:30px|text_align:left" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:800%20bold%20regular%3A800%3Anormal" css=".vc_custom_1498208866316{padding-bottom: 30px !important;}"][testimonial_grid input_type="post" style="with_icon" post_type="service" column="3" excerpt_length="13"][/vc_column][/vc_row]
CONTENT
);