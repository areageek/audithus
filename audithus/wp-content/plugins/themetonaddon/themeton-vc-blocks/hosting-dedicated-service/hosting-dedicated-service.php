<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting dedicated service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-dedicated-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510314008031{padding-top: 0px !important;padding-bottom: 0px !important;background-color: #e9f6fa !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column css=".vc_custom_1510297588789{padding-top: 80px !important;}"][vc_custom_heading text="All Our<br />
Plans Include" font_container="tag:h2|font_size:28px%20|text_align:left|color:%23000000" use_theme_fonts="yes"][vc_row_inner css=".vc_custom_1510297708893{margin-top: 35px !important;}"][vc_column_inner width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2713" imagesize="35x35" title="Free Domain" desc="Popularised in the 1960s with the release of Letraset containing Lorem Ipsum passages."][/vc_column_inner][vc_column_inner width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2715" imagesize="35x35" title="One click install apps" desc="Lorem Ipsum is simply dummy<br />
text of the printing and typesetting industry."][/vc_column_inner][vc_column_inner width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2714" imagesize="35x35" title="30 days money back" desc="Popularised in the 1960s with the release of Letraset containing Lorem Ipsum passages."][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1510297765292{padding-bottom: 30px !important;}"][vc_column_inner width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2716" imagesize="35x35" title="Website Monitoring" desc="Many desktop publishing packages and web page editors now use Lorem."][/vc_column_inner][vc_column_inner width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2717" imagesize="32x32" title="Easy to Control Panel" desc="There are many variations of passages of Lorem Ipsum available , but the majarity "][/vc_column_inner][vc_column_inner width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2712" imagesize="35x35" title="SSL Certificate" desc="Popularised in the 1960s with the release of Letraset containing Lorem Ipsum passages."][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT
);