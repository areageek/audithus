<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel about us specialities', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-about-us-post.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1492506811731{padding-top: 55px !important;padding-bottom: 95px !important;background-color: #f4f6ef !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_custom_heading text="Specialities" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes"][mungu_service_grid carousel="yes" input_type="post" layout="hotel" arrows="hide" bullets="hide" count="5" slide_per_view="3 " extra_class="text-uppercase"][vc_row_inner][vc_column_inner css=".vc_custom_1492576788062{padding-top: 30px !important;}"][con_button alignment="center" color="rgba(0,0,0,0.01)" colortext="#898d80" border="1" colorborder="rgba(137,141,128,0.84)" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhotel%2Fservice%2F|title:Full%20specialities|target:%20_blank|"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);