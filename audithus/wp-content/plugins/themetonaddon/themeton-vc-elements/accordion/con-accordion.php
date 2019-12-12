<?php
if (!class_exists('WPBakeryShortCode_accordion')) {
class WPBakeryShortCode_accordion extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'style' => '0',   
            'multi' => '0',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'accordion', $atts );
        $class .= ' '.$css_class;
        $result = $multiple = '';
        $group = vc_param_group_parse_atts( $atts['group']);
        foreach ((array)$group as $val) { 
            (isset($val['title'])) ? $title = ($val['title']) : '';
            (isset($val['body'])) ? $body = ($val['body']) : '';
            $result .= "
            <li>
                <h3 class='uk-accordion-title'>$title</h3>
                <div class='uk-accordion-content'>
                    <p>$body</p>
                </div>
            </li>";
        }
        if( $style == '1') {  
            $class .= ' style-arrow';
        }
        $multiple = "";
        if( $multi == '1') {
            $multiple = " uk-accordion='multiple: true'";
        }
        $result = "<ul class='mungu-element accordion-vc uk-accordion $class'$multiple>" . $result . "</ul>";
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Accordion', 'themetonaddon'),
    "description" => esc_html__("Next Accordion", 'themetonaddon'),
    "base" => 'accordion',
    "icon" => "mungu-vc-icon mungu-vc-icon35",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            'type' => 'checkbox',
            "param_name" => "style",
            "heading" => esc_html__("Simple arrow style?", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "0"
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "multi",
            "heading" => esc_html__("Multiple open?", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "0"
        ),
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group',
            // Note params is mapped inside param-group:
            "params" => array(
                array(
                    "type" => 'textfield',
                    "param_name" => "title",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Title", 'themetonaddon'),
                ),
                array(
                    "type" => 'textarea',
                    "param_name" => "body",
                    "heading" => esc_html__("Body text", 'themetonaddon'),
                ),
            
            )
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
