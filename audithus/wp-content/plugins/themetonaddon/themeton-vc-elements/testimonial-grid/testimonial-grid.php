<?php
if (!class_exists('WPBakeryShortCode_testimonial_grid')) {
class WPBakeryShortCode_testimonial_grid extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'style' => 'bordered',
            'layout' => 'grid',
            "post_type"   => "testimonial",
            'img_align' => 'left',  // value: left, mixed - horizontal
            'column' => '2',
            'input_type' => 'custom',
            'image_type' => 'featured',
            'list' => '',
            'count' => '6',
            'home_view' => 'yes',
            'carousel' => '',
            'quote' => 'yes',
            'excerpt_length'  => '7',
            'items' => '',
            'post_items' => '',
            'item_list' => '',
            'pager' => 'no',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'testimonial_grid', $atts );
        $class .= ' '.$css_class;
        $list = vc_param_group_parse_atts($list);

        $atts['img_align'] = $img_align;

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
                    'taxonomy' => $post_type.'_category',
                    'field' => 'slug',
                    'terms' => $cats
                )
            );
        }

        $meta_query = array();

        $args['meta_query'] = $meta_query;

        $posts_query = new WP_Query($args);
       
        $post_index = 1; $thumb_url = '';

        while ( $posts_query->have_posts() ) {

            $posts_query->the_post();
            $excerpt = $stars = $color_class = '';
            $count = 0;
            for( $i=0; $i < 5; $i++) {
              $color_class = '';
              if( $i < (int)Themeton_Std::getmeta('star') ) { $color_class = 'color-yellow'; $count++; }
            $stars .= "<span class='fa fa-star $color_class'></span>";
            }
            $rate = "<div class='rate uk-scrollspy'>
                        $stars
                      </div>";

            if(has_excerpt()) {
                $excerpt = get_the_excerpt();
            } else {
                $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );
            }
            $img = $img_thumb = '';
            if( has_post_thumbnail() ){
                $img = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), 'large', false, array('class'=>'img-responsive') );
                $img_thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), 'thumbnail', false, array('class'=>'img-responsive') );
                $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $thumb_url = !empty($thumb_url) ? $thumb_url[0] : '';
            }

            $thumb_class = $content_class ='';
            if (isset($home_view) && $home_view != 'yes') {
                $thumb_class.="uk-width-1-2@m uk-width-1-2@l";
                $content_class.="uk-width-1-2@m uk-width-1-2@l";
            }else{
                $thumb_class.="uk-width-1-3@m uk-width-1-3@l  home_view";
                $content_class.="uk-width-2-3@m  uk-width-2-3@l";
            }
            
            $meta_item='';
            $meta_items = Themeton_Std::getmeta_type_list('meta_option_name'); // return array     

            if(!empty($meta_items)){
                foreach ($meta_items as $item  ) {
                    $meta_item .= '<li>'.'<h4>'.$item['label'].'</h4>'.$item['content'];
                }
            }

            $left_content ="<div class='left-item'>
                                <a href='".get_the_permalink()."'>
                                    <div class='entry-thumb' data-bg-image='".$thumb_url."'>
                                        <div class='entry-hover'></div>
                                    </div>
                                </a>
                            </div>";              
            $right_content ="<div class='right-item uk-flex uk-flex-middle'> 
                                <div class='entry-meta '>
                                    <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>
                                    <p>".$excerpt."</p>
                                    <ul class='meta-details '>
                                        ".$meta_item."
                                    </ul>
                                     <a href='".get_the_permalink()."' class='uk-button uk-button-default mt2'> ".esc_html__('join now','themetonaddon')."</a>
                                </div> 
                             </div>";  


            $img_align = isset($atts['img_align']) && !empty($atts['img_align']) ? $atts['img_align'] : 'right';
            $leftimg='';
            if( $img_align=='mixed' && $post_index%2==0 ){
                $tmp = $left_content;
                $left_content = $right_content;
                $right_content = $tmp;
            }else{
                $leftimg.="left-img";
            }
            
            $service_icon_image ="<img src='".Themeton_Std::getmeta('icon_image') ."' class='icon_image' alt='".esc_html('icon','mungu')."'>";
            if($image_type == 'featured'){
                $img_html ="<a href='".get_the_permalink()."'>
                                <div class='entry-thumb uk-background-cover' data-bg-image='".$thumb_url."'>
                                    <div class='entry-hover'></div>
                                </div>
                            </a>";
            }else{
                $img_html="<div class='service-item featured_icon uk-flex uk-flex-center'>".$service_icon_image."</div>";
            }
            if($layout == 'list'){
                $quote_content = '';
                if ($quote=='yes') {
                    $quote_content = '<span class="quote-const uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path d="M17.27,7.79 C17.27,9.45 16.97,10.43 15.99,12.02 C14.98,13.64 13,15.23 11.56,15.97 L11.1,15.08 C12.34,14.2 13.14,13.51 14.02,11.82 C14.27,11.34 14.41,10.92 14.49,10.54 C14.3,10.58 14.09,10.6 13.88,10.6 C12.06,10.6 10.59,9.12 10.59,7.3 C10.59,5.48 12.06,4 13.88,4 C15.39,4 16.67,5.02 17.05,6.42 C17.19,6.82 17.27,7.27 17.27,7.79 L17.27,7.79 Z"></path> <path d="M8.68,7.79 C8.68,9.45 8.38,10.43 7.4,12.02 C6.39,13.64 4.41,15.23 2.97,15.97 L2.51,15.08 C3.75,14.2 4.55,13.51 5.43,11.82 C5.68,11.34 5.82,10.92 5.9,10.54 C5.71,10.58 5.5,10.6 5.29,10.6 C3.47,10.6 2,9.12 2,7.3 C2,5.48 3.47,4 5.29,4 C6.8,4 8.08,5.02 8.46,6.42 C8.6,6.82 8.68,7.27 8.68,7.79 L8.68,7.79 Z"></path></svg></span>';
                }
                $item_list .= "<div class='uk-grid uk-margin-large-bottom uk-border-rounded list'>
                                    <div class='".$thumb_class."'>
                                        $img_html
                                    </div>
                                    <div class='".$content_class." uk-flex uk-flex-middle'>
                                        <div class='entry-meta'>
                                            <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>
                                            ".$quote_content."<p>".$excerpt."</p>
                                            <h4>".Themeton_Std::getmeta('input_name') ."</h4>
                                            <span>".Themeton_Std::getmeta('position') ."</span>
                                        </div>
                                    </div>
                                </div>";
             }elseif ($layout=='horizantal') {
                 $item_list.="<div class='uk-grid uk-child-width-1-2 mixed-item $leftimg'>$left_content $right_content</div>";
             }
            if ($style == "default") {
                $post_items .= "<div class='uk-grid default-testimonail' data-starcount='".$count."'>
                <div class='uk-width-expand'><h4>".get_the_title()."</h4></div>
                <div class='uk-width-auto uk-flex-right default-star'>".$rate."</div>
                <div class='uk-width-1-1 default-testimonail-content'>
                ".get_the_content()."
                </div>
                </div>";
            }
            elseif ($style == 'icon_center') {
                $post_items .= "<div class='uk-grid uk-grid-collapse uk-flex-center icon-center-list'>
                                    <div class ='uk-width-1-1 uk-flex uk-flex-center icon-center-img'>
                                      ".$img."
                                    </div>
                                    <div class='icon-center-content uk-text-center uk-container-small'><p>".$excerpt."</p></div>
                                    <div class='icon-center-meta uk-text-center uk-width-1-1'>
                                        <h4>".Themeton_Std::getmeta('input_name') ."</h4>
                                        <span>".Themeton_Std::getmeta('position') ."</span>
                                    </div>
                                </div>";          
            }elseif($style =='bordered'){
                $post_items .= "<a href='".get_the_permalink()."' class='uk-grid-margin'>
                                    <div class='mungu-item ml1@s mr1@s'>
                                        <h2> ". get_the_title()."</h2>
                                         <p>".$excerpt."</p>
                                        <div class='profile_image'>
                                          ".$img."
                                        </div>
                                        <div class='testi-meta'>
                                            <h4>".Themeton_Std::getmeta('input_name') ."</h4>
                                            $rate
                                        </div>
                                    </div> 
                                </a>";
            }elseif($style == 'with_icon' ){
                $post_items .= "<div class='service-item uk-grid uk-grid-margin-medium'>
                                    <div class='uk-width-1-3 icon uk-flex uk-flex-center'>".$service_icon_image."</div>   
                                    <div class='uk-width-2-3 '>
                                        <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>
                                        <p>".$excerpt."</p> 
                                     </div>   
                                </div> ";

            }elseif($style == 'with_feature' ){
                $post_items .= "<div class='service-item uk-grid uk-grid-margin-medium uk-margin-large-top'>
                                     <div class='uk-width-1-4@m icon nxthost uk-flex uk-flex-center'>".$img_thumb."</div>   
                                     <div class='uk-width-3-4@m nxthosts'>
                                        <p>".$excerpt."</p> 
                                        <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>
                                        $rate
                                     </div>   
                                </div> ";
            }
            elseif ($style == 'meissa') {
                $carousel_start = $carousel_end = '';
                if ($carousel == 'yes') {
                    $carousel_start = '<div class="item mt3">';
                    $carousel_end = '</div>';
                }
                $post_items .= $carousel_start."<div class='meissa-testimonail-item p4 mb5'>
                    <div class='meissa-excerpt mb4 ml3@s'><p>".get_the_excerpt()."</p></div>
                    <div class='uk-flex uk-flex-middle'>
                        <div class='uk-width-auto thumb'>$img_thumb</div>
                        <div class='uk-width-expand ml2 pt1 details'>
                            <h4 class='mb0'>".Themeton_Std::getmeta('input_name')."</h4>
                            <span>".Themeton_Std::getmeta('position')."</span>
                        </div>
                    </div>
                </div>".$carousel_end;
            }
            else{
                $post_items .= "<div class='lined uk-grid-margin'>
                                    <div class='testi-meta'>
                                        <a href='".get_the_permalink()."' class='awatar-icon'> ".$img."</a>
                                        <div class='meta-detials uk-flex uk-flex-middle'>   
                                            <h4>".Themeton_Std::getmeta('input_name') ."</h4>
                                            $rate
                                        </div>     
                                    </div>
                                    <div class='testi-text'>".$excerpt."</div>
                                </div>";
            }
            $post_index ++;
            }
        $pagination = '';
        $pager_result = '';
        if( $pager=='yes' ){    
            $arg = null;
            if (Themeton_Std::getopt('mungu_skin')=='model') $arg = array(
                'prev' => '<span class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="13 16 7 10 13 4"></polyline></svg></span>',
                'mungu' => '<span class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16"></polyline></svg></span>',
                'number_style' => '01'
                );
            $pagination = Themeton_Tpl::pagination($posts_query,false,$arg);
            if( !empty($pagination) ){
                if ($arg!=NULL) $pager_result .= "<div data-number-style='yes' class='uk-width-1-1@ uk-flex uk-flex-center'>$pagination</div>";
                else "<div class='uk-width-1-1@ uk-flex uk-flex-center'>$pagination</div>";
            }
        }
        else{
            $pagination;
        }
        // reset query
        wp_reset_postdata();

        //custom post 
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
                $items .= "<div class='mungu-item custom-item '>
                                <div class='profile_image'>
                                    <img src='".$image."' alt='".esc_attr('image','mungu')."'>
                                </div>
                                $quote_text
                                $f_name
                                $job
                            </div>";
            }
        }
        $result = $item_result = ''; 

        if($input_type =='custom'){
            $item_result.= $items;  
        }else{
            $item_result .= $post_items;
        }

        if($layout =='grid'){
            if ($style == 'meissa' && $carousel == 'yes') {
                $result = '<div class="meissa-owl owl-carousel owl-theme '.$class.'">'.$post_items.'</div>';
                return $result;
            }
            if ($style == 'meissa') $result .= "<div class='mungu-element meissa-testimonail uk-scrollspy uk-grid uk-child-width-1-".$column."@m uk-child-width-1-1@s $class' id='testimonial_grid'>
            ".$item_result."
            $pager_result
        </div>";
            else $result .= "<div class='mungu-element testi-item uk-scrollspy uk-grid uk-grid-medium uk-child-width-1-".$column."@m uk-child-width-1-1@s $class' id='testimonial_grid'>
                            ".$item_result."
                            $pager_result
                        </div>";
                    }
        elseif($layout=='horizantal'){
                $result.="<div class='horizantal-item uk-scrollspy $class'>
                            $item_list
                            $pager_result
                        </div>";
            }
        else{
           $result .="<div class='nxt-testimonial-list uk-scrollspy $class'>
                        $item_list
                        $pager_result
                    </div>";
        }

        // return result
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('All Post Types', 'themetonaddon'),
    "description" => esc_html__("You can show Grid and List post types including portfolio,testimonials etc.", 'themetonaddon'),
    "base" => 'testimonial_grid',
    "content_element" => true,
    "category" => 'Themeton',
    "icon" => "mungu-vc-icon mungu-vc-icon84",
    "class" => 'mungu-vc-element',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "input_type",
            "heading" => esc_html__("Content type", 'themetonaddon'),
            "value" => array(
                "Custom data" => "custom",
                "From post type" => "post" 
            ),
            "std" => "custom",
            "holder" => "div",
        ), 
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Layout", 'themetonaddon'),
            "value" => array(
                "Grid" => "grid",
                "List" => "list",
                "Horizantal" => "horizantal"
            ),
            "std" => "grid",
            "dependency" => Array("element" => "input_type", "value" => array("post")),
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
            "dependency" => Array("element" => "layout", "value" => array("list")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "img_align",
            "heading" => esc_html__("Image align", 'themetonaddon'),
            "value" => array(
                "Left" => "left",
                "Mixed" => "mixed"
            ),
            "std" => "left",
            "dependency" => Array("element" => "layout", "value" => array("horizantal")),
        ),
        array(
            "type" => "checkbox",
            "param_name" => "home_view",
            "heading" => esc_html__("Thumbnail image small", 'themetonaddon'),
            "value" => array('Yes' => 'yes' ),
            "std"   => "yes",
            "dependency" => Array("element" => "layout", "value" => array("list")),
        ),
        array(
            "type" => "checkbox",
            "param_name" => "quote",
            "heading" => esc_html__("Quote", 'themetonaddon'),
            "value" => array('Yes' => 'yes' ),
            "std"   => "yes",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                "Default" => "default",
                "Bordered" => "bordered",
                "With icon" => "with_icon",
                "Lined" => "lined",
                "With Feature" => "with_feature",
                "Top icon Center content" => "icon_center",
                "Meissa Agency" => "meissa"
            ),
             "dependency" => Array("element" => "layout", "value" => array("grid")),
            "std" => ""
        ),
        array(
            "type" => "checkbox",
            "param_name" => "carousel",
            "heading" => esc_html__("Carousel", 'themetonaddon'),
            "value" => array('Yes' => 'yes' ),
            "dependency" => Array("element" => "style", "value" => array("meissa")),
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "post_type",
            "heading" => esc_html__("Post Type", 'themetonaddon'),
            "dependency" => Array("element" => "input_type", "value" => array("post")),
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
            "std" => "testimonial",
            "holder" => "div"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "column",
            "heading" => esc_html__("Column", 'themetonaddon'),
            "value" => array(
                "1 Column" => 1,
                "2 Column" => 2,
                "3 Column" =>3,
                "4 Column" => 4,
            ),
            "std" => "0",
            "dependency" => Array("element" => "layout", "value" => array("grid")),
        ),
        array(
            "type" => "textfield",
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "dependency" => Array("element" => "input_type", "value" => array("post")),
            "value" => "12",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "pager",
            "heading" => esc_html__("Pagination", 'themetonaddon'),
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
            "std" => "no",
             "dependency" => Array("element" => "input_type", "value" => array("post")),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '6'
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
                    'heading' => esc_html__('Job', 'themetonaddon'),
                    'param_name' => 'job',
                    'value' => 'Designer',
                ),
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon'),
                    "std" => "show",
                ),
                array(
                    'type' => 'textfield',
                    "param_name" => "quote_text",
                    "heading" => esc_html__("Quote Text", 'themetonaddon'),
                    "value" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.",
                    "std" => "show",
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
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));
