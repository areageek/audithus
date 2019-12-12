<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction home service2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-home-service2.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" gap="30" css=".vc_custom_1510044348318{margin-right: 0px !important;margin-left: 0px !important;padding-top: 50px !important;padding-bottom: 65px !important;background-color: #e9f0f3 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="home_project"][vc_column 0=""][vc_custom_heading text="Our Projects" font_container="tag:h2|font_size:34|text_align:left" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1510042397869{margin-left: -18px !important;padding-bottom: 10px !important;}"][carousel_anythings slidetype="posttype" post_type="portfolio" ratio="3x2" count="6" items="2" items_desktop_small="2" thumbnails="true" arrow_show="false"][/carousel_anythings][/vc_column][/vc_row]
CONTENT
);