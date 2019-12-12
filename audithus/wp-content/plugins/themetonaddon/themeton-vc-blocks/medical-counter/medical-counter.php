<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Counter', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-counter.jpg',
	'cat_display_name' => 'counters',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1491266496668{padding-bottom: 20px !important;background-image: url(http://next.themeton.com/medical/wp-content/uploads/sites/2/2017/03/violet-box-copy.jpg?id=311) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="3/4"][con_counter list="%5B%7B%22layout%22%3A%22with-image%22%2C%22number%22%3A%22128%22%2C%22body%22%3A%22happy%22%2C%22image%22%3A%22536%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-low-vision%22%7D%2C%7B%22layout%22%3A%22with-image%22%2C%22number%22%3A%2229%22%2C%22body%22%3A%22awards%22%2C%22image%22%3A%22535%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-gitlab%22%7D%2C%7B%22layout%22%3A%22with-image%22%2C%22number%22%3A%22730%22%2C%22body%22%3A%22room%22%2C%22image%22%3A%22538%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-home%22%7D%2C%7B%22layout%22%3A%22with-image%22%2C%22number%22%3A%224800%2B%22%2C%22body%22%3A%22doctors%22%2C%22image%22%3A%22537%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-heart-o%22%7D%5D"][/vc_column][vc_column width="1/4"][con_button alignment="right" color="#009eb3" conbutton="url:http%3A%2F%2Fdemo.themeton.com%2Fmedical%2Fpages%2Fappointment%2F|title:Book%20Consultation||"][/vc_column][/vc_row]
CONTENT
);