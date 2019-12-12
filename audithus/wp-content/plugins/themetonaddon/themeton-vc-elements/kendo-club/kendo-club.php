<?php
if (!class_exists('WPBakeryShortCode_kendo_club')) {
class WPBakeryShortCode_kendo_club extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'title' => '',
            'subtitle' => '',
            'body' => '',
            'image' => '',
            'footer' => '',
            'icon' => '',
            'color' => '',
            'size' => '',
            'href' => '',
            'icon_type' => '',
            'style_layout' => 'Default',
            'icon_type' => '',
            'image' => '',
            'imagesize' => '80x80',
            'alignment' => 'left',
            'price' => '',
            'list' => '',
            'list_text' => '',
            'conbutton' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'pricetable', $atts );
        $class .= ' '.$css_class;

        $href = vc_build_link( $href );
        $url = ($href['url']);
        $btntxt = ($href['title']);
        $conbutton = vc_build_link ($conbutton);
        $rel = $conbutton["rel"]!=''?'rel="'.$conbutton["rel"].'"':'';
        $target = $conbutton["target"]!=''?'target="'.$conbutton["target"].'"':'';

        $img = '';
        $imgsize = explode('x', $imagesize);
        $imgsize = is_array($imgsize) ? $imgsize : array(64, 64);
        $icon = wp_get_attachment_image_src($image, $imgsize);
        $icon = "<img src='".$icon[0]."' height='50' alt='$title'/>";
        $result="<div class='kitem uk-card uk-card-default uk-padding-large uk-card-body pt6 pb6'>
                         $icon
                        <h3>$title</h3>
                        <span>$subtitle</span>
                        <p>$body</p>
                        <a class='uk-button bordered' $rel $target href='".$conbutton["url"]."'>".esc_html($conbutton["title"])."</a>
                    </div>";

        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('bushido Club', 'themetonaddon'),
    "base" => 'kendo_club',
    "icon" => "mungu-vc-icon mungu-vc-icon42",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
    
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image Image", 'themetonaddon'),
            "value" => '',
        ),
        array(
            "type" => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "holder" => 'div'
        ),

        array(
            "type" => 'textfield',
            "param_name" => "subtitle",
            "heading" => esc_html__("Sub title", 'themetonaddon'),
            "holder" => 'div',
        ),
       
        array(
            "type" => 'textarea',
            "param_name" => "body",
            "heading" => esc_html__("Description", 'themetonaddon')
        ),
        array(
            "type" => "vc_link",
            "param_name" => "conbutton",
            "heading" => esc_html__("URL", 'themetonaddon'),
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