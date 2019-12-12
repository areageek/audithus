<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry about content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-about-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_row_inner content_placement="middle"][vc_column_inner width="1/2" css=".vc_custom_1497959726671{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_single_image image="2442" img_size="full" css=".vc_custom_1510473670480{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="MISSION" font_container="tag:h3|font_size:18px|text_align:left|line_height:38px" use_theme_fonts="yes" css=".vc_custom_1497959998140{margin-bottom: 5px !important;}" el_class="uk-text-bold uk-text-uppercase career"][vc_column_text]The Cleaning Authority will be the leading provider of residential cleaning services by creating a positive impact on the quality of life of the customers we serve, the people we employ, and the franchisees we support.[/vc_column_text][vc_custom_heading text="VISION" font_container="tag:h3|font_size:18px|text_align:left|line_height:38px" use_theme_fonts="yes" css=".vc_custom_1497960035329{margin-bottom: 5px !important;}" el_class="uk-text-bold uk-text-uppercase career"][vc_column_text]Our system has been perfected carefully over the past 15+ years. This, coupled with our Professional Laundry Cleaning, enables us to ensure that each of our customers receives quality service.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);