<?php
   
if (!class_exists('WPBakeryShortCode_header_container')) {
class WPBakeryShortCode_header_container extends WPBakeryShortCodesContainer {

    protected function content( $atts, $content = NULL){

         extract(shortcode_atts(array(
            'responsive' => '',
			'align' => '',
			'halign' => '',
			'item_flex' => 'uk-child-width-auto',
            'extra_class' => '',
            'css' => ''
         ), $atts));
        $grid = '';
		$class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'header_container', $atts );
        if ($responsive == 'yes') { $item_flex = $item_flex.'@m'; $grid = 'uk-grid'; }
        $result = "";
        $result .= sprintf('<div class="flex-container uk-flex %s %s %s %s %s %s">%s</div>',
        $grid,
		$halign,
		$css_class,
		$class,
		$align,
		$item_flex,
		do_shortcode($content)
		);
        return $result;
    }
}
}

vc_map( array(
    'name' => esc_html__( 'Flexbox Container', 'themetonaddon' ),
	'base' => 'header_container',
	'icon' => 'mungu-vc-icon mungu-vc-icon77',
    "class" => 'mungu-vc-element',
	"content_element" => true,
	'is_container' => true,
	"show_settings_on_create" => false,
	"category" => 'Themeton',
	'description' => esc_html__( 'Enables a flex context.', 'themetonaddon' ),
	'params' => array(
        array(
            "type" => "checkbox",
            "heading" => esc_html__( "Responsive active?", 'themetonaddon' ),
            "param_name" => "responsive",
            "value" => array( esc_html__( 'Yes', 'themetonaddon' ) => 'yes' ),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "item_flex",
            "heading" => esc_html__("Child Width", 'themetonaddon'),
            "value" => array(
                "Auto" => "uk-child-width-auto",
                "Expand" => "uk-child-width-expand"
            ),
            "std" => "uk-child-width-auto",
		),
        array(
            "type" => "dropdown",
            "param_name" => "halign",
            "heading" => esc_html__("Content vertical alignment", 'themetonaddon'),
            "value" => array(
                "Top" => "uk-flex-top",
                "Middle" => "uk-flex-middle",
				"Bottom" => "uk-flex-bottom"
            ),
            "std" => "uk-flex-left",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "align",
            "heading" => esc_html__("Content horizontal alignment", 'themetonaddon'),
            "value" => array(
                "Left" => "uk-flex-left",
                "Center" => "uk-flex-center",
                "Right" => "uk-flex-right",
                "Around" => "uk-flex-around",
                "Between" => "uk-flex-between"
            ),
            "std" => "uk-flex-left",
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
	),
	"js_view" => 'VcColumnView'
));