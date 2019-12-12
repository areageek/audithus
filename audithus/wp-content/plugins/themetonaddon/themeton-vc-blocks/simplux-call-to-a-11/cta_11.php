<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_11', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_11.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1508727074620{padding-top: 30px !important;padding-bottom: 30px !important;background-color: #141414 !important;}"][vc_column width="2/3"][vc_custom_heading text="Simple page on the outside, tasty on the inside" font_container="tag:h2|font_size:28|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" el_class="p_capitalize font24@s" css=".vc_custom_1509368815818{padding-top: 5px !important;}"][/vc_column][vc_column width="1/3"][vc_btn title="Try to Simple" style="custom" custom_background="#fe0000" custom_text="#ffffff" align="left" el_class="align_c\@s"][/vc_column][/vc_row]
CONTENT
);