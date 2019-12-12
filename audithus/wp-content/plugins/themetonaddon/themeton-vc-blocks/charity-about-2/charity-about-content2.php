<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity about content2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-about-content2.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1493383567677{padding-top: 60px !important;padding-bottom: 60px !important;background-image: url(http://next.themeton.com/charity/wp-content/uploads/sites/5/2017/03/Layer-1-copy1.jpg?id=1350) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2" css=".vc_custom_1493383524375{padding-right: 60px !important;}"][vc_single_image image="1360" img_size="medium"][vc_custom_heading text="Mission" font_container="tag:h2|text_align:left|color:%23ffffff" use_theme_fonts="yes"][vc_column_text 0="" el_class="text-white"]Almost twenty percent of the refugees are children. Many have become separated from their families or fled on their own. All have suffered tremendous loss.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_single_image image="1361" img_size="medium"][vc_custom_heading text="vision" font_container="tag:h2|text_align:left|color:%23ffffff" use_theme_fonts="yes"][vc_column_text 0="" el_class="text-white"]As we known there are almost sixty per cent of the refugees are children. Many have become separated from their families or fled on their own. All have suffered tremendous loss.[/vc_column_text][/vc_column][/vc_row]
CONTENT
);