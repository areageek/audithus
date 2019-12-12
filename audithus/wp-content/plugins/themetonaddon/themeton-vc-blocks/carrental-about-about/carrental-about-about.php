<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'carrental about ', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'carrental-about-about.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row el_class="uk-text-center"][vc_column][vc_custom_heading text="What we are" font_container="tag:h2|font_size:36|text_align:center|line_height:1" use_theme_fonts="yes" css=".vc_custom_1510886376312{margin-bottom: 0px !important;}"][vc_custom_heading text="We are writing a few about our history" font_container="tag:h4|text_align:center|color:%235b676f" use_theme_fonts="yes" el_class="dash" css=".vc_custom_1510887308997{padding-bottom: 40px !important;}"][/vc_column][/vc_row][vc_row vc_row_container="uk-container uk-container-small"][vc_column][vc_column_text]</p>
<p style="text-align: center;">We offer you to choose from a wide variety of car classes new high-quality vehicles meeting your needs and budget best. Renting a car for your business enterprise or vacation, we have a wide range of luxury, sports, and hybrid vehicles available to meet your every car rental need. Take your pick of a BMW, Ferrari, Lamborghini, Aston Martin, Tesla and more.</p>
<p>[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][vc_single_image image="2035" img_size="large" alignment="center" css_animation="bounceInRight" css=".vc_custom_1510900845262{margin-bottom: -155px !important;}"][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]</p>
<p>[/vc_column_text][/vc_column][/vc_row]

CONTENT
);