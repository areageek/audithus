<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'charity about content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'charity-about-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row css=".vc_custom_1493383972506{padding-bottom: 55px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_custom_heading text="Started in <i>2001</i>" font_container="tag:h2|font_size:30|text_align:center|color:%23161720" use_theme_fonts="yes" el_class="charity-title"][vc_column_text]</i>
<p style="text-align: center;">Almost 60 percent of the refugees are children. Many have become separated from their families or fled on their own. All have suffered tremendous loss. As violence continues in Africa, their numbers and their needs grow. The risk of this humanitarian crisis turning into a human catastrophe is all too real. But the magnitude of the challenge is daunting. This is the fastest growing humanitarian crisis in the world today – and the world must respond.</p>
</i>[/vc_column_text][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT
);