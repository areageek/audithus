<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'agency our team ', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-team-1.jpg',
	'cat_display_name' => 'teams',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row][vc_column][mungu_team carousel="" input_type="post" count="2" column="2" categories="43"][/vc_column][/vc_row]
CONTENT
);