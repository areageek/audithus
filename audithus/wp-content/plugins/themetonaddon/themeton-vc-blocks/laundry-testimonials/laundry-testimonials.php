<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-testimonials.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=.vc_custom_1497517647481{background-position center !important;background-repeat no-repeat !important;background-size cover !important;}][vc_column][vc_custom_heading text=HAPPY CLIENTS font_container=tagh2font_size28px%20text_alignleft google_fonts=font_familyOpen%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italicfont_style800%20bold%20regular%3A800%3Anormal css=.vc_custom_1497518531817{margin-bottom 5px !important;} el_class=uk-text-bold uk-text-uppercase career][vc_row_inner][vc_column_inner][testimonial_grid input_type=post style=bordered post_type=testimonials column=3 pager=yes count=8][vc_column_inner][vc_row_inner][vc_column][vc_row]
CONTENT
);