<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct about team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-about-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1505194264222{background-color: #eeeff3 !important;}"][vc_column][vc_empty_space height="50px"][vc_custom_heading text="Dedicated Team" font_container="tag:h2|font_size:38px|text_align:center|color:%23393939" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal"][vc_single_image image="851" img_size="full" alignment="center" css=".vc_custom_1510805223640{margin-bottom: 0px !important;}"][/vc_column][/vc_row]
CONTENT
);