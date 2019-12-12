<?php

if (!class_exists('WPBakeryShortCode_mungu_masonry')) {
class WPBakeryShortCode_mungu_masonry extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        // Initial argument sets
        $shortcode_atts = shortcode_atts(array(
            
            "gap" => '0',
            "columns" => '4',
            "count" => '6',
            "post_type" => 'post',
            "categories" => '',
            "filter" => 'no',
            "title" => '1',
            "excerpt" => '10',
            "date" => '1',
            "cat" => '1',
            "author" => '1',
            "align" => 'left',
            "pagination" => '0',
            "excludes" => '',
            'extra_class' => '',
            'css' => ''
        ), $atts);
        
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_masonry', $atts );
        $extra_class .= ' '.$css_class;
        extract($shortcode_atts);

        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }

        $style="masonry";

        // Initial query sets
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => abs($count),
            'ignore_sticky_posts' => true,
            'paged' => $paged,
            'orderby' => 'menu_order',
            'order'   => 'ASC',
        );

        if( !empty($excludes) ){
            $printed = isset($args['post__not_in']) ? $args['post__not_in'] : array();
            $args['post__not_in'] = array_merge(explode(",", $excludes), $printed);
        }

        // Include categories
        $tax_name = Themeton_Std::get_taxonomy_post_type($post_type);
        if( !empty($categories) ){
            $categories = str_replace(' ', '', $categories);
            $cats = explode( ',', $categories );
            if($post_type !== 'post') {
                $args['tax_query'] = array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => $tax_name,
                        'field' => 'slug',
                        'terms' => $cats
                    )
                );
            } else {
                $args['category_name'] = $cats;
            }
        }

        // Exclude posts
        global $themeton_exclude_posts;
        if( !empty($themeton_exclude_posts) && Themeton_Std::get_mod('unique_posts') == '1' ){
            $args['post__not_in'] = $themeton_exclude_posts;
        }

        if( !empty($excludes)){
            if((int)$excludes >= 0) {
                $printed = isset($args['post__not_in']) ? $args['post__not_in'] : array();
                $args['post__not_in'] = array_merge(explode(",", $excludes), $printed);
            } else {
                $args['posts_per_page'] = abs($count) + abs($excludes);
            }
        }

        // Varialbe declares
        $result = '';

        // Query posts loop
        $posts_query = new WP_Query($args);

        if($posts_query->have_posts()) {
            $themeton_exclude_posts[] = $posts_query->post->ID;
            $result .= mungu_masonry_get_posts($posts_query, $shortcode_atts );
        } else {
            $description = '';
            if(Themeton_Std::get_mod('unique_posts') == '1'){ $description = esc_attr__('Consider to turn off Unique posts option.', 'themetonaddon');}
            else { $description =  esc_attr__('Please make sure you are added enough posts into your selected category.', 'themetonaddon'); }
            return esc_attr__('No posts found!', 'themetonaddon') . ' ' . $description;
        }

        $themeton_exclude_posts = array_unique($themeton_exclude_posts);

        // Reset query
        wp_reset_postdata();

        if($gap == '1') {$extra_class .= " masonry-gap";}
        
        $paginationmarkup = '';
        if($pagination == '1') {
            $paginationmarkup = Themeton_Tpl::pagination($posts_query, $pagination);
            $paginationmarkup = "<div class='el-query-data' style='display:none;'>$el_query_data</div>
                <div class='el-atts-data' style='display:none;'>$el_args_data</div>
                <div class='el-pagination'>$paginationmarkup</div>";
        }
        // Final result

        $el_query_data = urlencode( json_encode($args) );
        $el_args_data = urlencode( json_encode($shortcode_atts) );

        return "<div class='mungu-el-cart'>
            <div class='masonry-grid-$columns mungu-card-$style $extra_class'>
                $result
            </div>
            <div class='clearfix'></div>
            $paginationmarkup
        </div>";
    }
}
}


