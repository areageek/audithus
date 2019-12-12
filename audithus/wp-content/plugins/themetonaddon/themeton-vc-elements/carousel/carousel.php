<?php
   
    class WPBakeryShortCode_Carousel_container extends WPBakeryShortCodesContainer {

        protected function content( $atts, $content = null){

             extract(shortcode_atts(array(
                'view_per' => '5',
                'count' => '14',
                'slidetype' => 'container',
                'items_desktop_small' => '2',
                'items_tablet' => '2',
                'items_mobile' => '1',
                "post_type"   => "post",
                'categories' => '',
                'ratio' => '1x1',
                'autoplay' => '5000',
                'excerpt_length'  => '7',
                'stop_on_hover' => false,
                'scroll_per_page' => false,
                'speed_scroll' => '800',
                'speed_rewind' => '1000', 
                'arrow_show' => 'true',
                'thumbnails_arrow_position' => 'bottom',
                'thumbnails' => 'false',
                'thumbhtml' => '',
                'extra_class' => '',

             ), $atts));
            
            $class = esc_attr($extra_class);
            $navhtml = $bulets ='';
            if($arrow_show =='true'){
                $navhtml.=' <div class="swiper-button-next uk-icon" data-uk-icon="icon: chevron-right;ratio: 1.5"></div>
                           <div class="swiper-button-prev uk-icon" data-uk-icon="icon: chevron-left;ratio: 1.5"></div>';
            }else{
                $navhtml.='';
            }
            if($thumbnails =='true'){
                $bulets.='<div class="swiper-pagination"></div>';
            }else{
                $bulets.='';
            }
            $bulets ='';
            global $post, $paged;
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
            $thumb  = '';
            $posts_query = new WP_Query($args);
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                $excerpt = $stars = $color_class = $img='';
                for( $i=0; $i < 5; $i++) {
                $color_class = '';

                if( $i < (int)Themeton_Std::getmeta('star') ) { $color_class = 'color-yellow'; }
                    $stars .= "<span class='fa fa-star $color_class'></span>";
                }
                $rate = "<div class='rate uk-scrollspy'>
                            $stars
                        </div>";

                if( has_post_thumbnail() ){
                    $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "medium");
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    $img = !empty($img) ? $img[0] : '';
                    $img_html ="<div class='car-thumb' data-bg-image='".$img."'><div class='entry-hover'></div></div>";
                }
                if(has_excerpt()) {
                    $excerpt = get_the_excerpt();
                } else {
                    $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );
                }
                // Categories
                $cat_title ='';
                $cat_titles = array();
                $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
                foreach ($terms as $term){
                    if (isset($term->name)) $cat_title = $term->name; 
                    if (isset($term->slug)) $cat_slug = $term->slug;
                    if (isset($cat_title)) $cat_titles []= $cat_title;
                }      
                $meta_item='';

                $meta_items = Themeton_Std::getmeta_type_list('meta_option_name'); // return array     
                if(!empty($meta_items)){
                    foreach ($meta_items as $item  ) {
                        $meta_item .= '<span class="deals">'.$item['content'].'</span>';
                    }
                }


                if($post_type == 'testimonials'){
                    $post_items.=" <section class='uk-grid uk-flex-center uk-flex post-item'>
                                    <div class='uk-width-1-4'><div class='thumb_imgs uk-flex uk-flex-center'>$thumb</div></div>
                                        <div class='uk-width-3-4'> 
                                            <p>$excerpt</p>
                                            <div class='testi-meta mt5'>
                                                <h4>".Themeton_Std::getmeta('input_name') ."</h4>
                                                $rate
                                            </div>
                                        </div>    
                                </section>";

                }elseif($post_type =='tribe_events'){ 
                    $post_items .= 
                    "<div class='uk-grid uk-text-justyfile service_slider_style'>
                        ".$thumb."
                        <a href='".get_the_permalink()."' class='uk-flex-center'><h3>".get_the_title()."</h3></a>
                        <p>".$excerpt."</p>
                    </div>";

                }
                elseif($post_type =='service'){ 
                    $post_items .= 
                    "<div class='uk-grid uk-text-justyfile service_slider_style'>
                        ".$thumb."
                        <a href='".get_the_permalink()."' class='uk-flex-center'><h3>".get_the_title()."</h3></a>
                        <p>".$excerpt."</p>
                    </div>";

                }elseif($post_type =='portfolio'){ 
                    $post_items .= "<div class='themeton-image post-item-porfolio uk-flex uk-flex-middle uk-flex-center' data-bg-image='$img'>
                                        <img src='".get_template_directory_uri()."/images/dim/".$ratio.".png' alt='".esc_attr__('Ratio', 'themetonaddon')."'/>
                                        <figure>
                                        <figcaption class='uk-position-absolute uk-text-center'>
                                            <a href='".get_the_permalink()."'>
                                                <h3 class='uk-flex uk-flex-center'>".get_the_title()."</h3>
                                                <span>".$cat_title."</span>
                                            </a>   
                                        </figcaption>
                                        </figure>
                                    </div>";

                }
                elseif($post_type == 'rent'){
                    $post_items .= 
                    "<div class='car-grid-item uk-card-hover uk-position-relative'> 
                        <a href='".get_the_permalink()."'>".$img_html."  $meta_item</a>
                        <div class='meta-title pl3'> <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3> </a> <p class='price'>".Themeton_Std::getmeta('car_price')."</p></div>
                    </div>";
                }
                elseif($post_type == 'post'){
                    $post_items .= "<div class='uk-grid uk-child-width-1-2 ml1'>
                                        <div class='themeton-image toim' data-bg-image='$img'>
                                            <img src='".get_template_directory_uri()."/images/dim/".$ratio.".png' alt='".esc_attr__('Ratio', 'themetonaddon')."'/>
                                        </div>
                                        <div class='uk-grid uk-flex uk-flex-middle '>
                                            <a href='".get_the_permalink()."' class='uk-flex-center'><h2>".get_the_title()."</h2></a>
                                            <p>".$excerpt."</p>
                                            <a href='".get_the_permalink()."' class='uk-button ml4 uk-button-default'>".esc_html__('Цааш үзэх', 'themetonaddon')."</a>
                                        </div>
                                    </div>";
                }else{             
                    $post_items .= "<section class='uk-flex-center uk-flex post-item'>
                                    <div class='thumb_img' style='background-image:url(".$img.")'>
                                    <figure><figcaption>
                                        <p class='uk-flex uk-flex-center'>".get_the_title()."</p>
                                        <a href='".get_the_permalink()."'>".esc_html__('More', 'themetonaddon')."</a>
                                        </figcaption>
                                    </figure>
                                    </div>
                                </section>";
                }

            }
        
            // reset query
            wp_reset_postdata();
             
            $arrow_class = $thumbhtml = $slidecontent = '';
            //*container slider 
            if($slidetype == 'container'){
                $slidecontent.= do_shortcode($content);
            }else{
                $slidecontent.=$post_items;    
            }
            $styles  = $result = "";
            $data = sprintf("data-prev='%s'",$view_per);
            $data_desktop_small = sprintf("data-prev-small='%s'",$items_desktop_small);
            $data_items_tablet = sprintf("data-prev-tab='%s'",$items_tablet);
            $data_items_mobile = sprintf("data-prev-mobile ='%s'",$items_mobile);
            $data_items_play = sprintf("data-play ='%s'",$autoplay);
            $data_items_speed_rewind = sprintf("data-speed ='%s'",$speed_rewind);
            $result .= '<div id="carouselswipper" class="swiper-container  '.$class.'" '.$data.' '.$data_desktop_small.' '.$data_items_speed_rewind.''.$data_items_play.' '.$data_items_tablet.' '.$data_items_mobile.'>
                            <div class="swiper-wrapper uk-animation-toggle">
                                '.$slidecontent.'
                            </div>
                          
                           '.$bulets.'
                        </div> '.$navhtml.'';
            return $result;
    }
}

