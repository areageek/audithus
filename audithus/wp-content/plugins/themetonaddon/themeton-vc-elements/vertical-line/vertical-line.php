<?php

if (!class_exists('WPBakeryShortCode_verticalline')) {
class WPBakeryShortCode_verticalline extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            "width" => "1",
            "height" => "36",
            "color" => "#95989A",
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'verticalline', $atts );
        $extra_class .= ' '.$css_class;
        return sprintf('<div class="mungu-element vertical-line %5$s %4$s" style="width:%1$s;height:%2$s;background:%3$s;"></div>',abs($width).'px',abs($height).'px',$color,$extra_class,$css_class);
    }
}
}

vc_map( array(
    "name" => esc_html__('Vertical line', 'themetonaddon'),
    "description" => esc_html__("Seperator for header elements", 'themetonaddon'),
    "base" => 'verticalline',
    "icon" => "mungu-vc-icon mungu-vc-icon66",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "width",
            "heading" => esc_html__("width size in pixels", 'themetonaddon'),
            "value" => "1",
        ),
        array(
            "type" => "textfield",
            "param_name" => "height",
            "heading" => esc_html__("Height size in pixels", 'themetonaddon'),
            "value" => "36",
            "admin_label" => true
        ),
        array(
            "type" => "colorpicker",
            "param_name" => "color",
            "heading" => esc_html__("Color", 'themetonaddon'),
            "value" => "#95989A",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
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