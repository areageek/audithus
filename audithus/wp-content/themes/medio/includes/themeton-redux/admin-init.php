<?php
if( class_exists('ReduxFramework') ){
    // Load the theme/plugin options
    if( file_exists( get_template_directory() . '/includes/themeton-redux/options-init.php' ) ){
    	require_once medio_file_path(get_template_directory() . '/includes/themeton-redux/options-init.php');
    	require_once medio_file_path(get_template_directory() . '/includes/themeton-redux/demo-addon.php');
    }
}  