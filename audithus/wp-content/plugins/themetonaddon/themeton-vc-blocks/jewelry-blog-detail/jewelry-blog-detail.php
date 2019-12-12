<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'jewelry blog detail', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'jewelry-blog-detail.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_column_text]
<h3>Maecenas vitae elit neclacus convallis pellentesque.</h3>
Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.[/vc_column_text][vc_column_text css=".vc_custom_1490682381881{margin-bottom: 20px !important;}"]
<h4>Subheading</h4>
[/vc_column_text][icon_list icon_type="fontawesome" icon_fontawesome="fa fa-chevron-circle-right" color="#0c0000" list="%5B%7B%22item%22%3A%22Sed%20a%20augue%20eu%20massa%20pellentesque%20mollis%20eu%20a%20tortor.%22%7D%2C%7B%22item%22%3A%22Aenean%20in%20dui%20in%20turpis%20tempor%20consectetur%20quis%20quis%20dui.%22%7D%2C%7B%22item%22%3A%22Donec%20ac%20est%20auctor%2C%20sagittis%20purus%20id%2C%20interdum%20risus%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);