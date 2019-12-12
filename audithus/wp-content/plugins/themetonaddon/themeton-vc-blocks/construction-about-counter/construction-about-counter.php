<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction about counter', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-about-counter.jpg',
	'cat_display_name' => 'counters',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="1/4"][/vc_column][vc_column width="1/2"][vc_column_text 0=""]
<p style="text-align: left;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged..</p>

[/vc_column_text][vc_row_inner css=".vc_custom_1498111745331{margin-right: -50px !important;margin-left: -50px !important;}"][vc_column_inner][con_counter list="%5B%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22200%22%2C%22body%22%3A%22projects%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%22860%22%2C%22body%22%3A%22members%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2269%22%2C%22body%22%3A%22clients%22%2C%22icon_type%22%3A%22fontawesome%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22number%22%3A%2212%22%2C%22body%22%3A%22Awards%22%2C%22icon_type%22%3A%22fontawesome%22%7D%5D" extra_class="about_counter"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT
);