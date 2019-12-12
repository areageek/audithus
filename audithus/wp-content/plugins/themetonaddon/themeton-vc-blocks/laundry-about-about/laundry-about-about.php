<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry about about', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-about-about.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1494843773346{padding-bottom: 50px !important;}"][vc_column width="1/2"][vc_custom_heading text="What we are " font_container="tag:h2|font_size:30|text_align:left|color:%23161720" use_theme_fonts="yes" el_class="uk-text-bold uk-text-uppercase"][vc_custom_heading text="We are doing something different, something exciting and it takes passionate people to bring our vision to life. We have built a culture that leads with the important notion we live by every day; do what you love. If this resonates with you, we look forward to receiving your application. The drying process for doing laundry at home is either hanging clothes on a clothesline or tumbling them in a gas- or electric-heated dryer." font_container="tag:p|font_size:%2015px|text_align:left|line_height:36px" use_theme_fonts="yes" css=".vc_custom_1510472411015{margin-bottom: 5px !important;}"][/vc_column][vc_column width="1/2"][icon_list icon_type="fontawesome" icon_fontawesome="fa fa-arrow-circle-o-right" color="#39ae48" list="%5B%7B%22item%22%3A%22Wash%20and%20100%25%20Dry%20clothes%20in%20Just%201%20Hour.%22%7D%2C%7B%22item%22%3A%22Responsible%20for%20dry%20cleaning%20guest%20and%20associate%20clothing%20with%20care.%22%7D%2C%7B%22item%22%3A%22Using%20all%20laundry%20equipment%20and%20appropriate%20safety%20standards.%22%7D%2C%7B%22item%22%3A%22Wash%20and%20100%25%20Dry%20clothes%20in%20Just%201%20Hour.%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);