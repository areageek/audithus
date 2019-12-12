<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental header', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-header.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content" content_placement="middle" css=".vc_custom_1511155150653{padding-top: 10px !important;padding-right: 117px !important;padding-bottom: 10px !important;padding-left: 117px !important;background-color: #f2f2f2 !important;}"][vc_column width="1/2"][header_container][vc_custom_heading text="PHONE:" font_container="tag:h1|font_size:14px|text_align:left|color:%23fc8327" google_fonts="font_family:Source%20Sans%20Pro%3A200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C900%2C900italic|font_style:600%20bold%20regular%3A600%3Anormal" css=".vc_custom_1511155587474{margin-bottom: 0px !important;}"][vc_custom_heading text="+123-567-8908" font_container="tag:h1|font_size:14px|text_align:left|color:%23626b71" google_fonts="font_family:Source%20Sans%20Pro%3A200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C900%2C900italic|font_style:600%20bold%20regular%3A600%3Anormal" css=".vc_custom_1511155752634{margin-top: 0px !important;margin-bottom: 0px !important;margin-left: 5px !important;}" link="url:tel%3A123-567-8908|||"][/header_container][/vc_column][vc_column width="1/2" css=".vc_custom_1511147234348{background-color: #f2f2f2 !important;}"][header_container halign="uk-flex-middle" align="uk-flex-right"][vc_custom_heading text="FAQ" font_container="tag:h2|font_size:14px|text_align:left|color:%23626b71" google_fonts="font_family:Source%20Sans%20Pro%3A200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C900%2C900italic|font_style:600%20bold%20regular%3A600%3Anormal" link="url:http%3A%2F%2Fnext.themeton.com%2Fcarrental%2Ffaqs%2F|||" css=".vc_custom_1511156201623{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_custom_heading text="REGISTER" font_container="tag:h2|font_size:14px|text_align:left|color:%23626b71" google_fonts="font_family:Source%20Sans%20Pro%3A200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C900%2C900italic|font_style:600%20bold%20regular%3A600%3Anormal" link="url:http%3A%2F%2Fnext.themeton.com%2Fcarrental%2F%23|||" css=".vc_custom_1511156278062{margin-top: 0px !important;margin-bottom: 0px !important;}" el_class="log-none"][login position="uk-text-right" icon_type="fontawesome" css=".vc_custom_1511182148149{margin-bottom: 0px !important;}"][/header_container][/vc_column][/vc_row][vc_section full_width="stretch_row_content"][vc_row full_width="stretch_row_content_no_spaces"][vc_column width="1/12"][/vc_column][vc_column width="10/12"][vc_row_inner css=".vc_custom_1510837777196{margin-top: -7px !important;margin-right: -22px !important;margin-left: -24px !important;padding-bottom: 10px !important;}"][vc_column_inner width="1/4" css=".vc_custom_1510837847764{padding-top: 24px !important;}"][logo][/vc_column_inner][vc_column_inner width="1/2"][menu select="style2" menu="Main Menu" extra_class=" uk-flex-around uk-visible@m" menu_id="primary-nav"][/vc_column_inner][vc_column_inner width="1/4"][vc_raw_html]JTNDYSUyMGhyZWYlM0QlMjJodHRwcyUzQSUyRiUyRnd3dy5mYWNlYm9vay5jb20lMkZzaGFyZXIlMkZzaGFyZXIucGhwJTNGdSUzRGh0dHAlM0ElMkYlMkZuZXh0LnRoZW1ldG9uLmNvbSUyRmNhcnJlbnRhbCUyRiUyMiUzRSUzQ3NwYW4lMjBzdHlsZSUzRCUyMmJhY2tncm91bmQlM0ElMjNmYzgzMjclM0JwYWRkaW5nJTNBMTBweCUzQm1hcmdpbi10b3AlM0EtMTRweCUzQiUyMCUwQSUyMCUyMCUyMCUyMGRpc3BsYXklM0ElMjBibG9jayUzQiUwQSUyMCUyMCUyMCUyMGZsb2F0JTNBJTIwcmlnaHQlM0IlMEElMjAlMjAlMjAlMjBtYXJnaW4tcmlnaHQlM0EwJTNCJTIwY29sb3IlM0ElMjNmZmYlM0IlMjAlMjIlMjB1ay1pY29uJTNEJTIyaWNvbiUzQSUyMHNvY2lhbCUyMiUzRSUzQyUyRnNwYW4lM0UlM0MlMkZhJTNF[/vc_raw_html][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/12"][/vc_column][/vc_row][/vc_section]
CONTENT
);