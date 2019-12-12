<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics News', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-blog.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491267326951{padding-top: 70px !important;}"][vc_column 0=""][vc_custom_heading text="Latest News" font_container="tag:h2|font_size:30|text_align:left|line_height:1" use_theme_fonts="yes" link="|||" css=".vc_custom_1491483998687{margin-bottom: 0px !important;}"][con_post categories="home-posts" count="3" style="3" ratio="2x1" excerpts="" readmoretext="Read More" pagination=""][con_button alignment="center" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Flogistics%2Fblog%2Fblog-grid%2F|title:VIEW%20FULL%20NEWS||"][/vc_column][/vc_row][vc_row css=".vc_custom_1491545712388{margin-top: 100px !important;border-top-width: 1px !important;padding-top: 30px !important;padding-bottom: 65px !important;border-top-color: #e9e3e0 !important;border-top-style: solid !important;}"][vc_column css=".vc_custom_1491490502081{padding-right: 0px !important;padding-left: 0px !important;}"][mungu_swiper list="%5B%7B%22image%22%3A%221023%22%7D%2C%7B%22image%22%3A%221022%22%7D%2C%7B%22image%22%3A%221026%22%7D%2C%7B%22image%22%3A%221025%22%7D%2C%7B%22image%22%3A%221024%22%7D%2C%7B%22image%22%3A%221021%22%7D%2C%7B%22image%22%3A%221022%22%7D%2C%7B%22image%22%3A%221023%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);