<?php
if (!class_exists('WPBakeryShortCode_social_icons')) {
class WPBakeryShortCode_social_icons extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'list' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $list = vc_param_group_parse_atts($list);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'social_icons', $atts );
        $extra_class .= ' '.$css_class;
        $result = '<div class="uk-flex uk-flex-middle menu-social '.$extra_class.'">';
        foreach ($list as $array) {
            $icon_type = $array['icon_type'];
            $icon = isset($array["icon_$icon_type"]) ? $array["icon_$icon_type"] : $icon;
            if (!empty($icon)) {
                wp_enqueue_style("vc_$icon_type");
            }
            $result .= sprintf('<a href="%s"><i class="%s" aria-hidden="true"></i></a>',$array['link'],$icon);
        }
        $result .= '</div>';
    return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Social icons', 'themetonaddon'),
    "description" => esc_html__("Social Network Icons", 'themetonaddon'),
    "base" => "social_icons",
    "icon" => "mungu-vc-icon mungu-vc-icon70",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "param_group",
            "param_name" => "list",
            "heading" => esc_html__("List items", 'themetonaddon'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "param_name" => "link",
                    "value" => '',
                    "heading" => esc_html__("Link (optional)", 'themetonaddon'),
                    "holder" => 'div'
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
                    "dependency" => Array("element" => "ol", "value" => array("no"))
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
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "m0",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. Please look at helper classes in the documentation.", 'themetonaddon'),
        ),
        array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
			"param_name" => "css",
			'group' => esc_html__( 'Design Options', 'themetonaddon' ),
		),
    )
));