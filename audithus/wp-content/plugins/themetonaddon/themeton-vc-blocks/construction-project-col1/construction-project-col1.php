<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'construction project column 1', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'construction-project-col1.jpg',
	'cat_display_name' => 'services',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row vc_row_container="uk-container" vc_row_flex="uk-flex" vc_row_themeton="yes"][vc_column][vc_column_text]

[gallery columns="1" size="full" ids="1365,1277,1275,1256,1257,1255,1254,1237,1236,1235,1234,1169,1168,1162" orderby="band"]

[/vc_column_text][/vc_column][/vc_row]
CONTENT
);