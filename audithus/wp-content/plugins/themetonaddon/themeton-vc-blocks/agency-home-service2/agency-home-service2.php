<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency home service2', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-home-service2.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1494589087100{padding-top: 90px !important;}"][vc_column][vc_custom_heading text="PORTFOLIO" font_container="tag:h2|font_size:28|text_align:center|color:%230c0c0c|line_height:0" use_theme_fonts="yes" el_class="uk-text-bold uk-text-uppercase"][mungu_projects post_type="portfolio" image_active="2046"][/vc_column][/vc_row][vc_row css=".vc_custom_1494589330552{padding-top: 10px !important;padding-bottom: 10px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][con_counter style="2" list="%5B%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2216%22%2C%22body%22%3A%22award%20won%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22312%22%2C%22body%22%3A%22employees%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22215%22%2C%22body%22%3A%22Happy%20Clients%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22688%22%2C%22body%22%3A%22finished%20projects%22%2C%22icon_type%22%3A%22fontawesome%22%7D%5D"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);