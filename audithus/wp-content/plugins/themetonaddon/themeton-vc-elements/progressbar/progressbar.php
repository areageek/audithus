<?php

if (!class_exists('WPBakeryShortCode_mungu_progress')) {
class WPBakeryShortCode_mungu_progress extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'value' => '50',
            'title' => 'Progress bar',
            'subtitle' => '',
            'css' => '',
            'extra_class' => ''
        ), $atts));
        $lists = $letter = $number = '';
        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_progress', $atts );
        $subtitle = $subtitle != "" ? "<div class='text-400'>$subtitle</div>": "";
        preg_match("/(\d+)(.*)/", $value, $matches);

        $lists.="<div class='mungu-element mungu-progress-bar $css_class $class'>
        <div class='uk-grid mungu-progress'>
            <div class='uk-width-auto mb1'><h3 class='text-700 mb0'>$title</h3>$subtitle</div>
            <h3 class='uk-width-expand uk-text-right mb1'><span class='counter'>$matches[1]</span><span>$matches[2]</span></h3>
        </div>
        <div class='mungu-progress'>
            <progress class='uk-progress counter' value='$matches[1]' max='100'></progress>
        </div>
        </div><!-- end element -->";

        return $lists;
    }
}
}

vc_map( array(
    "name" => esc_html__('Progress bar', 'themetonaddon'),
    "base" => "mungu_progress",
    "content_element" => true,
    "icon" => "mungu-vc-icon mungu-vc-icon47",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => 'textfield',
            "param_name" => "title",
            'admin_label' => true,
            "heading" => esc_html__("Title", 'themetonaddon'),
            "std" => 'Progress bar'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "subtitle",
            "heading" => esc_html__("Sub Title", 'themetonaddon'),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "value",
            'admin_label' => true,
            "heading" => esc_html__("Value", 'themetonaddon'),
            "std" => '50'
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
			'heading' => esc_html__('CSS box', 'themetonaddon' ),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'themetonaddon' ),
		),
    )
));