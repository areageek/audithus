<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate home service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-home-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1507719684779{margin-top: 60px !important;padding-bottom: 50px !important;background-color: #eff4f7 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_custom_heading text="What are you looking" font_container="tag:h3|font_size:25|text_align:center|color:%23000000|line_height:1em" google_fonts="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal" el_class="uk-text-uppercase" css=".vc_custom_1507719588584{margin-bottom: -20px !important;padding-top: 50px !important;}"][mungu_images_mosanry_simple list="%5B%7B%22image%22%3A%222292%22%2C%22role%22%3A%22405%22%2C%22desc%22%3A%22independence%20homes%22%2C%22addclass%22%3A%22x32%22%2C%22url%22%3A%22%23%22%7D%2C%7B%22image%22%3A%222299%22%2C%22role%22%3A%22456%22%2C%22desc%22%3A%22office%20space%22%2C%22addclass%22%3A%2211%22%2C%22url%22%3A%22%23%22%7D%2C%7B%22image%22%3A%222294%22%2C%22role%22%3A%22260%22%2C%22desc%22%3A%22appertments%22%2C%22addclass%22%3A%22x23%22%2C%22url%22%3A%22dd%22%7D%2C%7B%22image%22%3A%222308%22%2C%22role%22%3A%2223%22%2C%22desc%22%3A%22township%22%2C%22url%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row]

CONTENT
);