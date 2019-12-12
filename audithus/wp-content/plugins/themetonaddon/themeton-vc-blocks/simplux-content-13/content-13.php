<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_attr__( 'Content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'content-13.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row full_width="stretch_row_content_no_spaces" content_placement="middle" parallax="content-moving" parallax_image="2724" css=".vc_custom_1506660735935{padding-top: 98px !important;padding-bottom: 127px !important;}"][vc_column width="1/4"][/vc_column][vc_column width="1/2"][modal url="http://www.youtube.com/embed/YE7VzlLtp-4" group="%5B%7B%7D%5D"][vc_custom_heading text="We design products, packaging and user experiences with a unique research based process i call informed Creativity" font_container="tag:div|font_size:24px|text_align:center|color:%23ffffff|line_height:32px" use_theme_fonts="yes" css=".vc_custom_1506598828962{margin-top: 40px !important;}"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT
);