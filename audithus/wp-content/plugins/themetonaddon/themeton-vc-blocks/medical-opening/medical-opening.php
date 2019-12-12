<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Opening', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-opening.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Current Opening" font_container="tag:h2|font_size:30px|text_align:center" use_theme_fonts="yes" css=".vc_custom_1490622009745{margin-bottom: 5px !important;}" el_class="text-600"][vc_column_text el_class="text-600"]
<p style="text-align: center;font-weight: 500">We are list outed our opening positions.</p>

[/vc_column_text][vc_column_text css=".vc_custom_1490621709275{padding-right: 170px !important;padding-left: 170px !important;}"]
<p style="text-align: center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1488608750996{padding-bottom: 17px !important;}"][vc_column width="1/4"][info_box icon_types="icon_image" shadows="medium" href="url:http%3A%2F%2Fthemeton%2Fconsultaid%2Fanother-page%2Fbeautiful%2F|||" extra_class="hahah" icons="fa fa-smile-o" title="Fun Environment" image="812"][/vc_column][vc_column width="1/4"][info_box icon_types="icon_image" shadows="medium" href="url:http%3A%2F%2Fthemeton%2Fconsultaid%2Fanother-page%2Fbeautiful%2F|||" extra_class="hahah" icons="fa fa-coffee" title="Unlimited Coffee" image="809"][/vc_column][vc_column width="1/4"][info_box icon_types="icon_image" shadows="medium" href="url:http%3A%2F%2Fthemeton%2Fconsultaid%2Fanother-page%2Fbeautiful%2F|||" extra_class="hahah" icons="fa fa-gift" title="Compensation" image="810"][/vc_column][vc_column width="1/4"][info_box icon_types="icon_image" shadows="medium" href="url:http%3A%2F%2Fthemeton%2Fconsultaid%2Fanother-page%2Fbeautiful%2F|||" extra_class="hahah" icons="fa fa-rocket" title="Pleasure Trips" image="811"][/vc_column][/vc_row]
CONTENT
);