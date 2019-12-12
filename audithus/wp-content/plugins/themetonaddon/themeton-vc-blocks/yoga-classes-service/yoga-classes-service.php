<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga classes service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-classes-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Our Courses" font_container="tag:h1|font_size:36px|text_align:center" use_theme_fonts="yes"][vc_custom_heading text="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
the industry's standard dummy text ever since the 1500s, when an unknown printer" font_container="tag:p|font_size:17px|text_align:center|color:%238e8e8e" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][vc_empty_space height="50px"][service_box style="yoga-service" categories="8" y_layout="layout2" ycolumn="3" count="8"][/vc_column][/vc_row]
CONTENT
);