<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hotel about us counter', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hotel-about-us-counter.jpg',
	'cat_display_name' => 'counters',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1509434632705{margin-right: 10px !important;margin-left: 10px !important;border-bottom-width: 1px !important;border-bottom-color: rgba(137,141,128,0.4) !important;border-bottom-style: solid !important;border-radius: 1px !important;}"][vc_column][con_counter list="%5B%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%221285%22%2C%22body%22%3A%22Rooms%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%223560%22%2C%22body%22%3A%22Employes%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22128%22%2C%22body%22%3A%22Awards%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%225%22%2C%22body%22%3A%22Rating%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2215%22%2C%22body%22%3A%22Year%20Experience%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2215%22%2C%22body%22%3A%22Branches%22%2C%22icon_type%22%3A%22fontawesome%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);