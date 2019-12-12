<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga home price', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-home-price.jpg',
	'cat_display_name' => 'pricing tables',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1513859169511{padding-top: 50px !important;}"][vc_column][vc_single_image image="65" img_size="85x85" alignment="center" css=".vc_custom_1513860118089{margin-bottom: -40px !important;}"][vc_row_inner css=".vc_custom_1513860154125{padding-top: 70px !important;padding-bottom: 100px !important;background-image: url(http://next.themeton.com/yoga/wp-content/uploads/sites/24/2017/12/offer.jpg?id=152) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/4"][pricetable style_layout="style6" list_text="%5B%7B%22name%22%3A%22%3Cb%3E100%3C%2Fb%3E%20hour%20of%20class%22%7D%2C%7B%22name%22%3A%22Acquire%20skills%20for%20Life-Mastery%22%7D%2C%7B%22name%22%3A%22Experience-oriented%20teaching%20and%20%22%7D%5D" hover="1" title="Yoga Silver" price="$99<br />
<i>month</i>" conbutton="url:%23|title:BUY%20NOW|target:%20_blank|" subtitle="For Beginner " css=".vc_custom_1513924380017{margin-right: 15px !important;}"][/vc_column_inner][vc_column_inner width="1/4" css=".vc_custom_1513859348146{margin-left: 15px !important;}"][pricetable style_layout="style6" list_text="%5B%7B%22name%22%3A%22%3Cb%3E100%3C%2Fb%3E%20hour%20of%20class%22%7D%2C%7B%22name%22%3A%22Learn%20professional%20facilitation%20skills%22%7D%2C%7B%22name%22%3A%22Opens%20new%20career%20opportunities%22%7D%5D" hover="1" title="Pro Yotga" price="$70<br />
<i>month</i>" conbutton="url:%23|title:BUY%20NOW||" css=".vc_custom_1513915895282{margin-right: 0px !important;}" subtitle="For Who know basics"][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][vc_single_image image="65" img_size="85x85" alignment="center" css=".vc_custom_1513860397829{margin-top: -40px !important;}"][/vc_column][/vc_row]
CONTENT
);