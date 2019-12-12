<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry service image', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-service-image.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1491267630621{margin-bottom: 0px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_custom_heading text="What We Do" font_container="tag:h2|font_size:28px%20|text_align:center" use_theme_fonts="yes" css=".vc_custom_1497876085866{border-bottom-width: 50px !important;}"][vc_column_text]
<p style="text-align: center;">You should always have cleaning supplies available for the professionals. There's no reason to pay extra for their supplies when it's cheaper to provide your own.</p>
[/vc_column_text][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row][vc_column][testimonial_grid input_type="post" layout="horizantal" post_type="service" excerpt_length="25" count="4"][/vc_column][/vc_row]
CONTENT
);