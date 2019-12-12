<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Creative contents blog-12', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'blog-12.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" css=".vc_custom_1507795494383{padding-top: 680px !important;padding-bottom: 100px !important;background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/07/001-Slide-1024x576.png?id=2858) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_custom_heading text="CHOOSE" font_container="tag:h2|font_size:179|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:700%20bold%20regular%3A700%3Anormal"][vc_row_inner][vc_column_inner width="1/2"][vc_custom_heading text="to" font_container="tag:h2|font_size:179|text_align:right|color:%23ffffff" google_fonts="font_family:Alex%20Brush%3Aregular|font_style:400%20regular%3A400%3Anormal" el_class="line-height-1"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="SHINE" font_container="tag:h2|font_size:179|text_align:left|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:700%20bold%20regular%3A700%3Anormal" el_class="line-height-1"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);

