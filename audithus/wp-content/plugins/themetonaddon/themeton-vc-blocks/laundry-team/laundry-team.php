<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'laundry team', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'laundry-team.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1493629761108{margin-bottom: 30px !important;}"][vc_column width="1/4"][/vc_column][vc_column width="1/2"][vc_custom_heading text="OUR EMPLOYEES" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes" el_class="mvb0" css=".vc_custom_1497879284562{padding-bottom: 30px !important;}"][vc_column_text]
<p style="text-align: center;">With excellent performance, organization and follow through on tasks they develop positive work relationships with team members and keep the team on track.</p>
[/vc_column_text][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row][vc_column][mungu_team carousel="" space="yes" input_type="post" count="8" column="4"][/vc_column][/vc_row]
CONTENT
);