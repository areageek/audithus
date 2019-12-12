<?php

if (!class_exists('WPBakeryShortCode_video_player')) {
class WPBakeryShortCode_video_player extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'width' => '520',
            'height' => '290',
            'icon_position' => 'left',
            'url' => 'https://www.youtube.com/watch?v=wQ2TN_gI3sE',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'video_player', $atts );
        $class .= ' '.$css_class;
        $containerwidth = $width+90;
        $queryString = parse_url($url, PHP_URL_QUERY);

        parse_str($queryString, $params);
        if (isset($params['v'])) {
            $thumbnail = "http://i3.ytimg.com/vi/{$params['v']}/maxresdefault.jpg";
            $thumbnail = "<img class='' src='".$thumbnail."' alt='Youtube video thumbail' style='height: ".$height."px; width: ".$width."px;'>";
        }
        $embed_code = wp_oembed_get( $url , array( 'width' => $width , 'height' => $height ) );
        
        if ($icon_position =='left') {
            $result = '
            <div class="mungu-element mungu-video-player uk-flex-inline '.$class.'">
                <div class="uk-flex uk-flex-center uk-flex-middle video-player-left " style="height: '.$height.'px; ">
                    <div class="play-button-con uk-flex uk-flex-center uk-flex-middle">
                        <button class="icobutton uk-toggle" data-uk-toggle="target: .toggle"><span class="fa fa-play"></span></button>
                    </div>
                </div>
                <div class="toggle uk-animation-fade">'. $thumbnail . '</div>
                <div class="toggle uk-animation-fade" style="height: '.$height.'px; width: '.$width.'px;" hidden>'. $embed_code . '</div>
            </div>';
        }
        else {
            $result = '
            <div class="mungu-element mungu-video-player uk-flex-inline '.$class.'">
                <div class="toggle">'. $thumbnail . '</div>
                <div class="toggle" style="height: '.$height.'px; width: '.$width.'px;" hidden>'. $embed_code . '</div>
                <div class="uk-flex uk-flex-center uk-flex-middle video-player-right uk-float-right" style="height: '.$height.'px; ">
                    <div class="play-button-con uk-flex uk-flex-center uk-flex-middle">
                        <button class="icobutton uk-toggle" data-uk-toggle="target: .toggle"><span class="fa fa-play"></span></button>
                    </div>
                </div>
            </div>';
        }
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Video Player', 'themetonaddon'),
    "description" => esc_html__("Next Medical video player", 'themetonaddon'),
    "base" => 'video_player',
    "icon" => "mungu-vc-icon mungu-vc-icon73",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => 'textfield',
            "param_name" => "url",
            "heading" => esc_html__("URL", 'themetonaddon'),
            'description' => esc_html__('Enter your URL. Example: https://www.youtube.com/watch?v=2PuFyjAs7JA', 'themetonaddon'),
            "holder" => 'div',
            'admin_label' => true,
        ),
        array(
            "type" => 'textfield',
            "param_name" => "width",
            "heading" => esc_html__("Width", 'themetonaddon'),
            'description' => esc_html__('Please enter your size without PX or EM etc.', 'themetonaddon'),
            "holder" => 'div',
            'admin_label' => true,
            "std" => '520'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "height",
            "heading" => esc_html__("Height", 'themetonaddon'),
            'description' => esc_html__('Please enter your size without PX or EM etc..', 'themetonaddon'),
            "holder" => 'div',
            'admin_label' => true,
            "std" => '290'
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "icon_position",
            "heading" => esc_html__("Icon position", 'themetonaddon'),
            "value" => array(
                esc_html__( 'Left', 'themetonaddon' ) => 'left',
                esc_html__( 'Right', 'themetonaddon' ) => 'right',
            ),
            "std" => "left",
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