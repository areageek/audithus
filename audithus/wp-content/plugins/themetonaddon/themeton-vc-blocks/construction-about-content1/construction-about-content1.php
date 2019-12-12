<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction about content 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-about-content1.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" vc_row_overlay="yes" css=".vc_custom_1509957921090{margin-right: -40px !important;margin-left: -40px !important;padding-top: 150px !important;padding-bottom: 150px !important;background-image: url(http://next.themeton.com/construction/wp-content/uploads/sites/8/2017/03/Layer-22.jpg?id=1422) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_custom_heading text="Vision &amp; Mission" font_container="tag:h2|font_size:34|text_align:center|color:%23ffffff" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row][vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes" css=".vc_custom_1496841229012{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially...[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);