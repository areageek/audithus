<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1505195354839{border-top-width: 1px !important;border-top-color: #e5e5e5 !important;border-top-style: solid !important;}"][vc_column][vc_empty_space height="20px"][page_title fontfamily="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" color="#393939" font_size="52px" text_align="center" css=".vc_custom_1511504815967{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_custom_heading text="sophisticated elegance" font_container="tag:h2|font_size:20px|text_align:center|color:%23898989|line_height:2em" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1510306924246{margin-top: 10px !important;}"][vc_empty_space height="40px"][/vc_column][/vc_row]
CONTENT
);