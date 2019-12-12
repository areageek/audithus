<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity event detail', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-event-detail.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Family Advent" font_container="tag:h1|font_size:53|text_align:center"][vc_column_text css=".vc_custom_1499155237404{padding-right: 40px !important;padding-left: 40px !important;}"]

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1517994658933{background-image: url(http://next.themeton.com/church/wp-content/uploads/sites/11/2017/06/church-17-1024x683.jpg?id=1383) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_empty_space height="660px"][/vc_column][/vc_row][vc_row css=".vc_custom_1500184355983{margin-bottom: 100px !important;}"][vc_column width="1/2"][vc_column_text]Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised.[/vc_column_text][vc_custom_heading text="Event Highlights" font_container="tag:h3|font_size:26px|text_align:left" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal"][icon_list icon_type="fontawesome" icon_fontawesome="fa fa-chevron-circle-right" color="#53555c" extra_class="border" list="%5B%7B%22item%22%3A%22Nulla%20venenatis%20arcu%20id%20est%20vulpurare%20tempor.%22%7D%2C%7B%22item%22%3A%22Nulla%20venenatis%20arcu%20id%20est%20vulpurare%20tempor.%22%7D%2C%7B%22item%22%3A%22Nulla%20venenatis%20arcu%20id%20est%20vulpurare%20tempor.%22%7D%2C%7B%22item%22%3A%22Nulla%20venenatis%20arcu%20id%20est%20vulpurare%20tempor.%22%7D%5D"][/vc_column][vc_column width="1/2"][contact-form-7 id="733"][/vc_column][/vc_row]
CONTENT
);