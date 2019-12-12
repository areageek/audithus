<?php
    
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "themeton_redux";


    function themeton_redux_action_customizer(){
        $compiled_css = Themeton_Less::get_compiled_css();
        echo '<style type="text/css" id="customize_preview_css">'. $compiled_css .'</style>';
    }
    add_action("redux/customizer/live_preview", 'themeton_redux_action_customizer');

    function themeton_redux_action_hook(){
        if( class_exists('Themeton_Less') ){
            Themeton_Less::build_css();
        }
    }
    
    add_action('customize_save_after', 'themeton_redux_action_hook', 99);
    add_action('redux/options/'.$opt_name.'/saved', 'themeton_redux_action_hook', 99);
    add_action('redux/options/'.$opt_name.'/section/reset', 'themeton_redux_action_hook', 99);
    add_action('redux/options/'.$opt_name.'/compiler/advanced', 'themeton_redux_action_hook', 99);

    if( !function_exists('get_variables') ){
        function get_variables(){
            $less_variables = array();
            $variables = ThemetonStd::fs_get_contents_array(get_template_directory() . "/less/variables.less");
            foreach ($variables as $str) {
                $line = trim($str . '');
                if( substr($line, 0, 2)!="//" && strlen($line)>3 && substr($line, 0, 1)=="@" ){
                    $splits = explode(':', $line);
                    $variable = trim( str_replace('@', '', $splits[0]) );
                    $value = trim($splits[1]);
                    if( strpos($value, '//')!==false ){
                        $pos = explode('//', $value);
                        $value = trim($pos[0]);
                    }
                    $value = str_replace(';', '', $value);
                    $value = str_replace('"', '', $value);
                    $value = str_replace("'", "", $value);

                    $less_variables[$variable] = $value;
                }
            }

            return $less_variables;
        }
    }

    global $medio_less_variables;
    $medio_less_variables = array();
    if( !function_exists('getLessValue') ){
        function getLessValue($name){
            global $medio_less_variables;
            if( empty($medio_less_variables) ){
                $medio_less_variables = is_user_logged_in() ? get_variables() : array();
            }
    
            if( isset($medio_less_variables[$name]) ){
                $val = $medio_less_variables[$name];
                $val = str_replace("'", "", $val);
                $val = str_replace('"', '', $val);
                return $val;
            }
    
            return '';
        }
    }


    if( !function_exists('get_font_style') ){
        function get_font_style($variable_name) {
            $font = array();
            if (getLessValue($variable_name.'-font-family')!='') $font['font-family'] = getLessValue($variable_name.'-font-family');
            if (getLessValue($variable_name.'-font-style')!='') $font['font-style'] = getLessValue($variable_name.'-font-style');
            if (getLessValue($variable_name.'-font-weight')!='') $font['font-weight'] = getLessValue($variable_name.'-font-weight');
            if (getLessValue($variable_name.'-font-size')!='') $font['font-size'] = getLessValue($variable_name.'-font-size');
            if (getLessValue($variable_name.'-line-height')!='') $font['line-height'] = getLessValue($variable_name.'-line-height');
            if (isset($font['font-family']) && $font['font-family'] == 'ProximaNova') return array();
            else return $font;
        }
    }

     // BE SURE TO RENAME THE FUNCTION NAMES TO YOUR OWN NAME OR PREFIX
     function medio_add_metaboxes() {
        // Declare your sections
        $boxSections = array();

        $boxSections[] = array(
            'title'         => esc_html__('Section Options', 'medio'),
            'icon'          => 'el el-website', // Only used with metabox position normal or advanced
            'fields'        => array(
                array(
                    'id'       => 'header-style',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Header Behaviour', 'medio'), 
                    'options'  => array(
                        '1' => 'Normal',
                        'fixed' => 'Fixed & Sticky',
                        'menu-sticky' => 'Sticky',
                        'absolute' => 'Absolute',
                    ),
                    'default'  => '1',
                ),
                array(         
                    'id'       => 'header-background',
                    'type'     => 'background',
                    'title'    => esc_attr__('Header Background', 'medio'),
                    'default'  => array(),
                    'background-color' => true,
                ),
                array(         
                    'id'       => 'mobile-header-background',
                    'type'     => 'color',
                    'title'    => esc_attr__('Mobile Header Background', 'medio'),
                    'default'  => '#ffffff',
                    'transparent' => false
                ),
                array(
                    'id'             => 'header-padding',
                    'type'           => 'spacing',
                    'mode'           => 'padding',
                    'units'          => array('px','em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Header Section Padding', 'medio'),
                    'default'            => array(
                        'padding-top'     => '0', 
                        'padding-right'   => '0', 
                        'padding-bottom'  => '0', 
                        'padding-left'    => '0',
                        'units'          => 'px', 
                    ),
                    'desc'        => esc_html__( 'Overall header padding space. You can set specific space on every single row as well.', 'medio' ),
                ),
                array(
                    'id'             => 'header-margin',
                    'type'           => 'spacing',
                    'mode'           => 'margin',
                    'units'          => array('px','em'),
                    'units_extended' => 'true',
                    'title'          => esc_html__('Header Section Margin', 'medio'),
                    'default'            => array(
                        'margin-top'     => '0', 
                        'margin-right'   => '0', 
                        'margin-bottom'  => '0', 
                        'margin-left'    => '0',
                        'units'          => 'px', 
                    ),
                    'desc'        => esc_html__( 'Overall header margin space. You can set specific space on every single row as well.', 'medio' ),
                ),
                
            ),
        );

        $boxSections[] = array(
            'title'         => esc_html__('Menu Design Options', 'medio'),
            'icon'          => 'el el-cog', // Only used with metabox position normal or advanced
            'fields'        => array(
                // Primary menu
                array(
                    'id'             => 'header-menu-padding',
                    'type'           => 'spacing',
                    'mode'           => 'padding',
                    'units'          => array('px','em'),
                    'units_extended' => 'true',
                    'title'          => esc_html__('Menu Item Padding', 'medio'),
                    'default'            => array(
                        'margin-top'     => '0', 
                        'margin-right'   => '0', 
                        'margin-bottom'  => '0', 
                        'margin-left'    => '0',
                        'units'          => 'px', 
                    )
                ),
                array(
                    'id'          => 'header-font-menu',
                    'type'        => 'typography', 
                    'title'       => esc_attr__('Menu font', 'medio'),
                    'desc'        => esc_html__( 'These settings control the typography for only top level menus.', 'medio' ),
                    'google'      => true,
                    'color'       => false,
                    'text-align'    => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'    => true,
                    'font-backup' => true,
                    'units'       =>'px',
                    'default'     => get_font_style('font-header'),
                ),
                array(
                    'id'       => 'header-color-menu',
                    'type'     => 'link_color',
                    'title'    => esc_html__('Menu color', 'medio'),
                    'subtitle' => esc_html__('Only color validation can be done on this field type', 'medio'),
                    'desc'     => esc_html__('This is the description field, again good for additional info.', 'medio'),
                    ),
                // Sub menu
                array(
                    'id'             => 'header-submenu-padding',
                    'type'           => 'spacing',
                    'mode'           => 'padding',
                    'units'          => array('px','em'),
                    'units_extended' => 'true',
                    'title'          => esc_html__('Dropdown Menu Item Padding', 'medio'),
                    'default'            => array(
                        'margin-top'     => '0', 
                        'margin-right'   => '0', 
                        'margin-bottom'  => '0', 
                        'margin-left'    => '0',
                        'units'          => 'px', 
                    )
                ),
                array(
                    'id'          => 'header-font-submenu',
                    'type'        => 'typography', 
                    'title'       => esc_attr__('Dropdown menu font', 'medio'),
                    'desc'        => esc_html__( 'These settings control the typography for all dropdown menus.', 'medio' ),
                    'google'      => true,
                    'color'       => false,
                    'text-align'    => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'    => true,
                    'font-backup' => true,
                    'units'       =>'px',
                    'default'     => get_font_style('font-submenu'),
                ),
                array(
                    'id'        => 'header-color-submenubg',
                    'type'      => 'color_rgba',
                    'title'     => esc_attr__('Dropdown Menu Background Color', 'medio'), 
                    'subtitle'  => 'Set color and alpha channel',
                    'desc'      => 'The caption of this button may be changed to whatever you like!',
                    'default'   => array(),                     
                ),
                array(
                    'id'       => 'header-color-submenu',
                    'type'     => 'link_color',
                    'title'    => esc_html__('Dropdown Menu Link Color', 'medio'),
                    'subtitle' => esc_html__('Only color validation can be done on this field type', 'medio'),
                    'desc'     => esc_html__('This is the description field, again good for additional info.', 'medio'),
                ),
                array(
                    'id'       => 'header-color-submenuborder',
                    'type'     => 'color_rgba',
                    'title'    => esc_attr__('Dropdown Menu Border Line Color','medio'), 
                    'default'  => array(),
                ),
            ),
        );
    
        // Declare your metaboxes
        $metaboxes = array();
        $metaboxes[] = array(
            'id'            => 'header_options',
            'title'         => esc_html__( 'Header Options', 'medio' ),
            'post_types'    => array( 'header' ),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low - Priorities of placement
            'sections'      => $boxSections,
        );

        $page_title_boxSections = array();
        
        $page_title_boxSections[] = array(
            'title'         => esc_html__('Section Options', 'medio'),
            'icon'          => 'el el-website', // Only used with metabox position normal or advanced
            'fields'        => array(
                array(         
                    'id'       => 'page-title-background',
                    'type'     => 'background',
                    'title'    => esc_attr__('Page Title Background', 'medio'),
                    'default'  => array(),
                    'background-color' => true,
                ),
                array(
                    'id'             => 'page-title-section',
                    'type'           => 'spacing',
                    'mode'           => 'padding',
                    'units'          => array('px','em'),
                    'units_extended' => 'true',
                    'title'          => esc_html__('Page title section padding', 'medio'),
                    'default'            => array(
                        'margin-top'     => '0', 
                        'margin-right'   => '0', 
                        'margin-bottom'  => '0', 
                        'margin-left'    => '0',
                        'units'          => 'px', 
                    )
                ),
                array(
                    'id'             => 'page-title-margin',
                    'type'           => 'spacing',
                    'mode'           => 'margin',
                    'units'          => array('px','em'),
                    'units_extended' => 'true',
                    'title'          => esc_html__('Page title section margin', 'medio'),
                    'default'            => array(
                        'margin-top'     => '0', 
                        'margin-right'   => '0', 
                        'margin-bottom'  => '0', 
                        'margin-left'    => '0',
                        'units'          => 'px', 
                    )
                ),
            ),
        );

        $page_title_boxSections[] = array(
            'title'         => esc_html__('Text Design Options', 'medio'),
            'icon'          => 'el el-cog', // Only used with metabox position normal or advanced
            'fields'        => array(
                array(
                    'id'          => 'page-title-font',
                    'type'        => 'typography', 
                    'title'       => esc_attr__('Section font style', 'medio'),
                    'google'      => true,
                    'color'       => false,
                    'text-align'    => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'    => true,
                    'font-backup' => true,
                    'units'       =>'px',
                    'default'     => get_font_style('font-pagetitle')
                ),
                array(
                    'id'       => 'page-title-main-color-menu',
                    'type'     => 'color',
                    'title'    => esc_attr__('Text Color', 'medio'), 
                    'validate' => 'color',
                    'transparent' => false
                )
            ),
        );

        $metaboxes[] = array(
            'id'            => 'page_title_options',
            'title'         => esc_html__( 'Page Title Options', 'medio' ),
            'post_types'    => array( 'page_title' ),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low - Priorities of placement
            'sections'      => $page_title_boxSections,
        );

        $footer_boxSections = array();
        
        $footer_boxSections[] = array(
            'title'         => esc_html__('Section Options', 'medio'),
            'icon'          => 'el el-website', // Only used with metabox position normal or advanced
            'fields'        => array(
                array(         
                    'id'       => 'footer-background',
                    'type'     => 'background',
                    'title'    => esc_attr__('Footer Background', 'medio'),
                    'default'  => array(),
                    'background-color' => true,
                ),
                array(
                    'id'             => 'footer-padding',
                    'type'           => 'spacing',
                    'mode'           => 'padding',
                    'units'          => array('px','em'),
                    'units_extended' => 'true',
                    'title'          => esc_html__('Footer Section Padding', 'medio'),
                    'default'            => array(
                        'margin-top'     => '0', 
                        'margin-right'   => '0', 
                        'margin-bottom'  => '0', 
                        'margin-left'    => '0',
                        'units'          => 'px', 
                    )
                ),
                array(
                    'id'             => 'footer-margin',
                    'type'           => 'spacing',
                    'mode'           => 'margin',
                    'units'          => array('px','em'),
                    'units_extended' => 'true',
                    'title'          => esc_html__('Footer Section Margin', 'medio'),
                    'default'            => array(
                        'margin-top'     => '0', 
                        'margin-right'   => '0', 
                        'margin-bottom'  => '0', 
                        'margin-left'    => '0',
                        'units'          => 'px', 
                    )
                ),
            ),
        );

        $footer_boxSections[] = array(
            'title'         => esc_html__('Text Design Options', 'medio'),
            'icon'          => 'el el-cog', // Only used with metabox position normal or advanced
            'fields'        => array(
                array(
                    'id'          => 'footer-widget-title-font',
                    'type'        => 'typography', 
                    'title'       => esc_attr__('Footer Widget title font', 'medio'),
                    'google'      => true,
                    'color'       => true,
                    'text-align'    => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'    => true,
                    'font-backup' => true,
                    'units'       =>'px'
                ),
                array(
                    'id'          => 'footer-text-font',
                    'type'        => 'typography', 
                    'title'       => esc_attr__('Footer text font', 'medio'),
                    'google'      => true,
                    'color'       => true,
                    'text-align'    => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'    => true,
                    'font-backup' => true,
                    'units'       =>'px'
                ),
                array(
                    'id'       => 'footer-link-color',
                    'type'     => 'color',
                    'title'    => esc_attr__('Link Color', 'medio'), 
                    'default'  => '',
                    'validate' => 'color',
                    'transparent' => false
                ),
                array(
                    'id'       => 'footer-link-hover-color',
                    'type'     => 'color',
                    'title'    => esc_attr__('Link hover color', 'medio'), 
                    'default'  => '',
                    'validate' => 'color',
                    'transparent' => false
                ),
                array(
                    'id'       => 'footer-active-hover-color',
                    'type'     => 'color',
                    'title'    => esc_attr__('Link active color', 'medio'), 
                    'default'  => '',
                    'validate' => 'color',
                    'transparent' => false
                ),
            ),
        );

        $metaboxes[] = array(
            'id'            => 'footer_options',
            'title'         => esc_html__( 'Footer Options', 'medio' ),
            'post_types'    => array( 'footer' ),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low - Priorities of placement
            'sections'      => $footer_boxSections,
        );
    
        return $metaboxes;
    }
    // Change {$redux_opt_name} to your opt_name
    add_action("redux/metaboxes/".$opt_name."/boxes", "medio_add_metaboxes",100);


    function themeton_redux_defaults_filter_hook($defaults){

        $variables = Themeton_Less::get_less_variables();
        foreach ($variables as $key => $value) {
            if( array_key_exists($key, $defaults) ){
                $defaults[$key] = $value;
            }
        }

        $vars = array('font-family', 'font-weight', 'font-style', 'font-size', 'line-height');
        foreach ($defaults as $key => $value) {
            $current_val = (array)$value;
            $current_var = array();
            foreach( $vars as $var ){
                $_key = sprintf('%s-%s', $key, $var);
                if( array_key_exists($_key, $variables) ){
                    $current_var[$var] = $variables[$_key];
                }
            }

            if( !empty($current_var) ){
                $current_var['google'] = true;
                $defaults[$key] = array_merge((array)$current_val, (array)$current_var);
            }
        }

        return $defaults;
    }
    add_filter('redux/options/'.$opt_name.'/defaults', 'themeton_redux_defaults_filter_hook');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => $opt_name,
        'use_cdn' => true,
        'display_name' => sprintf('%s %s', $theme->get('Name'), esc_html__('Option', 'medio')),
        'display_version' => $theme->get('Version'),
        'page_title' => 'Theme Options',
        'update_notice' => false,
        'admin_bar' => true,
        'menu_type' => 'menu',
        'menu_title' => esc_html__('Theme Options', 'medio'),
        'allow_sub_menu' => true,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => true,
        'default_mark' => '*',
        'dev_mode' => false,
        'show_options_object' => false,
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/Themeton',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/Themeton',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/Themeton',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    $args['dev_mode'] = false;

    Redux::setArgs( $opt_name, $args );


    global $themeton_redux, $medio_default_sidebars;
    $themeton_redux = get_option('themeton_redux');

    $sidebars = Themeton_Std::get_sidebars();
    $sidebars = array_merge(
        $medio_default_sidebars,
        $sidebars
    );

    define('ADMIN_IMG_PATH', get_template_directory_uri().'/framework/admin-assets/images/');

    // Access the WordPress Pages via an Array
    $of_pages = array();
    $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
    foreach ($of_pages_obj as $of_page) {
        $of_pages[$of_page->ID] = $of_page->post_name;
    }

    $blog_layouts = array(
        'grid2' => ADMIN_IMG_PATH.'blog-grid2.png',
        'grid3' => ADMIN_IMG_PATH.'blog-grid3.png',
        'grid4' => ADMIN_IMG_PATH.'blog-grid4.png',
        'masonry2' => ADMIN_IMG_PATH.'blog-masonry2.png',
        'masonry3' => ADMIN_IMG_PATH.'blog-masonry3.png',
        'masonry4' => ADMIN_IMG_PATH.'blog-masonry4.png',
        'regular' => ADMIN_IMG_PATH.'blog-regular.png',
    );


    /*
    Usage
    ----------------------------
    global $themeton_redux;
    $themeton_redux['opt-text'];
    */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'medio'),
        'id'         => 'general-setting',
        'subsection' => false,
        'icon'  => 'el el-cog',
        'fields'     => array(

            array(
                'id'       => 'container_size',
                'type'     => 'select',
                'title'    => esc_attr__('Container width', 'medio'), 
                'options'  => array(
                        'default' => 'Default',
                        'expand' => 'Expand',
                        'large' => 'Large',
                        'small' => 'Small',
                    ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'loader_select',
                'type'     => 'image_select',
                'title'    => esc_html__('Select Preloader', 'medio'), 
                'options'  => array(
                    '1'      => array(
                        'alt'   => 'Loader 1', 
                        'img'   => get_template_directory_uri() . "/images/loader-1.JPG"
                    ),
                    '2'      => array(
                        'alt'   => 'Loader 2', 
                        'img'   => get_template_directory_uri() . "/images/loader-2.JPG"
                    ),
                    '3'      => array(
                        'alt'   => 'Loader 3', 
                        'img'   => get_template_directory_uri() . "/images/loader-3.JPG"
                    ),
                    '4'      => array(
                        'alt'   => 'Loader 4', 
                        'img'   => get_template_directory_uri() . "/images/loader-4.JPG"
                    ),
                    '5'      => array(
                        'alt'   => 'Loader 5', 
                        'img'   => get_template_directory_uri() . "/images/loader-5.JPG"
                    ),
                    '6'      => array(
                        'alt'   => 'No Loader', 
                        'img'   => get_template_directory_uri() . "/images/loader-none.jpg"
                    )
                ),
                'default' => '4'
            ),
            array(
                'id'       => 'general_layout',
                'type'     => 'image_select',
                'title'    => esc_attr__('Site Layout', 'medio'),
                'subtitle' => esc_attr__('You can choose between Wide, Boxed or Attached layout.', 'medio'),
                'options'  => array(
                    'wide'      => array(
                        'alt'   => 'Style 1', 
                        'img'   => ADMIN_IMG_PATH."layout-wide.png"
                    ),
                    'boxed'      => array(
                        'alt'   => 'Style 2', 
                        'img'   => ADMIN_IMG_PATH."layout-boxed.png"
                    ),
                    'attached'      => array(
                        'alt'   => 'Style 3', 
                        'img'  => ADMIN_IMG_PATH."layout-attached.png"
                    ),
                ),
                'default' => 'wide'
            ),
            array(
                'id'       => 'layout-attached-top',
                'type'     => 'slider',
                'title'    => esc_attr__('Attached layout top space', 'medio'), 
                "default"   => 80,
                "min"       => 0,
                "step"      => 5,
                "max"       => 500,
                'display_value' => 'text',
                'subtitle'      => esc_attr__('Only works with Attached Layout.', 'medio'),
            ),
            array(
                'id'       => 'layout-attached-bottom',
                'type'     => 'slider',
                'title'    => esc_attr__('Attached layout bottom space', 'medio'), 
                "default"   => 80,
                "min"       => 0,
                "step"      => 5,
                "max"       => 500,
                'display_value' => 'text',
                'subtitle'      => esc_attr__('Only works with Attached Layout.', 'medio'),
            ),

            array(         
                'id'       => 'background_body',
                'type'     => 'background',
                'title'    => esc_attr__('Body Background', 'medio'),
                'output'   => 'body',
                'default'  => array(),
                'background-color' => false,
            ),

            array(
                'id'       => 'content-top',
                'type'     => 'slider',
                'title'    => esc_attr__('Content area top space', 'medio'), 
                "default"   => 100,
                "min"       => 0,
                "step"      => 5,
                "max"       => 500,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'content-bottom',
                'type'     => 'slider',
                'title'    => esc_attr__('Content area bottom space', 'medio'), 
                "default"   => 100,
                "min"       => 0,
                "step"      => 5,
                "max"       => 500,
                'display_value' => 'text'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Color', 'medio'),
        'id'         => 'color-setting',
        'subsection' => false,
        'icon'  => 'el el-brush',
        'fields'     => array(
            array(
                'id'       => 'color-brand',
                'type'     => 'color',
                'title'    => esc_attr__('Brand Color', 'medio'), 
                'subtitle' => esc_attr__('Pick a color for the theme (default: #63599e).', 'medio'),
                'validate' => 'color',
                'default'  => '#63599e',
                'transparent' => false
            ),
            array(
                'id'       => 'color-title',
                'type'     => 'color',
                'title'    => esc_attr__('Title Heading Color', 'medio'), 
                'subtitle' => esc_attr__('H1-H6 (default: #10242b).', 'medio'),
                'validate' => 'color',
                'transparent' => false
            ),
            array(
                'id'       => 'color-text',
                'type'     => 'color',
                'title'    => esc_attr__('Text Color', 'medio'), 
                'subtitle' => esc_attr__('Pick a color for the theme (default: #5c666a).', 'medio'),
                'validate' => 'color',
                'description' => '',
                'transparent' => false
            ),
            array(
                'id'       => 'color-ancient1',
                'type'     => 'color',
                'title'    => esc_attr__('Ancient 1 Color', 'medio'), 
                'subtitle' => esc_attr__('Pick a color for the theme (default: #e9563d).', 'medio'),
                'validate' => 'color',
                'description' => 'Service hover, Accordion, Toggle border and Some button border color for your site\'s color saturation.',
                'default'  => '#63599e',
                'transparent' => false
            ),
            array(
                'id'       => 'color-ancient2',
                'type'     => 'color',
                'title'    => esc_attr__('Ancient 2 Color', 'medio'), 
                'subtitle' => esc_attr__('Pick a color for the theme (default: #67b930).', 'medio'),
                'validate' => 'color',
                'description' => 'Active Accordion, Toggle tabs and Comment reply link etc for your site\'s color saturation.',
                'default'  => '#009eb3',
                'transparent' => false
            ),
            array(
                'id'       => 'color-bodybg',
                'type'     => 'color',
                'title'    => esc_attr__('Body Background Color', 'medio'), 
                'subtitle' => esc_attr__('Pick a color for the theme (default: #ffffff).', 'medio'),
                'validate' => 'color',
                'default'  => '#ffffff',
                'transparent' => false
            ),
            array(
                'id'       => 'color-boxedbg',
                'type'     => 'color',
                'title'    => esc_attr__('Outer Boxed Area Background Color', 'medio'), 
                'subtitle' => esc_attr__('Pick a color for the theme (default: #ffffff).', 'medio'),
                'validate' => 'color',
                'default'  => '#ffffff',
                'transparent' => false
            ),
        )
    ) );
    

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Font', 'medio'),
        'id'         => 'font-setting',
        'subsection' => false,
        'icon'  => 'el el-font',
        'fields'     => array(
            array(
                'id'          => 'font-logo',
                'type'        => 'typography', 
                'title'       => esc_attr__('Logo font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-logo')
            ),
            array(
                'id'          => 'font-text',
                'type'        => 'typography', 
                'title'       => esc_attr__('Body font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => array(
                    'font-weight'  => '400', 
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-size'   => '15px', 
                    'line-height' => '30px'
                ),
            ),
           
            array(
                'id'          => 'font-h1',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading (H1) font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-h1')
            ),
            array(
                'id'          => 'font-h2',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading (H2) font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-h2')
            ),
            array(
                'id'          => 'font-h3',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading (H3) font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-h3')
            ),
            array(
                'id'          => 'font-h4',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading (H4) font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-h4')
            ),
            array(
                'id'          => 'font-h5',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading (H5) font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-h5')
            ),
            array(
                'id'          => 'font-h6',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading (H6) font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-h6')
            ),
            array(
                'id'          => 'font-sidebartitle',
                'type'        => 'typography', 
                'title'       => esc_attr__('Sidebar title font', 'medio'),
                'google'      => true,
                'color'       => false,
                'text-align'    => false,
                'all_styles'    => true,
                'font-backup' => true,
                'units'       =>'px',
                'default'     => get_font_style('font-sidebartitle')
            ),
           
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header', 'medio'),
        'desc'       => 'You can select your default site header here. Also you can build your advanced header layout in <a href="'.admin_url().'edit.php?post_type=header" target="_blank">Header Builder</a> section as a new post.',
        'id'         => 'general-header-setting',
        'subsection' => false,
        'icon'  => 'el el-arrow-up',
        'fields'     => array(
            array(
                'id'       => 'header_layout',
                'type'     => 'select',
                'title'    => esc_attr__('Header Layout', 'medio'), 
                'options'  => ThemetonStd::redux('header'),
                'default' => 'default',
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media', 
                'url'      => true,
                'title'    => esc_attr__('Logo image', 'medio'),
                'subtitle' => esc_attr__('Upload your logo image. If you leave it empty, your logo will show as text with your site title.', 'medio'),
                'default'  => array(
                    'url'=>get_template_directory_uri().'/images/logo.png'
                ),
            ),
            array(
                'id'       => 'header_sticky_bg',
                'type'     => 'color',
                'title'    => esc_attr__('Header sticky background', 'medio'), 
                'default'  => '',
                'validate' => 'color',
                'transparent' => true
            ),
            
        )
    ) );

    $page_title_elements = array(
        'social' => 'Social links',
        'text_custom'   => 'Custom Text',
        'vline' => 'Dash',
        'hline' => 'Line',
        'button' => 'Appointment Button',
    );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page title', 'medio'),
        'id'         => 'page-title-setting',
        'desc'       => 'You can select your default site page title here. Also you can build your advanced title layout in <a href="'.admin_url().'edit.php?post_type=page_title" target="_blank">Page Title Builder</a> section as a new post.',
        'subsection' => false,
        'icon'  => 'el el-photo',
        'fields'     => array(
            array(         
                'id'       => 'background_pagetitle',
                'type'     => 'background',
                'title'    => esc_attr__('Page Title Background', 'medio'),
                'output'   => '.wrapper>.page-title',
                'default'  => array(
                    'background-color' => '#5d5394',
                )
            ),
            array(
                'id'       => 'page_title_layout',
                'type'     => 'select',
                'title'    => esc_attr__('Page Title Layout', 'medio'), 
                'options'  => ThemetonStd::redux('page_title'),
                'default'  => 'default',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer', 'medio'),
        'id'         => 'footer-setting',
        'desc'       => 'You can select your default site footer here. Also you can build your advanced footer layout in <a href="'.admin_url().'edit.php?post_type=footer" target="_blank">Footer Builder</a> section as a new post.',
        'subsection' => false,
        'icon'  => 'el el-arrow-down',
        'fields'     => array(
            array(
                'id'       => 'footer_layout',
                'type'     => 'select',
                'title'    => esc_attr__('Themeton Footer Layout', 'medio'), 
                'options'  => ThemetonStd::redux('footer'),
                'default'  => 'default'
            ),
            array(
                'id'       => 'copyright',
                'type'     => 'text',
                'title'    => esc_attr__('Copyright text', 'medio'),
                'default'  => '2019 &copy; Medio theme. All rights reserved.',
                'desc'     => 'Just a default text. If you use footer builder please changes in your built footer.'
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Post', 'medio'),
        'id'         => 'post-setting',
        'subsection' => false,
        'icon'  => 'el el-book',
        'fields'     => array(
            array(
                'id'       => 'post_featuredimage',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Top featured image', 'medio'), 
                'subtitle' => esc_attr__('No validation can be done on this field type', 'medio'),
                'default'  => '0'// 1 = on | 0 = off
            ),

            array(
                'id'       => 'post_layout',
                'type'     => 'image_select',
                'title'    => esc_attr__('Post Layout', 'medio'), 
                'subtitle' => esc_attr__('Declare default post layout.', 'medio'),
                'options'  => array(
                    'right'      => array(
                        'alt'   => 'Right sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-right.png"
                    ),
                    'left'      => array(
                        'alt'   => 'Left sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-left.png"
                    ),
                    'full'      => array(
                        'alt'   => 'No sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-nosidebar.png"
                    ),
                    'dual'      => array(
                        'alt'   => 'Dual sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-dual.png"
                    ),
                ),
                'default' => 'right'
            ),

            array(
                'id'       => 'post_sidebarright',
                'type'     => 'select',
                'title'    => esc_attr__('Post right sidebar', 'medio'), 
                'subtitle' => esc_attr__('Declare default right sidebar area.', 'medio'),
                'options'  => $sidebars,
                'default'  => 'right-sidebar',
            ),
            array(
                'id'       => 'post_sidebarleft',
                'type'     => 'select',
                'title'    => esc_attr__('Post left sidebar', 'medio'), 
                'subtitle' => esc_attr__('Declare default sidebar area.', 'medio'),
                'options'  => $sidebars,
                'default'  => 'left-sidebar',
            ),

            array(
                'id'       => 'post_relatedposts',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Related Posts', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'post_relatedpostsnumber',
                'type'     => 'slider',
                'title'    => esc_attr__('Related posts number', 'medio'), 
                "default"   => 3,
                "min"       => 2,
                "step"      => 1,
                "max"       => 4,
                'display_value' => 'label'
            ),
            array(
                'id'       => 'post_title_show',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Post title enabled', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'post_featuredimage',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Top featured image', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'post_authorbox',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Author Info Box', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'post_meta',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Post Meta Details', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'medio'),
        'id'         => 'page-setting',
        'subsection' => false,
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'page_featuredimage',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Hide top featured image', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '0'// 1 = on | 0 = off
            ),

            array(
                'id'       => 'page_layout',
                'type'     => 'image_select',
                'title'    => esc_attr__('Page Layout', 'medio'), 
                'subtitle' => esc_attr__('Declare default page layout.', 'medio'),
                'options'  => array(
                    'right'      => array(
                        'alt'   => 'Right sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-right.png"
                    ),
                    'left'      => array(
                        'alt'   => 'Left sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-left.png"
                    ),
                    'full'      => array(
                        'alt'   => 'No sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-nosidebar.png"
                    ),
                    'dual'      => array(
                        'alt'   => 'Dual sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-dual.png"
                    ),
                ),
                'default' => 'full'
            ),
            array(
                'id'       => 'page_sidebarright',
                'type'     => 'select',
                'title'    => esc_attr__('Page right sidebar', 'medio'), 
                'subtitle' => esc_attr__('Please select default page left sidebar', 'medio'),
                'options'  => $sidebars,
                'default'  => 'right-sidebar',
            ),
            array(
                'id'       => 'page_sidebarleft',
                'type'     => 'select',
                'title'    => esc_attr__('Page left sidebar', 'medio'), 
                'subtitle' => esc_attr__('Please select default page left sidebar', 'medio'),
                'options'  => $sidebars,
                'default'  => 'left-sidebar',
            ),
            array(
                'id'       => 'page_title_show',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Page title enabled', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'page_featuredimage',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Top featured image', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'page_authorbox',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Author Info Box', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'page_meta',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Page Meta Details', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
        )
    ) );



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Portfolio', 'medio'),
        'id'         => 'portfolio-setting',
        'subsection' => false,
        'icon'  => 'el el-th',
        'fields'     => array(


            array(
                'id'       => 'portfolio_mainpage',
                'type'     => 'select',
                'title'    => esc_attr__('Portfolio Main Page', 'medio'), 
                'subtitle' => esc_attr__('No validation can be done on this field type', 'medio'),
                'desc'     => esc_attr__('This is the description field, again good for additional info.', 'medio'),
                // Must provide key => value pairs for select options
                'options'  => $of_pages,
                'default'  => '2',
            ),
            array(
                'id'       => 'portfolio_layout',
                'type'     => 'image_select',
                'title'    => esc_attr__('Portfolio Detail Page Layout', 'medio'), 
                'subtitle' => esc_attr__('Declare portfolio default layout.', 'medio'),
                'options'  => array(
                    'right'      => array(
                        'alt'   => 'Right sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-right.png"
                    ),
                    'left'      => array(
                        'alt'   => 'Left sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-left.png"
                    ),
                    'full'      => array(
                        'alt'   => 'No sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-nosidebar.png"
                    ),
                    'dual'      => array(
                        'alt'   => 'Dual sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-dual.png"
                    ),
                ),
                'default' => 'full'
            ),
            array(
                'id'       => 'portfolio_sidebarright',
                'type'     => 'select',
                'title'    => esc_attr__('Portfolio right sidebar', 'medio'), 
                'subtitle' => esc_attr__('No validation can be done on this field type', 'medio'),
                'desc'     => esc_attr__('This is the description field, again good for additional info.', 'medio'),
                'options'  => $sidebars,
                'default'  => 'right-sidebar',
            ),
            array(
                'id'       => 'portfolio_sidebarleft',
                'type'     => 'select',
                'title'    => esc_attr__('Portfolio left sidebar', 'medio'), 
                'subtitle' => esc_attr__('No validation can be done on this field type', 'medio'),
                'desc'     => esc_attr__('This is the description field, again good for additional info.', 'medio'),
                'options'  => $sidebars,
                'default'  => 'left-sidebar',
            ),

            array(
                'id'       => 'portfolio_relatedportfolios',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Top featured image', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio_relatednumber',
                'type'     => 'slider',
                'title'    => esc_attr__('Related portfolios number', 'medio'), 
                "default"   => 3,
                "min"       => 2,
                "step"      => 1,
                "max"       => 4,
                'display_value' => 'label'
            ),

            array(
                'id'       => 'portfolio_title_show',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Portfolio singular title enabled', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio_featuredimage',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Top featured image', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio_nextprev',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Next & Previous links', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio_authorbox',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Author Info Box', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio_meta',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Portfolio Meta Details', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),


            array(
                'id'       => 'portfolio_description',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Portfolio Description', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio_openlinkinnewtab',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Portfolio Meta Details', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '0'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio_categorylayout',
                'type'     => 'image_select',
                'title'    => esc_attr__('Portfolio Category Layout', 'medio'), 
                'subtitle' => esc_attr__('No validation can be done on this field type', 'medio'),
                'desc'     => esc_attr__('This is the description field, again good for additional info.', 'medio'),
                // Must provide key => value pairs for select options
                'options'  => $blog_layouts,
                'default'  => '2',
            ),

            array(
                'id'       => 'portfolio_excerptlength',
                'type'     => 'slider',
                'title'    => esc_attr__('Excerpt length', 'medio'), 
                "default"   => 20,
                "min"       => 0,
                "step"      => 1,
                "max"       => 50,
                'display_value' => 'text',
                "desc"      => 'The number of words.'
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Archive, Cat & Tags', 'medio'),
        'id'         => 'archive-setting',
        'subsection' => false,
        'icon'  => 'el el-lines',
        'fields'     => array(

            array(
                'id'       => 'archive_layout',
                'type'     => 'image_select',
                'title'    => esc_attr__('Archive Layout', 'medio'), 
                'subtitle' => esc_attr__('Declare archive default layout. Specially for all regular sections including index page and custom taxonomy etc.', 'medio'),
                'options'  => array(
                    'right'      => array(
                        'alt'   => 'Right sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-right.png"
                    ),
                    'left'      => array(
                        'alt'   => 'Left sidebar', 
                        'img'   => ADMIN_IMG_PATH."layout-left.png"
                    ),
                    'full'      => array(
                        'alt'   => 'No sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-nosidebar.png"
                    ),
                    'dual'      => array(
                        'alt'   => 'Dual sidebar', 
                        'img'  => ADMIN_IMG_PATH."layout-dual.png"
                    ),
                ),
                'default' => 'right'
            ),
            array(
                'id'       => 'archive_sidebarright',
                'type'     => 'select',
                'title'    => esc_attr__('Archive right sidebar', 'medio'), 
                'subtitle' => esc_attr__('No validation can be done on this field type', 'medio'),
                'desc'     => esc_attr__('This is the description field, again good for additional info.', 'medio'),
                // Must provide key => value pairs for select options
                'options'  => $sidebars,
                'default'  => 'right-sidebar',
            ),
            array(
                'id'       => 'archive_sidebarleft',
                'type'     => 'select',
                'title'    => esc_attr__('Archive left sidebar', 'medio'), 
                'subtitle' => esc_attr__('No validation can be done on this field type', 'medio'),
                'desc'     => esc_attr__('This is the description field, again good for additional info.', 'medio'),
                // Must provide key => value pairs for select options
                'options'  => $sidebars,
                'default'  => 'left-sidebar',
            ),
            array(
                'id'       => 'archive_style',
                'type'     => 'image_select',
                'title'    => esc_attr__('Archive Posts Style', 'medio'), 
                'subtitle' => esc_attr__('Declare archive default style.', 'medio'),
                'options'  => $blog_layouts,
                'default' => 'right'
            ),
            array(
                'id'       => 'archive_meta',
                'type'     => 'checkbox',
                'title'    => esc_attr__('Archive Meta Details', 'medio'), 
                'subtitle' => esc_attr__('Please turn this off (uncheck) if you want to disable it.', 'medio'),
                'default'  => '1'// 1 = on | 0 = off
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebar', 'medio'),
        'id'         => 'sidebar-setting',
        'subsection' => false,
        'icon'  => 'el el-indent-right',
        'fields'     => array(

            array(
                'id'=>'sidebars',
                'type' => 'multi_text',
                'title' => esc_attr__('Sidebars', 'medio'),
                'subtitle' => esc_attr__('Please add your custom sidebars here and insert widgets on Appearance => Widgets. Left and Right sidebars are permanently and won\'t be deleted.', 'medio'),
                'default' => array(
                    'left'=>'Left sidebar',
                    'right'=>'Right sidebar'
                ),
            ),

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 page', 'medio'),
        'id'         => 'error_page',
        'subsection' => false,
        'icon'  => 'el el-error',
        'fields'     => array(

            array(
                'id'       => 'error_main_page',
                'type'     => 'select',
                'title'    => esc_attr__('Error page main page', 'medio'), 
                'subtitle' => esc_attr__('404 page ', 'medio'),
                'desc'     => esc_attr__('Select from page', 'medio'),
                // Must provide key => value pairs for select options
                'options'  => $of_pages,
                'default'  => '0',
            ),
        )
    ) );


    /*
     * <--- END SECTIONS
     */
