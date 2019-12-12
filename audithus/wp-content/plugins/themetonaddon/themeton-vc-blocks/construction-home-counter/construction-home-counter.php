<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction home counter', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-home-counter.jpg',
	'cat_display_name' => 'counters',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1509950625806{margin-right: -40px !important;margin-left: -40px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-image: url(http://next.themeton.com/construction/wp-content/uploads/sites/8/2017/03/Layer-22.jpg?id=1422) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][con_counter align="1" list="%5B%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22200%22%2C%22body%22%3A%22projects%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22860%22%2C%22body%22%3A%22members%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2269%22%2C%22body%22%3A%22Clients%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2212%22%2C%22body%22%3A%22award%22%2C%22icon_type%22%3A%22fontawesome%22%7D%5D"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);