<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct home product', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-home-product.jpg',
	'cat_display_name' => 'products',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][woo_singleproduct postid="120" url1="javascript:;" url2="javascript:;" img1="161" img2="162" items="%5B%7B%22image%22%3A%22164%22%7D%2C%7B%22image%22%3A%22914%22%7D%5D"][/vc_column][/vc_row]

CONTENT
);