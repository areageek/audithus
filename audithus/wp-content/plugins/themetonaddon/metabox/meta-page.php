<?php

if( !class_exists('CurrentThemePageMetas') ) {
class CurrentThemePageMetas extends TTRenderMeta{

    function __construct(){

        add_action( 'admin_init', array($this, 'initial_items') );
        add_action( 'admin_enqueue_scripts', array($this, 'print_admin_scripts') );
        add_action( 'add_meta_boxes', array($this, 'add_custom_meta'), 1 );
        add_action( 'edit_post', array($this, 'save_post'), 99 );

        // support svg logo
        $svg_logo_filter = sprintf('%s_%s', 'upload', 'mimes');
        add_filter( $svg_logo_filter, array($this, 'support_svg_logo') );

        // Post Views
        add_filter( 'the_content', array($this, 'content_filter'), 20 );
    }

    // Post Views
    public function content_filter($content){
        if( is_single() ){ 
            $post_id = get_the_id();
            $post_view = abs(get_post_meta( $post_id, '_post_views', true ));
            $post_view += 1;
            update_post_meta( $post_id, '_post_views', $post_view );
        } 

        return $content;
    } 


    public function support_svg_logo($types){
        $types['svg'] = sprintf('%s/%s+%s', 'image', 'svg', 'xml');
        return $types;
    }


    public function initial_items(){
        $this->items = $this->items();
    }


    public function get_post_type(){
        global $pagenow;
        if ( 'edit.php' == $pagenow) {
            if ( !isset($_GET['post_type']) ){
                return 'post';
            }
            elseif ( isset($_GET['post_type']) ){
                return $_GET['post_type'];
            }
        }
        if ('post.php' == $pagenow && isset($_GET['post']) ){
            $post_type = get_post_type($_GET['post']);
            return $post_type;
        }

        if ('post-new.php' == $pagenow ){
            if ( !isset($_GET['post_type']) ) {
                return 'post';
            }
            elseif ( isset($_GET['post_type']) ){
                return $_GET['post_type'];
            }
        }
    }

    public function items(){
        global $post;
        $header_layouts = $footer_layouts = $pagetitle_layouts = array();
        if( !class_exists('Themeton_VC')) return;
        
        if(Themeton_VC::redux('header')) {
            $themeton_header_layouts = Themeton_VC::redux('header');
            foreach($themeton_header_layouts as $key => $layout) {
                $header_layouts[$key] = $layout;
            }
        }
        if(Themeton_VC::redux('footer')) {
            $themeton_footer_layouts = Themeton_VC::redux('footer');
            foreach($themeton_footer_layouts as $key => $layout) {
                $footer_layouts[$key] = $layout;
            }
        }
        if(Themeton_VC::redux('page_title')) {
            $themeton_pagetitle_layouts = Themeton_VC::redux('page_title');
            foreach($themeton_pagetitle_layouts as $key => $layout) {
                $pagetitle_layouts[$key] = $layout;
            }
        }

        define('ADMIN_IMAGES', get_template_directory_uri().'/framework/admin-assets/images/');

        $all_post_types = array();
        $data_post_types = Themeton_Std::get_post_types();
        foreach ($data_post_types as $key => $value) {
            $all_post_types[] = $key;
        }
        $sidebars = Themeton_Std::get_sidebars();

        $post_types = array('post', 'page', 'portfolio', 'faq', 'portfolio', 'service', 'team', 'faq','cause','rent', 'testimonials','hotelroom','tribe_events');

        $general_options = array();
        $sliders = Themeton_Std::get_sliders();
        foreach ($post_types as $post_type) {
            $general_options[$post_type] = array(
               
                array(
                    'name' => 'meta_option_name',
                    'type' => 'list_content',
                    'label' => 'Meta Label'
                ),
                array(
                    'name' => 'header',
                    'type' => 'select',
                    'label' => esc_html__('Header Layout Style (optional)', 'lagom'),
                    'default' => 'default',
                    'option' => $header_layouts
                ),
                array(
                    'name' => 'slider',
                    'type' => 'select',
                    'label' => esc_html__('Top Slider', 'lagom'),
                    'default' => 'noslider',
                    'option' => array_merge(array('noslider' => 'No slider'), $sliders)
                ),

                array(
                    'name' => 'layout',
                    'type' => 'thumbs',
                    'label' => esc_html__('Page Layout', 'lagom'),
                    'default' => 'default',
                    'option' => array(
                        'default' => ADMIN_IMAGES . 'layout-default.png',
                        'full' => ADMIN_IMAGES . 'layout-nosidebar.png',
                        'right' => ADMIN_IMAGES . 'layout-right.png',
                        'left' => ADMIN_IMAGES . 'layout-left.png',
                        'dual' => ADMIN_IMAGES . 'layout-dual.png',
                    ),
                    'desc' => esc_html__('Select Page Layout. Default value on Theme Options: ', 'lagom') . Themeton_Std::getopt($post_type.'_layout')
                ),

                array(
                    'name' => 'sidebar_right',
                    'type' => 'select',
                    'label' => esc_html__('Right sidebar', 'lagom'),
                    'default' => 'noslider',
                    'option' => array_merge(array(
                        'default' => esc_attr__('Default on Theme Options', 'lagom'),
                    ), $sidebars
                    ),
                    'desc' => esc_html__('Default value on Theme Options: ', 'lagom') . Themeton_Std::getopt($post_type.'_sidebarright')
                ),
                array(
                    'name' => 'sidebar_left',
                    'type' => 'select',
                    'label' => esc_html__('Left sidebar', 'lagom'),
                    'default' => 'noslider',
                    'option' => array_merge(array(
                        'default' => esc_attr__('Default on Theme Options', 'lagom'),
                    ), $sidebars
                    ),
                    'desc' => esc_html__('Default value on Theme Options: ', 'lagom') . Themeton_Std::getopt($post_type.'_sidebarleft')
                ),

                array(
                    'type' => 'select',
                    'name' => 'page-title',
                    'label' => esc_html__('Page Title Show', 'lagom'),
                    'desc' => esc_html__('Default value on Theme Options: ', 'lagom') . ((Themeton_Std::getopt($post_type.'-title-hide') == '1') ? esc_attr__('Show', 'lagom') : esc_attr__('Hidden', 'lagom')),
                    'option' => array(
                        'default' => esc_html__('Default', 'lagom'),
                        '1' => esc_html__('Show', 'lagom'),
                        '0' => esc_html__('Hide', 'lagom'),
                    ),
                    'default' => 'default'
                ),
                array(
                    'type' => 'select',
                    'name' => 'featuredimage',
                    'label' => esc_html__('Featured Image Show', 'lagom'),
                    'desc' => esc_html__('Default value on Theme Options: ', 'lagom') . ((Themeton_Std::getopt($post_type.'_featuredimage') == '1') ? esc_attr__('Show', 'lagom') : esc_attr__('Hidden', 'lagom')),
                    'option' => array(
                        'default' => esc_html__('Default', 'lagom'),
                        '1' => esc_html__('Show', 'lagom'),
                        '0' => esc_html__('Hide', 'lagom'),
                    ),
                    'default' => 'default'
                ),
                array(
                    'type' => 'checkbox',
                    'name' => 'related_show',
                    'label' => 'Related post Show',
                    'default' => '1'
                ),
                array(
                    'type' => 'select',
                    'name' => 'authorbox',
                    'label' => esc_html__('Post Author Box Show', 'lagom'),
                    'desc' => esc_html__('Default value on Theme Options: ', 'lagom') . ((Themeton_Std::getopt($post_type.'_authorbox') == '1') ? esc_attr__('Show', 'lagom') : esc_attr__('Hidden', 'lagom')),
                    'option' => array(
                        'default' => esc_html__('Default', 'lagom'),
                        '1' => esc_html__('Show', 'lagom'),
                        '0' => esc_html__('Hide', 'lagom'),
                    ),
                    'default' => 'default'
                ),
                array(
                    'type' => 'text',
                    'name' => 'content_top',
                    'label' => esc_html__('Content top padding (optional)', 'lagom'),
                    'desc' => esc_html__('Number value in pixels. Empty presents default from Theme Options. Default value on Theme Options: ', 'lagom') . Themeton_Std::getopt('content-top'),
                    'default' => ''
                ),
                array(
                    'type' => 'text',
                    'name' => 'content_bottom',
                    'label' => esc_html__('Content bottom padding (optional)', 'lagom'),
                    'desc' => esc_html__('Number value in pixels. Empty presents default from Theme Options. Default value on Theme Options: ', 'lagom') . Themeton_Std::getopt('content-bottom'),
                    'default' => ''
                )
            );
        }

        $tmp_arr = array(
            'page' => array(
                'label' => 'Page Options',
                'post_type' => 'page',
                'items' => array_merge(                   
                    $general_options['page']
                ),
            ),
            'post' => array(
                'label' => 'Post Options',
                'post_type' => 'post',
                'items' => $general_options['post']
            ),
            'portfolio' => array(
                'label' => 'Portfolio Options',
                'post_type' => 'portfolio',
                'items' => $general_options['portfolio']
            ),

            //Testimonails
            'testimonials' => array(
                'label' => 'Testimonial Options',
                'post_type' => 'testimonials',
                'items' => array_merge(
                    array(
                        array(
                            'type' => 'text',
                            'name' => 'input_name',
                            'label' => 'Name',
                            'default' => 'Pudnaa'
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'position',
                            'label' => 'Position',
                            'default' => 'Developer'
                        ),
                        array(
                            'name' => 'star',
                            'type' => 'select',
                            'label' => 'Rating star',
                            'default' => '5',
                            'option' => array(
                                '1' => 'One',
                                '2' => 'Two',
                                '3' => 'Three',
                                '4' => 'Four',
                                '5' => 'Five'
                            ),
                        ),
                        array(
                            'type' => 'checkbox',
                            'name' => 'related_show',
                            'label' => 'Related post Show',
                            'default' => '1'
                        ),
                    ),
                    $general_options['testimonials']
                )
            ),
            //car
            'car' => array(
                'label' => 'Car',
                'post_type' => 'rent',
                'items' => array_merge(
                    array(
                        array(
                            'name' => 'star',
                            'type' => 'select',
                            'label' => 'Car rating',
                            'default' => '5',
                            'option' => array(
                                '1' => 'One',
                                '2' => 'Two',
                                '3' => 'Three',
                                '4' => 'Four',
                                '5' => 'Five'
                            ),
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'car_location',
                            'label' => 'Location',
                            'default' => 'Australia'
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'car_price',
                            'label' => 'Price',
                            'default' => '$55.00 /'
                        ),
                        array(
                            'name' => 'transmission',
                            'type' => 'select',
                            'label' => 'Transmission',
                            'default' => 'manual',
                            'option' => array(
                                'manual' => 'Manual',
                                'automotical' => 'Automotical',
                            ),
                        ),
                        array(
                            'name' => 'seats',
                            'type' => 'select',
                            'label' => 'Seats',
                            'default' => '5',
                            'option' => array(
                                '1' => 'One',
                                '2' => 'Two',
                                '3' => 'Three',
                                '4' => 'Four',
                                '5' => 'Five',
                                '6' => 'Six',
                                '7' => 'Seven'
                            ),
                        ),
                        array(
                            'name' => 'fuel_type',
                            'type' => 'select',
                            'label' => 'Fuel type',
                            'default' => 'diesel',
                            'option' => array(
                                'diesel' => 'Diesel',
                                'benzin' => 'Benzin',
                                'gaz' => 'Gaz',
                            ),
                        ),
                        array(
                            'name' => 'rent_type',
                            'type' => 'select',
                            'label' => 'Rent & buy',
                            'default' => 'buy',
                            'option' => array(
                                'rent' => 'Rent',
                                'buy' => 'Buy',
                                'hot deals' => 'Hot Deals'
                            ),
                        ),
                       
                    ),
                    $general_options['rent']
                )
            ),

            //hotel room
            'hotelroom' => array(
                'label' => 'Hotel Room',
                'post_type' => 'hotelroom',
                'items' => array_merge(
                    array(
                       
                        array(
                            'name' => 'star',
                            'type' => 'select',
                            'label' => 'Room rating',
                            'default' => '5',
                            'option' => array(
                                '1' => 'One',
                                '2' => 'Two',
                                '3' => 'Three',
                                '4' => 'Four',
                                '5' => 'Five'
                            ),
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'room_price',
                            'label' => 'Price',
                            'default' => '$55.00'
                        ),
                        
                       
                    ),
                    $general_options['hotelroom']
                )
            ),
            //cause 
            'cause' => array(
                'label' => 'Cause',
                'post_type' => 'cause',
                'items' => array_merge(
                    array(
                        array(
                            'type' => 'text',
                            'name' => 'donations_goal',
                            'label' => 'Donations Goal',
                            'default' => '$38000'
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'donations_percent',
                            'label' => 'Donations',
                            'default' => '2500'
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'raised',
                            'label' => 'Raised',
                            'default' => '18%'
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'donators',
                            'label' => 'Donators',
                            'default' => '56'
                        ),
                        
                    ),
                    $general_options['cause']
                )
            ),

            //team
            'teams' => array(
                'label' => 'Team Options',
                'post_type' => 'team',
                'items' => array_merge(
                    array(
                        array(
                            'type' => 'text',
                            'name' => 'last_name',
                            'label' => 'Last name',
                            'default' => ''
                        ),

                        array(
                            'type' => 'text',
                            'name' => 'first_name',
                            'label' => 'First name',
                            'default' => ''
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'position',
                            'label' => 'Position',
                            'default' => ''
                        ),
                        array(
                            'type' => 'checkbox',
                            'name' => 'related_show',
                            'label' => 'Related Team Show',
                            'default' => '1'
                        ),
                    ),
                    $general_options['team']
                )
            ),
            //servece
            'service' => array(
                'label' => 'Service Options',
                'post_type' => 'service',
                'items' => array_merge(
                    array(
                        array(
                            'type' => 'image',
                            'name' => 'icon_image',
                            'label' => 'Icon',
                            'desc' => 'You can provide simple class name instead media url. Ex: fa fa-smile',
                        ),
                        array(
                            'type' => 'checkbox',
                            'name' => 'related_show',
                            'label' => 'Related service Show',
                            'default' => '1'
                        ),

                    ),
                    $general_options['service']
                )
            ),
            //faq
            'faq' => array(
                'label' => 'Faq Options',
                'post_type' => 'faq',
                'items' => array_merge(
                    array(
                        
                        array(
                            'type' => 'checkbox',
                            'name' => 'related_show',
                            'label' => 'Related Faq Show',
                            'default' => '1'
                        ),

                    ),
                    $general_options['faq']
                )
            ),
        );

        return $tmp_arr;
    }

}
}
new CurrentThemePageMetas();
