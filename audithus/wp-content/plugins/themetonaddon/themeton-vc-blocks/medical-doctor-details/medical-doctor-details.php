<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'Medical Doctor Details', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'medical-doctor-details.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row 0="" gap="25"][vc_column width="1/2"][vc_single_image source="featured_image" img_size="full" alignment="center"][vc_custom_heading text="Brief Profile" font_container="tag:h3|font_size:22|text_align:left|line_height:28px" use_theme_fonts="yes"][vc_column_text 0=""]Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem.[/vc_column_text][con_button color="#01b093" conbutton="url:%23|title:MAKE%20AN%20APPOINTMENT||"][vc_empty_space height="30px"][/vc_column][vc_column width="1/2" css=".vc_custom_1491203401128{margin-left: 40px !important;}"][vc_custom_heading source="post_title" font_container="tag:h2|font_size:32px|text_align:left|line_height:1em" use_theme_fonts="yes"][vc_column_text 0=""]Designation
<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star last"></i>[/vc_column_text][vc_custom_heading text="Doctor Details" font_container="tag:h3|font_size:20px|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1491203712028{padding-top: 10px !important;}"][vc_column_text 0=""]<span class="width110">Designation</span><span class="width60">:</span>Cardiologist
<span class="width110">Location</span><span class="width60">:</span>Canada
<span class="width110">Nationality</span><span class="width60">:</span>American
<span class="width110">Languages </span><span class="width60">:</span> English, Hindi, French
<span class="width110">Gender </span><span class="width60">:</span> Male[/vc_column_text][vc_custom_heading text="Qualification" font_container="tag:h3|font_size:20px|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1491203721312{padding-top: 10px !important;}"][vc_column_text 0=""]<i class="fa fa-chevron-circle-right"></i> M.B.B.S. - Maulana Azad Medical College, Canada 1990
<i class="fa fa-chevron-circle-right"></i> Medicine - Delhi University 1993
<i class="fa fa-chevron-circle-right"></i> Fellow of the American College of Cardiologist 2010[/vc_column_text][vc_custom_heading text="Awards &amp; Certifications" font_container="tag:h3|font_size:20px|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1491203732294{padding-top: 10px !important;}"][vc_column_text 0=""]<i class="fa fa-chevron-circle-right"></i> HIV training from San Francisco General Hospital
<i class="fa fa-chevron-circle-right"></i> Hospital Management from IIM Switzerland 2013[/vc_column_text][vc_custom_heading text="Working Hours" font_container="tag:h3|font_size:20px|text_align:left|line_height:1em" use_theme_fonts="yes" css=".vc_custom_1491203739487{padding-top: 10px !important;}"][vc_column_text 0=""]<span class="width140">Monday - Friday</span><span class="width60">:</span>8.00 am - 5.00 p.m
<span class="width140">Saturday</span><span class="width60">:</span>8.00 am - 3.00 p.m
<span class="width140">Sunday</span><span class="width60">:</span>Closed[/vc_column_text][/vc_column][/vc_row]
CONTENT
);