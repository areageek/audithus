<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry home testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-home-testimonails.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1498213130849{padding-top: 36px !important;padding-bottom: 145px !important;background-color: #564fa6 !important;}"][vc_column 0="" css=".vc_custom_1498206964005{padding-top: 60px !important;}"][vc_custom_heading text="TESTIMONIALS" font_container="tag:h2|font_size:30px|text_align:left|color:%23ffffff" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:800%20bold%20regular%3A800%3Anormal" css=".vc_custom_1498209322826{padding-bottom: 25px !important;}"][carousel_anythings slidetype="posttype" post_type="testimonials" count="6" items="2" items_desktop_small="1" thumbnails="true" arrow_show="false"][vc_row_inner][vc_column_inner][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][/vc_column_inner][/vc_row_inner][/carousel_anythings][/vc_column][/vc_row]
CONTENT
);