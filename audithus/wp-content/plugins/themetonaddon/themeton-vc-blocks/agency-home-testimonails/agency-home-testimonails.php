<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency home testimonials', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-home-testimonails.jpg',
	'cat_display_name' => 'testimonials',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1494589400974{padding-top: 0px !important;padding-bottom: 10px !important;background-color: #ffffff !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;border-radius: 1px !important;}"][vc_column 0=""][mungu_content_testimonial arrows_position="middle" bullets="hide" list="%5B%7B%22title%22%3A%22William%20Barel%22%2C%22sub_title%22%3A%22Creative%20Designer%22%2C%22content_text%22%3A%22Lorem%20Ipsum%20is%20simply%20dummy%20text%20of%20the%20printing%20and%20typesetting%20industry.%20Lorem%20Ipsum%20has%20been%20the%20industry's%20standard%20dummy%20text%20ever%20since%20the%201500s%2C%20when%20an%20unknown%20printer%20took%20a%20galley%20of%20type%20and%20scrambled%20it%20to%20make%20a%20type%20specimen%20book%20only%20five%20centuries.%22%7D%2C%7B%22title%22%3A%22William%20Barel%22%2C%22sub_title%22%3A%22Creative%20Designer%22%2C%22content_text%22%3A%22Lorem%20Ipsum%20is%20simply%20dummy%20text%20of%20the%20printing%20and%20typesetting%20industry.%20Lorem%20Ipsum%20has%20been%20the%20industry's%20standard%20dummy%20text%20ever%20since%20the%201500s%2C%20when%20an%20unknown%20printer%20took%20a%20galley%20of%20type%20and%20scrambled%20it%20to%20make%20a%20type%20specimen%20book%20only%20five%20centuries.%22%7D%2C%7B%22title%22%3A%22William%20Barel%22%2C%22sub_title%22%3A%22Creative%20Designer%22%2C%22content_text%22%3A%22Lorem%20Ipsum%20is%20simply%20dummy%20text%20of%20the%20printing%20and%20typesetting%20industry.%20Lorem%20Ipsum%20has%20been%20the%20industry's%20standard%20dummy%20text%20ever%20since%20the%201500s%2C%20when%20an%20unknown%20printer%20took%20a%20galley%20of%20type%20and%20scrambled%20it%20to%20make%20a%20type%20specimen%20book%20only%20five%20centuries.%22%7D%5D"][/vc_column][/vc_row]
CONTENT
);