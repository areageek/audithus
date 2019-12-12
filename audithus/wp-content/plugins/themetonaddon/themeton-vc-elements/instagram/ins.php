<?php

if (!class_exists('WPBakeryShortCode_instagram_post')) {
class WPBakeryShortCode_instagram_post extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'title'             => '',
            'inst_user_id'      => '4133713418',
            'inst_token_no'     => '4133713418.1677ed0.5d43c50f69a7474f9d3d30cb3b6954c8',
            'img_limit'         => '4',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'instagram_post', $atts );

        wp_enqueue_script( 'instafeed', get_template_directory_uri() . '/vendors/instafeed.min.js', array('jquery'), false, true );
        
        $extra_class .= ' '.$css_class;
        $result = $title_html = '';
        $title_html = $title != '' ? '<h4 class="uk-text-uppercase ins-title">'.$title.'</h4>' : '';
        $result = '<div class="instagram-widget-item '.$extra_class.'">
                        '.$title_html.'
                        <ul id="instafeed" data-id="'.esc_attr($inst_user_id).'" data-token="'.esc_attr($inst_token_no).'" data-count="'.esc_attr($img_limit).'">
                        </ul>
                    </div>';

        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Instagram', 'themetonaddon'),
    "description" => esc_html__("instagram post", 'themetonaddon'),
    "base" => 'instagram_post',
    "content_element" => true,
    "icon" => "mungu-vc-icon mungu-vc-icon25",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
         array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'themetonaddon' ),
            'param_name' => 'title',
            'value' => '',
            "holder" => 'div'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'User ID', 'themetonaddon' ),
            'description' => esc_html__( 'Enter Instagram User ID.', 'themetonaddon' ),
            'param_name' => 'inst_user_id',
            'value' => '',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Access Token', 'themetonaddon' ),
            'description' => esc_html__( 'Enter Your Access Token.', 'themetonaddon' ),
            'param_name' => 'inst_token_no',
            'value' => '',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Limit', 'themetonaddon' ),
            'description' => esc_html__( 'Images Number.', 'themetonaddon' ),
            'param_name' => 'img_limit',
            'value' => 7,
            'admin_label' => true,
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