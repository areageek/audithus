<?php
if (!class_exists('WPBakeryShortCode_woo_categories')) {
class WPBakeryShortCode_woo_categories extends WPBakeryShortCode { 

    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'style' => '',
            'categories_title' => '',
            'exclude' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        global $product;

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_categories', $atts );
        $extra_class .= ' '.$css_class;
        $exclude = explode ( ',',$exclude);
        switch ($style) {
            case 0 : 
                $terms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'orderby' => 'id',
                    'parent' => 0,
                    'hide_empty' => false,
                ) );

                $ids = [];
                foreach ($exclude as $name) {
                    foreach ($terms as $value) {
                        if ($value->name == $name) {
                            $ids[] = $value->term_id;
                        }
                    }
                }
                
                $terms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'orderby' => 'id',
                    'exclude' => $ids,
                    'parent' => 0,
                    'hide_empty' => false,
                ) );
                $content = '';
                $subterms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                ) );
                $ids = [];
                foreach ($exclude as $name) {
                    foreach ($subterms as $val) {
                        if ($val->name == $name) {
                            $ids[] = $val->term_id;
                        }
                    }
                }
                $subterms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'exclude' =>  $ids,
                    'hide_empty' => false,
                ) );
                foreach ($terms as $value) {
                    $sub = '';
                    foreach ($subterms as $val) {
                        if ($value->term_id==$val->parent) $sub .= '<li><a href="'.get_category_link($val->term_id).'">'.$val->name.'</a></li>';
                    }
                    if ($sub!='') $content .= '<li class="woo-themeton-children">'.$value->name.'<ul><li><a href="'.get_category_link($value->term_id).'">All</a></li>'.$sub.'</ul></li>';
                    else $content .= '<li><a href="'.get_category_link($value->term_id).'">'.$value->name.'</a></li>';
                }
                $content = '<div class="themeton-woo-list '.$extra_class.'"><h1>'.esc_attr( $categories_title ).'</h1><ul class="list">'.$content.'</ul></div>';
                return $content;
            break;
            case 1:
                $terms = get_terms( array(
                    'taxonomy' => 'product_tag',
                    'orderby' => 'id',
                    'hide_empty' => false,
                ) );
                $ids = [];
                foreach ($exclude as $name) {
                    foreach ($terms as $val) {
                        if ($val->name == $name) {
                            $ids[] = $val->term_id;
                        }
                    }
                }
                $terms = get_terms( array(
                    'taxonomy' => 'product_tag',
                    'exclude' => $ids,
                    'orderby' => 'id',
                    'hide_empty' => false,
                ) );
                $content = '<div class="themeton-woo-list '.$extra_class.'"><h1>'.esc_attr( $categories_title ).'</h1><ul class="list">';
                foreach ($terms as $value) {
                    $content .= '<li><a href="'.get_category_link($value->term_id).'">'.$value->name.'</a></li>';
                }
                $content .= '</ul></div>';
                return $content;
            break;
        }
    }
}
}

vc_map( array(
    "name" => esc_html__('Woo Product Categories', 'themetonaddon'),
    "description" => esc_html__("Woocommerce product categories", 'themetonaddon'),
    "base" => 'woo_categories',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => array(esc_html__('Themeton', 'themetonaddon'),esc_html__( 'WooCommerce', 'themetonaddon' )),
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Categories or Tags", 'themetonaddon'),
            "value" => array(
                "Categories" => 0,
                "Tags" => 1,
            ),
            "std" => "0",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "param_name" => "categories_title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "param_name" => "exclude",
            "heading" => esc_html__("Exclude categories", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("Exclude categories example: cat name 1, cat name 2 , cat name 3 ...", 'themetonaddon'),
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