<?php
   
if (!class_exists('WPBakeryShortCode_Carousel_Anythings')) {
class WPBakeryShortCode_Carousel_Anythings extends WPBakeryShortCodesContainer {

    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'items' => '3',
            'count' => '14',
            'slidetype' => 'container',
            'items_desktop_small' => '2',
            'items_tablet' => '2',
            'items_mobile' => '1',
            "post_type"   => "post",
            'categories' => '',
            'ratio' => '1x1',
            'categories' => '',
            'autoplay' => 'true',
            'stop_on_hover' => false,
            'scroll_per_page' => false,
            'speed_scroll' => '800',
            'speed_rewind' => '1000', 
            'excerpt_length'  => '7',
            'arrow_show' => 'true',
            'thumbnails_arrow_position' => 'bottom',
            'thumbnails' => 'false',
            'thumbhtml' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        wp_enqueue_style( 'owl-theme-default', plugin_dir_url( __FILE__ ) . 'owl/owl.carousel.css');

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'carousel_anythings', $atts );
        $class .= ' '.$css_class;
        
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
        $post_cat = '';

        // build query
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $count,
            'category' => $post_cat,
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

            }elseif($post_type =='service'){ 
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
                                <figure>
                                    <figcaption>
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
        
        if($thumbnails == 'false'){
            $thumbhtml .= "no-thumb";
        }elseif($thumbnails == 'false'){
            $thumbhtml .= '';
            $class .= ' bullets-on-left';
        }else{
            $thumbhtml .= '';
        }

        if($thumbnails_arrow_position == 'top_rights'){
            $arrow_class .= "top_rights";
        }elseif($thumbnails_arrow_position == 'top_left'){
            $arrow_class .= "top_left";
        }elseif($thumbnails_arrow_position == 'bottom_left'){
            $arrow_class .= "bottom_left";
        }elseif($thumbnails_arrow_position == 'bottom_right'){
            $arrow_class .= "bottom_right";
        }elseif($thumbnails_arrow_position == 'middle'){
            $arrow_class .= "content_middle";
        }else{
            $arrow_class .= "";
        }
        $id = 0;
        $id++;
        $id = 'carousel-item'.esc_attr( $id );

        $styles  = $result = "";
        $result .= '<div class="carousel-anything-container owl-carousel '.$arrow_class.' '.$thumbhtml.' '. $class . '" 
                       data-items="' .$items. '" 
                       data-scroll_per_page="' .$scroll_per_page. '" 
                       data-autoplay="' . esc_attr( empty( $atts['autoplay'] ) || $atts['autoplay'] == '0' ? 'false' : $atts['autoplay'] ) . '" 
                       data-items-small="' .$items_desktop_small. '" 
                       data-items-tablet="' .$items_tablet. '"
                       data-items-mobile="' . $items_mobile. '" 
                       data-stop-on-hover="' .$stop_on_hover. '"
                       data-speed-scroll="' .$speed_scroll . '"
                       data-speed-rewind="' .$speed_rewind. '" 
                       data-thumbnails="'.$thumbnails.' "
                       data-navigation="'.$arrow_show.'">
                        '.$slidecontent.'
                </div>';

        
        return $result;
    }
}
}

