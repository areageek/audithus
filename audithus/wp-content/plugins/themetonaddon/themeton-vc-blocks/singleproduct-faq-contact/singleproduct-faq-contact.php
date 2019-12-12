<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct faq contact', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-faq-contact.jpg',
	'cat_display_name' => 'contacts',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1505193885528{margin-top: 50px !important;padding-top: 85px !important;padding-bottom: 100px !important;background-color: #f1f4f2 !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_custom_heading text="Feel free to contact us" font_container="tag:h3|font_size:36px|text_align:left|color:%23393939|line_height:1" use_theme_fonts="yes" css=".vc_custom_1505194960114{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_custom_heading text="If you have any more questions" font_container="tag:p|font_size:22px|text_align:left|color:%23393939|line_height:36px" use_theme_fonts="yes" css=".vc_custom_1505194888333{margin-top: 10px !important;margin-bottom: 60px !important;}"][vc_row_inner][vc_column_inner width="1/3"][vc_custom_heading text="Support" font_container="tag:p|font_size:18px|text_align:left|color:%23898989|line_height:2em" use_theme_fonts="yes" css=".vc_custom_1505194790270{margin-bottom: 0px !important;border-left-width: 2px !important;padding-left: 20px !important;border-left-color: #00d463 !important;border-left-style: solid !important;}"][vc_custom_heading text="+586 858 5123" font_container="tag:h4|font_size:22px|text_align:left|line_height:26px" use_theme_fonts="yes" link="url:callto%3A%2B586%20858%205123|title:Click%20to%20call||" css=".vc_custom_1505194485688{margin-top: 10px !important;padding-left: 20px !important;}"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1505194692450{margin-left: 20px !important;}"][vc_custom_heading text="Enquiry- tollfree" font_container="tag:p|font_size:18px|text_align:left|color:%23898989|line_height:2em" use_theme_fonts="yes" css=".vc_custom_1505194796441{margin-bottom: 0px !important;border-left-width: 2px !important;padding-left: 20px !important;border-left-color: #00d463 !important;border-left-style: solid !important;}"][vc_custom_heading text="(180) 858 5156" font_container="tag:h4|font_size:22px|text_align:left|line_height:26px" use_theme_fonts="yes" link="url:callto%3A%2B586%20858%205123|title:Click%20to%20call||" css=".vc_custom_1505194921799{margin-top: 10px !important;padding-left: 22px !important;}"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1505194687264{margin-left: 40px !important;}"][vc_custom_heading text="Support" font_container="tag:p|font_size:18px|text_align:left|color:%23898989|line_height:2em" use_theme_fonts="yes" css=".vc_custom_1505194802717{margin-bottom: 0px !important;border-left-width: 2px !important;padding-left: 20px !important;border-left-color: #00d463 !important;border-left-style: solid !important;}"][vc_custom_heading text="hello@next.com" font_container="tag:h4|font_size:22px|text_align:left|line_height:26px" use_theme_fonts="yes" link="url:mailto%3Ahello%40next.com|title:Email%20me||" css=".vc_custom_1505194927047{margin-top: 10px !important;padding-left: 22px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);