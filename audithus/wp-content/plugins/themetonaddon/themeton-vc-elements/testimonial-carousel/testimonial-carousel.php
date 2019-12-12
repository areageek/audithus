<?php
if (!class_exists('WPBakeryShortCode_Mungu_content_testimonial')) {
class WPBakeryShortCode_Mungu_content_testimonial extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract( shortcode_atts( array(
            'input_type' => 'custom',
            'list' => '',
            'count' => '5',
            'theme_type' => 'centered',
            "arrows" => 'show',
            "arrows_position" => 'bottom',
            "bullets" => "show",
            "bullets_style" => "circle",
            'post_items' => '',
            'excerpt_length'  => '12',
            'qoute'  => 'yes',
            'rating'  => 'hide',
            'post_type' => 'testimonials',
            'view_per' => 1,
            'imagebullet'  => '',
            'extra_class' => '',
            'css' => ''
        ), $atts ) );

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_content_testimonial', $atts );
        $extra_class .= ' '.$css_class;

        $bullets_html = $arrow_html = '';
        $result = '';
        if($arrows_position == 'bottom'){
            $arrow_html.='arrow';
        }else{
             $arrow_html.='middle';
        }

        if ($arrows_position == 'top') $arrow_html ='right-top';

        $qoute_class = '';
        if($qoute != 'yes'){
            $qoute_class.='qoute-none';
        }

        if ($arrows == 'hide') {
            $slider_arrows = '';
        }else{
            if ($theme_type == 'boxed') {
                $slider_arrows = "<div class='$arrow_html swiper-button-prev'><a href='javascript:;' class='uk-icon'><svg width='40' height='40' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <polyline fill='none' stroke='#000' stroke-width='1.03' points='13 16 7 10 13 4'></polyline></svg></a></div>
                              <div class='$arrow_html swiper-button-next '><a href='javascript:;' class='uk-icon'><svg width='40' height='40' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <polyline fill='none' stroke='#000' stroke-width='1.03' points='7 4 13 10 7 16'></polyline></svg></a></div>";
            }
            else $slider_arrows = "<div class='$arrow_html swiper-button-prev uk-icon' data-uk-icon='icon: arrow-left; ratio: 2'></div>
                              <div class='$arrow_html swiper-button-next uk-icon' data-uk-icon='icon: arrow-right; ratio: 2'></div>";
        }

        $data = sprintf("data-prev='%s'",$view_per);

        $list = vc_param_group_parse_atts($list);
        $lists = '';
        //post type
         global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }

        $cats = array();
        if( !empty($categories) ){
            $exps = explode(",", $categories);
            foreach($exps as $val){
                if( $val != '' ){
                    $cats[] = str_replace(" ", "", $val);
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
                    'taxonomy' =>$post_type.'_category',
                    'field' => 'slug',
                    'terms' => $cats
                )
            );
        }
        $imagebullet1 ='';

        $meta_query = array();

        $args['meta_query'] = $meta_query;
        $cat_array = array();   
        $posts_query = new WP_Query($args);

        if ($posts_query->have_posts()) {
            while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $excerpt = $stars = $color_class = '';

            for( $i=0; $i < 5; $i++) {
              $color_class = '';
              if( $i < (int)Themeton_Std::getmeta('star') ) { $color_class = 'color-yellow'; }
                $stars .= "<span class='fa fa-star $color_class'></span>";
            }
            $rate='';

            if($rating == 'show'){
                $rate .= "<div class='rate uk-scrollspy'>
                        $stars
                      </div>";
            }else{
                $rate .='';
            }

            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;
                $cat_titles []= $cat_title;
                } 

            

            if(has_excerpt()) {
                $excerpt = get_the_excerpt();
            } else {
                $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );
            }
            $thumb_url ='';
            $img = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), 'thumbnail', false, array('class'=>'head-img ') );
            if( has_post_thumbnail() ){
                $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $thumb_url = !empty($thumb_url) ? $thumb_url[0] : '';
            }
            $imagebullet.="<div class='swiper-slide'>
                                <div class='entry-thumb uk-flex uk-flex-center ' data-bg-image='".$thumb_url."'></div>     
                                <div class='meta-info'>
                                    <h4 class='info-title  uk-flex uk-flex-center'>".Themeton_Std::getmeta('input_name') ."</h4>
                                    <h5 class=' uk-flex uk-flex-center'>".Themeton_Std::getmeta('position') ."</h5>
                                </div>
                            </div>";
            $imagebullet1.="<div class='swiper-slide'>
                                 <div class='entry-thumb uk-flex uk-flex-center uk-border uk-border-circle' data-bg-image='".$thumb_url."'></div>     
                            </div>";
            if($theme_type == 'centered'){
                $post_items .= "<div class='swiper-slide'>
                                    <section class='uk-flex-center uk-flex'>
                                        <div class='section-head uk-align-center'> 
                                            ".$img."
                                            <div class='head-info'>
                                                <a href='".get_the_permalink()."'><h3 class='info-title'>". get_the_title()."</h3></a>
                                                <h4 class='info-name'>".Themeton_Std::getmeta('input_name') ."</h4>
                                                <h5 class='info-position'>".Themeton_Std::getmeta('position')."</h5>
                                             ".$rate."    
                                            </div>
                                            <p class='section-content $qoute_class'>".$excerpt."</p>
                                        </div>
                                        
                                    </section>
                                </div>";
            }
            if($theme_type == 'left') {
                $post_items .= "<div class='swiper-slide'>
                                    <section class='section-content'>
                                        <div class='qoute-content'>
                                            ".$excerpt."
                                        </div>        
                                        <div class='head-info '>
                                         ".$img."
                                            <h3 class='info-title'>".Themeton_Std::getmeta('input_name') ."</h3>
                                            <h4>".Themeton_Std::getmeta('position')."</h4>
                                        </div>
                                    </section>
                                </div>";
            }
            if($theme_type == 'car'){
                $post_items .= "<div class='swiper-slide $theme_type'>
                            <section class='section-content uk-text-center'>
                                    ".$excerpt."
                                <div class='head-info mt5'>
                                    <div class='info-box'>
                                    <h5 class='info-title'>".Themeton_Std::getmeta('input_name') ."</h5>
                                    <span>".Themeton_Std::getmeta('position')."</span>
                                    </div>
                                </div>
                            </section>
                        </div>";
            } 
            if($theme_type == 'style4'){ 
                $post_items .= "<div class='swiper-slide '>
                             <section class='section-content uk-text-center'>
                                    ".$excerpt."
                                <div class='head-info mt5'>
                                    <div class='info-box'>
                                         <h5 class='info-title'>".Themeton_Std::getmeta('input_name') ."</h5>
                                         <span>".Themeton_Std::getmeta('position')."</span>
                                    </div>
                                </div>
                            </section>
                        </div>";
            }
            
            if($theme_type == 'boxed') {
                $post_items .= "<div class='swiper-slide $theme_type'>
                                    <section class='section-content'>
                                        <div class='qoute-content'>
                                        <span class='uk-icon'><svg width='16' height='16' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path d='M17.27,7.79 C17.27,9.45 16.97,10.43 15.99,12.02 C14.98,13.64 13,15.23 11.56,15.97 L11.1,15.08 C12.34,14.2 13.14,13.51 14.02,11.82 C14.27,11.34 14.41,10.92 14.49,10.54 C14.3,10.58 14.09,10.6 13.88,10.6 C12.06,10.6 10.59,9.12 10.59,7.3 C10.59,5.48 12.06,4 13.88,4 C15.39,4 16.67,5.02 17.05,6.42 C17.19,6.82 17.27,7.27 17.27,7.79 L17.27,7.79 Z'></path> <path d='M8.68,7.79 C8.68,9.45 8.38,10.43 7.4,12.02 C6.39,13.64 4.41,15.23 2.97,15.97 L2.51,15.08 C3.75,14.2 4.55,13.51 5.43,11.82 C5.68,11.34 5.82,10.92 5.9,10.54 C5.71,10.58 5.5,10.6 5.29,10.6 C3.47,10.6 2,9.12 2,7.3 C2,5.48 3.47,4 5.29,4 C6.8,4 8.08,5.02 8.46,6.42 C8.6,6.82 8.68,7.27 8.68,7.79 L8.68,7.79 Z'></path></svg></span>
                                            ".$excerpt."
                                        </div>        
                                        <div class='head-info'>
                                         ".$img."
                                            <div class='info-box'>
                                            <h5 class='info-title'><a href='".get_the_permalink()."'>".Themeton_Std::getmeta('input_name') ."</a></h5>
                                            <h5>".Themeton_Std::getmeta('position')."</h5>
                                            </div>
                                        </div>
                                    </section>
                                </div>";
            }
            
            if($theme_type == 'center_modern'){
                $star_number = Themeton_Std::getmeta('star');
                $stars = '';
                for( $i=0; $i < 5; $i++) {
                    $color_class = '';
                    if( $i <= (int)Themeton_Std::getmeta('star') ) { $color_class = 'black-star'; }
                    $stars .= "<span class='fa fa-star $color_class'></span>";
                }
                $rate=$stars;
                $post_items .= "<div class='swiper-slide center_modern'>
                                    <section class='uk-flex-center uk-flex'>
                                        <div class='section-head uk-align-center'>
                                            <p class='$qoute_class'>".$excerpt."</p>
                                            <div class='head-info uk-navbar'>
                                                <div class='uk-navbar-left'>
                                                    <div>".$img."</div>
                                                    <div class='testimonails-meta'>
                                                        <h3 class='info-name'>".Themeton_Std::getmeta('input_name')."</h3>
                                                        <h4 class='info-position'>".Themeton_Std::getmeta('position')."</h4>
                                                    </div>
                                                </div>
                                                <div class='uk-navbar-right'>
                                                <div class='rate-border uk-flex uk-flex-middle'>
                                                    <div class='uk-grid uk-grid-collapse uk-text-right'>
                                                        <div class='uk-width-1-1'>".$rate."</div>
                                                        <div class='uk-width-1-1 rate-number'>".$star_number.".0/5</div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>";
            }
            if($theme_type == 'two_way_control'){
                
                $post_items .= "<div class='swiper-slide'>
                                    <section class='uk-flex-center uk-flex'>
                                        <div class='section-head uk-align-center'> 
                                            <p class='section-content $qoute_class'>".$excerpt."</p>
                                        </div>
                                    </section>
                                </div>";
            }
           
        }
        } 
        else {
            return "There is no <i>$post_type</i> posts. Please instert your posts in <i>$post_type</i> post type or select different post type.";
        }

        // reset query
        wp_reset_postdata();

        //custom post 
        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                
                $sub_title = isset($item['sub_title']) ? $item['sub_title'] : "";
                $sub_title = !empty($sub_title) ? " <p class='info-position'>$sub_title </p>" : "";

                $title = isset($item['title']) ? $item['title'] : "";
                $title = !empty($title) ? "<h3 class='info-title'>$title</h3>" : "";

                $content_text = isset($item['content_text']) ? $item['content_text'] : "";
                $content_text = !empty($content_text) ? "$content_text" : "";

                $atach_src = wp_get_attachment_image_src($image, 'full');
                $image = is_array($atach_src) ? $atach_src[0] : "";

                    $lists .= "<div class='swiper-slide'>
                                    <section class='uk-flex-center uk-flex'>
                                        <div class='section-head uk-align-center mb0'> 
                                            <p class='section-content qoute-center'>$content_text</p>
                                             <div class='head-info nxn-test'>
                                                $title
                                                $sub_title
                                            </div>
                                        </div>
                                    </section>
                                </div>";
            }
        }

        $item_result = '';
        if($input_type =='custom'){
            $item_result.= $lists;  
        }else{
            $item_result .= $post_items;
        }
        
        $bullets_html.='<div class="swiper-pagination"></div>';
        
        if ($bullets == 'hide') {
            $slider_bullets = '';
        }else{
            $slider_bullets = $bullets_html;
        }

        if($theme_type == 'boxed') $result = "<div class='nxt-testimonial boxed-style pl1@s pr1@s $extra_class' $data>
                        <div class='swiper-container testi-caraousel'>
                            <div class='swiper-wrapper'>
                                $item_result
                            </div>
                            $slider_arrows
                            $slider_bullets
                        </div>
                    </div>";
        if($theme_type == 'centered') $result = "<div class='nxt-testimonial $extra_class' $data>
                        <div class='swiper-container testi-caraousel'>
                            <div class='swiper-wrapper'>
                                $item_result
                            </div>
                            $slider_arrows
                            $slider_bullets
                        </div>
                    </div>";
        if($theme_type == 'two_way_control') $result = "<div class='nxt-testimonial-two $extra_class' $data>
                    <div class='swiper-container testi-caraousel'>
                        <div class='swiper-wrapper'>
                            $item_result
                        </div>
                        $slider_arrows
                    </div>
                    <div class='swiper-container gallery-thumbs'>
                        <div class='swiper-wrapper'>
                            $imagebullet
                        </div>
                    </div>
                </div>";
        if($theme_type == 'center_modern') $result = "<div class='nxt-testimonial $extra_class' $data>
                                        <div class='swiper-container testi-caraousel'>
                                            <div class='swiper-wrapper'>
                                                $item_result
                                            </div>
                                            $slider_arrows
                                            $slider_bullets
                                        </div>
                                    </div>";
        if($theme_type == 'car') $result = "<div class='nxt-testimonial nxt_car uk-container $extra_class' $data>
                                                <div class='swiper-container testi-caraousel'>
                                                    <div class='swiper-wrapper'>
                                                        $item_result
                                                    </div>
                                                    $slider_arrows
                                                </div>
                                                <div class='swiper-container gallery-thumbs'>
                                                    <div class='swiper-wrapper uk-width-1-2'>
                                                        $imagebullet1
                                                    </div>
                                                </div>
                                            </div>";
        if($theme_type == 'style4') $result = "<div class='nxt-testimonial $theme_type uk-container $extra_class' $data>
                                        <div class='swiper-container testi-caraousel'>
                                            <div class='swiper-wrapper'>
                                                $item_result
                                            </div>
                                            $slider_arrows
                                            $slider_bullets
                                        </div>
                                     </div>";
        if($theme_type == 'left') $result = "<div class='nxt-testimonial $theme_type uk-container $extra_class' $data>
                                        <div class='swiper-container testi-caraousel'>
                                            <div class='swiper-wrapper'>
                                                $item_result
                                            </div>
                                            $slider_arrows
                                            $slider_bullets
                                        </div>
                                  </div>";
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Testimonial carousel", 'themetonaddon'),
    "description" => esc_html__(" You can add content both custom and post ", 'themetonaddon'),
    "base" => "mungu_content_testimonial",
    "class" => "",
    "icon" => "mungu-vc-icon mungu-vc-icon28",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    "show_settings_on_create" => true,
    "params" => array(
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
            "type" => "dropdown",
            "param_name" => "arrows_position",
            "heading" => esc_html__("Arrows position", 'themetonaddon'),
            "value" => array(
                "Bottom right" => "bottom",
                "Middle right & left" => "middle",
                "Top right" => "top"
            ),
            "std" => "bottom",
            "dependency" => Array("element" => "arrows", "value" => array("show")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "qoute",
            "heading" => esc_html__("Quote icon", 'themetonaddon'),
            "value" => array(
                "Show" => "yes",
                "Hide" => "none"
            ),
            "std" => "yes",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "rating",
            "heading" => esc_html__("Rating", 'themetonaddon'),
            "value" => array(
                "Show" => "show",
                "Hide" => "hide"
            ),
            "std" => "hide",
            "dependency" => Array("element" => "input_type", "value" => array("post")),
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
        ),
        array(
            "type" => "dropdown",
            "param_name" => "bullets_style",
            "heading" => esc_html__("Bullet style", 'themetonaddon'),
            "value" => array(
                "Circle" => "circle",
                "Thumbnail image" => "thumb_image"
            ),
            "std" => "circle",
            "dependency" => Array("element" => "bullets", "value" => array("show")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "theme_type",
            "heading" => esc_html__("Layout", 'themetonaddon'),
            "value" => array(
                "Centered" => "centered",
                "left" => "left",
                "Boxed" => "boxed",
                "Car" => "car",
                "Centered Bottom Meta" => "center_modern",
                "Style 4" => "style4",
                "Thumbs Gallery With Two-way Control" => "two_way_control",
            ),
            "std" => "centered",
            "dependency" => Array("element" => "input_type", "value" => array("post")),
        ),
         array(
            "type" => "textfield",
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "dependency" => Array("element" => "input_type", "value" => array("post")),
            "value" => "12",
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '5'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "view_per",
            "heading" => esc_html__("Show preview", 'themetonaddon'),
            "value" => '1'
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'themetonaddon'),
            'param_name' => 'list',
            "dependency" => Array("element" => "input_type", "value" => array("custom")),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon')
                ),
                // title text
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title text', 'themetonaddon'),
                    'param_name' => 'title',
                    'value' => 'William Barel',
                    'holder' => 'div'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Sub title text', 'themetonaddon'),
                    'param_name' => 'sub_title',
                    'value' => 'Creative Designer'
                ),
                array(
                    'heading' => esc_html__('Content text', 'themetonaddon'),
                    'param_name' => 'content_text',
                    'value' => 'Lorem text',
                    'type' => 'textarea',
                ),
            )
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
                "Testimonials" => "testimonials",
                "Portfolio" => "portfolio",
                "Service" => "service",
                "Team" => "team",
                "Faq" => "faq",
                "Post" => "post",
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
) );