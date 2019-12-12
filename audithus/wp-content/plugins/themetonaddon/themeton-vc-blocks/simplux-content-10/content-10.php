<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_attr__( 'Content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'content-10.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row content_placement="middle"][vc_column width="1/2"][vc_single_image image="2109" img_size="large"][/vc_column][vc_column width="1/2"][vc_custom_heading text="But I must explain to you how all this mistaken idea of denouncing pleasure and praising." font_container="tag:h3|text_align:left" use_theme_fonts="yes"][vc_empty_space][con_progress title="Development" value="95" subtitle="Strategy Team Work"][con_progress title="Design Consulting" value="80" subtitle="Design Department Work"][/vc_column][/vc_row]
CONTENT
);