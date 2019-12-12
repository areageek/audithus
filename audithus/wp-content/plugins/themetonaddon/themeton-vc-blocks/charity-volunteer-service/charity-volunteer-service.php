<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity volunteer service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-volunteer-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1517386264861{background-color: #f4f4f4 !important;}"][vc_column][vc_custom_heading text="WHY WE NEED YOUR HELF" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes" el_class="mvb0"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1493883301961{padding-top: 65px !important;padding-bottom: 65px !important;background-color: #f4f4f4 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/4"][vc_single_image image="1535" img_size="medium" el_class="donaticon"][vc_column_text]

We want to help to as many as we can
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.[/vc_column_text][vc_column_text][/vc_column_text][/vc_column][vc_column width="1/4"][vc_single_image image="1534" img_size="medium" el_class="donaticon"][vc_column_text]

Your support will bring more energy
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.[/vc_column_text][/vc_column][vc_column width="1/4"][vc_single_image image="1536" img_size="medium" el_class="donaticon"][vc_column_text]

We can work together we can help more
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.[/vc_column_text][/vc_column][vc_column width="1/4"][vc_single_image image="1533" img_size="medium" el_class="donaticon"][vc_column_text]

We always believe in team
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.[/vc_column_text][/vc_column][/vc_row]
CONTENT
);