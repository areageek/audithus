<?php
if (!class_exists('WPBakeryShortCode_Mungu_post_images')) {
class WPBakeryShortCode_Mungu_post_images extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            "post_type"   => "testimonial",
            'categories' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_post_images', $atts );
        $extra_class .= ' '.$css_class;

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
                    'field' => 'slug',
                    'terms' => $cats
                )
            );
        }

        $cat_array = array();
        $post_items= '';
        $img = '';
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();

            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                $img = !empty($img) ? $img[0] : '';
            }
            
            // Categories
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;
                $cat_titles []= $cat_title;
                }        
          
            $post_items .= "<div class='swiper-slide'>
                                <section class='uk-flex-center uk-flex'>
                                    <a href='".get_the_permalink()."' >
                                        <div class='nxt-services'>
                                            $thumb
                                        </div>
                                    </a>
                                </section>
                            </div>";
           
        }
       
        // reset query
        wp_reset_postdata();

        $result = "<div class='post-feature $extra_class'>
                        <div class='swiper-container post-feature-image'>
                            <div class='swiper-wrapper uk-scrollspy pb3'>
                                $post_items
                            </div>
                            <ul class='swiper-pagination uk-flex-center uk-flex-middle'></ul>
                        </div>
                    </div>";

        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Post featured image slider', 'themetonaddon'),
    "description" => esc_html__("post type: All post", 'themetonaddon'),
    "base" => 'mungu_post_images',
    "icon" => "mungu-vc-icon mungu-vc-icon78",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        
         array(
            'type' => 'dropdown',
            "param_name" => "post_type",
            "heading" => esc_html__("Type", 'themetonaddon'),
            "value" => array(
                "Portfolio" => "portfolio",
                "Service" => "service",
                "Faq" => "faq",
                "Post" => "post",
                "Testimonials" => "testimonials",
                "Rent" => "rent",
                "Cause" => "cause",
                "Event Calendar" => "tribe_events",
                "Hotel rooms" => "hotelroom",
            ),
            "std" => "post",
            "holder" => "div"
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '8'
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
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));