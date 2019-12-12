<?php

if (!class_exists('WPBakeryShortCode_video_tab')) {
class WPBakeryShortCode_video_tab extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'video_tab', $atts );
        $class .= ' '.$css_class;
        $k = 0;
        $result = $switcher = $tab = $width = $height = '';
        if(isset($atts['group'])) {
        $switcher .= '<div class="uk-switcher uk-margin" id="video-panel">';
        $tab .= '<ul class="uk-subnav uk-subnav-pill uk-tab" uk-tab="connect: #video-panel">';
            $group = vc_param_group_parse_atts( $atts['group']);
            foreach ((array)$group as $val) { 
                (isset($val['video_url'])) ? $video_url = ($val['video_url']) : '';
                if(isset($val['icon'])) {
                    $image = wp_get_attachment_image($val['icon'], 'full');
                    $tab .= '<li><a href="javascript:;">'.$image.'</a></li>';
                }
                $embed_code = wp_oembed_get( $video_url, array( 'width' => '560' , 'height' => '315' ) );
                $switcher .= '
                <div class="uk-animation-fade">
                    <div class="thumbnail toggle-'.$k.'" data-thumbd="'.wp_get_attachment_image_src($val['icon'], 'full')[0].'">
                        <a href="#modal-media-youtube'.$k.'" class="uk-toggle uk-toggle">
                            <i class="uk-icon">
                                <svg width="50" height="50" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polygon fill="none" stroke="#000" stroke-width="1.1" points="8.5 7 13.5 10 8.5 13"></polygon><circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle></svg>
                            </i> PLAY VIDEO
                        </a>
                    </div>
                    <div id="modal-media-youtube'.$k.'" class="uk-flex-top uk-modal">
                        <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                            <button class="uk-modal-close-outside uk-close" type="button" data-uk-close></button>
                            '.$embed_code.'
                        </div>
                    </div>
                </div>';
                $k++;
            }
        $tab .= '</ul>';
        $switcher .= '</div>';
        }
        $result = sprintf('
            <div class="uk-grid uk-grid-match mungu-video-tab %s">
                <div class="uk-width-1-2@m video-back">
                %s
                </div>
                <div class="uk-width-1-2@m video-content">
                <h1>%s</h1><p>%s</p>%s
                </div>
            </div>
            ',$class,$switcher,$title,$content,$tab);
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Video Tab', 'themetonaddon'),
    "description" => esc_html__("Next Video Tab", 'themetonaddon'),
    "base" => 'video_tab',
    "icon" => "mungu-vc-icon mungu-vc-icon80",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "value" => "",
            "admin_label" => true
        ),
        array(
            "type" => "textarea_html",
            "param_name" => "content",
            "heading" => esc_html__("Body", 'themetonaddon'),
            "value" => "",
        ),
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group',
            "params" => array(
                array(
                    "type" => 'textfield',
                    "param_name" => "video_url",
                    'admin_label' => false,
                    "heading" => esc_html__("Youtube URL", 'themetonaddon'),
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