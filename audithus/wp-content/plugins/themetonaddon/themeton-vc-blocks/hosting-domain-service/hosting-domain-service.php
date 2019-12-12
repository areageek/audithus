<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting domain service', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-domain-service.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1510297259643{padding-top: 0px !important;padding-bottom: 0px !important;background-color: #354050 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column css=".vc_custom_1510297588789{padding-top: 80px !important;}"][vc_custom_heading text="Free add-ons<br />
with every domain name" font_container="tag:h2|font_size:28px%20|text_align:center|color:%23ffffff" use_theme_fonts="yes"][vc_row_inner css=".vc_custom_1510297708893{margin-top: 35px !important;}"][vc_column_inner el_class="uk-light" width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2622" imagesize="35x35" title="Free Email Account" desc="Popularised in the 1960s with the release of Letraset containing Lorem Ipsum passages."][/vc_column_inner][vc_column_inner el_class="uk-light" width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2621" imagesize="35x35" title="Domain Forwarding" desc="Lorem Ipsum is simply dummy<br />
text of the printing and typesetting industry."][/vc_column_inner][vc_column_inner el_class="uk-light" width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2623" imagesize="35x35" title="Free Mail Forwards" desc="Popularised in the 1960s with the release of Letraset containing Lorem Ipsum passages."][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1510297765292{padding-bottom: 30px !important;}"][vc_column_inner el_class="uk-light" width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2618" imagesize="35x35" title="DNS Management" desc="Many desktop publishing packages and web page editors now use Lorem."][/vc_column_inner][vc_column_inner el_class="uk-light" width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2620" imagesize="32x32" title="Easy to Control Panel" desc="There are many variations of passages of Lorem Ipsum available , but the majarity "][/vc_column_inner][vc_column_inner el_class="uk-light" width="1/3"][service_box style="style-center style-above" icon_type="icon_image" image="2619" imagesize="35x35" title="Bulk Tools" desc="Popularised in the 1960s with the release of Letraset containing Lorem Ipsum passages."][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);