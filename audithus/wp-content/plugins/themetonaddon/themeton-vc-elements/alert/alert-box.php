<?php

if (!class_exists('WPBakeryShortCode_alert_box')) {
class WPBakeryShortCode_alert_box extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'title' => 'Success message goes here',
            'icon' => 'fa fa-check',
            'icon_type' => 'fontawesome',
            'size' => '26px',
            'href' => '',
            'color' => '#55c85b',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'alert_box', $atts );
        $class .= ' '.$css_class;
        $href = vc_build_link( $href );
        $url = ($href['url']);
        
        $icon = isset($atts["icon_$icon_type"]) ? $atts["icon_$icon_type"] : $icon;
        if (!empty($icon)) {
            wp_enqueue_style("vc_$icon_type");
        }

        $urlpre = $urlaft = "";
        if($url != '') {
            $urlpre = "<a href='$url'>";
            $urlaft = "</a>";
        }

        $result = "<div class='mungu-element alert-box uk-grid uk-grid-collapse $class' style='background-color:$color;'>
            <div class='icon'><i class='".$icon."' style='font-size: $size;'></i></div>
            $urlpre
                <div><h3>$title</h3></div>
            $urlaft
        </div>";

        // return result
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Alert box', 'themetonaddon'),
    "description" => esc_html__("Message information", 'themetonaddon'),
    "base" => 'alert_box',
    "icon" => "mungu-vc-icon mungu-vc-icon49",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "my_param",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Flipping text", 'themetonaddon'),
            "param_name" => "fliping_text",
            "value" => '',
            "description" => esc_html__( "Enter text and flip it", 'themetonaddon' ),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "holder" => 'div',
            'admin_label' => true,
            "std" => 'Success message goes here'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library', 'themetonaddon'),
            'value' => array(
                esc_html__('Font Awesome', 'themetonaddon') => 'fontawesome',
                esc_html__('Open Iconic', 'themetonaddon') => 'openiconic',
                esc_html__('Typicons', 'themetonaddon') => 'typicons',
                esc_html__('Entypo', 'themetonaddon') => 'entypo',
                esc_html__('Linecons', 'themetonaddon') => 'linecons'
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__('Select icon library.', 'themetonaddon'),
            "std" => "show",
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-smile',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "size",
            'description' => esc_html__( 'Icon size.', 'themetonaddon' ),
            'std' => '26px',
            "heading" => esc_html__("Icon size", 'themetonaddon'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Background color', 'themetonaddon' ),
            'param_name' => 'color',
            'value' => '#55c85b', // default value to backend editor admin_label
        ),
        array(
            'type' => 'vc_link',
            'value' => '',
            'heading' => 'Link of box',
            'param_name' => 'href',
            "std" => "ORDER NOW"
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