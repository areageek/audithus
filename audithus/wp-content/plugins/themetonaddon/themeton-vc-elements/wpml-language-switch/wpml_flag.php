<?php

if (!class_exists('WPBakeryShortCode_wpml_lan')) {
class WPBakeryShortCode_wpml_lan extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'wpml_lan', $atts );
        $result = '<div class="wpml_lan '.$extra_class.' '.$css_class.'">'.Themeton_Tpl::language_selector_flags(true).'</div>';
   
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Language ', 'themetonaddon'),
    "description" => esc_html__("Wpml compatibility", 'themetonaddon'),
    "base" => 'wpml_lan',
    "icon" => "mungu-vc-icon mungu-vc-icon72",
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
