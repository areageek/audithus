<?php
if (!class_exists('WPBakeryShortCode_woo_quantity')) {
class WPBakeryShortCode_woo_quantity extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'select' => 'default',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        global $product;

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_quantity', $atts );
        $extra_class .= ' '.$css_class;
        $content = '';
        if ($select == 'default') {
            if ($product->get_max_purchase_quantity()!=-1) $max = $product->get_max_purchase_quantity(); else $max = 999;
            $content = woocommerce_quantity_input( array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $max, $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
            ),null,false);
            $content = '<div class="mungu-quantity '.$extra_class.'">'.$content.'</div>';
        }
        if ($select == 'style1') {
            if ($product->get_max_purchase_quantity()!=-1) $max = $product->get_max_purchase_quantity(); else $max = 999;
            $content = woocommerce_quantity_input( array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $max, $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
            ),null,false);
            $content = '<div class="mungu-quantity uk-flex uk-flex-middle quantity-style1 '.$extra_class.'">'.$content.'</div>';
        }
        if ($select == 'style2') {
            if ($product->get_max_purchase_quantity()!=-1) $max = $product->get_max_purchase_quantity(); else $max = 999;
            $content = woocommerce_quantity_input( array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $max, $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
            ),null,false);
            $content = '<div class="mungu-quantity uk-flex uk-flex-middle quantity-style2 '.$extra_class.'">'.$content.'</div>';
        }
        return $content;
    }
}
}

$woo_gallery_style_path = plugin_dir_url(__FILE__).'/style';
vc_map( array(
    "name" => esc_html__('Single Quantity', 'themetonaddon'),
    "description" => esc_html__("Woocommerce Single Quantity", 'themetonaddon'),
    "base" => 'woo_quantity',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => array(esc_html__('Themeton', 'themetonaddon'),esc_html__( 'WooCommerce', 'themetonaddon' )),
    'params' => array(
        array(
            "type" => "select_preview",
            "param_name" => "select",
            "heading" => esc_html__("Menu Style", 'themetonaddon'),
            "value" => array(
                "Default" => array(
                    "value" => "default",
                    "image_url" => $woo_gallery_style_path.'/default.jpg',
                ),
                "Style 1" => array(
                    "value" => "style1",
                    "image_url" => $woo_gallery_style_path.'/default.jpg',
                ),
                "Style 2" => array(
                    "value" => "style2",
                    "image_url" => $woo_gallery_style_path.'/default.jpg',
                )
            ),
            "std" => "default",
            "admin_label" => true
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