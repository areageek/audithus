<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => esc_html__( 'logistics page title', 'themetonaddon' ),
	'image_path' => 'http://themeton.com/themetonaddon/themeton-vc-blocks/'.basename(dirname(__FILE__)).'/'.'logistics-page-title.jpg',
	'cat_display_name' => 'Page title',
	'custom_class' => 'next_vc_templates-1',
	'content' => <<<CONTENT
[vc_row full_width="stretch_row" vc_row_flex="uk-flex" vc_row_height="270px" vc_row_themeton="yes" css=".vc_custom_1510307229833{background-image: url(http://next.themeton.com/medical/wp-content/uploads/sites/2/2017/06/shutterstock_486355750-1.jpg?id=1001) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column vc_column_themeton="yes"][vc_row_inner vc_row_container="uk-container" vc_row_valignment="uk-flex-middle" vc_row_flex="uk-flex" vc_row_height="270px" vc_row_themeton="yes"][vc_column_inner el_class="uk-flex" vc_column_valignment="uk-flex-middle" vc_column_themeton="yes"][breadcrumb][con_button extra_class="appointment_btn_1" conbutton="url:http%3A%2F%2Fnext.themeton.com%2Fmedical%2Fpages%2Fappointment%2F|title:BOOK%20CONSULTATION||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT
);