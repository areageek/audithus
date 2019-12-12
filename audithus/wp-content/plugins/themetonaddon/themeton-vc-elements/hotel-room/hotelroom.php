<?php
if (!class_exists('WPBakeryShortCode_Mungu_hotelroom')) {
class WPBakeryShortCode_Mungu_hotelroom extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            'column' => '2',
            'reservation_url' => '',
            'layout' => 'list',
            'pager' => 'no',
            'categories' => '',
            'excerpt_length'  => '25',
            'post_type' => 'hotelroom',
            'title_position'=>'bottom',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_hotelroom', $atts );
        $extra_class .= ' '.$css_class;
        $reservation_url = esc_url( $reservation_url );
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
        $grid_class = '';
        $img = '';
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $img_html='';
            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
                $img_html ="<div class='hotel-room-thumb' data-bg-image='".$img."'><div class='entry-hover'></div></div>";
            }
            // Categories
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;
                $cat_titles []= $cat_title;
                }        
            $meta_item  = $stars = '';
            for( $i=0; $i < 5; $i++) {
              $color_class = '';
              if( $i < (int)Themeton_Std::getmeta('star') ) { $color_class = 'color-yellow'; }
                $stars .= "<span class='fa fa-star $color_class'></span>";
            }

            $rate ="<div class='rate uk-scrollspy'>
                        $stars
                    </div>";    
             $meta_items = Themeton_Std::getmeta_type_list('meta_option_name'); // return array     
            $data_content = '';
            $data_content = 'link='.get_the_permalink();
            if(!empty($meta_items)){
                foreach ($meta_items as $item  ) {
                    $meta_item .= '<li>'.'<span>'.$item['label'].'</span>'.'&nbsp;'.$item['content'];
                }
            }

            if(has_excerpt()) {
                $excerpt = get_the_excerpt();
            } else {
                $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length));
            }

            if($layout == 'list'){
                $items.="<div class='uk-grid uk-margin-medium'>
                            <div class='uk-width-1-2@m uk-width-1-2@l'>
                                <a href='".get_the_permalink()."'>".$img_html."</a>
                            </div>
                            <div class='uk-width-1-2@m uk-grid uk-width-1-2@l uk-padding pl6'>
                                <div class='entry-meta'>
                                    <h3>".get_the_title()."</h3>
                                    ".$rate."
                                    <p>".$excerpt."</p>
                                    <div class='uk-grid uk-child-width-1-2 uk-padding uk-padding-remove-bottom'>
                                        <ul class='meta-details '>
                                            ".$meta_item."
                                        </ul>
                                        <div class='meta-details-r'>
                                            <span>".esc_html__('Starts from','themetonaddon')."</span>
                                            <p class='price'>".Themeton_Std::getmeta('room_price')."</p>
                                            <a href='".$reservation_url."?".$data_content."' class='uk-button uk-button-default mt2'> ".esc_html__('book now','themetonaddon')."</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  ";
            }else{
                $items.="<div class='uk-grid-margin uk-margin-large-bottom'>
                            <div class=' hotel-grid-item'> 
                                <a href='".get_the_permalink()."'>".$img_html."</a>
                                <div class='entry-meta uk-padding pl6 pt6'>
                                    <h3>".get_the_title()."</h3>
                                    ".$rate."
                                    <div class='uk-grid uk-child-width-1-2 uk-padding pt2'>
                                        <ul class='meta-details '>
                                            ".$meta_item."
                                        </ul>
                                        <div class='meta-details-r'>
                                            <span>".esc_html__('Starts from','themetonaddon')."</span>
                                            <p class='price'>".Themeton_Std::getmeta('room_price')."</p>
                                            <a href='".$reservation_url."?".$data_content."' class='uk-button uk-button-default mt2'> ".esc_html__('book now','themetonaddon')."</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
            }
        }
        // Pager
        $pagination = '';
        $pager_result = '';
        if( $pager=='yes' ){
            $pagination = Themeton_Tpl::pagination($posts_query);
            if( !empty($pagination) ){
                $pager_result .= "<div class='pagination-container uk-flex uk-flex-center uk-width-1-1@m'>$pagination<div class='uk-clearfix clearfix'></div></div>";
            }
        }
        else{
            $pagination;
        }
        // reset query
        wp_reset_postdata();
        // filter
        $grid_class.='';
        if($layout == 'grid'){
            $grid_class .=" uk-grid uk-grid-medium uk-child-width-1-".$column."@m uk-child-width-1-1@s";
        }
        else{
            $grid_class.='hotel-item';
        }

        return "<div class='uk-scrollspy $grid_class $extra_class'>
                    $items
                    $pager_result
                </div>";
    }
}
}

vc_map( array(
    "name" => esc_html__('Hotel room', 'themetonaddon'),
    "description" => esc_html__("post type: hotel room", 'themetonaddon'),
    "base" => 'mungu_hotelroom',
    "icon" => "mungu-vc-icon mungu-vc-icon75",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            'type' => 'dropdown',
            "param_name" => "layout",
            "heading" => esc_html__("layout", 'themetonaddon'),
            "value" => array(
                "List" => "list",
                "Grid" => "grid"
            ),
            "std" => "list",
            "holder"=>"div"
        ),
        array(
            "type" => 'textfield',
            "param_name" => "column",
            "heading" => esc_html__("Column", 'themetonaddon'),
            "value" => '2',
            "dependency" => Array("element" => "layout", "value" => array("grid"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '6'
        ), 
        array(
            "type" => 'textfield',
            "param_name" => "reservation_url",
            "heading" => esc_html__("Reservation Page url", 'themetonaddon'),
            "value" => ''
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
            "value" => "7",
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