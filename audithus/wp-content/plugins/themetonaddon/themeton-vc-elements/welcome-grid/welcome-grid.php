<?php
if (!class_exists('WPBakeryShortCode_welcome_grid')) {
class WPBakeryShortCode_welcome_grid extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'link' => '',
            'image' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'accordion', $atts );
        $class .= ' '.$css_class;
        $result = $multiple = '';
        $link = vc_build_link ($link);
        
        $image_url = wp_get_attachment_image_src($image, 'full');
        $image = is_array($image_url) ? $image_url[0] : "";
        $group = vc_param_group_parse_atts( $atts['group']);
        $animation_delay = '';
        foreach ((array)$group as $val) { 
            ++$animation_delay;
            (isset($val['title'])) ? $title = ($val['title']) : '';
            $result .= "
            <p class='animation-delay-0$animation_delay uk-animation-slide-bottom-small'>$title</p>";
        }
        $title_link = '';
        if ($link["title"]!="") {
            $link["target"] = array_key_exists('target', $link) && !empty($link["target"]) ? $link["target"] : '_self';
            $title_link = "
            <div class='uk-card-body uk-flex uk-flex-middle uk-flex-between uk-child-width-auto uk-grid'>
                <div><a href='" . $link['url'] . "' rel='" . $link['rel'] . "' target='" . $link['target'] . "' class='uk-button-text text-white'>" . $link['title'] . "</a></div>
                <a href='" . $link['url'] . "' rel='" . $link['rel'] . "' target='" . $link['target'] . "'>
                <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' data-name='icon arrow' x='0px' y='0px' viewBox='0 0 50 50' style='' xml:space='preserve' width='35px' height='35px' class='default-arrow-next'>
                    <path style='fill:none;stroke:#ffffff;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;' d='M46.525,25L2.025,25' class='yGXnEgOA_0'/>
                    <path style='fill:none;stroke:#ffffff;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;' d='M38.025,35L47.625,25L38.025,15' class='yGXnEgOA_1'/>
                </svg>
                </a>
            </div>"; 
        }
        $result = "
        <div class='uk-grid-medium uk-child-width-1-1@s uk-text-center demo-grid uk-grid uk-scrollspy mungu-element $class'>
            <div>
                <div class='uk-card uk-card-small uk-card-default'>
                    <div class='uk-card-media-top uk-transition-toggle uk-position-relative'>
                        <img src='" . $image . "' alt='".esc_attr__('Image','themetonaddon')."'>
                        <a href='" . $link['url'] . "' rel='" . $link['rel'] . "' target='" . $link['target'] . "' class='uk-transition-fade uk-animation-toggle uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle uk-flex-column'>
                            " . $result . "
                        </a>
                    </div>
                    " . $title_link . "
                </div>
            </div> 
        </div>";
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Image with hover', 'themetonaddon'),
    "base" => 'welcome_grid',
    "icon" => "mungu-vc-icon mungu-vc-icon35",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "vc_link",
            "param_name" => "link",
            "heading" => esc_html__("URL", 'themetonaddon'),
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image", 'themetonaddon'),
            "value" => '',
        ),
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group',
            // Note params is mapped inside param-group:
            "params" => array(
                array(
                    "type" => 'textfield',
                    "param_name" => "title",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Hover text", 'themetonaddon'),
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
