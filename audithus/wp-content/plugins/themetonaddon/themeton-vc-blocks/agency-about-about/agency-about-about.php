<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency about about', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-about-about.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row gap="30" content_placement="middle" css=".vc_custom_1509935581321{padding-bottom: 50px !important;}"][vc_column width="1/2"][vc_single_image image="1880" img_size="720x540"][/vc_column][vc_column width="1/2"][vc_custom_heading text="What we are " font_container="tag:h2|font_size:30|text_align:left|color:%23161720" use_theme_fonts="yes" el_class="uk-text-bold uk-text-uppercase"][vc_column_text 0="" css=".vc_custom_1494843906982{padding-right: 10px !important;}"]
<p style="text-align: left; line-height: 35px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>

[/vc_column_text][/vc_column][/vc_row]
CONTENT
);