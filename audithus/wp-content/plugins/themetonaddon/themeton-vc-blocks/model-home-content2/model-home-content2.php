<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model home content ', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-home-content2.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" el_class=".back-z" css=".vc_custom_1501053213798{background-color: #ffffff !important;}"][vc_column width="1/12"][/vc_column][vc_column width="9/12" css=".vc_custom_1501055036915{padding-top: 70px !important;}"][vc_custom_heading text="Preview" font_container="tag:h1|font_size:245px|text_align:right|color:%23f3f3f3" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1501054495436{margin-top: -70px !important;margin-right: -280px !important;}"][video_tab title="Preview" group="%5B%7B%22video_url%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DndLShQlA17M%26t%3D2s%22%2C%22icon%22%3A%221555%22%7D%2C%7B%22video_url%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3Dj-AkjO32gyw%22%2C%22icon%22%3A%221644%22%7D%2C%7B%22video_url%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D9qb30I9ivMg%22%2C%22icon%22%3A%221640%22%7D%5D"]This is Photoshop's version  of Lorem Ipsum. Proin<br />
gravida nibh vel velit auctor aliquet. Aenean sollicitudin,<br />
lorem quis bibendum auctor[/video_tab][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]

CONTENT
);