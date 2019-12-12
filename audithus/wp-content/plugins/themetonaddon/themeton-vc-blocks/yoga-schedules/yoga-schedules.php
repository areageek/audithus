<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga schedules', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-schedules.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="All Schedules" font_container="tag:h1|font_size:36px|text_align:center|color:%230a0a0a" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][vc_custom_heading text="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been<br />
the industry's standard dummy text ever since the 1500s, when an unknown printer" font_container="tag:p|font_size:17px|text_align:center|color:%238e8e8e" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1513852826218{margin-bottom: 45px !important;}"][schedule style="yoga" cgroup="%5B%7B%22lesson%22%3A%22Yoga%2FLena%20Winton%22%2C%22day%22%3A%22monday%22%2C%22time%22%3A%225.00-6.00%20AM%22%7D%2C%7B%22lesson%22%3A%22Yoga%2FJodi%20Kamerer%22%2C%22day%22%3A%22thursday%22%2C%22time%22%3A%226.00-7.00%20PM%22%7D%2C%7B%22lesson%22%3A%22Yoga%2FJodi%20Kamerer%22%2C%22day%22%3A%22sunday%22%2C%22time%22%3A%225.00-6.00%20AM%22%7D%2C%7B%22lesson%22%3A%22Zumba%2FLena%20Winton%22%2C%22day%22%3A%22tuesday%22%2C%22time%22%3A%226.00-7.00%20AM%22%7D%2C%7B%22lesson%22%3A%22Yoga%2FLena%20Winton%22%2C%22day%22%3A%22saturday%22%2C%22time%22%3A%226.00-7.00%20AM%22%7D%2C%7B%22lesson%22%3A%22Yoga%2FKelie%20Ohare%22%2C%22day%22%3A%22saturday%22%2C%22time%22%3A%227.00-8.30%20PM%22%7D%2C%7B%22lesson%22%3A%22Yoga%2FJodi%20Kamerer%22%2C%22day%22%3A%22monday%22%2C%22time%22%3A%227.00-8.30%20AM%22%7D%2C%7B%22lesson%22%3A%22Yoga%2FKelie%20Ohare%22%2C%22day%22%3A%22thursday%22%2C%22time%22%3A%227.00-8.30%20AM%22%7D%2C%7B%22lesson%22%3A%22Yoga%2FKelie%20Ohare%22%2C%22day%22%3A%22sunday%22%2C%22time%22%3A%227.00-8.30%20AM%22%7D%2C%7B%22lesson%22%3A%22Zumba%2FLena%20Winton%22%2C%22day%22%3A%22sunday%22%2C%22time%22%3A%226.00-7.00%20PM%22%7D%5D"][vc_empty_space height="100px"][/vc_column][/vc_row]
CONTENT
);