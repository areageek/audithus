<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga home service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-home-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Yoga can help" font_container="tag:h2|font_size:30|text_align:center|color:%23000000|line_height:1em" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1515142400957{margin-top: 30px !important;margin-bottom: 40px !important;}"][service_box style="yoga-service" categories="7" ycolumn="4" count="4"][vc_empty_space][/vc_column][/vc_row]
CONTENT
);