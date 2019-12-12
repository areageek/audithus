<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Cart Creative blogs', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'cart.jpg',
	'cat_display_name' => 'blogs',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0=""][vc_column 0=""][simplux_card borderradius="" ratio="1x1" count="12" pagination="numbered" filter="category" excerpt="7" date="" author="" authorimage="" views="" comment="" separator="" dash="bottom" align="center" excludes="-3" pager="loadmore"][/vc_column][/vc_row]
CONTENT
);