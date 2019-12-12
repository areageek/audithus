<?php
if (!class_exists('WPBakeryShortCode_Mungu_Portfolio')) {
class WPBakeryShortCode_Mungu_Portfolio extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            'column' => '3',
            'filter' => 'no',
            'pager' => 'no',
            'layout' => 'grid',
            'hoverstyle' => 'layla',
            'categories' => '',
            'post_type' => 'portfolio',
            'space' => 'uk-grid-medium',
            'excerpt_length'  => '5',
            'title_position'=>'bottom',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_portfolio', $atts );
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
        $filter_html ='';
        $posts_query = new WP_Query($args);
        if ($posts_query->have_posts()) {
            while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excerpt_length ) );

            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
            }
          
             // Categories
            $cats = '';
            $last_cat = '';
            $cat_title = '';
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), $post_type.'_category');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;

                $cat_titles []= $cat_title;
                if( $filter=='yes' && !in_array($term->term_id, $cat_array) ){
                    $filter_html .= '<li><a href="javascript:;" class="filter-item" data-filter=".'.$cat_slug.'">'. $cat_title .'</a></li> ';
                    $cat_array[] = $term->term_id;
                }

                $cats .= "$cat_slug ";
                $last_cat = $cat_title;
            }
       
            $title_positions = $hoverstylehtml='';

            if($hoverstyle == 'layla'){
                $hoverstylehtml.="<figure><figcaption>
                                  <p class='uk-flex uk-flex-center'>$excerpt </p>
                                  <a href='".get_the_permalink()."'><i class='uk-icon'><svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 20 20'> <rect x='9' y='1' width='1' height='17'></rect> <rect x='1' y='9' width='17' height='1'></rect></svg></i></a>
                                </figcaption></figure>";
            }else{
                $hoverstylehtml.='<div class="entry-hover uk-flex uk-text-center uk-flex-middle uk-animation-toggle">
                                    <div class="port-meta uk-position-center">
                                        <h3 class="uk-animation-slide-bottom-small animation-delay-01"><a href="'.get_the_permalink().'">' .get_the_title(). '</a></h3>
                                        <span class="uk-animation-slide-bottom-small animation-delay-03">' . $cat_title . '</span>

                                    </div>
                                    <a href=" ' .get_the_permalink().' " class="more_btn">
                                    <i class="uk-icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20"> <rect x="9" y="1" width="1" height="17"></rect> <rect x="1" y="9" width="17" height="1"></rect></svg></i>
                                    </a>
                                </div>';
            }  
        
            if($title_position == 'bottom'){
                   $title_positions.="<a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>" ;
            }
            else{
                $title_positions = '';
            }
            $items .= "<div class='portfolio-items $cats'>
                            <div class='gallery-item'>
                                <div class='portfolio-item' data-bg-image='".$img."'>
                                </div>
                                $hoverstylehtml
                            </div>
                            $title_positions
                       </div>";
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
                $pager_result .= "<div class='uk-width-1-1@ uk-flex uk-flex-center'>$pagination</div>";
            }
        }
        else{
            $pagination;
        }

        $filter_htmls='';
        if( strpos($filter, 'yes') > -1 ){
            $filterclass = 'uk-flex uk-flex-center';
            if($filterclass == 'yesdrop') { $filterclass = 'uk-flex uk-flex-right filter-dropdown'; }
            $filter_htmls = "<div class='portfolio-filter $filterclass'>
                                <ul class='filter'>
                                    <li class='active'><a href='#' data-filter='*'>".esc_attr__('All', 'themetonaddon')."</a></li>
                                    $filter_html
                                </ul>
                            </div>";
        }else{
            $filter_htmls = "";
        } 

        // reset query
        wp_reset_postdata();
        // filter
        return "<div class='portfolio-section'>
                     $filter_htmls
                    <div class='mungu-element portfolio-element $space  uk-child-width-1-".$column."@m uk-child-width-1-1@s $extra_class'>
                        $items
                    </div>
                    $pager_result
                </div>";
    }
}
}

vc_map( array(
    "name" => esc_html__('Portfolio', 'themetonaddon'),
    "description" => esc_html__("post type: portfolio", 'themetonaddon'),
    "base" => 'mungu_portfolio',
    "icon" => "mungu-vc-icon mungu-vc-icon27",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(

        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '8'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Layout", 'themetonaddon'),
            "value" => array(
                "Mosanry" => "mosanry",
                "Grid" => "grid"
            ),
            "std" => "grid",
            "admin_label" => true
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
            "admin_label" => true,
            "dependency" => Array("element" => "layout", "value" => array("grid")),
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
            "type" => "dropdown",
            "param_name" => "filter",
            "heading" => esc_html__("Filter", 'themetonaddon'),
            "value" => array(
                "No" => "no",
                "Yes" => "yes",
                "Yes, Dropdown" => "yesdrop"
            ),
            "std" => "no"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "title_position",
            "heading" => esc_html__("Title position", 'themetonaddon'),
            "value" => array(
                "Bottom" => "bottom",
                "None" => "none"
            ),
            "std" => "bottom"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "space",
            "heading" => esc_html__("Grid space", 'themetonaddon'),
            "value" => array(
                "Small" => "uk-grid-small",
                "Medium" => "uk-grid-medium",
                "Large" => "uk-grid-large",
                "Collapse" => "uk-grid-collapse",
                "Stack" => "uk-grid-stack",
            ),
            "std" => "bottom"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "hoverstyle",
            "heading" => esc_html__("Hover style", 'themetonaddon'),
            "value" => array(
                "Boxed" => "layla",
                "Darken" => "darken"
            ),
            "std" => "layla"
        ),
        array(
            "type" => "textfield",
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "value" => "5",
          
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