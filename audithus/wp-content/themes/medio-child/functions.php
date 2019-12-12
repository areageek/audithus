<?php

/* --------- Insert your customized functions on next rows --------- */


function medio_child_enqueue_styles() {

    $parent_style = 'medio-stylesheet';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'medio-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'medio_child_enqueue_styles' );


?>