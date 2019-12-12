<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry price service 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-price-service1.jpg',
	'cat_display_name' => 'pricing tables',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column width="1/4"][/vc_column][vc_column width="1/2"][vc_column_text]
<h1 style="text-align: center;">OUR TARIFFS</h1>
<p style="text-align: center;">The drying process for doing laundry at service center is either hanging clothes line or tumbling them in a gas or electric heated dryer.</p>

[/vc_column_text][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row css=".vc_custom_1498027939455{margin-bottom: 70px !important;}"][vc_column vc_column_themeton="yes"][vc_row_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="1732" group="%5B%7B%7D%5D" hover="" imagesize="70x70" title="Ironing" price="5 USD/KG"][/vc_column_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="1733" group="%5B%7B%7D%5D" hover="" imagesize="70x70" title="Washing" price="8 USD/KG"][/vc_column_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="2194" group="%5B%7B%7D%5D" hover="" imagesize="70x70" title="Ironing &amp; Washing" price="12 USD/KG"][/vc_column_inner][vc_column_inner width="1/4"][pricetable style_layout="small_pricetable" image="2193" group="%5B%7B%7D%5D" hover="" imagesize="70x70" title="Dry Cleaning" price="15 USD/KG"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1498028028734{margin-top: 30px !important;margin-bottom: 30px !important;}"][vc_column_inner][con_button alignment="center" color="#39ae48" border="" conbutton="|title:SCHEDULE%20WASH|target:%20_blank|"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);