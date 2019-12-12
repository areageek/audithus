<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Services Specialties', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-services-specialties.jpg',
	'cat_display_name' => 'Services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1490344768477{padding-top: 60px !important;padding-bottom: 90px !important;}"][vc_column 0=""][vc_custom_heading text="Our Specialties" font_container="tag:h2|font_size:30|text_align:center" use_theme_fonts="yes" el_class="dash heading2"][mungu_Service_bordered image_type="icon"][vc_row_inner][vc_column_inner width="1/2"][con_button alignment="right" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Flogistics%2Fpages%2Fappointment%2F|title:Ship%20your%20product||"][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1491471365790{margin-left: -15px !important;}"][con_button color="#36536c" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Flogistics%2Fteam-item%2Fdr-twanda-costas-2%2F|title:Call%20Our%20agent||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);