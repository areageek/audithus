<?php
if (!class_exists('WPBakeryShortCode_realtimeline')) {
class WPBakeryShortCode_realtimeline extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract( shortcode_atts( array(
            "style" => "1",
            'content'   => 'Content',
            'title' => 'Title',
            'time'  => '2018',
            'extra_class' => '',
            'css' => ''
        ), $atts ) );

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'timeline', $atts );
        $extra_class .= ' '.$css_class;
        $result = $slides = '';
        if(isset($atts['group'])) {
            $group = vc_param_group_parse_atts( $atts['group']);
            foreach ((array)$group as $val) { 
                (isset($val['title'])) ? $title = ($val['title']) : '';
                (isset($val['content'])) ? $content = ($val['content']) : '';
                (isset($val['time'])) ? $time = ($val['time']) : '';

                if (!empty($title)) {$title = "<div class='timeline-title'>$title</div>";}
                if (!empty($content)) {$content = "<div class='timeline-info'>$content</div>";}
                if (!empty($time)) {$time = "<div class='timeline-time'><span>$time</span></div>";}

                $slides .= "
                <li>
                    <span></span>
                    $title
                    $content
                    $time
                </li>";
            }

            $result = "
            <div class='uk-timeline'>
                <ul>
                    $slides
                </ul>
            </div>
            ";
        }
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Timeline NEW", 'themetonaddon'),
    "description" => esc_html__("Simple timeline", 'themetonaddon'),
    "base" => "realtimeline",
    "content_element" => true,
    "category" => 'Themeton',
    "icon" => "mungu-vc-icon mungu-vc-icon38",
    "class" => 'mungu-vc-element',
    "params" => array(
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group',
            "params" => array(
                array(
                    'type' => 'textfield',
                    "param_name" => "title",
                    "heading" => esc_html__("Title", 'themetonaddon'),
                    "value" => 'Title',
                    "holder" => 'div',
                ),
                array(
                    'type' => 'textfield',
                    "param_name" => "time",
                    "heading" => esc_html__("Time", 'themetonaddon'),
                    "value" => '2018'
                ),
                array(
                    'type' => 'textarea',
                    "param_name" => "content",
                    "heading" => esc_html__("Content", 'themetonaddon'),
                    "value" => '',
                ),
            ),
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
)
);
