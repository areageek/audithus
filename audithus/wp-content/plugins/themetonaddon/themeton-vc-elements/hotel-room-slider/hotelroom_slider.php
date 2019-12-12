<?php
if (!class_exists('WPBakeryShortCode_Mungu_hotelroom_slider')) {
class WPBakeryShortCode_Mungu_hotelroom_slider extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            "filter" => 'yes',
            'slide_per_view' => '3',
            'categories' => '',
            'post_type' => 'hotelroom',
            'excerpt_length'  => '25',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_hotelroom_slider', $atts );
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



        $cat_array = array();
        $items = '';
        $filter_html = '';
        $img = '';
        $posts_query = new WP_Query($args);
    if ($posts_query->have_posts() ) {
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $excerpt = $img_html='';
            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
                $img_html ="<div class='hotel-room-thumb' data-bg-image='".$img."'></div>";
            }
            if(has_excerpt()) {
                $excerpt = get_the_excerpt();
            } else {
                $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), 5 ) );
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
                    $filter_html .= '<li class="filter-item" data-filter=".'.$cat_slug.'" >'. $cat_title .'</li>';
                    $cat_array[] = $term->term_id;
                }

                $cats .= "$cat_slug";
                $last_cat = $cat_title;
            }

            $items.="<div class='item  $cats roomitem'>
                        <div class='nxt-hotels'>
                            $img_html
                            <figure><figcaption>
                                <a href='".get_the_permalink()."'> <p>$excerpt</p></a>
                            </figcaption></figure>
                        </div>
                    </div>";
        }
    }
    else {
            return "There is no <i>$post_type</i> posts. Please instert your posts in <i>$post_type</i> post type or select different post type.";

        }
        
        // reset query
        wp_reset_postdata();

        $filter_html = "<div class='uk-container' id='faq-filter'>
                            <ul class='filtera'>
                                <li class='filter-item' data-filter='*' > ".esc_attr__('All', 'themetonaddon')."</li>
                                $filter_html
                            </ul>
                        </div>";
        
        return "<div class='nxt-roomslider $extra_class'>
                    $filter_html
                    <div class='owl-carousel roomslider' >
                        $items
                    </div>
                </div>";
    }
}
}

vc_map( array(
    "name" => esc_html__('Hotel Room slider', 'themetonaddon'),
    "description" => esc_html__("post type: hotel room", 'themetonaddon'),
    "base" => 'mungu_hotelroom_slider',
    "icon" => "mungu-vc-icon mungu-vc-icon82",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(

        array(
            "type" => 'textfield',
            "param_name" => "slide_per_view",
            "heading" => esc_html__("Slide Per view", 'themetonaddon'),
            "value" => '3',
            "holder" => 'div'

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
            "group" => esc_html__( 'Post type', 'themetonaddon' ),
            "value" => array(
                "Hotel rooms" => "hotelroom",
                "Portfolio" => "portfolio",
                "Service" => "service",
                "Team" => "team",
                "Faq" => "faq",
                "Post" => "post",
                "Testimonials" => "testimonials",
                "Rent" => "rent",
                "Cause" => "cause",
                "Event Calendar" => "tribe_events",
            ),
            "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
            "std" => "cause",
            "holder" => 'div'
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));