<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_attr__( 'Content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'service-1.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row equal_height="yes" content_placement="middle" css=".vc_custom_1503634034777{margin-top: 60px !important;margin-bottom: 100px !important;}"][vc_column width="1/2"][vc_custom_heading text="Service Introduction" font_container="tag:h3|font_size:36px|text_align:left|line_height:44px" use_theme_fonts="yes"][vc_column_text]Competently leverage existing progressive strategic theme areas before global technologies. Completely enable team driven sources and intermandated channels. Compellingly pursue installed base metrics and intuitive conceptualize front-end imperatives whereas interactive users.[/vc_column_text][vc_custom_heading text="Our Service Covers All Your Needs" font_container="tag:h2|font_size:20px|text_align:left|line_height:24px" use_theme_fonts="yes"][icon_list ol="yes" color="#47ae89" extra_class="m0 pl0" list="%5B%7B%22item%22%3A%22Enable%20market-driven%20schemas%20before%20bleeding%20edge%20results.%22%7D%2C%7B%22item%22%3A%22Rapidiously%20network%20viral%20methodologies%20before%20integrated%20mindshare.%22%7D%2C%7B%22item%22%3A%22Rapidiously%20maximize%20tactical.%22%7D%2C%7B%22item%22%3A%22Leverage%20other's%20customized%20models%20through%20mission%20critical%20products.%22%7D%5D"][/vc_column][vc_column width="1/2"][vc_video][/vc_column][/vc_row]
CONTENT
);