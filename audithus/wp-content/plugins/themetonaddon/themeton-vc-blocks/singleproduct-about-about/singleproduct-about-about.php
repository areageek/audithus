<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct about ', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-about-about.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510307992491{border-top-width: 1px !important;border-top-color: #e5e5e5 !important;border-top-style: solid !important;}"][vc_column][vc_empty_space height="30px"][vc_custom_heading source="post_title" font_container="tag:h1|font_size:52px|text_align:center|color:%23393939" use_theme_fonts="yes" css=".vc_custom_1506411756477{margin-bottom: 10px !important;}"][vc_custom_heading text="sophisticated elegance" font_container="tag:h3|font_size:20px|text_align:center|color:%23898989" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1505192681963{margin-top: 0px !important;}"][vc_empty_space height="50px"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" equal_height="yes" content_placement="middle"][vc_column width="1/2"][vc_single_image image="121" img_size="full"][/vc_column][vc_column width="4/12" css=".vc_custom_1505193195808{padding-left: 60px !important;}"][vc_custom_heading text="See simplified heart rate zones for quickly checking exercise intensity during workouts continuous, wrist-based heart rate monitoring. Use multi-sport tracking to track runs, cardio, cross-training, biking and more. Effortlessly and automatically record other workouts to your dashboard with smart tracking." font_container="tag:p|font_size:18px|text_align:left|color:%23898989" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][vc_custom_heading text="Enable connected GPS to map your routes and see run stats like pace and duration on display when your phone is nearby." font_container="tag:p|font_size:18px|text_align:left|color:%23898989" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][/vc_column][vc_column width="2/12"][/vc_column][/vc_row]
CONTENT
);