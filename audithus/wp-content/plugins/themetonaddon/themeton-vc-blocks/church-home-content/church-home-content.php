<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church home content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-home-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" equal_height="yes" css=".vc_custom_1498557396693{margin-top: 100px !important;}"][vc_column width="2/12"][/vc_column][vc_column width="5/12"][vc_custom_heading text="LATEST SERMONS" font_container="tag:h2|font_size:30|text_align:left|color:%230a0a0a" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1498631280174{margin-bottom: 47px !important;}"][mungu_events style="3" columns="1" category="sermons" count="3"][/vc_column][vc_column width="5/12" css=".vc_custom_1500961182036{background-image: url(http://next.themeton.com/church/wp-content/uploads/sites/11/2017/06/Layer-111.jpg?id=860) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_custom_heading text="SERMONS" font_container="tag:h1|font_size:65px|text_align:left|color:%23eaeaeb" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" el_class="vertical-text"][/vc_column][/vc_row]
CONTENT
);