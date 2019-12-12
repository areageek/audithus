<?php
if (!class_exists('WPBakeryShortCode_themeton_post_cat')) {
class WPBakeryShortCode_themeton_post_cat extends WPBakeryShortCode {
    protected function getFontsData( $fontsString ) {   
        // Font data Extraction
        $googleFontsParam = new Vc_Google_Fonts();      
        $fieldSettings = array();
        $fontsData = strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
        return $fontsData;
         
    }
     
    // Build the inline style starting from the data
    protected function googleFontsStyles( $fontsData ) {
         
        // Inline styles
        $fontFamily = explode( ':', $fontsData['values']['font_family'] );
        $styles[] = 'font-family:' . $fontFamily[0];
        $fontStyles = explode( ':', $fontsData['values']['font_style'] );
        $styles[] = 'font-weight:' . $fontStyles[1];
        $styles[] = 'font-style:' . $fontStyles[2];
         
        $inline_style = '';     
        foreach( $styles as $attribute ){           
            $inline_style .= $attribute.'; ';       
        }   
         
        return $inline_style;
         
    }
     
    // Enqueue right google font from Googleapis
    protected function enqueueGoogleFonts( $fontsData ) {
         
        // Get extra subsets for settings (latin/cyrillic/etc)
        $settings = get_option( 'wpb_js_google_fonts_subsets' );
        if ( is_array( $settings ) && ! empty( $settings ) ) {
            $subsets = '&subset=' . implode( ',', $settings );
        } else {
            $subsets = '';
        }
         
        // We also need to enqueue font from googleapis
        if ( isset( $fontsData['values']['font_family'] ) ) {
            wp_enqueue_style( 
                'vc_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ), 
                '//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets
            );
        }
         
    }
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'default_font' => '',
            'font_size' => '',
            'color' => '',
            'fontfamily' => '',
            'line_height' => '',
            'text_align' => 'left',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'themeton_post_cat', $atts );
        $extra_class .= ' '.$css_class;
        $style = $text_font_inline_style = '';
        if (isset($font_size) && $font_size!='') $style .= 'font-size:'.$font_size.';';
        if (isset($color) && $color!='') $style .= 'color:'.$color.';';
        if (isset($line_height) && $line_height!='') $style .= 'line-height:'.$line_height.';';
        if (isset($text_align)) $style .= 'text-align:'.$text_align.';';
        if ($default_font!='yes') {
            if (isset($fontfamily) && $fontfamily!='') {
                $text_font_data = $this->getFontsData( $fontfamily );
                $text_font_inline_style = $this->googleFontsStyles( $text_font_data );   
                $this->enqueueGoogleFonts( $text_font_data );
            }
            if ($text_font_inline_style!='')  $style .= $text_font_inline_style;
        }
        if ($style!='') $style = 'style="'.$style.'"';

        $categories = get_the_category();
        $output = '';
        if (!empty($categories)) {
            $output = esc_html($categories[0]->name);
            return sprintf("<h4 class='%s' %s>%s</h4>",$extra_class,$style,$output);
        }
        return '';
    }
}
}

vc_map( array(
    "name" => esc_html__('Post category', 'themetonaddon'),
    "description" => esc_html__("First category name", 'themetonaddon'),
    "base" => 'themeton_post_cat',
    "icon" => "mungu-vc-icon mungu-vc-icon07",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "checkbox",
            "heading" => esc_html__( "Use theme default font family?", 'themetonaddon' ),
            "param_name" => "default_font",
            "value" => array( esc_html__( 'Yes', 'themetonaddon' ) => 'yes' ),
            "description" => esc_html__( "Use font family from the theme..", 'themetonaddon' ),
        ),
        array(
            "type" => "google_fonts",
            "param_name" => "fontfamily",
            "value" => "",
            "description" => esc_html__("Page title font family", 'themetonaddon'),
            'dependency' => array(
                'element' => 'default_font',
                'value_not_equal_to' => 'yes',
            ),
        ),
        array(
            "type" => "colorpicker",
            "param_name" => "color",
            "heading" => esc_html__("Font Color", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("font color.", 'themetonaddon')
        ),
        array(
            "type" => "textfield",
            "param_name" => "font_size",
            "heading" => esc_html__("Font Size", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("Page title font size example:53px", 'themetonaddon'),
        ),
        array(
            "type" => "textfield",
            "param_name" => "line_height",
            "heading" => esc_html__("Line Height", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("Page title font line height", 'themetonaddon'),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "text_align",
            "heading" => esc_html__("Page title align", 'themetonaddon'),
            "value" => array(
                "Left" => "left",
                "Center" => "center",
                "Right" => "right"
            ),
            "std" => 'left'
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
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));