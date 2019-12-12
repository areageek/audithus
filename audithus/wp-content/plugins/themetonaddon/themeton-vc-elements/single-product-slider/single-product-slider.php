<?php
if (!class_exists('WPBakeryShortCode_single_product_slider')) {
class WPBakeryShortCode_single_product_slider extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'list' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'single_product_slider', $atts );
        $class .= ' '.$css_class;
        $result = '';
        $list = vc_param_group_parse_atts($list);
        $post_items = $text = '';
        foreach ($list as $value) {
            $text .= "<span class='single-product-text'>".$value['bullet']."</span>";
        }
        foreach ($list as $value) {
            $image = wp_get_attachment_image( $value['image'], 'large' );
            $post_items .= "<div class='swiper-slide uk-flex uk-flex-middle uk-flex-center' data-text-bullet='".$value['bullet']."'>".$image."</div>";
        }
        $result = "<div class='$extra_class'>
        <div class='swiper-container single-product-slide'>
            <div class='swiper-wrapper '>
                $post_items
            </div>
            $text
        <div class='single-swiper-pagination uk-flex'></div>
        <span class='swiper-button-next uk-flex uk-flex-center uk-flex-middle'><i data-uk-icon='icon: chevron-right; ratio:1.5;'></i></span>
        </div>
    </div>";

        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Single Product Slider', 'themetonaddon'),
    "description" => esc_html__("Single product slider", 'themetonaddon'),
    "base" => 'single_product_slider',
    "icon" => "mungu-vc-icon mungu-vc-icon35",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Single Product Slider', 'themetonaddon'),
            'param_name' => 'list',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Bullet Text', 'themetonaddon'),
                    'param_name' => 'bullet',
                    'holder' => 'div',
                ),
            ),
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
        ),
    )
));
