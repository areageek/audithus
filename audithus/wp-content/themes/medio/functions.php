<?php
/*
    ==================================
    Theme Configuration
    ==================================
*/

// Theme Setup
if ( ! function_exists( 'medio_theme_setup' ) ) :
    function medio_theme_setup() {
        // load translate file
        load_theme_textdomain( 'medio', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'woocommerce' );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 400, 400, true );

        // Set Image sizes
        add_image_size( 'medio-related-post', 370, 240, true );
        add_image_size( 'medio-vc-ceo-team', 320, 480, true );
        add_image_size( 'medio-vc-blog-thumbnail', 270, 200, true );
        add_image_size( 'medio-vc-blog-thumbnail_wide', 800, 280, true );
        add_image_size( 'medio-featured-image', 800, 0, true );
        add_image_size( 'medio-project-thumb', 500, 300, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => esc_html__('Primary Menu', 'medio'),
        ) );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );
        
        add_theme_support( 'post-formats', array(
            'quote', 'image', 'gallery', 'audio', 'video', 'link'
        ) );

        // Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

    }

endif;

add_action( 'after_setup_theme', 'medio_theme_setup' );

// default content width
if ( ! isset( $content_width ) ) $content_width = 940;


if (!function_exists('medio_file_path')) {

    /*
     * Allows to include deep directory file if it exists in child theme directory.
     * Otherwise it includes just main theme file.
     */

    function medio_file_path($file, $uri = false) {
        $file = str_replace("\\", "/", $file); // Replaces If the customer runs on Win machine. Otherway it doesn't perform
        if (is_child_theme()) {
            if (!$uri) {
                $dir = str_replace("\\", "/", get_template_directory());
                $replace = str_replace("\\", "/", get_stylesheet_directory());
                $file_exist = str_replace($dir, $replace, $file);
                $file = str_replace($replace, $dir, $file);
            } else {
                $dir = get_template_directory_uri();
                $replace = get_stylesheet_directory_uri();
                $file_exist = str_replace($dir, $replace, $file);

                $file_child_url = str_replace($dir, get_stylesheet_directory(), $file);
                if( file_exists($file_child_url) ){
                    return $file_exist;
                }
            }

            if( file_exists($file_exist) ){
                $file_child = str_replace($dir, $replace, $file);
                return $file_child;
            }
            return $file;

        } else {
            return $file;
        }
    }
}

