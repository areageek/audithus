<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting home contact', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-home-contact.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510629218992{padding-top: 80px !important;padding-bottom: 80px !important;background-image: url(http://next.themeton.com/hosting/wp-content/uploads/sites/13/2017/03/hosting-blue-background.png?id=3001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="1/6"][vc_single_image image="3005" img_size="medium" alignment="center"][vc_custom_heading text="Sign up for an Account" font_container="tag:h2|font_size:16px|text_align:center|color:%23ffffff|line_height:1.4em" use_theme_fonts="yes" el_class="text-semibold"][/vc_column_inner][vc_column_inner width="1/12"][vc_single_image image="3004" img_size="medium" alignment="center" css=".vc_custom_1510627394072{margin-top: 15px !important;margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="1/6"][vc_single_image image="3002" img_size="medium" alignment="center"][vc_custom_heading text="Discuss with our team" font_container="tag:h2|font_size:16px|text_align:center|color:%23ffffff|line_height:1.4em" use_theme_fonts="yes" el_class="text-semibold"][/vc_column_inner][vc_column_inner width="1/12"][vc_single_image image="3004" img_size="medium" alignment="center" css=".vc_custom_1510627382205{margin-top: 15px !important;margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="1/6"][vc_single_image image="3003" img_size="medium" alignment="center"][vc_custom_heading text="Receive a good hosting support" font_container="tag:h2|font_size:16px|text_align:center|color:%23ffffff|line_height:1.4em" use_theme_fonts="yes" el_class="text-semibold"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/12"][/vc_column_inner][vc_column_inner width="5/6"][contact-form-7 id="733"][/vc_column_inner][vc_column_inner width="1/12"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT
);