vc_map( array(
    "name" => esc_html__( 'Carousel', 'themetonaddon' ),
    "base" => "carousel_container",
    "description" => esc_html__( 'Responsive content carousel.', 'themetonaddon' ),
    "as_parent" => array( 'only' => 'vc_row,vc_row_inner' ),
    "js_view" => 'VcColumnView',
    "content_element" => true,
    'is_container' => true,
    'container_not_allowed' => false,
    "icon" => "icon-wpb-quickload",
    "category" => 'Themeton',
    "params" => array(
         array(
            'type' => 'dropdown',
            "param_name" => "slidetype",
            "heading" => esc_html__("Slide content type", 'themetonaddon'),
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "value" => array(
                "VC container" => "container",
                "Posts" => "posttype",
            ),
            "std" => "list",
        ),   
        array(
            'type' => 'dropdown',
            "param_name" => "post_type",
            "heading" => esc_html__("Type", 'themetonaddon'),
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "value" => array(
                "Portfolio" => "portfolio",
                "Service" => "service",
                "Team" => "team",
                "Faq" => "faq",
                "Post" => "post",
                "Testimonials" => "testimonials",
                "Event" => "tribe_events",
            ),
            "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
            "std" => "team",
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
            "value" => '8'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Specify category Id or leave blank to display items from all categories.", 'themetonaddon'),
            "value" => '',
            "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Items to display on screen', 'themetonaddon' ),
            "param_name" => "view_per",
            "value" => '3',
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "description" => esc_html__( 'Maximum items to display at a time.', 'themetonaddon' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Items to display on small desktops', 'themetonaddon' ),
            "param_name" => "items_desktop_small",
            "value" => '3',
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "description" => esc_html__( 'Smaller screened desktops.', 'themetonaddon' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Items to display on tablets', 'themetonaddon' ),
            "param_name" => "items_tablet",
            "value" => '2',
            "group" => esc_html__( 'General options', 'themetonaddon' ),
                    "description" => esc_html__( 'Tablet devices.', 'themetonaddon' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Items to display on mobile phones', 'themetonaddon' ),
            "param_name" => "items_mobile",
            "value" => '1',
            "group" => esc_html__( 'General options', 'themetonaddon' ),
                    "description" => esc_html__( 'Mobile devices.', 'themetonaddon' ),
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "thumbnails",
            "heading" => esc_html__("Bullets", 'themetonaddon'),
            "group" => esc_html__( 'Thumbnails', 'themetonaddon' ),
            "value" => array(
                "Show" => "true",
                "Hide" => "false",
            ),
            "std" => "false",
        ),   
        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Arrow', 'themetonaddon' ),
            "param_name" => "arrow_show",
            "value" => array(
                esc_html__( 'Yes', 'themetonaddon' ) => 'true',
                esc_html__( 'No', 'themetonaddon' ) => 'false',
            ),
            'description' => esc_html__( 'Arrows', 'themetonaddon' ),
            "group" => esc_html__( 'Thumbnails', 'themetonaddon' ),
        ),
        
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Autoplay', 'themetonaddon' ),
            "param_name" => "autoplay",
            "value" => '5000',
            "description" => esc_html__( ' Leave blank to disable autoplay', 'themetonaddon' ),
            "group" => esc_html__( 'Advanced', 'themetonaddon' ),
        ),
  
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Scroll Speed', 'themetonaddon' ),
            "param_name" => "speed_rewind",
            "value" => '1000',
            "description" => esc_html__( 'The speed the carousel scrolls in milliseconds', 'themetonaddon' ),
            "group" => esc_html__( 'Advanced', 'themetonaddon' ),
        ),

        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
        )
    ),
    

    'default_content' => '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]',
) );