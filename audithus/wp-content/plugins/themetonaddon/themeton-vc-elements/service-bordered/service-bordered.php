<?php
if (!class_exists('WPBakeryShortCode_mungu_service_bordered')) {
class WPBakeryShortCode_mungu_service_bordered extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'style' => 'style1',
            'count' => '5',
            'column' => '3',
            'categories' => '',
            'image_type' => 'featured',
            'excerpt_length'  => '18',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_service_bordered', $atts );
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
            'post_type' => 'service',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => true,
            'paged' => $paged
        );
        if(!empty($cats)){
            $args['tax_query'] = array(
                'relation' => 'IN',
                array(
                    'taxonomy' => 'service_category',
                    'field' => 'id',
                    'terms' => $cats
                )
            );
        }
        
        if ($style != 'mungu-style-church') $over = 'style="overflow:hidden;"'; 
        else $over = '';

        $cat_array = array();
        $post_items = $result = $items = '';
        $grid_class = '';
        $img = '';
        $img_html = '';
        $posts_query = new WP_Query($args);

        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            if ($style == 'mungu-style-church') $readmore = '<a href="'.get_the_permalink().'">'.esc_html__('READ MORE','themetonaddon').' &nbsp;'.Themeton_Tpl::the_arrow_icon().'</a>';
            else $readmore = '';
            if(has_excerpt()) $excerpt = get_the_excerpt();
            else $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );

            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
            }
            $service_icon_image ="<img src='".Themeton_Std::getmeta('icon_image') ."' alt='".esc_html__('icon','themetonaddon')."'>";

            if($image_type == 'featured'){
                $img_html ="<div class='service-item' data-bg-image='".$img."'>
                        <div class='entry-hover'></div>
                    </div>";
            }else{
                $img_html="<div class='service-item featured_icon'>".$service_icon_image."</div>";
            }

            // Categories
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), 'service_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;
                $cat_titles []= $cat_title;
                }        
         
                $items .= "<li ".$over." class='service-item-border mb4@s'>
                                ".$img_html."
                                <div class='entry-meta'>
                                    <a href='".get_the_permalink()."' > <h3>".get_the_title()."</h3></a>
                                    <p>".$excerpt."</p>
                                    ".$readmore."
                                </div>
                            </li>";
            
        }
        // reset query
        wp_reset_postdata();

        $result.="<div class='uk-grid ".$style." service-bordered uk-grid-medium uk-child-width-1-1@m uk-child-width-1-1@s $extra_class'>
                    <ul ".$over." class='service-bordered-list uk-scrollspy'>
                        $items
                    </ul>
                </div>";
        // filter
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Service Bordered', 'themetonaddon'),
    "description" => esc_html__("You can add both custom and post", 'themetonaddon'),
    "base" => 'mungu_service_bordered',
    "icon" => "mungu-vc-icon mungu-vc-icon10",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Select Style", 'themetonaddon'),
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "mungu-style-church",
            ),
            "std" => "style1",
        ),      
        array(
            "type" => "dropdown",
            "param_name" => "image_type",
            "heading" => esc_html__("Featured image Type", 'themetonaddon'),
            "value" => array(
                "Featured" => "featured",
                "Icon" => "icon",
            ),
            "std" => "featured",
            "holder" => "div",

        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '5'
        ),
       
       
        array(
            "type" => "textfield",
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "value" => "18",
           
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