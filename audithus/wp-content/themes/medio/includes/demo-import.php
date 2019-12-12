<?php

global $demosss;

$demosss = array(
	'agency' => array('Business'),
	'carrental' => array('Business'),
	'charity' => array('Activity', 'Organization'),
	'church' => array('Activity', 'Organization'),
	'construction' => array('Business', 'Agency'),
	'hosting' => array('Business'),
	'hotel' => array('Business'),
	'jewelry' => array('Business', 'Ecommerce'),
	'laundry' => array('Business'),
	'logistics' => array('Business', 'Entertainment'),
	'medical' => array('Business', 'Entertainment'),
	'model' => array('Agency', 'Entertainment'),
	'realestate' => array('Business', 'Entertainment'),
	'fitness' => array('Agency', 'Entertainment'),
	'singleproduct' => array('Ecommerce'),
	'nightclub' => array('Entertainment'),
	'business' => array('Business'),
	'yoga' => array('Entertainment'),
	'restaurant' => array('Business'),
	'mobileapp' => array('Business'),
);

function ocdi_import_files() {

	global $demosss;

	$defaults = array();
	foreach ($demosss as $demo => $cats) {
		$defaults[] = array(
			'import_file_name'           => $demo,
			'categories'                 => $cats,
			'import_file_url'            => 'http://themeton.com/oneclick/medio/'.$demo.'/content.xml',
			'import_widget_file_url'     => 'http://themeton.com/oneclick/medio/'.$demo.'/widgets.wie',
			'import_redux'               => array(
				array(
					'file_url'    => 'http://themeton.com/oneclick/medio/'.$demo.'/theme-options.json',
					'option_name' => 'themeton_redux',
				),
			),
			'import_preview_image_url'   => 'http://themeton.com/oneclick/medio/'.$demo.'/screen-image.png',
			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'medio' ),
			'preview_url'                => 'http://next.themeton.com/'.$demo,
		);
	}

	return $defaults;

}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );




if ( !function_exists( 'dgwork_after_import' ) ) {
	function dgwork_after_import( $selected_import ) {

		$current_key = $selected_import['import_file_name'];

		/************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/

		if ( false && class_exists( 'RevSlider' ) ) {

			$wbc_sliders_array = array(
				'medio' => array(
					'http://themeton.com/oneclick/medio/home.zip',
					'http://themeton.com/oneclick/medio/testimonial.zip'
				),
			);
			 if ( array_key_exists( $current_key, $wbc_sliders_array ) ) {
		        $wbc_slider_import = $wbc_sliders_array[$current_key];

		        if( is_array( $wbc_slider_import ) ){
		            foreach ($wbc_slider_import as $slider_zip) {
		                $slider = new RevSlider();
	                    $temp_file = download_url($slider_zip);
	                    $slider->importSliderFromPost( true, true, $temp_file );
		            }
		        }
		    }
		}


		/************************************************************************
		* Setting Menus
		*************************************************************************/

		$wbc_menu_array = array( 'medio' );

		if ( in_array( $current_key, $wbc_menu_array ) ) {
			$top_menu = get_term_by( 'main', 'main-menu', 'nav_menu' );

			if ( isset( $top_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'primary' => $top_menu->term_id,
						'footer_menu'  => $top_menu->term_id
					)
				);
			}
		}

		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'medio' => 'Home Medio',
		);

		if ( array_key_exists( $current_key, $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$current_key] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

	}


	add_action( 'pt-ocdi/after_import', 'dgwork_after_import' );
}