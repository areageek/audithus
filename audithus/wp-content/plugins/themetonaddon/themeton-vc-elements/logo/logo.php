<?php

if (!class_exists('WPBakeryShortCode_logo')) {
class WPBakeryShortCode_logo extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'logo' => 'default',
            'link' => '',
            'logo_width' => '',
            'image' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'logo', $atts );
        $class = esc_attr($extra_class);
        if ($logo == 'default') return sprintf('<div class="%s %s">%s</div>',
        $class,
        $css_class,
        Themeton_Tpl::get_logo(true,$logo_width));

        if ($logo == 'custom_logo') {
            $link = vc_build_link($link);
            $img = wp_get_attachment_image_src( $image, 'full', false );
            if ($logo_width != '') $logo_width = sprintf('style="width:%spx;"',abs($logo_width));
            return sprintf('<div class="%s %s"><a href="%s" target="%s"><img src="%s" alt="%s" %s/></a></div>',
            $css_class,$class,$link['url'],($link['target']==''?'_self':$link['target']),$img[0], get_bloginfo('name'),$logo_width);
        }
    }
} 
}

vc_map( array(
    "name" => esc_html__('Logo', 'themetonaddon'),
    "description" => esc_html__("Themeton Builder Logo Element", 'themetonaddon'),
    "base" => 'logo',
    "icon" => "mungu-vc-icon mungu-vc-icon62",
    "class" => 'mungu-vc-element',
    "content_element" => true, 
    "category" => 'Themeton',
    'params' => array(
         array(
            "type" => "dropdown",
            "param_name" => "logo",
            "heading" => esc_html__("Logo", 'themetonaddon'),
            "value" => array(
                "Default Logo" => "default",
                "Custom Logo" => "custom_logo"
            ),
            "std" => 'default'
        ),
        array(
            "type" => "attach_image",
            "param_name" => "image",
            "heading" => esc_html__("Insert image", 'themetonaddon'),
            "dependency" => Array("element" => "logo", "value" => "custom_logo")
        ),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Width', 'themetonaddon' ),
			'param_name' => 'logo_width'
		),
        array(
            "type" => "vc_link",
            "param_name" => "link",
            "heading" => esc_html__("Insert logo link", 'themetonaddon'),
            "dependency" => Array("element" => "logo", "value" => "custom_logo"),
            "holder" => 'div'
        ),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'themetonaddon' ),
			"param_name" => "extra_class",
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themetonaddon' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
			"param_name" => "css",
			'group' => esc_html__( 'Design Options', 'themetonaddon' ),
		),
    )
));