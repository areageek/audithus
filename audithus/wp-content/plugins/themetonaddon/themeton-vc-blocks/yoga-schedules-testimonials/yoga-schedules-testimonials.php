<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga schedules testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-schedules-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="1/3"][vc_single_image image="232" img_size="full" alignment="center"][/vc_column][vc_column width="2/3"][vc_custom_heading text="Happy Clients" font_container="tag:h1|font_size:36px|text_align:left|color:%230a0a0a" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" el_class="ml8 mb4"][header_container][vc_icon type="entypo" icon_entypo="entypo-icon entypo-icon-quote" color="custom" size="lg" custom_color="#3d3d3d" el_class="rotate-icon" css=".vc_custom_1514276586160{margin-bottom: 0px !important;}"][vc_custom_heading text="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled." font_container="tag:h2|font_size:17px|text_align:left|color:%238e8e8e|line_height:34px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1514278487875{margin-top: 6px !important;margin-left: 21px !important;}"][/header_container][vc_empty_space height="55px"][vc_separator color="custom" align="align_left" border_width="2" el_width="10" accent_color="#feba58" el_class="ml8 line4per" css=".vc_custom_1514278064713{margin-bottom: 0px !important;}"][vc_custom_heading text="Client Name" font_container="tag:h3|font_size:17px|text_align:left|color:%23000000" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal" el_class="ml8" css=".vc_custom_1514278233538{margin-top: 20px !important;margin-bottom: 0px !important;}"][vc_custom_heading text="Designation" font_container="tag:h3|font_size:15px|text_align:left|color:%238e8e8e" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" el_class="ml8" css=".vc_custom_1514278225946{margin-top: 0px !important;}"][/vc_column][/vc_row]

CONTENT
);