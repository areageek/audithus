<?php

if (!class_exists('WPBakeryShortCode_info_box_list')) {
class WPBakeryShortCode_info_box_list extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'title' => '',
            'list' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $list = vc_param_group_parse_atts($list);
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'info_box_list', $atts );
        $extra_class .= ' '.$css_class;
        $lists = '';

        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                $atach_src = wp_get_attachment_image_src($image, 'full');
                $image = is_array($atach_src) ? $atach_src[0] : "";

                $icon_type = array_key_exists('icon_type', $item) ? $item['icon_type'] : '';
                $icon = isset($item["icon_$icon_type"]) ? $item["icon_$icon_type"] : $icon;
                $icon = !empty($icon) ? "$icon" : "";

                if (!empty($icon)) {
                    wp_enqueue_style("vc_$icon_type");
                }

                $text = isset($item['text']) ? $item['text'] : "";
                $text = !empty($text) ? "$text" : "";
                
                $url = isset($item['url']) ? $item['url'] : "";
                $url = !empty($url) ? "$url" : "";

                $lists .= "<li><i class='$icon'></i><a href='".$url."'> $text</a></li> ";  
            }
        }
        $result = "<div class='nxt-link-box uk-card-default uk-card-body uk-padding-remove $extra_class'>
                       <div class='uk-cart-title uk-flex uk-text-center uk-flex-middle'><h3>$title</h3></div>
                       <ul>".$lists."</ul>
                    </div>";

        // return result
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Custom link box', 'themetonaddon'),
    "description" => esc_html__("Piece of information", 'themetonaddon'),
    "base" => 'info_box_list',
    "content_element" => true,
    "category" => 'Themeton',
    "icon" => "mungu-vc-icon mungu-vc-icon48",
    "class" => 'mungu-vc-element',
    'params' => array(
        array(
            "type" => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "holder" => 'div'
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'themetonaddon'),
            'param_name' => 'list',
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Name', 'themetonaddon'),
                    'param_name' => 'text',
                    'value' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('URL', 'themetonaddon'),
                    'param_name' => 'url',
                    'value' => 'www.google.com'
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
                    'value' => 'fa fa-info-circle',
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
                    'type' => 'textfield',
                    'heading' => esc_html__('Link url (optional)', 'themetonaddon'),
                    'param_name' => 'link',
                    'value' => '',
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