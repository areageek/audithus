<?php
if (!class_exists('WPBakeryShortCode_uikit_carousel')) {
class WPBakeryShortCode_uikit_carousel extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'images' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'uikit_carousel', $atts );
        $class .= ' '.$css_class;
        $item = '';
        $images = explode(',',$images);
        foreach ($images as $attachment_id) {
            $url = wp_get_attachment_image_src( $attachment_id, 'full');
            $item .='<li><img src="'.$url[0].'" alt="upking" data-uk-cover></li>';
        }
        $result = '<div class="uk-position-relative uk-visible-toggle uk-light '.$class.'" data-uk-slideshow>
            <ul class="uk-slideshow-items">
                '.$item.'
            </ul>
            <a class="uk-slidenav-large upking-carousel-btn uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
            <a class="uk-slidenav-large upking-carousel-btn uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
        
        </div>';
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Uikit Carousel', 'themetonaddon'),
    "description" => esc_html__("Uikit Carousel", 'themetonaddon'),
    "base" => 'uikit_carousel',
    "icon" => "mungu-vc-icon mungu-vc-icon35",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            'type' => 'attach_images',
            "param_name" => "images",
            "heading" => esc_html__("Select images", 'themetonaddon'),
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
