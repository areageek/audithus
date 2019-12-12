<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga price table', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-price-table.jpg',
	'cat_display_name' => 'pricing tables',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Pricing Plans" font_container="tag:h2|font_size:36|text_align:center|line_height:1em" use_theme_fonts="yes"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][pricetable style_layout="style5" hover="1" body="<b>100 </b>Hour of class<br />
Acquire skills for Life-Mastery<br />
Experience-oriented teaching<br />
5 Professionals" price="$99<i>/mo</i>" conbutton="url:%23|title:Join%20today||" title="Yoga silver"][/vc_column][vc_column width="1/3"][pricetable style_layout="style5" hover="1" body="<b>100 </b>Hour of class<br />
Acquire skills for Life-Mastery<br />
Experience-oriented teaching<br />
5 Professionals" price="$99<i>/mo</i>" conbutton="url:%23|title:Join%20today||" title="Yoga silver"][/vc_column][vc_column width="1/3"][pricetable style_layout="style5" hover="1" body="<b>100 </b>Hour of class<br />
Acquire skills for Life-Mastery<br />
Experience-oriented teaching<br />
5 Professionals" price="$99<i>/mo</i>" conbutton="url:%23|title:Join%20today||" title="Yoga silver"][/vc_column][/vc_row]
CONTENT
);