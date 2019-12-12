<?php
if (!class_exists('WPBakeryShortCode_Mungu_woo_product')) {
class WPBakeryShortCode_Mungu_woo_product extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'items' => '',
            'count' => '6',
            "style"   => "style1",
            "pagination_align"   => "uk-flex-left",
            'categories' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_woo_product', $atts );
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
       
        // build query
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => true,
            'paged' => $paged
        );
        if(!empty($cats)){
            $args['tax_query'] = array(
                'relation' => 'IN',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $exps
                )
            );
        }

        $cat_array = array();
        $post_items= '';
        $img = '';
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            global $product; 

            $thumb = '';
            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "thumb");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
            }
            
            // Categories
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), 'product_cat');
            $cat_title = '';
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;
                $cat_titles []= $cat_title;
            }
            if($style == 'style1'){
                if($product->get_gallery_image_ids()) {
                    $gallery = $product->get_gallery_image_ids();
                    $img_w = wp_get_attachment_image_src($gallery[0], 'large');
                    $img = !empty($img_w) ? $img_w[0] : $img;
                } else {
                    // No post gallery, try attachments instead.
                    $images = get_posts(
                        array(
                            'post_type'      => 'attachment',
                            'post_mime_type' => 'image',
                            'post_parent'    => get_the_ID(),
                            'posts_per_page' => 1,
                        )
                    );
                    if ( $images ) {
                        $img_f = wp_get_attachment_image_src( $images[0]->ID, 'large' );
                        $img = !empty($img_f) ? $img_f[0] : $img;
                    }
                }
                $post_items .= "<div class='swiper-slide'>
                        <section class='woo-item uk-animation-toggle  uk-position-relative uk-flex-center uk-flex uk-flex-middle'>
                            <a href='".get_the_permalink()."' >
                                <figure>
                                <figcaption class='uk-position-absolute uk-animation-fade' data-bg-image='$img' >
                                    <h3 class='mt5'>".get_the_title()."</h3>
                                </figcaption>
                                </figure>
                                <div class='woo-detials'>
                                    ".$thumb."
                                    <h3 class='mt5'>".get_the_title()."</h3>
                                    <h4>".$cat_title."</h4>
                                    <span>".$product->get_price_html()."</span>
                                </div>
                            </a>
                        </section>
                    </div>";
                        
            } elseif ($style == 'style2') {
                $post_items .= "<div class='swiper-slide'>
                        <section class='woo-thumb uk-card uk-card-default uk-card-body uk-position-relative uk-flex-center uk-flex uk-flex-middle'>
                            <a href='".get_the_permalink()."' >
                                <div class='woo-detials'>
                                    ".$thumb."
                                    <h3 class='mt2'>".get_the_title()."</h3>
                                </div>
                            </a>
                        </section>
                    </div>";
            }     
        }
        // reset query
        wp_reset_postdata();
        if($style =='style1'){
            $result = "<div class='woo-product $extra_class'>
                    <div class='swiper-container post-product-slide'>
                        <div class='swiper-wrapper '>
                            $post_items
                        </div>
                    <div class='swiper-pagination pt5 pb3  uk-flex ".$pagination_align."'></div>
                    </div>
                </div>";
        }elseif ($style == 'style2') {
             $result = "<div class='woo-product $extra_class'>
                    <div class='swiper-container post-product-slide-thumb'>
                        <div class='swiper-wrapper '>
                            $post_items
                        </div>
                    <div class='swiper-pagination pt5 pb3  uk-flex ".$pagination_align."'></div>
                    </div>
                </div>";

        }

        if ($style == 'style3') {
            $post_items = '';
            $items = vc_param_group_parse_atts($items);
            foreach ($items as $val) {
                $img = wp_get_attachment_image_src( $val['image'] , 'large' )[0];
                $post_items .= "<div class='swiper-slide woo-style-3' data-woo-product='".$img."'>
                    <div class='hover uk-flex uk-flex-center uk-flex-middle'>
                        <h3>".$val['title']."</h3>
                    </div>
                </div>";
            }
        } 
        if ($style == 'style3') {
            $result = "<div class='woo-product $extra_class'>
                    <div class='post-product-thumb'>
                        <div class='swiper-wrapper uk-scrollspy'>
                            $post_items
                        </div>
                    </div>
                </div>";
        }
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Woo product slider', 'themetonaddon'),
    "description" => esc_html__("post type: Woocommerce", 'themetonaddon'),
    "base" => 'mungu_woo_product',
    "icon" => "mungu-vc-icon mungu-vc-icon81",
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
            "param_name" => "style",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                'Style - 1' => 'style1',
                'Style - 2' => 'style2',
                'Style - 3' => 'style3'
            ), 
            "std" => "style1"
        ),
        array(
            "type" => "param_group",
            "param_name" => "items",
            "heading" => esc_html__("Items", 'themetonaddon'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "param_name" => "title",
                    "heading" => esc_html__("Title", 'themetonaddon'),
                    "value" => esc_html__('Ttitle', 'themetonaddon'),
                    "admin_label" => true,
                    'holder' => 'div',
                ),
                array(
                    "type" => "attach_image",
                    "param_name" => "image",
                    "heading" => esc_html__("Insert image", 'themetonaddon'),
                ),
            ),
            "dependency" => Array("element" => "style", "value" => "style3")
        ),
        array(
            "type" => "dropdown",
            "param_name" => "pagination_align",
            "heading" => esc_html__("Pagination align", 'themetonaddon'),
            "value" => array(
                'Left' => 'uk-flex-left',
                'Right' => 'uk-flex-right',
                'Center' => 'uk-flex-center'
            )
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