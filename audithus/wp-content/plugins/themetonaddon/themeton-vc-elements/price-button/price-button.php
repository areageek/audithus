<?php

if (!class_exists('WPBakeryShortCode_price_btn')) {
class WPBakeryShortCode_price_btn extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'link' => esc_html__("link",'themetonaddon'),
            'name' => '',
            'price' => '',
            'valut' => '1',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'price_btn', $atts );
        $class .= ' '.$css_class;
        $result = "<div class='mungu-price uk-text-center uk-border-circle uk-box-shadow-small uk-card-hover $class'>
                    <a href='$link'>.</a>
                    <h3 class='uk-text-uppercase'>$name</h3>
                    <p>$$price<span>$valut</span></p>
                   </div>";
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Price button', 'themetonaddon'),
    "description" => esc_html__("", 'themetonaddon'),
    "base" => 'price_btn',
    "icon" => "mungu-vc-icon mungu-vc-icon65",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "name",
            "heading" => esc_html__("Name", 'themetonaddon'),
            "value" => "starting at",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "param_name" => "link",
            "heading" => esc_html__("URL", 'themetonaddon'),
            "value" => "1252",
        ),
        array(
            "type" => "textfield",
            "param_name" => "price",
            "heading" => esc_html__("Price", 'themetonaddon'),
            "value" => "1252",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "param_name" => "valut",
            "heading" => esc_html__("Valut", 'themetonaddon'),
            "value" => "uk",
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