$medio_default_sidebars = array('right-sidebar'=>'Right sidebar','left-sidebar'=>'Left sidebar');
// Register widget area.
if(!function_exists('medio_widgets_init')) {
    function medio_widgets_init() {
        
        global $medio_default_sidebars;
        foreach ($medio_default_sidebars as $id => $sidebar) {
            if( !empty($id) ){
                register_sidebar(array(
                    'name' => $sidebar .' area',
                    'id' => $id,
                    'description' => esc_html__('Add widgets here to appear in your sidebar.', 'medio'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h5 class="widget-title"><span>',
                    'after_title'   => '</span></h5>'
                ));
            }
        }
        // define sidebars
        $theme_sidebars = Themeton_Std::get_sidebars();
        foreach ($theme_sidebars as $id => $sidebar) {
            if( !empty($id) && !in_array($id, $medio_default_sidebars) ){
                register_sidebar(array(
                    'name' => $sidebar .' area',
                    'id' => $id,
                    'description' => esc_html__('Add widgets here to appear in your sidebar.', 'medio'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h5 class="widget-title"><span>',
                    'after_title'   => '</span></h5>'
                ));
            }
        }

        // Footer widget areas
        for($i=1; $i<=4 ; $i++ ) {
            register_sidebar(
                array(
                    'name'          => esc_html__('Footer Column', 'medio') . ' ' .$i,
                    'id'            => 'footer'.$i,
                    'description'   => esc_html__('Add widgets here to appear in your footer column', 'medio') . ' ' .$i,
                    'before_widget' => '<div id="%1$s" class="footer_widget widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h5 class="widget-title">',
                    'after_title'   => '</h5>'
                )
            );
        }
    }
}
add_action( 'widgets_init', 'medio_widgets_init' );


// Site Favicon
if( !function_exists('wp_site_icon') ):
    function medio_theme_favicon(){
        if(Themeton_Std::getopt('favicon') != ''){
            echo '<link rel="shortcut icon" type="image/x-icon" href="'.Themeton_Std::getopt('favicon').'"/>';
        }
    }
    add_action('wp_head', 'medio_theme_favicon');
endif;


if(!function_exists('medio_setup_my_field_in_bar')) {
    function medio_setup_my_field_in_bar( $filters ) {
        $filters['tribe-bar-my-field'] = array(
            'name' => 'tribe-bar-my-field',
            'caption' => 'Location',
            'html' => '<input type="text" name="tribe-bar-my-field" id="tribe-bar-my-field" placeholder="'.esc_attr__('Label', 'medio').'">'
        );
        return $filters;
    }
    add_filter( 'tribe-events-bar-filters',  'medio_setup_my_field_in_bar', 1, 1 );
}


// google Fonts
if ( !function_exists( 'medio_fonts_url' ) ) :
    function medio_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        if( !class_exists('ReduxFrameworkPlugin') ) {
            $fonts[] = 'Poppins:400,300,700';
        }
        if ( $fonts ) {
            $fonts_url = esc_url(add_query_arg( array(
                'family' => implode( '|', $fonts ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' ));
        }

        return $fonts_url;
    }
endif;

// Enqueue Scripts
if(!function_exists('medio_enqueue_scripts')) {
    function medio_enqueue_scripts() {

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        wp_enqueue_style( 'medio-theme-fonts', medio_fonts_url(), array(), null );

        // Include all static CSS files
        wp_enqueue_style( 'uikit', get_template_directory_uri().'/vendors/uikit/css/uikit.min.css');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/vendors/font-awesome/css/font-awesome.min.css');
        wp_enqueue_style( 'animate', get_template_directory_uri().'/vendors/animate.css');
        wp_enqueue_style( 'swiper', get_template_directory_uri().'/vendors/swiper/css/swiper.min.css');
        wp_enqueue_style( 'jquery-ui-and-plus', get_template_directory_uri().'/vendors/jquery-ui-and-plus.min.css');

        wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/vendors/owl.carousel.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'owl-carousel-filter', get_template_directory_uri() . '/vendors/jquery.owl-filter.js', array('jquery'), false, true );
        wp_enqueue_script( 'uikit', get_template_directory_uri() . '/vendors/uikit/js/uikit.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'uikit-icons', get_template_directory_uri() . '/vendors/uikit/js/uikit-icons.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'swiper', get_template_directory_uri() . '/vendors/swiper/js/swiper.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/vendors/waypoints.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'jquery.counterup', get_template_directory_uri() . '/vendors/jquery.counterup.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'svg-morpheus', get_template_directory_uri() . '/vendors/svg-morpheus.js', array('jquery'), false, true );
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/vendors/isotope.pkgd.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'anime', get_template_directory_uri() . '/vendors/anime.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'jquery-ui' );
        wp_enqueue_script( 'mo', get_template_directory_uri() . '/vendors/mo.min.js', array('jquery'), false, true );

        // Theme style and scripts
        wp_enqueue_style( 'medio-stylesheet', get_stylesheet_uri() );
        wp_enqueue_script('medio-scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery', 'mediaelement', 'wp-playlist', 'jquery-ui-slider'), false, true );

        // Inline Script
        wp_add_inline_script('medio-scripts', Themeton_Tpl::inline_script() );
    }
}
add_action( 'wp_enqueue_scripts', 'medio_enqueue_scripts' );

if(!function_exists('medio_megamenu_inline_css')) {
    function medio_megamenu_inline_css() {
        $args = array ('post_type' => 'megamenu', 'posts_per_page' => -1);
        $the_query = new WP_Query( $args );
        $css = '';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $css .= get_post_meta(get_the_ID(), '_wpb_post_custom_css', true );
            $css .= get_post_meta(get_the_ID(), '_wpb_shortcodes_custom_css', true );
            wp_reset_postdata();
        }
        wp_add_inline_style( 'medio-stylesheet' , $css );
    }
}
add_action( 'wp_enqueue_scripts', 'medio_megamenu_inline_css' );

if(!function_exists('medio_admin_style')) {
    function medio_admin_style() {
        wp_enqueue_style('redux-styles', get_template_directory_uri().'/css/redux-styling.css');
    }
}
add_action('admin_enqueue_scripts', 'medio_admin_style');



if(!function_exists('medio_css')) {
    function medio_css($post_id = NULL) {
        $post_custom_css = '';
        if (Themeton_Std::getopt('header_layout')!=NULL) {
            $post_id = Themeton_Std::getopt('header_layout');
        }
        if ( $post_id ) {
            $post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
            $shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
            if ( ! empty( $shortcodes_custom_css ) ) {
                $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
                print '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$shortcodes_custom_css.$post_custom_css.'</style>';
            }
        }
    }
}


if(!function_exists('medio_css_404')) {
    function medio_css_404($post_id = NULL) {
        $post_custom_css = '';
        if (Themeton_Std::getopt('error_main_page')!=NULL) {
            $post_id = Themeton_Std::getopt('error_main_page');
        }
        if ( $post_id ) {
            $post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
            $shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
            if ( ! empty( $shortcodes_custom_css ) ) {
                $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
                print '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$shortcodes_custom_css.$post_custom_css.'</style>';
            }
        }
    }
}


if(!function_exists('medio_css_title')) {
    function medio_css_title($post_id = NULL) {
        $post_custom_css = ''; 
        if (Themeton_Std::getopt('page_title_layout')!=NULL) { 
            $post_id = Themeton_Std::getopt('page_title_layout');
        }
        if ( $post_id ) {
            $post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
            $shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
            if ( ! empty( $shortcodes_custom_css ) ) {
                $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
                print '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$shortcodes_custom_css.$post_custom_css.'</style>';
            }      
        }
    }
}


if(!function_exists('medio_css_footer')) {
    function medio_css_footer($post_id = NULL) {
        $post_custom_css = '';
        if (Themeton_Std::getopt('footer_layout')!=NULL) { 
            $post_id = Themeton_Std::getopt('footer_layout');
        }
        if ( $post_id ) {
            $post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
            $shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
            if ( ! empty( $shortcodes_custom_css ) ) {
                $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
                print '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$shortcodes_custom_css.$post_custom_css.'</style>';
            }
        }
    }
}

add_action( 'wp_head','medio_css');
add_action( 'wp_head','medio_css_title');
add_action( 'wp_head','medio_css_footer');
add_action( 'wp_head','medio_css_404');


if(!function_exists('medio_css_event')) {
    function medio_css_event($post_id = NULL) {
        if ('tribe_events'==get_post_type()) {
            $post_id = get_the_ID();
            $post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
            $shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
            if ( ! empty( $shortcodes_custom_css ) ) {
                $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
                print '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$shortcodes_custom_css.$post_custom_css.'</style>';
            }
        }
    }
}
add_action( 'wp_head','medio_css_event');


// Body Class Filter
add_filter( 'body_class', 'medio_body_class_filter' );
if(!function_exists('medio_body_class_filter')) {
    function medio_body_class_filter( $classes ) {
        global $post;

        if(Themeton_Std::getopt('general_layout') == 'boxed') { $classes[] = 'layout-boxed'; }
        if(Themeton_Std::getopt('general_layout') == 'attached') { $classes[] = 'layout-attached'; }

        $classes[] = 'skin-medio';
        
        return $classes;
    }
}


// Custom Excerpt Length
if(!function_exists('medio_excerpt_length')) {
    function medio_excerpt_length( $length ) {
        return 40;
    }
}
add_filter( 'excerpt_length', 'medio_excerpt_length', 999 );


/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'medio_flush_rewrite_rules' );


/* Flush your rewrite rules */
if(!function_exists('medio_flush_rewrite_rules')) {
    function medio_flush_rewrite_rules() {
         flush_rewrite_rules();
    }
}


// Custom Excerpt More Symbol
if(!function_exists('medio_excerpt_more')) {
    function medio_excerpt_more( $excerpt ) {
        return esc_html__(' ...', 'medio');
    }
}
add_filter( 'excerpt_more', 'medio_excerpt_more' );



// Primary menu callback function
if(!function_exists('themeton_primary_callback')) {
    function themeton_primary_callback(){
        echo '<ul id="primary_ui" class="themeton-menu themeton-menu-top-border uk-visible@m uk-navbar-nav uk-width-1-1 uk-flex-right uk-flex-wrap uk-flex-middle">';
        wp_list_pages( array(
            'sort_column'  => 'menu_order, post_title',
            'title_li' => '') );
        echo '</ul>';
    }
}


// Sidebar menu callback function
if(!function_exists('themeton_sidebarmenu_callback')) {
    function themeton_sidebarmenu_callback(){
        echo '<ul class="uk-nav-default uk-nav-parent-icon uk-nav uk-animation-slide-left no-menu-collapse">';
        wp_list_pages( array(
            'sort_column'  => 'menu_order, post_title',
            'title_li' => '') );
        echo '</ul>';
    }
}


// Footer menu callback function
if(!function_exists('themeton_footer_menu_callback')) {
    function themeton_footer_menu_callback(){
        echo '<ul class="footer-menu">';
            echo '<li class="menu-item"><a href="'.esc_url(home_url('/')).'">'.esc_html__('Home', 'medio').'</a></li>';
            echo '<li class="menu-item"><a href="'.esc_url(home_url('/')).'?post_type=post">'.esc_html__('Archive', 'medio').'</a></li>';
            echo '<li class="menu-item"><a href="'.esc_url(home_url('/')).'?s=">'.esc_html__('Search', 'medio').'</a></li>';
        echo '</ul>';
    }
}


/**
 * This code filters the Categories archive widget to include the post count inside the link
 */
add_filter('wp_list_categories', 'medio_cat_count_span');

if(!function_exists('medio_cat_count_span')) {
    function medio_cat_count_span($links) {
        $links = str_replace('</a> (', ' <span>', $links);
        $links = str_replace('<span class="count">(', '<span>', $links);
        $links = str_replace(')', '</span></a>', $links);
        return $links;
    }
}

if (!function_exists('medio_loop_columns')) {
	function medio_loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'medio_loop_columns',20);

/**
 * This code filters the Archive widget to include the post count inside the link
 */
add_filter('get_archives_link', 'medio_archive_count_span');

if(!function_exists('medio_archive_count_span')) {
    function medio_archive_count_span($links) {
        $links = str_replace('</a>&nbsp;(', ' <span>', $links);
        $links = str_replace(')</li>', '</span></a></li>', $links);
        return $links;
    }
}

// Custom Gallery Shortcode
if(!function_exists('medio_gallery_shortcode')) {
    function medio_gallery_shortcode( $output = '', $atts, $instance ) {
        $return = $output;

        if(isset($atts['columns']) && $atts['columns'] == 1){
            // retrieve content of your own gallery function
            $tana_gallery = Themeton_Tpl::gallery_slideshow( $atts );
            if( !empty( $tana_gallery ) ) {
                $return = $tana_gallery;
            }
        }
        return $return;
    }
}
add_filter( 'post_gallery', 'medio_gallery_shortcode', 10, 3 );

// Select Loaders
add_filter( 'select_preloader',  'medio_select_loader');

if(!function_exists('medio_select_loader')) {
    function medio_select_loader() {
        $return = Themeton_Std::getopt('loader_select');
        switch ($return) {
            case "1":
                $return = '<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle"><div class="loader"></div></div>';
                break;
            case "2":
                $return = '<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle">
                <div id="loader_circles"></div>
              </div>';
                break;
            case "3":
                $return = '<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle"><div class="loader-3"></div></div>';
                break;
            case "4":
                $return ='<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle"><div class="loader_indicator"> 
                <svg width="16px" height="12px">
                  <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                  <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                </svg>
              </div>
              </div>';
                break;
            case "5":
                $return ='<div id="the_loader" class="uk-flex uk-flex-center uk-flex-middle"><div class="loader-5"></div></div>';
                break;
            case "6":
                $return ='';
                break;
            default:
                echo "";
        }
        return $return;
    }
}

/*                                                        
___ _                    _             _____ _                     
|_   _| |_ ___ _____ ___| |_ ___ ___   |     | |___ ___ ___ ___ ___ 
  | | |   | -_|     | -_|  _| . |   |  |   --| | .'|_ -|_ -| -_|_ -|
  |_| |_|_|___|_|_|_|___|_| |___|_|_|  |_____|_|__,|___|___|___|___|
  
*/
// Themeton Standard Package
require get_template_directory() . '/framework/classes/class.themeton.std.php';

// Theme Class Extends Themeton Class
class Themeton_Std extends ThemetonStd { }

// Themeton Builder Functions
require get_template_directory() . '/includes/vc-extend/themeton-vc.php';


// Include current theme customize
require get_template_directory() . '/includes/functions.php';


// Theme Class Extends Template Class
if(!function_exists('medio_filter_publish_dates')) {
    function medio_filter_publish_dates( $the_date, $d, $post ) {
        return sprintf('%s %s', human_time_diff( strtotime($post->post_date), current_time('timestamp') ), esc_html__('ago', 'medio'));
    }
}
if( Themeton_Std::get_mod('content_human_time')=='1' ){
    add_action( 'get_the_date', 'medio_filter_publish_dates', 10, 3 );
}

function wpb_image_editor_default_to_gd( $editors ) {
    $gd_editor = 'WP_Image_Editor_GD';
    $editors = array_diff( $editors, array( $gd_editor ) );
    array_unshift( $editors, $gd_editor );
    return $editors;
}
add_filter( 'wp_image_editors', 'wpb_image_editor_default_to_gd' );