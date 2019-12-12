<?php
if (!class_exists('WPBakeryShortCode_mungu_service_grid')) {
class WPBakeryShortCode_mungu_service_grid extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            'column' => '3',
            'input_type' => 'custom',
            "arrows" => 'show',
            "bullets" => "show",
            'layout' => 'medical',
            'slide_per_view' => '5',
            'image_type' => 'featured',
            'pager' => 'no',
            'list' => '',
            'carousel' => 'no',
            'categories' => '',
            'post_type' => 'service',
            'excerpt_length'  => '25',
            'title_position'=>'bottom',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        // Build category ids
        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_service_grid', $atts );
        $class .= ' '.$css_class;

        $list = vc_param_group_parse_atts($list);
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
        
      
        if ($arrows == 'hide') {
            $slider_arrows = '';
        }else{
            $slider_arrows = "<div class='arrow swiper-button-prev uk-icon' data-uk-icon='icon: arrow-left; ratio: 2' ></div>
                              <div class='arrow swiper-button-next uk-icon' data-uk-icon='icon: arrow-right; ratio: 2'></div>";
        }
        if ($bullets == 'hide') {
            $slider_bullets = '';
        }else{
            $slider_bullets = "<ul class='swiper-pagination uk-flex-center uk-flex-middle mt2'></ul>";
        }

        $cat_array = array();
        $post_items = $result = $items = '';
        $grid_class = '';
        $img = '';
        $img_html = '';
        $posts_query = new WP_Query($args);

    if ( $posts_query->have_posts() ) {
         while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            
            if(has_excerpt()) $excerpt = get_the_excerpt();
            else $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );

            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
            }

            $service_icon_image ="<img src='".Themeton_Std::getmeta('icon_image') ."' alt='".esc_html('icon','mungu')."'>";

            if($image_type == 'featured'){
                $img_html ="<div class='service-item' data-bg-image='".$img."'>
                        <div class='entry-hover'></div>
                    </div>";
            }else{
                $img_html="<div class='service-item featured_icon'>".$service_icon_image."</div>";
            }

            // Categories
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;
                $cat_titles []= $cat_title;
                }        
           if (isset($carousel) && $carousel == 'yes'){

                if($layout=='medical'){
                    $post_items .= "<div class='swiper-slide'>
                                    <section class='uk-flex-center uk-flex'>
                                        <a href='".get_the_permalink()."' >
                                            <div class='nxt-services'>
                                                <span>$service_icon_image</span>
                                                <h3>".get_the_title()."</h3>
                                            </div>
                                        </a>
                                    </section>
                                </div>";
                }elseif($layout == 'hotel'){
                    $post_items .= "<div class='swiper-slide nxt-feature'>
                                            <section class='uk-flex-center uk-flex'>
                                                <div class='nxt-services' data-bg-image='".$img."'>
                                                    <div class='entry-hover'></div>
                                                </div>
                                            </section>
                                            <a href='".get_the_permalink()."' ><h3>".get_the_title()."</h3> </a>  
                                        </div>";
                }
                else{
                    $post_items .= "<div class='swiper-slide nxt-feature'>
                                        <section class='uk-flex uk-flex-center uk-flex-middle'> 
                                            <div class='nxt-services uk-transition-toggle' data-bg-image='".$img."'>
                                                <div class='entry-hover'></div>
                                                <h3 class='p0 text-white'>".get_the_title()."</h3>
                                                <a class='text-white' href='".get_the_permalink()."' >".esc_html('View Details','mungu')."</a>
                                                <div class='uk-transition-fade uk-transition-toggle uk-overlay uk-overlay-secondary uk-position-cover'>
                                                    <h3 class='text-white uk-transition-fade animation-delay-02 p0 color-title'>".get_the_title()."</h3>
                                                    <a class='text-white uk-transition-fade animation-delay-04 color-title' href='".get_the_permalink()."' >".esc_html('View Details','mungu')."</a>
                                                </div>
                                            </div>
                                        </section>
                                    </div>";
                }

           }else{
                $items .= " <div class='uk-grid-margin'>
                                <a href='".get_the_permalink()."'>
                                    <div class='service-item-section'>
                                        ".$img_html."
                                        <div class='entry-meta'>
                                            <h3>".get_the_title()."</h3>
                                            <p>".$excerpt."</p>
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
       
        // Pager
        $pagination = '';
        $pager_result = '';
        if( $pager=='yes' ){
            $pagination = Themeton_Tpl::pagination($posts_query);
            if( !empty($pagination) ){
                $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex uk-scrollspy'>$pagination</div>";
            }
        }
        else{
            $pagination;
        }
        // reset query
        wp_reset_postdata();

        $custom_item ='';

        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                $atach_src = wp_get_attachment_image_src($image, 'full');
                $image = is_array($atach_src) ? $atach_src[0] : "";

                $f_name = isset($item['f_name']) ? $item['f_name'] : "";
                $f_name = !empty($f_name) ? "<h3>$f_name</h3>" : "";


                $job = isset($item['job']) ? $item['job'] : "";
                $job = !empty($job) ? "<sub>$job</sub>" : "";

                $quote_text = isset($item['quote_text']) ? $item['quote_text'] : "";
                $quote_text = !empty($quote_text) ? "<p>$quote_text</p>" : "";

                $custom_item .= "<li class='mungu-item custom-item'>
                                    <div class='item'>
                                        <div class ='uk-flex uk-flex-center  mb3'>
                                            <img src='".$image."' alt='".esc_attr('image','mungu')."'>
                                        </div>
                                        $f_name
                                        $job
                                    </div>
                                 </li>";
            }
        }
        if($input_type =='custom'){
            $result = "<ul class='custom_service mt3 $class'>".$custom_item."</ul>";
        }else{
            if (isset($carousel) && $carousel == 'no'){
                $result ="<div class='uk-grid mungu-element uk-grid-medium uk-child-width-1-".$column."@m uk-child-width-1-1@s $class'>
                            $items
                            $pager_result
                        </div>";
            }else{
                $result = "<div class='nxt-service-icon $class' data-col='".$slide_per_view."'>
                                <div class='swiper-container service-icon pt2' >
                                    <div class='swiper-wrapper uk-scrollspy'>
                                        $post_items
                                    </div>
                                    $slider_arrows
                                    $slider_bullets
                                </div>
                            </div>";
            }
        }
        // filter
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Service grid', 'themetonaddon'),
    "description" => esc_html__("You can add both custom and post", 'themetonaddon'),
    "base" => 'mungu_service_grid',
    "icon" => "mungu-vc-icon mungu-vc-icon76",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "carousel",
            "heading" => esc_html__("Icon Carousel?", 'themetonaddon'),
            "value" => array(
                'Yes' => 'yes',
                'No' =>'no'
                ),
            "std"   => "no",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "input_type",
            "heading" => esc_html__("Content type", 'themetonaddon'),
            "value" => array(
                "Custom data" => "custom",
                "From post type" => "post" 
            ),
            "std" => "custom"
        ), 
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'themetonaddon'),
            'param_name' => 'list',
            'value' => '',
            "dependency" => Array("element" => "input_type", "value" => array("custom")),
            'params' => array(
                array(
                    "type" => 'textfield',
                    "param_name" => "f_name",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Name", 'themetonaddon'),
                    'value' => 'Mark Wilson',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Time', 'themetonaddon'),
                    'param_name' => 'job',
                    'value' => '06am-8am',
                ),
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon'),
                    "std" => "show",
                ),
               
            )
        ),
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Layout", 'themetonaddon'),
            "value" => array(
                'With icon' => 'medical',
                'Featured' =>'logistics',
                'Title bottom' =>'hotel',
                ),
            "dependency" => Array("element" => "carousel", "value" => array("yes")),
            "std"   => "medical",
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
            "dependency" => Array("element" => "carousel", "value" => array("yes")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "bullets",
            "heading" => esc_html__("Slider Bullets", 'themetonaddon'),
            "value" => array(
                "Show" => "show",
                "Hide" => "hide"
            ),
            "std" => "show",
            "dependency" => Array("element" => "carousel", "value" => array("yes")),
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
            "dependency" => Array("element" => "carousel", "value" => array("no")),

        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '8'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "slide_per_view",

            "heading" => esc_html__("Slider per view", 'themetonaddon'),
            "value" => '5   ',
            "dependency" => Array("element" => "carousel", "value" => array("yes")),

        ),

        array(
            "type" => 'textfield',
            "param_name" => "column",
            "heading" => esc_html__("Column", 'themetonaddon'),
            "value" => '3'
        ),
        
        array(
            "type" => "dropdown",
            "param_name" => "pager",
            "heading" => esc_html__("Pagination", 'themetonaddon'),
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
            "std" => "no"
        ),
        array(
            "type" => "textfield",
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "value" => "25",
            "dependency" => Array("element" => "title_position", "value" => array("center"))
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