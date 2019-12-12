<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'church home about 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'church-home-about1.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1498035984715{margin-top: 60px !important;}"][vc_column 0=""][vc_row_inner css=".vc_custom_1498036042062{margin-bottom: 20px !important;}"][vc_column_inner 0=""][vc_custom_heading text="OUR VALUES" font_container="tag:h2|font_size:30|text_align:center" google_fonts="font_family:Playfair%20Display%3Aregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1498097768682{margin-bottom: 20px !important;}"][/vc_column_inner][/vc_row_inner][vc_row_inner 0=""][vc_column_inner width="1/3"][service_alt icon_type="icon_image" title="Service To Others" desc="To serve God is to serve others and is the greatest form of charity: the pure love of Christ. You love one another, as I have loved you." extra_class="uk-text-center"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1498034870384{border-right-width: 1px !important;border-left-width: 1px !important;padding-top: 0px !important;border-left-color: #edeeee !important;border-left-style: solid !important;border-right-color: #edeeee !important;border-right-style: solid !important;}"][service_alt icon_type="icon_image" titletop="02" title="Lifelong Learning" desc="A new building and a new concept in education. Teaching subjects that are usually outside normal educational institutions." extra_class="uk-text-center"][/vc_column_inner][vc_column_inner width="1/3"][service_alt icon_type="icon_image" titletop="03" title="Strengthening Families" desc="These husbands and wives will be united. Fathers and mothers will provide greater spiritual leadership to their families." extra_class="uk-text-center"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);