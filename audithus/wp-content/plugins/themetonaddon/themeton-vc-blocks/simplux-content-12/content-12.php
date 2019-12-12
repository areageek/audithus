<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_attr__( 'Content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'content-12.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row content_placement="middle"][vc_column width="1/2"][vc_single_image image="2128" img_size="large" style="vc_box_border" border_color="white"][/vc_column][vc_column width="1/2"][vc_custom_heading text="But I must explain to you how all this mistaken idea of denouncing pleasure and praising." font_container="tag:h3|font_size:30px|text_align:left|line_height:40px" use_theme_fonts="yes"][con_progress title="<strong>Development</strong>Strategy Team Work" value="95%"][con_progress title="<strong>Design Consulting</strong>Design Department Work" value="80%"][/vc_column][/vc_row]
CONTENT
);