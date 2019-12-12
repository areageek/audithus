<?php
if (!class_exists('WPBakeryShortCode_Mungu_cause')) {
class WPBakeryShortCode_Mungu_cause extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            'column' => '2',
            'layout' => 'list',
            'pager' => 'no',
            'post_type' => 'cause',
            'categories' => '',
            'excerpt_length'  => '25',
            'title_position'=>'bottom',
            'causetitle'=>'hide',
            'title'=>'Urgent Donations',
            'morelink'=>'Full Causes',
            'link'=>'#',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_cause', $atts );
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
        $grid_class = '';
        $img = '';
        $posts_query = new WP_Query($args);
        if($posts_query->have_posts()) {
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                $img_html='';
                if( has_post_thumbnail() ){
                    $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    $img = !empty($img) ? $img[0] : '';
                    $img_html ="<div class='cause-thumb  uk-background-cover uk-background-norepeat uk-background-center-center' data-bg-image='".$img."'><div class='entry-hover'></div></div>";
                }
                // Categories
                $cat_titles = array();
                $terms = wp_get_post_terms(get_the_ID(), 'cause_category');
                foreach ($terms as $term){
                    $cat_title = $term->name;
                    $cat_slug = $term->slug;
                    $cat_titles []= $cat_title;
                    }        
                $meta_item  = '';
                 
                $meta_items = Themeton_Std::getmeta_type_list('meta_option_name'); // return array     

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
                    $items.="<div class='uk-grid uk-margin-medium uk-width-1-1'>
                                <div class='uk-width-1-2@m uk-width-1-2@l uk-position-relative'>
                                    <a href='".get_the_permalink()."'>".$img_html."</a>
                                </div>
                                <div class='uk-width-1-2@m uk-grid uk-width-1-2@l uk-padding pl6 '>
                                    <div class='entry-meta '>
                                        <h3>".get_the_title()."</h3>
                                        <b>".Themeton_Std::getmeta('donations_percent')." </b> <span>".esc_attr('from','mungu')." ".Themeton_Std::getmeta('donators')."</span>   
                                        <p>".$excerpt."</p>
                                        <div class='uk-grid'>
                                            <div class='uk-width-auto@m uk-flex-middle uk-flex meta-details'>
                                            <b>".esc_attr('Goal:','mungu')."</b>
                                            <span>
                                             ".Themeton_Std::getmeta('donations_goal')."   |    ".Themeton_Std::getmeta('raised')." ".esc_attr('RAISE','mungu')." 
                                            </span> 
                                            </div>
                                            <div class='uk-width-expand meta-details-r'>
                                                <a href='".get_the_permalink()."' class='uk-button uk-button-default uk-flex-right'> ".esc_html__('Donate','themetonaddon')." </a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>";
                }else{
                    $items.="<div class='uk-grid-margin uk-margin-large-bottom'>
                                <div class='cause-grid-item uk-position-relative'> 
                                    <a href='".get_the_permalink()."'>".$img_html."</a>
                                    <div class='entry-meta  pt2'>
                                        <h3>".get_the_title()."</h3>
                                        <b>".Themeton_Std::getmeta('donations_percent')." </b> <span>".esc_attr('from','mungu')." ".Themeton_Std::getmeta('donators')."</span>   
                                        <div class='uk-grid mt3'>
                                            <div class='uk-width-auto@m uk-flex-middle uk-flex meta-details'>
                                            <b>".esc_attr('Goal:','mungu')."</b>
                                            <span>
                                                ".Themeton_Std::getmeta('donations_goal')."  |  ".Themeton_Std::getmeta('raised')." ".esc_attr('RAISE:','mungu')." 
                                            </span> 
                                            </div>
                                            <div class='uk-width-expand meta-details-r'>
                                                <a href='".get_the_permalink()."' class='uk-button-default'>".esc_attr('Donate','mungu')."</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $grid_class .="uk-grid-medium uk-grid uk-child-width-1-".$column."@m  uk-child-width-1-1@s";
        }
        else{
            $grid_class.='cause-item';
        }
        $causetitlehtml = '';    
        if($causetitle=='show'){
            $causetitlehtml .= "<div class='uk-grid uk-child-width-1-2'>
                                    <div class='moretitle text-strong'>".$title."</div>
                                    <div class='morelink uk-text-right uk-flex-right uk-flex uk-flex-middle'> 
                                        <a href='".$link."'>".$morelink."
                                            <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' data-name='icon arrow' x='0px' y='0px' viewBox='0 0 50 50' style='' xml:space='preserve' width='30px' height='30px' class='default-arrow-next uk-scrollspy-inview ml1'>
                                                <path style='fill:none;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;' d='M46.525,25L2.025,25' class='yGXnEgOA_0 uk-scrollspy-inview-hover'></path>
                                                <path style='fill:none;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;' d='M38.025,35L47.625,25L38.025,15' class='yGXnEgOA_1 uk-scrollspy-inview-hover'></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>";
        }  

        return "<div class='mungu-cause-item'>
                    $causetitlehtml
                </div>
                <div class='mungu-cause-item $grid_class $extra_class'>
                    $items
                    $pager_result
                </div>";
    }
}
}

vc_map( array(
    "name" => esc_html__('Cause Posts', 'themetonaddon'),
    "description" => esc_html__("Only post type: cause", 'themetonaddon'),
    "base" => 'mungu_cause',
    "icon" => "mungu-vc-icon mungu-vc-icon53",
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
            'type' => 'dropdown',
            "param_name" => "causetitle",
            "heading" => esc_html__("Title ", 'themetonaddon'),
            "value" => array(
                "Show" => "show",
                "Hide" => "hide"
            ),
            "std" => "hide",
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
            "type" => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Title text", 'themetonaddon'),
            "value" => 'Urgent Donations',
            "dependency" => Array("element" => "causetitle", "value" => array("show"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "morelink",
            "heading" => esc_html__("More link name", 'themetonaddon'),
            "value" => 'Full Causes',  
            "dependency" => Array("element" => "causetitle", "value" => array("show"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "link",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '#',
            "dependency" => Array("element" => "causetitle", "value" => array("show"))
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
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));