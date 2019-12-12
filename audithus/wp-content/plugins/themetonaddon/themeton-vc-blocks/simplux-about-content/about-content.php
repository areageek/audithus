<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'about conten text', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'agency-about-content.jpg',
	'cat_display_name' => 'contents',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" equal_height="yes" content_placement="middle" css=".vc_custom_1500444795037{margin-bottom: 0px !important;}" el_id="content"][vc_column width="1/3" vc_column_flex_auto="uk-width-1-4@m" vc_column_text_alignment="uk-text-right" css=".vc_custom_1503633420421{padding-top: 150px !important;padding-right: 100px !important;padding-bottom: 150px !important;padding-left: 100px !important;background-color: #292b31 !important;}"][vc_custom_heading text="Jonathan Kann" font_container="tag:h2|font_size:40px|text_align:right|color:%23ffffff|line_height:48px" use_theme_fonts="yes"][vc_column_text]CEO, General Designer[/vc_column_text][vc_row_inner gap="5"][vc_column_inner width="1/4"][vc_icon icon_fontawesome="fa fa-facebook" color="white" align="right" link="url:http%3A%2F%2Ffacebook.com|||"][/vc_column_inner][vc_column_inner width="1/4"][vc_icon icon_fontawesome="fa fa-twitter" color="white" align="right" link="url:http%3A%2F%2Ffacebook.com|||"][/vc_column_inner][vc_column_inner width="1/4"][vc_icon icon_fontawesome="fa fa-behance" color="white" align="right" link="url:http%3A%2F%2Ffacebook.com|||"][/vc_column_inner][vc_column_inner width="1/4"][vc_icon icon_fontawesome="fa fa-instagram" color="white" align="right" link="url:http%3A%2F%2Ffacebook.com|||"][/vc_column_inner][/vc_row_inner][vc_empty_space height="30px"][vc_column_text el_class="text-white"]We design products and user experiences with a unique research based process i call Informed Creativity.[/vc_column_text][vc_empty_space height="30px"][vc_column_text]Proactively develop reliable users and integrated systems. Produce corporate experiences vis a vis multi customer service.[/vc_column_text][/vc_column][vc_column width="1/6" css=".vc_custom_1499501708674{background-image: url(http://demo.themeton.com/simplux/wp-content/uploads/sites/88/2017/06/about-me.png?id=757) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][vc_column width="1/2" css=".vc_custom_1491892982352{padding-top: 150px !important;padding-right: 150px !important;padding-bottom: 150px !important;padding-left: 100px !important;}"][con_counter align="1" list="%5B%7B%22layout%22%3A%22icon%22%2C%22color%22%3A%22%233c404b%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-users%22%2C%22number%22%3A%2218%2C250%22%2C%22body%22%3A%22Happy%20Clients%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22color%22%3A%22%233c404b%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-suitcase%22%2C%22number%22%3A%22152%22%2C%22body%22%3A%22Portfolio%20Projects%22%7D%2C%7B%22layout%22%3A%22icon%22%2C%22color%22%3A%22%233c404b%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-coffee%22%2C%22number%22%3A%22480%22%2C%22body%22%3A%22Coffee%20Special%20Event%22%7D%5D"][vc_empty_space height="100px"][con_progress title="Development" value="95%" subtitle="Strategy Team Work"][vc_empty_space height="30px"][con_progress title="Design Consulting" value="65%" subtitle="Design Department Work"][vc_empty_space height="30px"][con_progress title="Marketing Promo" value="86%" subtitle="Strategy Team Work"][/vc_column][/vc_row]
CONTENT
);