<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting about content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-about-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0=""][vc_column css=".vc_custom_1499504550169{margin-top: 70px !important;}"][carousel_anythings slidetype="container" items="5" arrow_show="false"][vc_row_inner 0=""][vc_column_inner 0=""][vc_single_image image="2486"][/vc_column_inner][/vc_row_inner][vc_row_inner 0=""][vc_column_inner 0=""][vc_single_image image="2487"][/vc_column_inner][/vc_row_inner][vc_row_inner 0=""][vc_column_inner 0=""][vc_single_image image="2488"][/vc_column_inner][/vc_row_inner][vc_row_inner 0=""][vc_column_inner 0=""][vc_single_image image="2489"][/vc_column_inner][/vc_row_inner][vc_row_inner 0=""][vc_column_inner 0=""][vc_single_image image="2490" img_size="full"][/vc_column_inner][/vc_row_inner][/carousel_anythings][vc_separator color="custom" accent_color="#d5dadc"][/vc_column][/vc_row]
CONTENT
);