<?php
if (!class_exists('WPBakeryShortCode_woo_singleproduct')) {
class WPBakeryShortCode_woo_singleproduct extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'items' => '',
            'postid' => '',
            'column' => '3',
            'count' => '-1',
            'space' => 'small',
            'url1' => '',
            'img1' => '',
            'img2' => '',
            'style' => '1',
            'url2' => '',
            'posts_items ' => '',
            'text' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_singleproduct', $atts );
        $extra_class .= ' '.$css_class;
        
        $args = array(
            'post_type' => 'product',
            'p' => $postid,
            'posts_per_page' => $count,
        );

        $post_items= '';
        $img = '';
        $posts_query = new WP_Query($args);
        if ($style == 1) {
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                global $product;
    
                $attachment_ids = vc_param_group_parse_atts($items);
                foreach ($attachment_ids as $attachment_id) {
                    $post_items .= "<div class='swiper-slide uk-flex uk-flex-right'>".wp_get_attachment_image( $attachment_id['image'], 'large'). "</div>";
                }
                // reset query
                $title = get_the_title();
                $color_content = '';
                if (!empty(get_post_meta(get_the_ID(),'_product_attributes')[0]['color'])) {
                    $color = get_post_meta(get_the_ID(),'_product_attributes')[0]['color'];
                    $color_content .= '<h2>Colour</h2>';
                    $color_array = explode(',',$color['value']);
                    foreach ($color_array as $value) {
                        if ($value == 'Silver') {
                            $color_content .= "<div class='left'><div class='circle silver'></div>Silver Mode</div>&nbsp;";
                        }
                        if ($value == 'Gold') {
                            $color_content .="<div class='left'><div class='circle gold'></div>Golden Mode</div>";
                        }
                    }
                }
                $price = '<span class="price">'.$product->get_price_html().'</span><p>Shipping charges may be extra</p>';
                $imgurl1 = wp_get_attachment_image($img1, 'full');
                $imgurl2 = wp_get_attachment_image($img2, 'full');
                $result = "<div class='uk-grid uk-flex uk-flex-middle woo-single-post-style-1 woo-single-post-element $extra_class'>
                            <div class='uk-width-2-5@m'>
                            <div class='woo-product-thumb'>
                                    <div class='woo-product-thumbnail'>
                                        <div class='swiper-wrapper '>
                                            $post_items
                                        </div>
                                    </div>
                                    <div class='swiper-pagination'></div>
                                </div>
                            </div>
                                <div class='uk-width-3-5@m pl3@s pt3@s pt10 pl10 left-border'>
                                    <h4>Buy the Product</h4>
                                    <h1>$title</h1>
                                    $color_content
                                    <div class='line'></div>
                                    <div class='uk-grid woo-thumb-footer uk-flex uk-flex-middle'>
                                        <div class='uk-width-expand@m'>$price</div>
                                        <div class='uk-width-auto'><a href='$url1'>$imgurl1</a></div>
                                        <div class='uk-width-auto'><a href='$url2'>$imgurl2</a></div>
                                    </div>
                                </div>
                         </div>";
                wp_reset_postdata();
                return $result;
            }
        }
        else if ($style == 2) {
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                global $product;
    
                $attachment_ids = get_post_meta(get_the_ID(),'_product_image_gallery')[0];
                $attachment_ids = explode(',',$attachment_ids);
                $t = 0;
                $prev = $next = '';
                foreach ($attachment_ids as $attachment_id) {
                    if ($t==0) {
                        $prev = '<span class="woo-button-prev">'.wp_get_attachment_caption( $attachment_id).'</span>';
                    }
                    if ($t==1) {
                        $next = '<span class="woo-button-next">'.wp_get_attachment_caption( $attachment_id).'</span>';
                        break;
                    }
                    $t++;
                }
                $t = 0;
                $pagination = '<div class="woo-slider-page uk-flex uk-flex-center">'.$prev.$next.'<a href="javascript:;" class="woo-button-next woo-single-mungu-btn uk-icon-button uk-margin-small-right uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16"></polyline></svg></a></div>';
                foreach ($attachment_ids as $attachment_id) {
                    $post_items .= "<div class='swiper-slide uk-flex uk-flex-center uk-flex-middle'>".wp_get_attachment_image( $attachment_id, get_template().'-related-post')."</div>";
                    if ($t==1) break;
                    $t++;
                }

                $content_list = '';
                    $t = 0;
                    $content_list .= '<div class="uk-width-1-1@m uk-flex-right"><h1>Features</h1>';
                    $content_list .= $text;
                    $content_list .= '<div class="clear"></div><a href="'.get_permalink().'" class="woo-single-perma">View all specifications</a></div>';
                $result = "<div class='uk-grid uk-child-width-1-2@m $extra_class'>
                    <div class='uk-flex uk-flex-right'>
                        <div class='uk-grid woo-single-element-feature-ul uk-flex-middle'>
                        $content_list
                        </div>
                    </div>
                    <div>
                        <div class='woo-product-thumbnail-style-2'>
                            <div class='swiper-wrapper '>
                                $post_items
                            </div>
                            <div class='uk-width-1-2 uk-flex uk-flex-center uk-position-relative'>
                                $pagination
                            </div>
                            <div class='uk-width-1-2'></div>
                        </div>
                    </div>
                </div>";
                wp_reset_postdata();
                return $result;
            }
        }
        else if ($style == 3) {
            $posts_items='';
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                global $post ,$product;
                $id = $product->get_id();
    
                $img_url = $data = $social ='';
                if( has_post_thumbnail() ){
                    $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    $img = !empty($img) ? $img[0] : '';
                }
                  
                $posts_items .= '<div class="product-item"> 
                                    <div class="uk-card uk-card-default">
                                        <div class="uk-card-header">
                                           <a href="'.get_the_permalink().'"> <h3 class="uk-card-title pt2 uk-text-uppercase"> '.get_the_title().'</h3></a>
                                        </div>
                                        <div class="uk-card-body uk-flex uk-flex-center pt1"> <a href="'.get_the_permalink().'"> '.$thumb.'</a></div>
                                        <div class="uk-card-footer upwo">
                                         '.do_shortcode( '[add_to_cart id='.$id. ']' ).' 
                                        </div>
                                    </div>
                                </div>';    
                               // var_dump($product[id]);
            }
            wp_reset_postdata();
            return '<div class="uk-grid uk-grid-'.$space.' uk-child-width-1-'.$column.' upwoocommerce ">
                        '.$posts_items.'
                    </div>';
        }
    }
}
}

