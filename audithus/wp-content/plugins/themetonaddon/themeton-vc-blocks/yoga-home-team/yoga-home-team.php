<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'yoga home team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'yoga-home-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
	[vc_row css=".vc_custom_1513915830139{margin-top: 40px !important;}"][vc_column][vc_custom_heading text="Our Teachers" font_container="tag:h2|font_size:30|text_align:center|color:%23000000|line_height:1em" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][mungu_team carousel="" input_type="post" image_type="circle" count="4" column="4" extra_class="yoga-team top-left-back"][con_button alignment="center" color="rgba(0,0,0,0.01)" colortext="#5c5c5c" border="1" colorborder="#4c4c4c" extra_class="cyrcle" conbutton="url:%23|title:View%20all||" css=".vc_custom_1513915793444{margin-top: 50px !important;}"][/vc_column][/vc_row]
CONTENT
);