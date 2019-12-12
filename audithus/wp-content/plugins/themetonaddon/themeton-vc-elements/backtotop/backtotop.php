<?php

if (!class_exists('WPBakeryShortCode_backtotop')) {
class WPBakeryShortCode_backtotop extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            "bgcolor" => "#1abc9c",
            'icon' => 'fa fa-4x fa-angle-up',
            'icon_type' => 'fontawesome',
            "imagesize" => "80x80",
            "size" => "medium",
            'image' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'backtotop', $atts );
        $class = esc_attr($extra_class);
        $icon = isset($atts["icon_$icon_type"]) ? $atts["icon_$icon_type"] : $icon;
        if (!empty($icon)) {
            wp_enqueue_style("vc_$icon_type");
        }

        if($icon_type == 'icon_image') {
            $imgsize = explode('x', $imagesize);
            $imgsize = is_array($imgsize) ? $imgsize : array(64, 64);
            $icon = wp_get_attachment_image_src($image, $imgsize); 
            $icon = "<img src='".$icon[0]."' width='".$imgsize[0]."' height='".$imgsize[1]."' alt='".esc_html('image icon','mungu')."'/>";
        } else {
            $icon = $icon != '' ? $icon : "fa fa-question-circle-o";
            $icon = "<i class='$icon'></i>";
        }
       
        $result='';
        $result="<div id='scroll' class='scroll  $class' style='background-color:$bgcolor;'>$icon</div>";
        return $result;
       
    }
} 
}

vc_map( array(
    "name" => esc_html__('Back to top', 'themetonaddon'),
    "description" => esc_html__("Themeton Builder Logo Element", 'themetonaddon'),
    "base" => 'backtotop',
    "icon" => "mungu-vc-icon mungu-vc-icon62",
    "class" => 'mungu-vc-element',
    "content_element" => true, 
    "category" => 'Themeton',
    'params' => array(
        array(
            'type' => 'colorpicker',
            "param_name" => "bgcolor",
            "heading" => esc_html__("Background color", 'themetonaddon'),
            "value" => '#1abc9c',
            "dependency" => Array("element" => "style", "value" => array("style-boxed"))
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "textcolor",
            "heading" => esc_html__("Text color", 'themetonaddon'),
            "value" => array(
                "Text color white?" => "text-light"
            ),
            "dependency" => Array("element" => "style", "value" => array("style-boxed")),
        ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library', 'themetonaddon'),
            'value' => array(
                esc_html__('Font Awesome', 'themetonaddon') => 'fontawesome',
                esc_html__('Open Iconic', 'themetonaddon') => 'openiconic',
                esc_html__('Typicons', 'themetonaddon') => 'typicons',
                esc_html__('Entypo', 'themetonaddon') => 'entypo',
                esc_html__('Linecons', 'themetonaddon') => 'linecons',
                esc_html__('Custom Image', 'themetonaddon') => 'icon_image'
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__('Select icon library.', 'themetonaddon'),
            "std" => "show",
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
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
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image Image", 'themetonaddon'),
            "value" => '',
            "dependency" => Array("element" => "icon_type", "value" => array("icon_image"))
        ),
        array(
            'type' => 'textfield',
            "param_name" => "imagesize",
            "heading" => esc_html__("Image Size", 'themetonaddon'),
            "value" => '80x80',
            "description"  => 'Ex: 64x64 ( Width x Height, in pixels )',
            "dependency" => Array("element" => "icon_type", "value" => array("icon_image"))
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'themetonaddon' ),
            'param_name' => 'icon',
            'value' => 'fa fa-question-circle-o', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => true,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 100,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page

            ),
            "dependency" => Array("element" => "icon_type", "value" => array("icon_font"))
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "size",
            "heading" => esc_html__("Icon Size", 'themetonaddon'),
            "value" => array(
                "Extra Small" => "extra-small",
                "Small" => "small",
                "Medium (default)" => "medium",
                "Large" => "large",
            ),
            "std" => "medium",
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
        ),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'themetonaddon' ),
			"param_name" => "extra_class",
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themetonaddon' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
			"param_name" => "css",
			'group' => esc_html__( 'Design Options', 'themetonaddon' ),
		),
    )
));