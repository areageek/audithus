<?php
if (!class_exists('WPBakeryShortCode_timeline')) {
class WPBakeryShortCode_timeline extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract( shortcode_atts( array(
            "style" => "1",
            'button' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts ) );

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'timeline', $atts );
        $extra_class .= ' '.$css_class;
        $result = '';
        if ($style==1) {
            if(isset($atts['group'])) {
                $group = vc_param_group_parse_atts( $atts['group']);
                $result .= "<div class='finaq-timeline-style1 $extra_class' data-uk-scrollspy='target: .uk-grid; cls:uk-animation-fade; delay: 500'>";
                foreach ((array)$group as $value) {
                    if(isset($value['image'])) {
                        $image = wp_get_attachment_image_src($value['image'], 'full');
                        $image = is_array($image) ? $image[0] : "";
                    }
                    else $image = '';
                    $button = vc_build_link ($value['button']);
                    $rel = $button["rel"]!=''?'rel="'.$button["rel"].'"':'';
                    $target = $button["target"]!=''?'target="'.$button["target"].'"':'';
            
                    if ($button["title"]!="") {
                        $button["target"] = array_key_exists('target', $button) && !empty($button["target"]) ? $button["target"] : '_self';
                        $button = '<a class="uk-button mt4" '.$rel.' '.$target.' href="'.$button["url"].'">'.esc_html($button["title"]).'</a>'; 
                    }
                    $result .= "<div class='uk-grid uk-grid-match mb9 mb5@s'>
                    <div class='uk-width-3-5@m' style='background-image:url(".$image."); background-size:cover; background-position:center center;'></div>
                    <div class='uk-width-2-5@m pl0 pt6 pl5@s pb6 pr5 pr0@s uk-flex-first@s'>
                    <span class='mb1'>".esc_html($value['subtitle'])."</span>
                    <h1 class='title mt0 mb4'>".esc_html($value['title'])."</h1>
                    <p class='desc pr6 mt0 pr0@s'>".$value['desc']."</p>
                    $button
                    </div>
                    </div>";
                }
                $result .= "</div>";
            }
        }
        if ($style==2) {
            if(isset($atts['group2'])) {
                $group = vc_param_group_parse_atts( $atts['group2']);
                $mbutton = '';
                $button = vc_build_link ($button);
                    $rel = $button["rel"]!=''?'rel="'.$button["rel"].'"':'';
                    $target = $button["target"]!=''?'target="'.$button["target"].'"':'';
            
                    if ($button["title"]!="") {
                        $button["target"] = array_key_exists('target', $button) && !empty($button["target"]) ? $button["target"] : '_self';
                        $mbutton = '<a class="uk-button mt9 mt4@s" '.$rel.' '.$target.' href="'.$button["url"].'">'.esc_html($button["title"]).'</a>';
                    }
                $result .= "<div class='finaq-timeline-style2 $extra_class' data-uk-scrollspy='target: .uk-grid; cls:uk-animation-fade; delay: 500'>";
                $i=0; $fbutton = '';
                foreach ((array)$group as $value) {
                    $i++;
                    if ($i==count($group)) $fbutton = $mbutton;
                    $result .= "<div class='uk-grid uk-grid-match mb8 mb5@s'>
                    <div class='uk-width-auto@m'><h1 class='year mt1'>".esc_html($value['subtitle'])."</h1></div>
                    <div class='uk-width-expand@m'>
                    <h1 class='title mt0 mb1'>".esc_html($value['title'])."</h1>
                    <p class='desc pr6 mt0 pr0@s'>".$value['desc']."</p>
                    $fbutton
                    </div>
                    </div>";
                }
                $result .= "</div>";
            }
        }
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Subsidiaries Timeline", 'themetonaddon'),
    "description" => esc_html__("Finaq theme element", 'themetonaddon'),
    "base" => "timeline",
    "content_element" => true,
    "category" => 'Themeton',
    "icon" => "mungu-vc-icon mungu-vc-icon38",
    "class" => 'mungu-vc-element',
    "params" => array(
        array(
            'type' => 'dropdown',
            "param_name" => "style",
            "heading" => esc_html__("Layout", 'themetonaddon'),
            "value" => array(
                "Subsidiaries" => "1",
                "Achievemenets" => "2",
            ),
            "std" => "1",
        ),
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group',
            "params" => array(
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon'),
                    "value" => ''
                ),
                array(
                    'type' => 'textfield',
                    "param_name" => "title",
                    "heading" => esc_html__("Title", 'themetonaddon'),
                    "value" => 'Title',
                    "holder" => 'div',
                ),
                array(
                    'type' => 'textfield',
                    "param_name" => "subtitle",
                    "heading" => esc_html__("Sub title", 'themetonaddon'),
                    "value" => 'STATISTC'
                ),
                array(
                    'type' => 'textarea',
                    "param_name" => "desc",
                    "heading" => esc_html__("Short Description", 'themetonaddon'),
                    "value" => 'Seamlessly provide access to distinctive vortals rather than multidisciplinary quality vectors.',
                ),
                array(
                    "type" => "vc_link",
                    "param_name" => "button",
                    "heading" => esc_html__("URL", 'themetonaddon'),
                ),
            ),
            "dependency" => Array("element" => "style", "value" => array("1"))
        ),
        array(
            "type" => 'param_group',
            "value" => '',
            "param_name" => 'group2',
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
                    "param_name" => "subtitle",
                    "heading" => esc_html__("Year", 'themetonaddon'),
                    "value" => '2018',
                ),
                array(
                    'type' => 'textarea',
                    "param_name" => "desc",
                    "heading" => esc_html__("Short Description", 'themetonaddon'),
                    "value" => 'Seamlessly provide access to distinctive vortals rather than multidisciplinary quality vectors.',
                ),
            ),
            "dependency" => Array("element" => "style", "value" => array("2"))
        ),
        array(
            "type" => "vc_link",
            "param_name" => "button",
            "heading" => esc_html__("URL", 'themetonaddon'),
            "dependency" => Array("element" => "style", "value" => array("2"))
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