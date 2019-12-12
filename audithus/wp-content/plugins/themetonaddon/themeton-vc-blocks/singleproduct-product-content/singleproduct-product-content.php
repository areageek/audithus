<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'singleproduct product content', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'singleproduct-product-content.jpg',
	'cat_display_name' => 'products',
	'custom_class' => 'tt_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" equal_height="yes"][vc_column width="1/2"][vc_single_image image="58" img_size="full" alignment="right" css=".vc_custom_1511429248570{margin-right: -144px !important;}" el_class="uk-position-absolute right0"][vc_custom_heading text="More Features" font_container="tag:h1|font_size:38px|text_align:left|color:%23393939" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1510645044434{margin-top: 120px !important;margin-bottom: 30px !important;}"][vc_row_inner][vc_column_inner width="5/12"][vc_column_text el_class="single-product-ul"]</p>
<ul>
<li>Brand Colour</li>
<li>Brand Material</li>
<li>Brand</li>
<li>Thickness</li>
<li>Collection</li>
<li>Dial Colour</li>
</ul>
<p>[/vc_column_text][/vc_column_inner][vc_column_inner width="5/12"][vc_column_text el_class="single-product-ul"]</p>
<ul>
<li>Multi-colour</li>
<li>Others</li>
<li>Steinhausen 11</li>
<li>Millimeters</li>
<li>Fashion, Sports</li>
<li>Others</li>
</ul>
<p>[/vc_column_text][/vc_column_inner][vc_column_inner width="2/12"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" css=".vc_custom_1511429318544{padding-top: 0px !important;padding-left: 130px !important;background-color: #f1f4f2 !important;}" el_class="grayback"][vc_empty_space height="100px"][vc_custom_heading text="Featured Reviews" font_container="tag:h1|font_size:38px|text_align:left|color:%23393939" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1511429210390{margin-top: 16px !important;margin-bottom: 30px !important;}"][woo_reviews][vc_btn title="Read more" style="custom" custom_background="#00d463" custom_text="#ffffff" shape="round" el_class="fontsize15" css=".vc_custom_1511430613382{margin-top: -30px !important;margin-bottom: 50px !important;}"][vc_empty_space height="50px"][/vc_column][/vc_row]

CONTENT
);