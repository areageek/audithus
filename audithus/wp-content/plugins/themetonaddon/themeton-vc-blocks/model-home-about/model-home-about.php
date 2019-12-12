<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( ' model home about', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'model-home-about.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" equal_height="yes" css=".vc_custom_1500949548975{margin-top: -35px !important;border-top-width: 1px !important;padding-bottom: 65px !important;background-color: #ffffff !important;border-top-color: #f3f3f3 !important;border-top-style: solid !important;}"][vc_column width="5/12" css=".vc_custom_1500265528669{padding-top: 0px !important;}"][vc_single_image image="1510" img_size="full" el_class="m-img-1"][/vc_column][vc_column width="7/12" css=".vc_custom_1500272251310{padding-left: 80px !important;}"][vc_custom_heading text="i am mia" font_container="tag:h1|font_size:51px|text_align:left|color:%23000000" use_theme_fonts="yes" css=".vc_custom_1500265858779{margin-top: 195px !important;padding-bottom: 30px !important;}"][vc_custom_heading text="Biography" font_container="tag:h1|font_size:245px|text_align:right|color:%23f3f3f3" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1500272281761{margin-top: -170px !important;margin-left: 313px !important;}" el_class="uk-position-absolute"][vc_custom_heading text="This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit<br />
auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit<br />
consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio" font_container="tag:p|font_size:19px|text_align:left|color:%233e3e3e|line_height:40px" use_theme_fonts="yes" css=".vc_custom_1500620927472{padding-bottom: 40px !important;}"][vc_raw_html 0=""]JTNDaSUyMGNsYXNzJTNEJTIyZmEtaWNvbi1taW51cyUyMiUzRSUzQyUyRmklM0UlMjZuYnNwJTNCJTI2bmJzcCUzQiUyNm5ic3AlM0IlMjAlMjAlMjAlM0NhJTIwaHJlZiUzRCUyMiUyMyUyMiUzRVN0YXJ0JTIwU2xpZGUlMjBzaG93JTNDJTJGYSUzRQ==[/vc_raw_html][/vc_column][/vc_row]
CONTENT
);