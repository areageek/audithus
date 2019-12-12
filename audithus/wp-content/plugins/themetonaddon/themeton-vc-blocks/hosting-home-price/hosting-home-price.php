<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting home price', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-home-price.jpg',
	'cat_display_name' => 'pricing tables',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][mungu_faq sidebar_title="Genaral Topics" sidebar_position="right" count="10"][/vc_column][/vc_row][vc_row content_placement="middle" css=".vc_custom_1510564889954{margin-bottom: 55px !important;border-top-width: 1px !important;padding-top: 20px !important;border-top-color: #dadadd !important;border-top-style: solid !important;}"][vc_column width="1/6"][vc_single_image image="2965" img_size="medium" alignment="center" css=".vc_custom_1510564829212{margin-bottom: 0px !important;}"][/vc_column][vc_column width="1/3"][vc_custom_heading text="Still you have any questions" font_container="tag:h2|font_size:20px%20|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510563824102{margin-bottom: 5px !important;}"][vc_custom_heading text="TALK TO US TODAY" font_container="tag:h2|font_size:28px%20|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510563833419{margin-top: 0px !important;margin-bottom: 0px !important;}" el_class="text-strong"][/vc_column][vc_column width="1/4"][vc_custom_heading text="Phone" font_container="tag:h2|font_size:22px%20|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510563842471{margin-bottom: 5px !important;}"][vc_custom_heading text="+9875 987 8889" font_container="tag:h2|font_size:26px|text_align:left|color:%23186fd9|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510563922035{margin-top: 0px !important;margin-bottom: 0px !important;}" link="url:callto%3A%2B9875%20987%208889|||"][/vc_column][vc_column width="1/4"][vc_custom_heading text="Email" font_container="tag:h2|font_size:22px%20|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510563861291{margin-bottom: 5px !important;}"][vc_custom_heading text="support@host.com" font_container="tag:h2|font_size:26px|text_align:left|color:%23186fd9|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510563933752{margin-top: 0px !important;margin-bottom: 5px !important;}" link="url:mailto%3ASupport%40host.com|||"][/vc_column][/vc_row]

CONTENT
);