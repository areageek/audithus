<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Frequently Asked Questions', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'faq-1.jpg',
	'cat_display_name' => 'faqs',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row][vc_column width="1/12"][/vc_column][vc_column width="5/6"][vc_custom_heading text="Frequently Asked Questions" font_container="tag:h2|font_size:32|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1503986390744{margin-bottom: 20px !important;}"][vc_column_text css=".vc_custom_1503986398800{margin-bottom: 45px !important;}"]
	
	Find what are you looking for here
	
	[/vc_column_text][vc_separator color="custom" accent_color="rgba(0,0,0,0.06)"][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]
	
	What is Simplux mean?
	
	Enable parallel alignments after 2.0 relationships. Enthusiastically parallel task world-class sources without global scenarios. Intrinsicly orchestrate scalable "outside the box" thinking through intermandated strategic.[/vc_column_text][vc_column_text]
	
	What does simple and luxury stand for?
	
	Enable parallel alignments after 2.0 relationships. Enthusiastically parallel task world-class sources without global scenarios. Intrinsicly orchestrate scalable "outside the box" thinking through intermandated strategic.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]
	
	Where is the theme options and how is it capable of?
	
	Enable parallel alignments after 2.0 relationships. Enthusiastically parallel task world-class sources without global scenarios. Intrinsicly orchestrate scalable "outside the box" thinking through intermandated strategic.[/vc_column_text][vc_column_text]
	
	What is simple and luxury mean?
	
	Enable parallel alignments after 2.0 relationships. Enthusiastically parallel task world-class sources without global scenarios. Intrinsicly orchestrate scalable "outside the box" thinking through intermandated strategic.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/12"][/vc_column][/vc_row]
CONTENT
);