<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel about us content 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-about-us-content_1.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1492507524957{padding-bottom: 50px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_custom_heading text="Welcome to Next" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes"][vc_column_text 0=""]
<h4 style="text-align: center;">A charming hotel conveniently located in the heart of Amsterdam’s District within close of the main museums, popular shopping areas and historic landmarks.</h4>
<p style="text-align: center;">The NextHotel is situated in ten prestigious 17th century canalside houses. The historical character of the building is reflected in the stylish hotel rooms, each of which is unique and luxuriously furnished and fitted with all modern conveniences, such as free Wi-Fi. Most of the rooms also offer stunning views of the famous canals.</p>

[/vc_column_text][con_button alignment="center" color="rgba(0,0,0,0.01)" colortext="#898d80" border="1" colorborder="rgba(137,141,128,0.84)" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhotel%2Fservice%2F|title:READ%20MORE|target:%20_blank|"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);