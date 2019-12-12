<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative services c6', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'c6.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" equal_height="yes" content_placement="middle"][vc_column width="1/2" css=".vc_custom_1506314870337{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 80px !important;background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/09/06-Still-waters-run-deep.jpg?id=2684) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][vc_column width="1/2" css=".vc_custom_1504832728738{padding-top: 120px !important;padding-right: 120px !important;padding-bottom: 80px !important;padding-left: 120px !important;}"][vc_custom_heading text="QUICKLY INNOVATE CENTURY
	VISIONARY MODELS DRAMATICALLY" font_container="tag:h2|font_size:20px|text_align:left|line_height:1.2" google_fonts="font_family:Montserrat%3Aregular%2C700|font_style:400%20regular%3A400%3Anormal"][vc_separator color="custom" accent_color="rgba(0,0,0,0.15)"][vc_column_text css=".vc_custom_1504832735205{margin-bottom: 140px !important;}"]Intrinsicly repurpose economically sound ideas through multidisciplinary products. Energistically promote synergistic customer service through compelling metrics.[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][service_box style="style-center style-above" icon_type="linecons" icon_linecons="vc_li vc_li-lab"][service_box style="style-center style-above" icon_type="linecons" icon_linecons="vc_li vc_li-megaphone"][/vc_column_inner][vc_column_inner width="1/2"][service_box style="style-center style-above" icon_type="linecons" icon_linecons="vc_li vc_li-study"][service_box style="style-center style-above" icon_type="linecons" icon_linecons="vc_li vc_li-camera"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);