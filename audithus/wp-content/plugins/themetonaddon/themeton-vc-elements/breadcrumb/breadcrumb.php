<?php

if (!class_exists('WPBakeryShortCode_breadcrumb')) {
class WPBakeryShortCode_breadcrumb extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'breadcrumb', $atts );
        $extra_class .= ' '.$css_class;
        return themeton_breadcrumb('','',false);
    }
}
}

vc_map( array(
    "name" => esc_html__('Breadcrumb', 'themetonaddon'),
    "description" => esc_html__("breadcrumb", 'themetonaddon'),
    "base" => 'breadcrumb',
    "icon" => "mungu-vc-icon mungu-vc-icon51",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
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