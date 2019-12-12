<?php

if (!class_exists('WPBakeryShortCode_tab')) {
class WPBakeryShortCode_tab extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'shadows' => "uk-box-shadow-small",
            'border' => false,
            'icons' => '',
            'size' => '',
            "href" => '',
            'icon_type' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'tab', $atts );
        $class .= ' '.$css_class;
        $result = $switcher = '';
        $tabid = 0;

        if(isset($atts['group'])) {
            $group = vc_param_group_parse_atts( $atts['group']);
            foreach ((array)$group as $val) { 
                (isset($val['title'])) ? $title = ($val['title']) : '';
                (isset($val['body'])) ? $body = ($val['body']) : '';
                if(isset($val['icon'])) {
                    $image = wp_get_attachment_image($val['icon'], 'full');
                    $title = $image . $title;
                }
                ++$tabid;
                $active = " class='uk-active'";
                if ($tabid > 1) {
                    $active = "";
                }
                $result .= "<li $active><a class='mungu-tab-title mr10 mr3@s'><h3>$title</h3></a></li>";
                $switcher .="<li class='uk-animation-fade'>$body</li>";
            }
            $titlestyle = "uk-child-width-expand";
            if($border != true) {
                $class .= ' no-border';
                $titlestyle = "uk-child-width-auto uk-flex uk-flex-bottom";
            }
            
            $result = "
            <div class='mungu-element $class'>
                <ul class='$titlestyle uk-tab'>
                    " . $result . "
                </ul>
                <ul class='uk-switcher uk-margin uk-animation-fade'>
                " . $switcher . "
                </ul>
            </div>";
        }
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Tab', 'themetonaddon'),
    "description" => esc_html__("Next tab", 'themetonaddon'),
    "base" => 'tab',
    "icon" => "mungu-vc-icon mungu-vc-icon31",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => 'checkbox',
            "param_name" => "border",
            'value' => true,
            "heading" => esc_html__("Tab Border", 'themetonaddon'),
        ),
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group',
            "params" => array(
                array(
                    "type" => 'textfield',
                    "param_name" => "title",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Title of the tab", 'themetonaddon'),
                ),
                array(
                    "type" => 'textarea',
                    "param_name" => "body",
                    'admin_label' => false,
                    "heading" => esc_html__("Body text", 'themetonaddon'),
                ),
                array(
                    "type" => 'attach_image',
                    "param_name" => "icon",
                    'admin_label' => false,
                    "heading" => esc_html__("Title icon image (optional)", 'themetonaddon'),
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