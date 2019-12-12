<?php
if (!class_exists('WPBakeryShortCode_woo_gallery')) {
class WPBakeryShortCode_woo_gallery extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'select' => 'default',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        global $post, $product;

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_gallery', $atts );
        $extra_class .= ' '.$css_class;
        $content = '';
        if ($select == 'default') {
            $attachment_ids = $product->get_gallery_image_ids();
            if (isset($attachment_ids)) {
                $content = '<div class="single-product-woo '.$extra_class.'">';
                $content .= '<div class="single-product-gallery-container uk-position-relative uk-container uk-container-small"><div class="swiper-wrapper">';
                foreach ( $attachment_ids as $attachment_id ) {
                    $url = wp_get_attachment_image( $attachment_id, 'full' );
                    $content .= '<div class="swiper-slide uk-flex uk-flex-center">'.$url.'</div>';
                }
                $slider_arrows = "<div class='swiper-button-prev'>".Themeton_Tpl::the_arrow_icon()."</div>
                <div class='swiper-button-next'>".Themeton_Tpl::the_arrow_icon()."</div>";
                $content .= '</div>'.$slider_arrows;
                $content .= '</div></div>';
            }
        }

        return $content;
    }
}
}

$woo_gallery_style_path = plugin_dir_url( __FILE__ ).'themeton-vc-elements/woo-gallery/style';

vc_map( array(
    "name" => esc_html__('Single Gallery', 'themetonaddon'),
    "description" => esc_html__("Woocommerce Single Gallery", 'themetonaddon'),
    "base" => 'woo_gallery',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => array(esc_html__('Themeton', 'themetonaddon'),esc_html__( 'WooCommerce', 'themetonaddon' )),
    'params' => array(
        array(
            "type" => "select_preview",
            "param_name" => "select",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                "Default" => array(
                    "value" => "default",
                    "image_url" => $woo_gallery_style_path.'/default.jpg',
                )
            ),
            "std" => "default"
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