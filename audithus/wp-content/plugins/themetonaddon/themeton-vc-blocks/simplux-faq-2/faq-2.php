<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Frequently Asked Questions', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'faq-2.jpg',
	'cat_display_name' => 'faqs',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row css=".vc_custom_1503986625528{margin-top: 50px !important;}"][vc_column][vc_custom_heading text="Frequently Asked Questions" font_container="tag:h2|font_size:32|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1503986390744{margin-bottom: 20px !important;}"][vc_column_text css=".vc_custom_1503986398800{margin-bottom: 45px !important;}"]
	
	Find what are you looking for here
	
	[/vc_column_text][vc_row_inner][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][accordion multi="1" group="%5B%7B%22title%22%3A%22What%20delivery%20methods%20do%20you%20use%3F%22%2C%22body%22%3A%22Formulate%20holistic%20human%20capital%20and%20maintainable%20products.%20Completely%20supply%20efficient%20catalysts%20for%20change%20rather%20than%20scalable%20intellectual%20capital.%20Authoritatively%20synergize%20distinctive%20technologies%20before%202.0.%22%7D%2C%7B%22title%22%3A%22Does%20it%20really%20apply%20Synergy%3F%22%2C%22body%22%3A%22Formulate%20holistic%20human%20capital%20and%20maintainable%20products.%20Completely%20supply%20efficient%20catalysts%20for%20change%20rather%20than%20scalable%20intellectual%20capital.%20Authoritatively%20synergize%20distinctive%20technologies%20before%202.0.%22%7D%2C%7B%22title%22%3A%22Can%20I%20use%20this%20on%20multiple%20domain%20websites%3F%22%2C%22body%22%3A%22Formulate%20holistic%20human%20capital%20and%20maintainable%20products.%20Completely%20supply%20efficient%20catalysts%20for%20change%20rather%20than%20scalable%20intellectual%20capital.%20Authoritatively%20synergize%20distinctive%20technologies%20before%202.0.%22%7D%2C%7B%22title%22%3A%22Could%20you%20help%20me%20to%20install%20the%20theme%20on%20my%20server%3F%22%2C%22body%22%3A%22Formulate%20holistic%20human%20capital%20and%20maintainable%20products.%20Completely%20supply%20efficient%20catalysts%20for%20change%20rather%20than%20scalable%20intellectual%20capital.%20Authoritatively%20synergize%20distinctive%20technologies%20before%202.0.%22%7D%5D"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);