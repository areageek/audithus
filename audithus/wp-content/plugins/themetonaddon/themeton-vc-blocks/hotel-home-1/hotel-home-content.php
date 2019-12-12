<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel home content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-home-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1492577727452{padding-top: 45px !important;padding-bottom: 55px !important;}"][vc_column width="1/2"][vc_custom_heading text="Welcome to Next" font_container="tag:h2|font_size:30|text_align:left|line_height:1" use_theme_fonts="yes" link="url:http%3A%2F%2Fdemo.themeton.com%2Fmedical%2Fservice-item%2Fgynecology%2F|||" el_class="mvb0"][vc_custom_heading text="We make you want to stay in the best hotel in the Hotel, Asia, please come to visit for a custom trip options. Our various fun options bring your satisfaction at highest level." font_container="tag:h4|font_size:20px|text_align:left|line_height:36px" use_theme_fonts="yes" el_class="text-500"][vc_column_text]
<p style="text-align: left;">More that 25 hotel rooms and conference halls are waiting for you. We offer you 5 star luxury service and you can stay here a long time and have your time fun. You can take your time here and make your special events such as Wedding, Meeting, Conference at convenient price ...</p>

[/vc_column_text][con_button color="rgba(0,0,0,0.01)" colortext="#000000" border="1" colorborder="#aab198" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhotel%2Fblog%2F|title:Read%20more||"][/vc_column][vc_column width="1/2" css=".vc_custom_1492577433799{margin: 50px !important;}"][ui_card group="%5B%7B%22link%22%3A%22url%3Ahttp%253A%252F%252Fnext.themeton.com%252Fhotel%252Fservice-item%252Fbulk-waste-haulage%252F%7Ctitle%3AGym%2520%2526%2520Spa%7C%7C%22%2C%22image%22%3A%221520%22%7D%2C%7B%22link%22%3A%22url%3Ahttp%253A%252F%252Fnext.themeton.com%252Fhotel%252Fservice-item%252Fsupply-chain-solution%252F%7Ctitle%3AEvents%2520%2526%2520Wedding%7C%7C%22%2C%22image%22%3A%221524%22%7D%2C%7B%22link%22%3A%22url%3Ahttp%253A%252F%252Fnext.themeton.com%252Fhotel%252Fportfolio-item%252Fhospital-back-view%252F%7Ctitle%3ARestaurant%7C%7C%22%2C%22image%22%3A%221502%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);