function mungu_masonry_get_posts( $posts_query, $args = false ){
    global $themeton_exclude_posts;

    $shortcode_atts = array(

        "gap" => '0',
        "columns" => '4',
        "count" => '6',
        "post_type" => 'post',
        "categories" => '',
        "filter" => 'no',
        "title" => '1',
        "excerpt" => '10',
        "date" => '1',
        "cat" => '1',
        "author" => '1',
        "align" => 'left',
        "pagination" => '0',
        "excludes" => '',
        "extra_class" => '',

    );

    if( $args!==false ){
        $shortcode_atts = shortcode_atts($shortcode_atts, $args);
    }

    extract($shortcode_atts);

    $index = 0;
    $result = '';

    while ( $posts_query->have_posts() ) {
        $posts_query->the_post();

        $index++;
        // Skip posts if specified minus number on the exclude field
        if($index <= abs($excludes) && (int)$excludes < 0) continue;

        global $post;

        // Unique posts
        $themeton_exclude_posts[] = $post->ID;

        $shape = (Themeton_Std::getmeta('masonryshape') != '') ? Themeton_Std::getmeta('masonryshape') : '1x1';
        $ratio = $shape == '2x2' ? '1x1' : $shape;

        $hoverstyle = 'fade';
        if($post_type == 'team') {
            $hoverstyle = 'fade';
        }
        // Post thumbnail image & detail markups
        $thumbnail = "<div class='uk-card-media-top'>".Themeton_Tpl::get_post_media('large', $ratio, $hoverstyle)."</div>";

        // Title
        $titlemarkup = $title == '1' ? "<h3 class='uk-card-title'><a href='".get_permalink()."'>".get_the_title()."</a></h3>" : "";
        
        // Exceprt
        $excerptmarkup = '';
        if($excerpt !== '0'){
            if(has_excerpt()) {
                $excerptmarkup = "<p>".wp_trim_words(get_the_excerpt(), abs($excerpt))."</p>";
            } else {
                $excerptmarkup = "<p>".Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content($post->ID))), abs($excerpt) ) )."</p>";
            }
        }

        // Preparing card meta details
        $datemark = $date == '1' ? "<span class='date'><a href='".get_permalink()."'>".get_the_date()."</a></span>" : '';
        $catmark = '';
        if($cat == '1'){
            $category = get_the_category();
            if(isset($category[0]) && $category[0]->cat_name) {
                $catmark = "<span class='cat'><a href='".get_permalink()."'>".$category[0]->cat_name."</a></span>";
            }
        }
        $author = $views = $comment = $style = $separator = $pagination = '';

        $authormark = '';
        if($author == '1'){
            $authormark = "<span class='author'>".get_the_author_meta( 'display_name', $post->post_author )."</span>";
            if($authorimage == '1') { 
                $authormark = "<span class='authorimage'>".get_avatar($post->post_author, 35, '', esc_attr__( 'Avatar', 'themetonaddon' ), array('class'=>'uk-border-circle'))." $authormark</span>";
            }
        }

        $viewsmark = $views == '1' ? "<span class='views'><a href='".get_permalink()."'><span class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path d='M6,18.71 L6,14 L1,14 L1,1 L19,1 L19,14 L10.71,14 L6,18.71 L6,18.71 Z M2,13 L7,13 L7,16.29 L10.29,13 L18,13 L18,2 L2,2 L2,13 L2,13 Z'></path></svg></span> ".get_comment_count( get_the_id() )['approved']."</a></span>" : '';
        $commentmark = $comment == '1' ? "<span class='comment'><a href='".get_permalink()."/#comments'><span class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path d='M6,18.71 L6,14 L1,14 L1,1 L19,1 L19,14 L10.71,14 L6,18.71 L6,18.71 Z M2,13 L7,13 L7,16.29 L10.29,13 L18,13 L18,2 L2,2 L2,13 L2,13 Z'></path></svg></span> ".get_comments_number()."</a></span>" : '';

        // Meta details combining
        $metamarkup = "<div class='meta-details'>$datemark $catmark $authormark $viewsmark $commentmark</div>";

        $post_class = "post-id-".implode(" ", get_post_class($post->ID));
        $hovercontent = "<div class='uk-position-bottom-left uk-overlay uk-light uk-animation-slide-bottom'>$titlemarkup$excerptmarkup$metamarkup</div>";

        if($post_type == 'team') {
            $data = Themeton_Std::getmeta_type_list('dymanicdata');
            $metamarkup = '';
            foreach ($data as $key => $value) {
                if(isset($value['label']) && $value['label'] !== '') {
                    if(Themeton_Tpl::check_social_link($value['label'])) {
                        $metamarkup .= "<a href='".$value['content']."' class='fa fa-".strtolower($value['label'])."'></a>";
                    }
                }
            }
            if($metamarkup !== '') $metamarkup = "<div class='menu-social'>$metamarkup</div>";
            $position = Themeton_Std::getmeta('position');
            if($position != '') {
                $metamarkup = "<p>$position</p>$metamarkup";
            }

            $hovercontent = "<div class='uk-position-center uk-overlay uk-light uk-text-center text-light'>$titlemarkup$metamarkup</div>";

        }
        // Builing cards markup
        $result .= "<div class='masonry-item masonry-item-$shape $post_class uk-animation-toggle'>
                $thumbnail
                $hovercontent
            </div>";
    }

    return $result;
}


