<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry about testimonial', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-about-testimonial.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_row_inner css=".vc_custom_1510751227400{background-color: #f6f6f6 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column_inner][completed_projects layout="feautured" excerpt_length="60" categories="57"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);