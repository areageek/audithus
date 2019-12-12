<?php
if (!class_exists('WPBakeryShortCode_contact_button')) {
class WPBakeryShortCode_contact_button extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'title' => '',
            'number' => '',
            'style' => '',
            'n_icon' => '',
            'link' => '',
            'uikit_attr' => '',
            'icon_type' => '',
            'uikit_ratio' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $result = $icon = '';
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'contact_button', $atts );

        if ($n_icon == 'vcc_icon') {
            if (isset($icon_type)) {
                $type = 'icon_'.$icon_type;
                $icon = $atts[$type];
                $icon = sprintf('<span class="%s uk-margin-small-right color-brand %s"></span>',$icon,$css_class);
            }
        }
        if ($n_icon == 'attribute') {
            if (isset($uikit_attr)) {
                if (isset($uikit_ratio)) {
                    $icon = sprintf('<span data-ukicon="icon:%s; ratio:%s;" class="uk-margin-small-right color-brand uk-icon"></span>',$uikit_attr,$uikit_ratio);
                }
                else $icon = sprintf('<span data-ukicon="icon:%s" class="uk-margin-small-right color-brand uk-icon"></span>',$uikit_attr);
            }
        }

        if ($style == 'standart') {
            $link = vc_build_link($link);
            if (isset($link)) {
                $number = $link['url'];
                $text = $link['title'];
            }
            $result .= sprintf('<div class="uk-grid uk-grid-collapse uk-child-width-expand width-top uk-visible@s %s %s">
                <div class="uk-width-auto uk-flex uk-flex-top uk-text-center">
                %s
                </div>
                <div class="uk-width-auto"><div class="mmb1"><span class="emailphone">%s</span></div>
                <div><span class="numbers"><a class="number" href="%s">%s</a></span>
                </div></div></div>',$css_class,$extra_class,$icon,$title,$number,$text);
        }
        if ($style == 'style1') {
            
        }

        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Next Contact Button', 'themetonaddon'),
    "description" => esc_html__("Next Contact Element Style", 'themetonaddon'),
    "base" => 'contact_button',
    "icon" => "mungu-vc-icon mungu-vc-icon79",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Choose contact button style", 'themetonaddon'),
            "value" => array(
                "Standart" => "standart",
                "Left icon & Left text" => "style1"
            ),
            "std" => "icon",
            'admin_label' => true
        ),
        array(
            "type" => "dropdown",
            "param_name" => "n_icon",
            "heading" => esc_html__("Icon", 'themetonaddon'),
            "value" => array(
                "VC icon Library" => "vcc_icon",
                "Custom Attribute" => "attribute",
            ),
            "std" => "vcc_icon",
            'admin_label' => true
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
            "dependency" => Array("element" => "n_icon", "value" => "vcc_icon")
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-smile',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
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
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
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
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
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
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
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
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array (
            "type" => "textfield",
            "param_name" => "uikit_attr",
            "heading" => esc_html__("Uikit attribute", 'themetonaddon'),
            'admin_label' => true,
            'holder' => 'div',
            "dependency" => Array("element" => "n_icon", "value" => "attribute")
        ),
        array (
            "type" => "textfield",
            "param_name" => "uikit_ratio",
            "heading" => esc_html__("Icon ratio", 'themetonaddon'),
            'admin_label' => true,
            'holder' => 'div',
            "dependency" => Array("element" => "n_icon", "value" => "attribute")
        ),
        array(
            "type" => "vc_link",
            "param_name" => "link",
            "heading" => esc_html__("Social icon link", 'themetonaddon'),
        ),
        array (
            "type" => "textfield",
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            'admin_label' => true,
            'holder' => 'div',
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
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