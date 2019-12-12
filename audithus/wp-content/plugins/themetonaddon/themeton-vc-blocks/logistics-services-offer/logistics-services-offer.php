<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Services We offer', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-services-offer.jpg',
	'cat_display_name' => 'Services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491402189020{padding-top: 98px !important;padding-bottom: 88px !important;}"][vc_column 0=""][vc_row_inner][vc_column_inner width="1/3"][/vc_column_inner][vc_column_inner width="1/3"][vc_custom_heading text="Services We Offer" font_container="tag:h2|font_size:30|text_align:center|line_height:1" use_theme_fonts="yes" link="url:http%3A%2F%2Fnext.themeton.com%2Flogistics%2Fservice%2Fservice-column-2%2F|||" el_class="mvb0 dash heading1" css=".vc_custom_1499046275991{padding-bottom: 50px !important;}"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][/vc_row_inner][mungu_service_grid carousel="yes" input_type="post" layout="logistics" bullets="hide" count="7" slide_per_view="4"][/vc_column][/vc_row]
CONTENT
);