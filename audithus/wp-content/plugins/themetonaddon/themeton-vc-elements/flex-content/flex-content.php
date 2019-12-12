<?php
   
if (!class_exists('WPBakeryShortCode_header_content')) {
class WPBakeryShortCode_header_content extends WPBakeryShortCodesContainer {

    protected function content( $atts, $content = NULL){

         extract(shortcode_atts(array(
			'child_width' => '',
			'align' => '',
			'halign' => '',
            'extra_class' => '',
            'css' => ''
         ), $atts));

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'header_content', $atts );
		$class = esc_attr($extra_class);
		if ($child_width=='yes') $child = '';
		else $child = 'uk-flex uk-child-width-auto';
        $result = "";
		$result .= sprintf('<div class="flex-container %s %s %s %s %s">%s</div>',
		$child,
		$halign,
		$css_class,
		$class,
		$align,
		do_shortcode($content)
		);
        return $result;
    }
}
}

vc_map( array(
    'name' => esc_html__( 'Flex Content', 'themetonaddon' ),
	'base' => 'header_content',
	'icon' => 'mungu-vc-icon mungu-vc-icon85',
	"class" => 'mungu-vc-element',
	"content_element" => true,
	'is_container' => true,
	"show_settings_on_create" => false,
	"category" => 'Themeton',
	'description' => esc_html__( 'Enables a flex context.', 'themetonaddon' ),
	'params' => array(
        array(
            "type" => "checkbox",
            "heading" => esc_html__( "child width auto remove?", 'themetonaddon' ),
            "param_name" => "child_width",
            "value" => array( esc_html__( 'Yes', 'themetonaddon' ) => 'yes' ),
            "description" => esc_html__( "flex child width auto remove", 'themetonaddon' ),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "align",
            "heading" => esc_html__("Content horizontal alignment", 'themetonaddon'),
            "value" => array(
                "Left" => "uk-flex-left",
                "Center" => "uk-flex-center",
				"Right" => "uk-flex-right"
            ),
            "std" => "uk-flex-left",
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