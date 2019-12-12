<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_attr__( 'Content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'content-8.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" css=".vc_custom_1500448310087{background-color: #292b31 !important;}"][vc_column width="1/2" css=".vc_custom_1491903397500{padding-top: 120px !important;padding-right: 100px !important;padding-bottom: 100px !important;padding-left: 250px !important;}" el_class="text-white"][vc_custom_heading text="Melisa Loret: Fashions Showcase from Paris" font_container="tag:h2|font_size:44px|text_align:left|color:%23ffffff|line_height:54px" use_theme_fonts="yes"][vc_column_text]Proactively develop reliable users and intermandated systems. Enthusiastically
	procrastinate corporate experiences vis-a-vis multidisciplinary customer service.[/vc_column_text][vc_row_inner content_placement="middle"][vc_column_inner width="1/3"][vc_single_image image="769" img_size="full"][/vc_column_inner][vc_column_inner width="2/3"][vc_custom_heading text="Proactively develop reliable users and Extented systems. " font_container="tag:h4|font_size:22px|text_align:left|color:%23ffffff|line_height:26px" use_theme_fonts="yes"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" css=".vc_custom_1500448182140{background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/04/blog-06.jpg?id=2110) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_btn title="SEE SHOWCASE" style="outline" shape="square" color="white" align="center" link="url:http%3A%2F%2Fthemeton%2Fsimplux%2Fpages%2Fabout-service-2%2F|title:SEE%20SHOWCASE||"][/vc_column][/vc_row]
CONTENT
);