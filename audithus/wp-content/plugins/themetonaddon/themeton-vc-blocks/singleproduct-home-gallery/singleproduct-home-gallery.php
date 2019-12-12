<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct home gallery', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-home-gallery.jpg',
	'cat_display_name' => 'gallerys',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" equal_height="yes" content_placement="middle" css=".vc_custom_1511489597148{padding-top: 100px !important;padding-bottom: 100px !important;background-image: url(http://next.themeton.com/singleproduct/wp-content/uploads/sites/18/2017/09/traaa.png?id=32) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}"][vc_column width="1/2" css=".vc_custom_1505191935674{background-position: 0 0 !important;background-repeat: no-repeat !important;}"][/vc_column][vc_column width="1/2"][vc_empty_space height="100px"][vc_custom_heading text="Awesome Box" font_container="tag:p|font_size:20px|text_align:left|color:%23a6a6a6" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1506417864042{margin-bottom: 0px !important;}"][vc_custom_heading text="The watch is supplied
with following" font_container="tag:h2|font_size:38px|text_align:left|color:%23393939|line_height:45px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1505190926529{margin-top: 0px !important;}"][icon_list icon_type="fontawesome" icon_fontawesome="fa fa-angle-right" color="#898989" extra_class="mv3" list="%5B%7B%22item%22%3A%22Tachymeter%20Watch%20Presentation%20Packaging%22%7D%2C%7B%22item%22%3A%22Official%20Guarantee%20Paper%22%7D%2C%7B%22item%22%3A%22Instruction%20manual%20%22%7D%2C%7B%22item%22%3A%22Surprise%20Gift%22%7D%5D"][icon_list icon_type="fontawesome" icon_fontawesome="fa fa-question-circle" color="#2f9df4" extra_class="mv1" list="%5B%7B%22item%22%3A%22Frequently%20asked%20Questions%22%2C%22link%22%3A%22%23%22%7D%5D"][vc_separator color="custom" align="align_left" el_width="30" accent_color="#e9e9e9" css=".vc_custom_1506417749535{margin-bottom: 0px !important;}"][icon_list icon_type="fontawesome" icon_fontawesome="fa fa-exclamation-circle" color="#2f9df4" extra_class="mv1" list="%5B%7B%22item%22%3A%22Read%20our%20Customer%20Reviews%20and%20Ratings%22%2C%22link%22%3A%22%23%22%7D%5D"][vc_empty_space height="100px"][/vc_column][/vc_row]
CONTENT
);