<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity causes detail', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-causes-detail.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column css=".vc_custom_1493278850302{padding-right: 100px !important;padding-left: 100px !important;}"][vc_column_text]<strong><span style="color: #000000;">Help Senior Citizens</span></strong>

<strong><span style="color: #000000;">$2500<span style="color: #999999;"> </span></span></strong><span style="color: #999999;">from 26 donors                                                                                                                                            </span><strong><span style="color: #000000;">GOAL :<span style="text-decoration: underline;"> $38600  |  10% RISE</span></span></strong>

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1550s,when an unknown printer took a gallery of type and scrambled it to make a type specimen book. It has survived not only five centuries,But also the leap into electronic typesetting, remaining essentiallyunchanged. It was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
with desktop publishing software like Aldus Pagemaker including versions of Lorem Ipsum.[/vc_column_text][vc_empty_space][con_button color="#ffffff" colortext="#d90047" border="1" colorborder="#d90047" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fcharity%2Fdonate%2F|title:DONATE||"][/vc_column][/vc_row]
CONTENT
);