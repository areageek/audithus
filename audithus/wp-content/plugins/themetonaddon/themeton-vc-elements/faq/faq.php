<?php
if (!class_exists('WPBakeryShortCode_mungu_faq')) {
class WPBakeryShortCode_mungu_faq extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'filter' => 'yes',
            'count' => '8',
            'sidebar_title' => 'Genaral',
            'sidebar_position' => 'left',
            'image' => '',
            'excerpt_length'  => '100',
            'space' => 'yes',
            'post_type' => 'faq',
            'categories' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_faq', $atts );
        $class .= ' '.$css_class;

         // Build category ids
        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }
        // build category ids
        $cats = array();
        if( !empty($categories) ){
            $exps = explode(",", $categories);
            foreach($exps as $val){
                if( (int)$val>-1 ){
                    $cats[]=(int)$val;
                }
            }
        }

        // build query
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $count,
            'ignore_sticky_posts' => true,
            'paged' => $paged
        );
        if(!empty($cats)){
            $args['tax_query'] = array(
                        'relation' => 'IN',
                        array(
                            'taxonomy' => $post_type.'_category',
                            'field' => 'id',
                            'terms' => $cats
                        )
                    );
        }

        $encrypted_args = urlencode(json_encode($args));


        $atach_src = wp_get_attachment_image_src($image, 'large');
        $image = is_array($atach_src) ? $atach_src[0] : "";
        $sidebar_image = '';
        if(!empty($image)) {
            $sidebar_image = '
                    <div class="sidebar_image"> 
                        <img src="'.esc_attr($image).'" alt="'.esc_attr__('team image', 'themetonaddon').'">
                    </div>';
        }
        $filter_html = '';
        $cat_array = array();
        $items = '';
        $posts_query = new WP_Query($args);
        if ($posts_query->have_posts()) {
            while ( $posts_query->have_posts() ) {
            $posts_query->the_post();

            if(has_excerpt()) {
                $excerpt = get_the_excerpt();
            } else {
                $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );
            }
            // Categories
            $cats = '';
            $last_cat = '';
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;

                $cat_titles []= $cat_title;
                if( $filter=='yes' && !in_array($term->term_id, $cat_array) ){
                    $filter_html .= '<li><a href="javascript:;" class="filter-item" data-filter=".'.$cat_slug.'">'. $cat_title .'</a></li> ';
                    $cat_array[] = $term->term_id;
                }

                $cats .= "$cat_slug ";
                $last_cat = $cat_title;
            }

            $items .= "<div class='masonry-item $cats  '>
                            <i class='fa fa-book'></i>
                            <div class='faq-item'>
                                <div class='entry-meta'>
                                    <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>
                                    <p>$excerpt</p>
                                </div>
                            </div>
                        </div>";
        }
        }
        else {
            return "There is no <i>$post_type</i> posts. Please instert your posts in <i>$post_type</i> post type or select different post type.";

        }
       
        // reset query
        wp_reset_postdata();
      
        // filter
    
        $filter_html = "<div id='faq-filter'>
                            <ul>
                                <li><a href='javascript:;' class='active' data-filter='*' >
                                ".esc_attr__('All', 'themetonaddon')."</a></li>
                                $filter_html
                            </ul>
                        </div>";
        $siderbar = '<div class="uk-width-1-4@m uk-width-1-4@l">
                        <div class="faq_sidebar">
                            <h3>'.$sidebar_title.'</h3>
                            '.$filter_html.'
                            '.$sidebar_image.'
                        </div>
                    </div>';
        $content = '<div class="uk-width-3-4@m uk-width-3-4@l uk-padding-small">
                        <div class="faq_container"> '. $items.' </div>
                    </div>';    
                    
        $right_class = $con_html = '';          
        if($sidebar_position =='left'){
            $con_html .= "$siderbar $content";
        }else{$right_class.='rclass'; $con_html .= "$content $siderbar  ";}           


        return '<div id="faq_container" class="uk-grid-match '.$right_class.' uk-grid-collapse '.$class.' uk-grid">
                    '.$con_html.'
                    </div>';
    }
}
}


function faq_search_content_filter( $where, &$wp_query ){
    global $wpdb;

    if ( $search_term = $wp_query->get( 'search_ct_value' ) ) {
        $where .= " AND {$wpdb->posts}.post_type='faq' AND ( {$wpdb->posts}.post_title LIKE '%". $wpdb->esc_like( $search_term ) ."%' OR
                          {$wpdb->posts}.post_content LIKE '%". $wpdb->esc_like( $search_term ) ."%'
                        )";
    }
    error_log($where);
    return $where;
}


add_action('wp_ajax_faq_search_form', 'ajax_faq_search_form_handler');
add_action('wp_ajax_nopriv_faq_search_form', 'ajax_faq_search_form_handler');
function ajax_faq_search_form_handler(){
    if( isset($_POST['search'], $_POST['params']) && !empty($_POST['search']) && !empty($_POST['params']) ){
        $args = (array)json_decode( urldecode($_POST['params']) );
        $search = trim($_POST['search']);

        $args['search_ct_value'] = $search;
        add_filter( 'posts_where', 'faq_search_content_filter', 10, 3 );

        $items = array();
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            global $post;

            if(has_excerpt()) {
                $excerpt = get_the_excerpt();
            } else {
                $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );
            }

            $items.= "<div class='masonry-item search-result-item'>
                            <i class='fa fa-book'></i>
                            <div class='faq-item'>
                                <div class='entry-meta'>
                                    <a href='".get_permalink()."'><h3>".get_the_title()."</h3></a>
                                    <p>$excerpt</p>
                                </div>
                            </div>
                        </div>";
        }
        wp_reset_postdata();

        remove_filter( 'posts_where', 'faq_search_content_filter', 10, 3 );


        echo json_encode(array(
            'result' => $items
        ));
    }
    exit;
}

vc_map( array(
    "name" => esc_html__('FAQ / post', 'themetonaddon'),
    "base" => 'mungu_faq',
    "icon" => "mungu-vc-icon mungu-vc-icon56",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Sidebar title', 'themetonaddon'),
            'param_name' => 'sidebar_title',
            'value' => 'Genaral',
            'holder' => 'div'
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "sidebar_position",
            "heading" => esc_html__("Sidebar", 'themetonaddon'),
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "std" => "left",
           
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '8'
        ),
        array(
            "type" => "textfield",
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "value" => "100",
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Side bar image", 'themetonaddon')
        ),  
        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Specify category Id or leave blank to display items from all categories.", 'themetonaddon'),
            "value" => ''
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "post_type",
            "heading" => esc_html__("Type", 'themetonaddon'),
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "value" => array(
                "Faq" => "faq",
                "Rent" => "rent",
                "Portfolio" => "portfolio",
                "Service" => "service", 
                "Team" => "team",
                "Post" => "post",
                "Testimonials" => "testimonials",
                "Hotel" => "hotelroom",
                "Event Calendar" => "tribe_events",
                "Cause" => "cause",
                "Hotel rooms" => "hotelroom",
            ),
            "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
            "std" => "team",
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));