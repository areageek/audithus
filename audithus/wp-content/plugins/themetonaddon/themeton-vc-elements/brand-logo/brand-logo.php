<?php

if (!class_exists('WPBakeryShortCode_mungu_swiper')) {
class WPBakeryShortCode_mungu_swiper extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract( shortcode_atts( array(
            "list" => "",
            "slide_per_view" => "6",
            'extra_class' => '',
            'css' => ''
        ), $atts ) );

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_swiper', $atts );
        $extra_class .= ' '.$css_class;
        $list = vc_param_group_parse_atts($list);
        $lists = '';
        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                $atach_src = wp_get_attachment_image_src($image, 'large');
                $image = is_array($atach_src) ? $atach_src[0] : "";
                $link = isset($item['link']) ? $item['link'] : "";
                $link = !empty($link) ? "$link" : "";

                $lists .= "<div class='swiper-slide '>
                                <section class='uk-flex-center uk-flex'>
                                   <a href='$link'><img src='".esc_attr($image)."' alt='".get_bloginfo( 'name' )."'></a>
                                </section>
                            </div>";
            
            }
        }
        $result = "<div class='brand-logo $extra_class' data-col='$slide_per_view'>
                        <div class='swiper-container brand-container'>
                            <div class='swiper-wrapper uk-scrollspy'>
                                $lists
                            </div>
                        </div>
                        <div class='brand-btn button-prev swiper-button-prev'><i class='fa fa-chevron-left'></i></div>
                        <div class='brand-btn button-next swiper-button-next'><i class='fa fa-chevron-right'></i></div>
                    </div>";
        return $result; 
    }
}
}

vc_map( array(
    "name" => esc_html__("Brand logo slider", 'themetonaddon'),
    "base" => "mungu_swiper",
    "class" => "",
    "icon" => "mungu-vc-icon mungu-vc-icon50",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => 'textfield',
            "param_name" => "slide_per_view",
            "heading" => esc_html__("Show preview", 'themetonaddon'),
            "value" => '6'
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'themetonaddon'),
            'param_name' => 'list',
            'value' => '',
            'params' => array(
                
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Url..', 'themetonaddon'),
                    'param_name' => 'link',
                    'value' => '#',
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
) );