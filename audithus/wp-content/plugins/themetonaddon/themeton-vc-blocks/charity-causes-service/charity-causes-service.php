<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity causes service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-causes-service.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1509775777037{margin-top: 40px !important;background-color: #eeeeee !important;}"][vc_column width="1/6"][/vc_column][vc_column width="1/3" css=".vc_custom_1509768115511{border-right-width: 1px !important;padding-top: 30px !important;border-right-color: #e1e1e1 !important;border-right-style: solid !important;}"][vc_single_image image="1258" img_size="90x90" alignment="center" css=".vc_custom_1493358936121{margin-top: 70px !important;margin-bottom: 25px !important;}"][con_button alignment="center" color="rgba(255,255,255,0)" colortext="#fa6950" border="1" colorborder="#fa6950" extra_class="mb10" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcharity%2Fbecome-a-volunteer%2F|title:BECOME%20A%20VOLUNTEER||"][/vc_column][vc_column width="1/3"][vc_single_image image="1259" img_size="90x90" alignment="center" css=".vc_custom_1493358985897{margin-top: 70px !important;margin-bottom: 25px !important;}"][con_button alignment="center" color="rgba(255,255,255,0)" colortext="#fa6950" border="1" colorborder="#fa6950" extra_class="mb10" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcharity%2Fdonate%2F|title:DONATE%20NOW||"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);