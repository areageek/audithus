<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'model footer', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-footer.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width=stretch_row content_placement=middle css=.vc_custom_1510749597349{border-top-width 1px !important;padding-top 20px !important;padding-bottom 30px !important;border-top-color #f3f3f3 !important;border-top-style solid !important;} el_class=footer-model-over][vc_column width=512 css=.vc_custom_1510209102652{padding-top 0px !important;}][vc_custom_heading text=Next. font_container=tagh2font_size30pxtext_alignleft use_theme_fonts=yes link= el_class=element-footer-logo css=.vc_custom_1500538459314{margin-bottom 0px !important;}][vc_custom_heading text=All rights reserved to next theme font_container=tagdivfont_size15text_alignleftcolor%239b9b9b google_fonts=font_familyPlayfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italicfont_style400%20regular%3A400%3Anormal el_class=model-left-float][vc_column][vc_column width=16 css=.vc_custom_1510209110165{padding-top 0px !important;}][header_container halign=uk-flex-top align=uk-flex-center][vc_icon icon_fontawesome=fa fa-angle-up color=custom background_style=rounded-outline background_color=custom size=xs align=center custom_color=#d3d3d3 link=url%23header el_class=smoothscroll uk-position-absolute custom_background_color=#d3d3d3][header_container][vc_column][vc_column width=512][header_container halign=uk-flex-top align=uk-flex-right][vc_wp_custommenu nav_menu=22 el_class=remove_bottom][header_container][vc_column][vc_row]
CONTENT
);