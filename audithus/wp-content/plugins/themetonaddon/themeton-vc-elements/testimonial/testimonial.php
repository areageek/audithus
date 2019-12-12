<?php

if (!class_exists('WPBakeryShortCode_testimonial')) {
class WPBakeryShortCode_testimonial extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'bg_image' => '',
            'title' => '',
            'sub_title' => '',
            'description' => '',
            'name' => '',
            'body' => '',
            'image' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'tab', $atts );
        $class .= ' '.$css_class;
        $lists = '';

        if(isset($atts['group'])) {
            $group = vc_param_group_parse_atts( $atts['group']);
            foreach ((array)$group as $val) { 
                (isset($val['title'])) ? $title = ($val['title']) : '';
                (isset($val['sub_title'])) ? $sub_title = ($val['sub_title']) : '';
                (isset($val['description'])) ? $description = ($val['description']) : '';
                (isset($val['name'])) ? $name = ($val['name']) : '';
                (isset($val['body'])) ? $body = ($val['body']) : '';
                if(isset($val['image'])) {
                    $image = wp_get_attachment_image_src($val['image'], 'full');
                    $image = is_array($image) ? $image[0] : "";
                }
                if(isset($val['bg_image'])) {
                    $bg_image = wp_get_attachment_image_src($val['bg_image'], 'full');
                    $bg_image = is_array($bg_image) ? $bg_image[0] : "";
                }
                $lists .= '
                <li>
                    <img src="'. $bg_image .'" alt="" class="uk-cover" >
                    <div class="uk-overlay uk-overlay-default uk-position-center-right uk-position-small uk-transition-fade">
                        <span class="uk-margin-remove">'. $sub_title .'</span>
                        <h3 class="uk-margin-remove">'. $title .'</h3>
                        <p class="uk-text-break mt3">'. $body .'</p>
                        <div class="uk-grid uk-child-width-auto uk-flex uk-flex-between">
                        <div class="uk-grid uk-grid-small uk-width-expand">
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <img class="uk-border-circle" src="'. $image .'" width="55" height="55" alt="Border circle">
                            </div>
                            <div class="uk-width-expand uk-grid uk-child-width-1-1">
                                <div class="testimonial-name uk-flex uk-flex-bottom"><span>'. $name .'</span></div>
                                <div class="testimonial-desc uk-flex uk-flex-top"><span>'. $description .'</span></div>
                            </div>
                        </div>
                        <div class="uk-flex uk-flex-right uk-flex-middle uk-width-auto@m uk-width-1-1@s mt0@m mt3@s">
                            <a class="mr3" href="#" data-uk-slideshow-item="previous"><svg width="10" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg></a>
                            <a class="" href="#" data-uk-slideshow-item="next"><svg width="10" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>
                        </div>
                        </div>
                    </div>
                </li>';
            }
            $result = '
            <div class="uk-position-relative testimonial uk-visible-toggle '. $class .' " data-uk-slideshow="animation: pull; max-height: 803; min-height: 803;">
                <ul class="uk-slideshow-items">
                '. $lists .'
                </ul>
            </div>';
        }
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Testimonial', 'themetonaddon'),
    "description" => esc_html__("(New)", 'themetonaddon'),
    "base" => 'testimonial',
    "icon" => "mungu-vc-icon mungu-vc-icon31",
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
                    "type" => 'attach_image',
                    "param_name" => "bg_image",
                    'admin_label' => false,
                    "heading" => esc_html__("Background image", 'themetonaddon'),
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "sub_title",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Subtitle", 'themetonaddon'),
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "title",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Title", 'themetonaddon'),
                ),
                array(
                    "type" => 'textarea',
                    "param_name" => "body",
                    'admin_label' => false,
                    "heading" => esc_html__("Body text", 'themetonaddon'),
                ),
                array(
                    "type" => 'attach_image',
                    "param_name" => "image",
                    'admin_label' => false,
                    "heading" => esc_html__("Avatar image", 'themetonaddon'),
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "name",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Name", 'themetonaddon'),
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "description",
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Description", 'themetonaddon'),
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