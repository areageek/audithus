<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'hosting domain price', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'hosting-domain-price.jpg',
	'cat_display_name' => 'pricing tables',
	'custom_class' => 'mungu_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="Domain Price list" font_container="tag:h2|font_size:28px%20|text_align:left" use_theme_fonts="yes" el_class="uk-text-bold "][/vc_column][/vc_row][vc_row css=".vc_custom_1510299502264{padding-bottom: 60px !important;}"][vc_column][vc_table el_class="domain"][bg#28c4a7;c#ffffff;14px;b]DOMAIN,[14px;bg#28c4a7;c#ffffff;b]1%20YEAR,[bg#28c4a7;c#ffffff;14px;b]2%20YEAR,[14px;bg#28c4a7;c#ffffff;b]RENEW,[14px;bg#28c4a7;c#ffffff;b]TRANSFER,[14px;bg#28c4a7;c#ffffff;b;border_right]REDEMPTION|[14px;b].COM,[align-left;14px]%249.95,[14px;align-left]%249.95,[14px;align-left]%249.95,[14px;align-left]%249.95,[14px;align-left]90%20days|[14px;b].NET,[align-left;14px]%2412.5,[14px;align-left]%246.95,[14px;align-left]%2410.95,[14px;align-left]%246.95,[14px;align-left]90%20days|[14px;b].CO.UK,[align-left;14px]%247.95,[14px;align-left]%247.95,[14px;align-left]%241.95,[14px;align-left]%249.55,[14px;align-left]90%20days|[14px;b].EMAIL,[align-left;14px]%246.95,[14px;align-left]%246.95,[14px;align-left]%242.95,[14px;align-left]%248.85,[14px;align-left]90%20days|[14px;b].TODAY,[align-left;14px]%249.9,[14px;align-left]%243.95,[14px;align-left]%249.95,[14px;align-left]%245.55,[14px;align-left]90%20days|[14px;b].ROCKS,[align-left;14px]%248.5,[14px;align-left]%246.95,[14px;align-left]%248.95,[14px;align-left]%243.66,[14px;align-left]90%20days|[14px;b].AERO,[align-left;14px]%245.58,[14px;align-left]%245.95,[14px;align-left]%249.95,[14px;align-left]%2410.2,[14px;align-left]90%20days[/vc_table][/vc_column][/vc_row]
CONTENT
);