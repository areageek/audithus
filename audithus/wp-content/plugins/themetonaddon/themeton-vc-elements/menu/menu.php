<?php

if (!class_exists('WPBakeryShortCode_menu')) {
class WPBakeryShortCode_menu extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'menu' => '',
            'select' => 'normal',
            'extra_class' => '',
            'css' => ''
        ), $atts));
 
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'menu', $atts );
        $class_style = '';
        if ($select == 'normal') $class_style = 'themeton-menu-normal';
        if ($select == 'style1') $class_style = 'themeton-menu-left-border';
        if ($select == 'style2') $class_style = 'themeton-menu-top-border';
        $menu = wp_nav_menu( array(
            'menu'              => $menu,
            'menu_class'        => 'themeton-menu uk-flex '.$class_style.' '.$css_class.' '.$extra_class ,
            'container'         => '',
            'fallback_cb'       => 'themeton_primary_callback',
            'echo'              => false
        ) );
        return sprintf('%s',$menu);
    }
}
}
function mungu_get_menu_atr() {
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    $attr = array();
    $attr['none'] = 'None';
    foreach ($menus as $value) {
        $attr[$value->term_id] = $value->name;
    }
    return $attr;
}
$mungu_menu_style_path = plugin_dir_url(__FILE__) .'/style';
mungu_get_menu_atr();
vc_map( array(
    "name" => esc_html__('Next Menu', 'themetonaddon'),
    "description" => esc_html__("Next menu elements", 'themetonaddon'),
    "base" => 'menu',
    "icon" => "mungu-vc-icon mungu-vc-icon64",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "select_preview",
            "param_name" => "select",
            "heading" => esc_html__("Menu Style", 'themetonaddon'),
            "value" => array(
                "Normal" => array(
                    "value" => "normal",
                    "image_url" => $mungu_menu_style_path.'/standart.jpg',
                ),
                "Left Border" => array(
                    "value" => "style1",
                    "image_url" => $mungu_menu_style_path.'/style1.jpg',
                ),
                "Top Border" => array(
                    "value" => "style2",
                    "image_url" => $mungu_menu_style_path.'/style2.jpg',
                ),
            ),
            "std" => "normal",
            "holder" => 'div'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "menu",
            "heading" => esc_html__("Menu", 'themetonaddon'),
            "value" => mungu_get_menu_atr(),
            "std" => 'none'
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. Please look at helper classes in the documentation.", 'themetonaddon'),
        ),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'themetonaddon' ),
		),
    )
));