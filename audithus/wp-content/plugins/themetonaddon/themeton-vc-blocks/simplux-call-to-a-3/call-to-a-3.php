<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_3', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_3.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1508404742583{background-color: #141414 !important;border-radius: 15px !important;}"][vc_column 0=""][vc_row_inner 0=""][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][vc_custom_heading text="get started" font_container="tag:h2|font_size:14|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:400%20regular%3A400%3Anormal" el_class="uppercase" css=".vc_custom_1508125868784{margin-bottom: 0px !important;padding-top: 5px !important;padding-bottom: 0px !important;}"][vc_custom_heading text="Nonstop Simple luxure website will brighten your day." font_container="tag:h2|font_size:42|text_align:center|color:%23ffffff|line_height:1.3" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1509360835361{margin-top: 0px !important;padding-top: 0px !important;padding-bottom: 15px !important;}" el_class="font24@s"][vc_btn title="Purchase for $150" style="custom" custom_background="#ffffff" custom_text="#0a0a0a" shape="round" align="center" css=".vc_custom_1508404509067{margin-bottom: 50px !important;}"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT
);