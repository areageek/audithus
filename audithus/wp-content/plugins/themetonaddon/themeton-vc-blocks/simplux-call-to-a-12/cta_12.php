<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative call to actions cta_12', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cta_12.png',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1508725059845{padding-top: 30px !important;padding-bottom: 30px !important;background-color: #17c967 !important;}"][vc_column][vc_custom_heading text="Simple free better than best." font_container="tag:h2|font_size:28|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" el_class="p_capitalize font24@s" css=".vc_custom_1509368929907{padding-top: 5px !important;}"][/vc_column][/vc_row]
CONTENT
);