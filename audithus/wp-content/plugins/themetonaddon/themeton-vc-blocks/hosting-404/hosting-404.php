<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting 404', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-404.jpg',
	'cat_display_name' => '404',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1510565983508{padding-top: 160px !important;padding-bottom: 160px !important;}"][vc_column][vc_custom_heading text="<i>404</i> PAGE NOT FOUND" font_container="tag:h1|font_size:86|text_align:center" use_theme_fonts="yes" css=".vc_custom_1510565779094{margin-bottom: 5px !important;}" el_class="uk-text-bold nothing"][vc_custom_heading text="The link might be corrupted" font_container="tag:h2|font_size:42|text_align:center|color:%23b9c3d2|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510565174540{margin-bottom: 5px !important;}" el_class="uk-text-bold uk-text-uppercase "][con_button alignment="center" color="#28c4a7" colortext="#ffffff" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhosting%2F|title:BACK%20TO%20HOME||rel:nofollow" css=".vc_custom_1510565971498{margin-top: 50px !important;}"][/vc_column][/vc_row]
CONTENT
);