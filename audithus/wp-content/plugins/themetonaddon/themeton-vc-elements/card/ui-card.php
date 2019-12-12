<?php

if (!class_exists('WPBakeryShortCode_ui_card')) {
class WPBakeryShortCode_ui_card extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'link' => esc_html__("Title",'themetonaddon'),
            'image' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'ui_card', $atts );
        $class .= ' '.$css_class;

        $group = vc_param_group_parse_atts( $atts['group']);
        $list = '';
        foreach ((array)$group as $val) {
            (isset($val['link'])) ? $link = ($val['link']) : '';
            $link = vc_build_link( $link );
            $image = isset($val['image']) ? $val['image'] : "";
            $image = wp_get_attachment_image_src($image, get_template().'-project-thumb');
            $image = is_array($image) ? $image[0] : "";
            

            $list .= "
            <div class='uk-inline outer uk-overflow-hidden'>
                <div class='uk-overlay-primary uk-position-cover'></div>
                <div class='image-shape uk-background-cover' data-bg-image='$image'></div>
                <div class='uk-position-center'><a href='" .$link['url']. "' class='text-white'>" .$link['title']. "</a></div>
            </div>";
        }
        
        $result = "
        <div class='mungu-element uk-flex uk-flex-center middle shaped-photos-element $class'>
            $list
        </div>";

        return $result;

    }
}
}

vc_map( array(
    "name" => esc_html__('Shaped photos', 'themetonaddon'),
    "description" => esc_html__("Diamond shaped photos with text", 'themetonaddon'),
    "base" => 'ui_card',
    "icon" => "mungu-vc-icon mungu-vc-icon52",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group',
            "params" => array(
                array(
                    'type' => 'vc_link',
                    'value' => 'Title',
                    "heading" => esc_html__("Title & Link", 'themetonaddon'),
                    'param_name' => 'link',
                    "std" => "Title",
                    'admin_label' => true
                ),
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon'),
                    "value" => '',
                    "std" => "show",
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