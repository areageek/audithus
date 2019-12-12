<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'realestate home content search', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'realestate-home-content2.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1511493410665{padding-top: 172px !important;padding-bottom: 172px !important;background-image: url(http://next.themeton.com/realestate/wp-content/uploads/sites/20/2017/11/Group-1.png?id=2317) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_custom_heading text="Find The Property For<br />
Rent or Sale" font_container="tag:h2|font_size:35|text_align:center|color:%23000000|line_height:1em" google_fonts="font_family:Oswald%3A300%2Cregular%2C700|font_style:400%20regular%3A400%3Anormal" el_class="uk-text-uppercase"][vc_row_inner css=".vc_custom_1510908244214{margin-top: 50px !important;}"][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][nxt_filter post_type="rent" form_style="style-4" list="%5B%7B%22form_type%22%3A%22rent%22%2C%22placeholder%22%3A%22Buy%22%2C%22column%22%3A%221-6%22%7D%2C%7B%22form_type%22%3A%22location%22%2C%22placeholder%22%3A%22Location%22%2C%22column%22%3A%22auto%22%7D%2C%7B%22form_type%22%3A%22property_type%22%2C%22placeholder%22%3A%22Property%20type%22%2C%22column%22%3A%22auto%22%7D%2C%7B%22form_type%22%3A%22budget%22%2C%22placeholder%22%3A%22Budget%22%2C%22column%22%3A%221-5%22%7D%5D"][vc_custom_heading text="Advanced search" font_container="tag:p|font_size:18|text_align:right|color:%2347c2d3" use_theme_fonts="yes" link="url:http%3A%2F%2Fnext.themeton.com%2Frealestate%2F%3Fs%3Dhello|title:advenced%20search||rel:nofollow" el_class="realsearch"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT
);