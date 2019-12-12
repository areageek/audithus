<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry home service 3', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-home-service3.jpg',
	'cat_display_name' => 'pricing tables',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0="" full_width="stretch_row" css=".vc_custom_1498041608147{padding-top: 60px !important;padding-bottom: 40px !important;}"][vc_column 0=""][vc_row_inner css=".vc_custom_1498210015558{padding-bottom: 10px !important;}"][vc_column_inner][vc_custom_heading text="PRICING PLANS" font_container="tag:h2|font_size:28px%20|text_align:left" use_theme_fonts="yes" css=".vc_custom_1498041191804{margin-bottom: 5px !important;}" el_class="uk-text-bold uk-text-uppercase career"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="1732" group="%5B%7B%7D%5D" hover="" title="IRONING" price="5 USD/KG"][/vc_column_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="1733" group="%5B%7B%7D%5D" hover="" title="WASHING" price="8 USD/KG"][/vc_column_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="2194" group="%5B%7B%7D%5D" hover="" title="IRONING &amp; WASHING" price="12 USD/KG"][/vc_column_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="2193" group="%5B%7B%7D%5D" hover="" title="DRY CLEANING" price="15 USD/KG"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);