vc_map( array(
    "name" => esc_html__('Woo Single Post Element', 'themetonaddon'),
    "description" => esc_html__("post type: Woocommerce", 'themetonaddon'),
    "base" => 'woo_singleproduct',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                'Style 1' => '1',
                'Style 2' => '2',
                'Style 3' => '3',
            ),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "param_name" => "column",
            "heading" => esc_html__("Column", 'themetonaddon'),
            "value" => array(
                'Column 1' => 1,
                'Column 2' => 2,
                'Column 3' => 3,
                'Column 4' => 4,
            ),
            "dependency" => Array("element" => "style", "value" => array("3"))
        ),
        array(
            "type" => "dropdown",
            "param_name" => 'space',
            "heading" => esc_html__("Grid space", 'themetonaddon'),
            "value" => array(
                'Small' => 'small',
                'Medium' => 'medium',
                'Large' => 'large',
            ),
            "dependency" => Array("element" => "style", "value" => array("3"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '-1'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "postid",
            "heading" => esc_html__("Post ID", 'themetonaddon'),
            "value" => '1'
        ),
        array(
            "type" => "param_group",
            "param_name" => "items",
            "heading" => esc_html__("Items", 'themetonaddon'),
            "params" => array(
                array(
                    "type" => "attach_image",
                    "param_name" => "image",
                    "heading" => esc_html__("Insert image", 'themetonaddon'),
                ),
            ),
            "dependency" => Array("element" => "style", "value" => array("1"))
        ),
        array(
            "type" => 'textarea_html',
            "param_name" => "text",
            "heading" => esc_html__("", 'themetonaddon'),
            "value" => '',
            "dependency" => Array("element" => "style", "value" => array("2"))
        ),
        array(
            "type" => 'attach_image',
            "param_name" => "img1",
            "heading" => esc_html__("Image 1", 'themetonaddon'),
            "dependency" => Array("element" => "style", "value" => array("1"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "url1",
            "heading" => esc_html__("link1 URL", 'themetonaddon'),
            "value" => '#',
            "dependency" => Array("element" => "style", "value" => array("1"))
        ),
        array(
            "type" => 'attach_image',
            "param_name" => "img2",
            "heading" => esc_html__("Image 2", 'themetonaddon'),
            "dependency" => Array("element" => "style", "value" => array("1"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "url2",
            "heading" => esc_html__("link2 URL", 'themetonaddon'),
            "value" => '#',
            "dependency" => Array("element" => "style", "value" => array("1"))
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