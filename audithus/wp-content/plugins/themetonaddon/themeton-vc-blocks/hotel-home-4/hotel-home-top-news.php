<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel home top news', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-home-top-news.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" css=".vc_custom_1509509543129{padding-top: 55px !important;padding-bottom: 65px !important;background-color: #f4f6ef !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column css_animation="fadeInUp" width="1/2"][vc_wp_posts title="Latest News &amp; Offers" number="3" show_date="1" el_class="mungu-custom-post"][vc_row_inner][vc_column_inner css=".vc_custom_1492584178284{padding-top: 30px !important;}"][con_button color="#acb78d" colortext="#ffffff" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhotel%2Fblog%2F|title:VIEW%20ALL|target:%20_blank|"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image image="1535" img_size="large" alignment="right" css_animation="fadeInUp"][/vc_column][/vc_row]
CONTENT
);