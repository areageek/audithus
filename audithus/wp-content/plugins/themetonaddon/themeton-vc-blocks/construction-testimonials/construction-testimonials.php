<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_themeton="yes" vc_row_container="uk-container" vc_row_flex="uk-flex" css=".vc_custom_1496828671767{margin-bottom: 100px !important;}"][vc_column][vc_custom_heading text="Happy Clients" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal"][testimonial_grid input_type="post" layout="list" home_view="" post_type="testimonials" excerpt_length="35" pager="yes" count="5"][/vc_column][/vc_row]
CONTENT
);