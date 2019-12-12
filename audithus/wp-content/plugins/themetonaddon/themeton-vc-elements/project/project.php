<?php
if (!class_exists('WPBakeryShortCode_mungu_projects')) {
class WPBakeryShortCode_mungu_projects extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '3',
            'layout' => 'standard',
            'metastyle' => 'with-title',
            'bullet' => 'yes',
            'bullets_style' => 'circle',
            'bullets_position' => 'bottom',
            'categories' => '',
            'arrows' => 'show',
            'postorderby' => 'desc',
            'image_active' => '',
            'post_type' => 'portfolio',
            'excerpt_length'  => '30',
            'title_position'=>'bottom',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_projects', $atts );
        $extra_class .= ' '.$css_class;

        // Build category ids
         $slider_arrows = '';

        if ($arrows == 'hide') {
            $slider_arrows = '';
        }else{
            $slider_arrows = "<div class='arrow swiper-button-prev '>".Themeton_Tpl::the_arrow_icon()."</div>
                              <div class='arrow swiper-button-next '>".Themeton_Tpl::the_arrow_icon()."</div>";
        }
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
            'orderby' => array(
                'date'          => $postorderby,
                'comment_count' => $postorderby,
            ),
            'paged' => $paged
        );
        if(!empty($cats)){
            $args['tax_query'] = array(
                'relation' => 'IN',
                array(
                    'taxonomy' => $post_type.'_category',
                    'field' => 'id',
                    'terms' => $cats,
                    
                )
            );
        }
        $atach_src = wp_get_attachment_image_src($image_active, 'full');
        $image_active = is_array($atach_src) ? $atach_src[0] : "";

        $cat_array = array();
        $items = '';
        $grid_class = '';
        $wrapperjsclass = '';


        $posts_query = new WP_Query($args);
    if ( $posts_query->have_posts() ) {
       while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $excerpt = '';
            if(has_excerpt()) {
                $excerpt = get_the_excerpt();
            } else {
                $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );
            }
            $img = '';
            $thumb = '';
            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
                $thumb = !empty($thumb) ? $thumb[0] : '';
            }
            // Categories
            $cat_titles = array();
            $cat_title = '';
            $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;
                $cat_titles []= $cat_title;
            }        
            // title

            if($layout!='feautured'){
      
                $items.="<div class='swiper-slide' >
                            <div class='entry-active'  data-bg-image='".esc_attr($image_active)."'></div>
                            <div class='project-item ' >
                                <a href='".get_the_permalink()."'>
                                    <div class='feature-image' data-bg-image='".$img."'> 
                                    </div>
                                </a>
                            </div>
                        </div>";
            }else{
                $items.="<div class='swiper-slide'>
                            <a href='".get_the_permalink()."'>
                                <div class='project-feautured-item' data-bg-image='".$thumb."'>
                                        <div class='project-meta'>
                                            <div class='entry-border uk-position-absolute'></div>
                                            <h3>".get_the_title()."</h3>
                                            <p class='excerpt_text'>$excerpt</p>
                                        </div>
                                </div>
                            </a>
                        </div>";
            }
           
        }
    }
    else {
            return "There is no <i>$post_type</i> posts. Please instert your posts in <i>$post_type</i> post type or select different post type.";

        }
        
       
        // reset query
        wp_reset_postdata();

        //bullets
        $bullet_html ='';
        if($bullet ==  'yes'){
            $bullet_html.="<div class='swiper-pagination ".$bullets_style." ".$bullets_position."' ></div>";
        }else{
            $extra_class .= ' no-bullets'; 
        }

        $result='';
        if($layout !='feautured'){
            $result .="<div class='mungu-element projectvc project-items $extra_class'>
                        <div class='swiper-container  project-completed'>
                            <div class='swiper-wrapper'>
                                $items
                            </div>
                            $bullet_html
                            $slider_arrows
                        </div>
                    </div>";}
        else{
            $result .= "<div class='mungu-element projectvc project-feautured-items $extra_class'>
                            <div class='swiper-container-feautured-project'>
                                <div class='swiper-wrapper'>
                                    $items
                                </div>
                                <div class='project-feautured-pagintation uk-position-relative'> 
                                    $slider_arrows
                                </div>
                            </div>
                        </div>";
        }
       
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Portfolio Slider", 'themetonaddon'),
    "description" => esc_html__("portfolio post slider", 'themetonaddon'),
    "base" => "mungu_projects",
    "class" => "",
    "icon" => "mungu-vc-icon mungu-vc-icon78",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                "Featured" => "feautured",
                "Standard" => "standard"
            ),
            "std" => "standard",
            "holder" => 'div',
            "description" => esc_html__("Please increase count number on next when you selected Grid style here.", 'themetonaddon'),
        ),
       
        array(
            "type" => "dropdown",
            "param_name" => "bullet",
            "heading" => esc_html__("Bullets", 'themetonaddon'),
            "value" => array(
                "Show" => "yes",
                "Hide" => "no"
            ),
            "std" => "yes",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "postorderby",
            "heading" => esc_html__("Post order by", 'themetonaddon'),
            "value" => array(
                "Desc" => "desc",
                "Asc" => "asc"
            ),
            "std" => "desc",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "arrows",
            "heading" => esc_html__("Slider Arrows", 'themetonaddon'),
            "value" => array(
                "Show" => "show",
                "Hide" => "hide"
            ),
            "std" => "show",
        ),
       
        array(
            'type' => 'attach_image',
            "param_name" => "image_active",
            "heading" => esc_html__("Active background image", 'themetonaddon')
        ),
        
        array(
            "type" => 'textfield',
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excepts", 'themetonaddon'),
            "value" => '33', 
          
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '3', 
        ),
        array(
            "type" => "textfield",
            "param_name" => "categories",
            "heading" => esc_html__("Category", 'themetonaddon'),
            "std" => "",
            "description" => esc_html__("Specify category id, slug or leave blank to display items from all categories.", 'themetonaddon'),
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
                "Portfolio" => "portfolio",
                "Service" => "service",
                "Team" => "team",
                "Faq" => "faq",
                "Post" => "post",
                "Testimonials" => "testimonials",
                "Rent" => "rent",
                "Cause" => "cause",
                "Event Calendar" => "tribe_events",
                "Hotel rooms" => "hotelroom",
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