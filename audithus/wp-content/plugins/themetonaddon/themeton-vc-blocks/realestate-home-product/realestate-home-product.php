<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate home product', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-home-product.jpg',
	'cat_display_name' => 'products',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1507706351743{padding-top: 62px !important;}"][vc_column][vc_custom_heading text="Featured Listing" font_container="tag:h3|font_size:25|text_align:center|color:%23000000|line_height:1em" google_fonts="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal" el_class="uk-text-uppercase" css=".vc_custom_1507706342367{padding-bottom: 20px !important;}"][mungu_carrental layout="grid" filter_widget="no" rent_type="style3" column="3"][vc_btn title="View all" style="custom" custom_background="#6db91c" custom_text="#ffffff" shape="round" align="center" link="url:http%3A%2F%2Fnext.themeton.com%2Frealestate%2Flisting-list-view%2F|||" css=".vc_custom_1510817358214{margin-top: 30px !important;}"][/vc_column][/vc_row]
CONTENT
);