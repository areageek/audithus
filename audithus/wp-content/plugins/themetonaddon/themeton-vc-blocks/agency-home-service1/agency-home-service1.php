<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency home service 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-home-service1.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1496202234927{padding-top: 60px !important;}"][vc_column css=".vc_custom_1496202225757{border-bottom-width: 1px !important;border-bottom-color: #f4f4f4 !important;border-bottom-style: solid !important;}"][vc_row_inner][vc_column_inner css=".vc_custom_1498186787865{margin-left: -15px !important;padding-top: 20px !important;padding-bottom: 40px !important;}"][vc_custom_heading text="services" font_container="tag:h2|font_size:28|text_align:left|color:%230c0c0c|line_height:0" use_theme_fonts="yes" el_class="uk-text-bold uk-text-uppercase"][/vc_column_inner][/vc_row_inner][carousel_anythings slidetype="container" items="4" thumbnails_arrow_position="top_rights" extra_class="home_service"][vc_row_inner][vc_column_inner][service_box style="style-center style-above" icon_type="icon_image" image="1525" imagesize="40x40" title="Web Designing" desc="Lorem Ipsum is simply
dummy text of the printing typesetting industry Ipsum..."][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][service_box style="style-center style-above" icon_type="icon_image" image="1528" imagesize="40x40" title="Graphic Designing" desc="Lorem Ipsum is simply
dummy text of the printing typesetting industry Ipsum..."][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][service_box style="style-center style-above" icon_type="icon_image" image="1526" imagesize="40x40" title="Web Developing" desc="Lorem Ipsum is simply
dummy text of the printing typesetting industry Ipsum..."][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][service_box style="style-center style-above" icon_type="icon_image" image="1529" imagesize="40x40" title="Video Editing" desc="Lorem Ipsum is simply
dummy text of the printing typesetting industry Ipsum..."][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][service_box style="style-center style-above" icon_type="icon_image" image="1527" imagesize="40x40" title="SEO Optimization" desc="Lorem Ipsum is simply
dummy text of the printing typesetting industry Ipsum..."][/vc_column_inner][/vc_row_inner][/carousel_anythings][/vc_column][/vc_row]
CONTENT
);