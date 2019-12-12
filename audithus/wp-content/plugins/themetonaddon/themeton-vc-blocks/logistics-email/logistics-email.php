<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Logistics Email', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-email.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" parallax="content-moving" css=".vc_custom_1491471549881{background-image: url(http://next.themeton.com/logistics/wp-content/uploads/sites/3/2017/03/Layer-80.png?id=937) !important;}"][vc_column css=".vc_custom_1491471492068{padding-top: 229px !important;padding-bottom: 230px !important;}"][vc_custom_heading text="Email Your Resume" font_container="tag:h2|font_size:24px|text_align:center|color:%23ffffff|line_height:24px" use_theme_fonts="yes" el_class="no-decoration"][vc_custom_heading text="info@nextlog.com" font_container="tag:h2|font_size:60px|text_align:center|color:%23ffffff|line_height:60px" use_theme_fonts="yes" link="url:http%3A%2F%2Fnext.themeton.com%2Flogistics%2Fpages%2Fcareer%2F||target:%20_blank|" el_class="no-decoration"][/vc_column][/vc_row]
CONTENT
);