vc_map( array(
        "name" => esc_html__( 'Carousel Container', 'themetonaddon' ),
        "base" => "carousel_anythings",
        "description" => esc_html__( 'Responsive content carousel.', 'themetonaddon' ),
        "as_parent" => array( 'only' => 'vc_row,vc_row_inner' ),
        "js_view" => 'VcColumnView',
        "content_element" => true,
        'is_container' => true,
        'container_not_allowed' => false,
        "icon" => "mungu-vc-icon mungu-vc-icon29",
        "class" => 'mungu-vc-element',
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
                "holder" => 'div'
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
                    "Rent" => "rent",
                    "Event Calendar" => "tribe_events",
                ),
                "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
                "std" => "team",
                "holder" => 'div'
            ),
            array(
                "type" => "dropdown",
                "param_name" => "ratio",
                "heading" => esc_html__("Image ratio (width x height)", 'themetonaddon'),
                "value" => array(
                    "1x1 (tile)" => "1x1",
                    "1x2" => "1x2",
                    "2x1" => "2x1",
                    "1x3" => "1x3",
                    "3x1" => "3x1",
                    "2x3" => "2x3",
                    "3x2" => "3x2",
                    "3x4" => "3x4",
                    "4x3" => "4x3",
                    "3x5" => "3x5",
                    "5x3 (default)" => "5x3",
                    "5x2" => "5x2",
                    "2x5" => "2x5",
                    "8x5" => "8x5",
                    "8x7" => "8x7",
                    "8x15" => "8x15",
                    "16x7" => "16x7",
                    "Masonry (Custom height)" => "auto"
                ),
                "std" => "5x3",
                "group" => esc_html__( 'General options', 'themetonaddon' ),
                "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
            ),
            array(
                "type" => "textfield",
                "param_name" => "excerpt_length",
                "heading" => esc_html__("Excerpt length", 'themetonaddon'),
                "dependency" => Array("element" => "input_type", "value" => array("post")),
                "value" => "12",
                "group" => esc_html__( 'General options', 'themetonaddon' ),
                "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
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
                "param_name" => "items",
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
                    "Show (left align)" => "trueleft",
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
                "type" => "dropdown",
                "heading" => esc_html__( 'Arrows position', 'themetonaddon' ),
                "param_name" => "thumbnails_arrow_position",
                "value" => array(
                    'Bottom Center' => 'bottom',
                    'Bottom left'=> 'bottom_left',
                    'Bottom Right' => 'bottom_right',
                    'Top right' => 'top_rights',
                    'Top left' => 'top_left',
                    'Middle arrow left & right' => 'middle',
                ),
                "dependency" => array(
                    "element" => "arrow_show",
                    "value" => array( "true" ),
                ),
                "std" => "bottom",
                "group" => esc_html__( 'Thumbnails', 'themetonaddon' ),
            ),
            
            array(
                "type" => "dropdown",
                "heading" => esc_html__( 'Autoplay', 'themetonaddon' ),
                "param_name" => "autoplay",
                "value" => array(
                    esc_html__( 'Yes', 'themetonaddon' ) => 'true',
                    esc_html__( 'No', 'themetonaddon' ) => 'false',
                ),
                "group" => esc_html__( 'Advanced', 'themetonaddon' ),
            ),

            array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "stop_on_hover",
                "value" => array( esc_html__( 'Pause the carousel when the mouse is hovered onto it.', 'themetonaddon' ) => 'true' ),
                "description" => '',
                "dependency" => array(
                    "element" => "autoplay",
                    "not_empty" => true,
                ),
                "group" => esc_html__( 'Advanced', 'themetonaddon' ),
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__( 'Scroll Speed', 'themetonaddon' ),
                "param_name" => "speed_scroll",
                "value" => '800',
                "description" => esc_html__( 'The speed the carousel scrolls in milliseconds', 'themetonaddon' ),
                "group" => esc_html__( 'Advanced', 'themetonaddon' ),
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__( 'Rewind Speed', 'themetonaddon' ),
                "param_name" => "speed_rewind",
                "value" => '1000',
                "description" => esc_html__( 'The speed the carousel scrolls', 'themetonaddon' ),
                "group" => esc_html__( 'Advanced', 'themetonaddon' ),
            ),
            array(
                "type" => "textfield",
                "param_name" => "extra_class",
                "heading" => esc_html__("Extra Class", 'themetonaddon'),
                "value" => "",
                "group" => esc_html__( 'General options', 'themetonaddon' ),
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
                "param_name" => "css",
                'group' => esc_html__( 'Design Options', 'themetonaddon' ),
            )
        ),
        
        'default_content' => '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]',
    ) 
);