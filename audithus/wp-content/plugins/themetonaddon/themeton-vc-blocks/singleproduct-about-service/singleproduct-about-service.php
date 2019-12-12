<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct about service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-about-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_empty_space height="50px"][vc_custom_heading text="Core Values" font_container="tag:h2|font_size:38px|text_align:left|color:%23393939" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1505194119441{margin-bottom: 60px !important;}"][vc_row_inner][vc_column_inner width="1/3"][service_box style="default" icon_type="icon_image" image="42" imagesize="60x56" size="large" title="100% Client Satisfaction" desc="More impressive is that many of today's best models in smart watch."][/vc_column_inner][vc_column_inner width="1/3"][service_box style="default" icon_type="icon_image" image="44" imagesize="60x56" size="large" title="Money Back Guarantee" desc="More impressive is that many of today's best models in smart watch."][/vc_column_inner][vc_column_inner width="1/3"][service_box style="default" icon_type="icon_image" image="45" imagesize="60x56" size="large" title="Referral income" desc="More impressive is that many of today's best models in smart watch."][/vc_column_inner][/vc_row_inner][vc_empty_space height="50px"][/vc_column][/vc_row]
CONTENT
);