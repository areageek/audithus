<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Footer layout 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'footer01.jpg',
	'cat_display_name' => 'Header & Footer',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="middle"][vc_column width="5/6" css=".vc_custom_1507616324386{padding-top: 0px !important;}"][vc_column_text css=".vc_custom_1507616356790{margin-bottom: 0px !important;}"]All Right Reserved. 2017[/vc_column_text][/vc_column][vc_column width="1/6"][social_icons extra_class="uk-flex-between uk-flex-center menu-social remove_bottom" list="%5B%7B%22link%22%3A%22%23%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-facebook-square%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22link%22%3A%22%23%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-twitter-square%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22link%22%3A%22%23%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-vimeo-square%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22link%22%3A%22%23%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-behance-square%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22link%22%3A%22%23%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-instagram%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);