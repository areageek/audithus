<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga team list', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-team-list.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Our Traineers" font_container="tag:h1|font_size:36px|text_align:center|color:%23000000" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1513762514214{margin-bottom: 30px !important;}"][mungu_team carousel="" input_type="post" image_type="circle" count="10" column="4" extra_class="yoga-team top-left-back uk-position-relative"][/vc_column][/vc_row]
CONTENT
);