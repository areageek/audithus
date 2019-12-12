<?php

if (!class_exists('WPBakeryShortCode_info_box')) {
class WPBakeryShortCode_info_box extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'title' => '',
            'shadows' => "uk-box-shadow-small",
            'image' => '',
            'icon' => 'fa fa-forumbee',
            'icon_type' => 'fontawesome',
            'size' => '14px',
            "href" => '',
            'icon_types' => 'icon_font',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'info_box', $atts );
        $class .= ' '.$css_class;
        $href = vc_build_link( $href );
        $url = ($href['url']);
    
        // Shadow of the cards
        if( $shadows == 'small' ) {
            $shadows = 'uk-box-shadow-small';
        } else if ( $shadows == 'medium' ) {
            $shadows = 'uk-box-shadow-medium';
        } else if ( $shadows == 'large' ) {
            $shadows = 'uk-box-shadow-large';
        }
    
        // Hover effects
        $hover = 'uk-card-hover';

        if (!empty($footer)) {
            $footer = sprintf('<div class="uk-card-footer">%s</div>', $footer);
        }
        $icon = isset($atts["icon_$icon_type"]) ? $atts["icon_$icon_type"] : $icon;
        if (!empty($icon)) {
            wp_enqueue_style("vc_$icon_type");
        }

        $iconmarkup = "<i class='$icon' style='font-size: $size;'></i>";

        if( 'icon_types' != 'icon_font' && !empty($image) ){
            $iconmarkup = wp_get_attachment_image($image, 'medium');
        }


        $urlpre = $urlaft = "";
        if($url != '') {
            $urlpre = "<a href='$url'>";
            $urlaft = "</a>";
        }

        $result = "<div class='mungu-element uk-scrollspy icon-box uk-card $shadows $hover $class uk-text-center'>
                 $urlpre
                     <div class='uk-card-body'>
                        
                        <div>$iconmarkup</div>
                        <h3>$title</h3>
                    
                    </div>
                $urlaft
            </div>";

        // return result
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Icon box', 'themetonaddon'),
    "description" => esc_html__("Piece of information", 'themetonaddon'),
    "base" => 'info_box',
    "content_element" => true,
    "category" => 'Themeton',
    "icon" => "mungu-vc-icon mungu-vc-icon54",
    "class" => 'mungu-vc-element',
    'params' => array(
        array(
            "type" => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "holder" => 'div'
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "icon_types",
            "heading" => esc_html__("Icon Type", 'themetonaddon'),
            "value" => array(
                "Icon font" => "icon_font",
                "Icon image" => "icon_image"
            ),
            "std" => "icon_font",
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Attach Image", 'themetonaddon'),
            "dependency" => Array("element" => "icon_types", "value" => array("icon_image"))
        ),

        array(
            "type" => 'textfield',
            "param_name" => "size",
            'description' => esc_html__( 'Icon size.', 'themetonaddon' ),
            'std' => '14px',
            "heading" => esc_html__("Icon size", 'themetonaddon'),
            "dependency" => Array("element" => "icon_types", "value" => array("icon_font"))
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
            "dependency" => Array("element" => "icon_types", "value" => array("icon_font"))
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
            "type" => "dropdown",
            "param_name" => "shadows",
            "heading" => esc_html__("Shadow of the card", 'themetonaddon'),
            "value" => array(
                "Small" => "small",
                "Medium" => "medium",
                "Large" => "large"
            ),
            "std" => "default",
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