add_action('wp_ajax_mungu_masonry_get_posts', 'mungu_masonry_get_posts_hook');
add_action('wp_ajax_nopriv_mungu_masonry_get_posts', 'mungu_masonry_get_posts_hook');

function mungu_masonry_get_posts_hook(){
    
    if( isset($_POST['page'],$_POST['args'],$_POST['atts']) ){
        $page = abs($_POST['page']) + 1;
        $args = (array)json_decode( urldecode($_POST['args']) );
        $atts = (array)json_decode( urldecode($_POST['atts']) );

        $args['paged'] = $page;
        $posts_query = new WP_Query($args);
        if( $posts_query->have_posts() ){
            $result = mungu_masonry_get_posts($posts_query, $atts );
            echo json_encode(array(
                'status' => '1',
                'page' => $page,
                'result' => $result
            ));
        }
        else{
            echo json_encode(array(
                'status' => '0'
            ));
        }
    }
    
    exit;
}

vc_map( array(
    "name" => esc_html__('Masonry Posts', 'themetonaddon'),
    "description" => esc_html__("Posts in columns", 'themetonaddon'),
    "base" => "mungu_masonry",
    "icon" => "mungu-vc-icon mungu-vc-icon44",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        
        array(
            "type" => 'checkbox',
            "param_name" => "gap",
            "heading" => esc_html__("Gap space", 'themetonaddon'),
            "value" => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "0",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "columns",
            "heading" => esc_html__("Columns", 'themetonaddon'),
            "value" => array(
                "3 Columns" => "3",
                "4 Columns" => "4",
                "5 Columns" => "5",
                "6 Columns" => "6"
            ),
            "std" => "4",
            "holder" => "div"
        ),
        array(
            "type" => "textfield",
            "param_name" => "count",
            "heading" => esc_html__("Posts Limit", 'themetonaddon'),
            "value" => "6"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "post_type",
            "heading" => esc_html__("Post Type", 'themetonaddon'),
            "value" => array('portfolio' => 'portfolio', ) //Themeton_Tpl::get_post_types(true),
        ),

        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Specify category SLUG (not name) or leave blank to display items from all categories. Ex: news,image.", 'themetonaddon'),
            "value" => '',
            "holder" => "div"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "filter",
            "heading" => esc_html__("Filter", 'themetonaddon'),
            "value" => array(
                "No filter" => "no",
                "Category filter" => "category",
                "Tag filter" => "tags",
            ),
            "std" => "no"
        ),
        array(
            "type" => 'checkbox',
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1"
        ),
        array(
            "type" => 'textfield',
            "param_name" => "excerpt",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "description" => esc_html__("Word count. Zero (0) presents no excerpt.", 'themetonaddon'),
            'value' => '0',
            "std" => "10"
        ),
        array(
            "type" => 'checkbox',
            "param_name" => "date",
            "heading" => esc_html__("date", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1"
        ),
        array(
            "type" => 'checkbox',
            "param_name" => "cat",
            "heading" => esc_html__("Category", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1"
        ),
        array(
            "type" => 'checkbox',
            "param_name" => "author",
            "heading" => esc_html__("Author", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1"
        ),

        array(
            "type" => 'checkbox',
            "param_name" => "pagination",
            "heading" => esc_html__("Pagination", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1"
        ),
        array(
            "type" => "textfield",
            "param_name" => "excludes",
            "heading" => esc_html__("Exclude posts", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("Please add post IDs separated by comma. Ex: 125,1,65. Or set minus number for exclude posts. -2 means skip first 2 posts. Note: Do not specify together.", 'themetonaddon'),
        ),

        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish text to white, you should add class \"text-light\". If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));
