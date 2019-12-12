<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'chosting dedicated calltoaction', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-dedicated-calltoaction.jpg',
	'cat_display_name' => 'call to actions',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510504938259{padding-top: 100px !important;padding-bottom: 100px !important;background-image: url(http://next.themeton.com/hosting/wp-content/uploads/sites/13/2017/07/Layer-105.jpg?id=2773) !important;}"][vc_column width="1/2"][/vc_column][vc_column width="1/2" css=".vc_custom_1510317131580{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="3/4" css=".vc_custom_1510317184458{padding-top: 60px !important;padding-bottom: 70px !important;background-color: #222932 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_custom_heading text="Already have<br />
a Website?" font_container="tag:h2|font_size:34px|text_align:center|color:%23ffffff|line_height:40px" use_theme_fonts="yes" css=".vc_custom_1510315978152{margin-bottom: 5px !important;}"][vc_custom_heading text="Purchase your dream<br />
domain from us" font_container="tag:p|font_size:18px%20|text_align:center|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1510316308285{margin-bottom: 5px !important;}" el_class="uk-text-bold"][vc_column_text css=".vc_custom_1510504920878{margin-top: 30px !important;}"]</p>
<p style="text-align: center; font-size: 34px; font-weight: 600; color: #fff;">Starting <span style="color: #14bb75;">$1.26<i></i></span><i style="color: #14bb75; font-style: normal; font-size: 12px;">/month</i></p>
<p>[/vc_column_text][con_button alignment="center" color="#28c4a7" border="" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fhosting%2Fdomains%2F|title:BUY%20NOW||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT
);