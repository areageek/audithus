<?php
if (!class_exists('WPBakeryShortCode_woo_ratting')) {
class WPBakeryShortCode_woo_ratting extends WPBakeryShortCode {
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
        extract(shortcode_atts(array(
            'rating_style' => '',
            'default_font' => '',
            'star_color' => '',
            'star_size' => '',
            'font_size' => '',
            'color' => '',
            'fontfamily' => '',
            'line_height' => '',
            'text_align' => 'left',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        global $product;

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_ratting', $atts );
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
        $average = $product->get_average_rating();

        if (get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) {
            if ($rating_style == 0) $content = '<span class="'.$extra_class.'" '.$style.'>'.round($average,1).'/5</span>';
            if ($rating_style == 1) {
                $star = '';
                $star_style = '';
                if ($star_color!='') $star_style .= 'color:'.$star_color.';';
                if ($star_size!='') $star_style .= 'font-size:'.$star_size.';';
                if ($star_style!='') $star_style = 'style="'.$star_style.'"';
                $total = round($average,1);
                if ($total==0) {
                    for ($i=1; $i<=5; $i++)
                    $star .= '<span class="fa fa-star-o" '.$star_style.'></span>';
                }
                else
                if ($total!=5) {
                    for ($i=1; $i<$total; $i++)
                    $star .= '<span class="fa fa-star" '.$star_style.'></span>';
                    if (is_float($total)) {
                        $star .= '<span class="fa fa-star-half-o" '.$star_style.'></span>';
                    }
                    else $star .= '<span class="fa fa-star" '.$star_style.'></span>';
                    for ($i=$total+1; $i<=5; $i++)
                        $star .= '<span class="fa fa-star-o" '.$star_style.'></span>';
                }
                else {
                    for ($i=0; $i<5; $i++)
                    $star .= '<span class="fa fa-star" '.$star_style.'></span>';
                }
                $content = '<div class="woo-single-star '.$extra_class.'">'.$star.'</div>';
            }
        }
        return $content;
    }
}
}

vc_map( array(
    "name" => esc_html__('Single Rating', 'themetonaddon'),
    "description" => esc_html__("Woocommerce Single Rating", 'themetonaddon'),
    "base" => 'woo_ratting',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => array(esc_html__('Themeton', 'themetonaddon'),esc_html__( 'WooCommerce', 'themetonaddon' )),
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "rating_style",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                "Number Ratting" => "0",
                "Star Ratting" => "1"
            ),
            "std" => '0',
            "admin_label" => true
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__( "Use theme default font family?", 'themetonaddon' ),
            "param_name" => "default_font",
            "value" => array( esc_html__( 'Yes', 'themetonaddon' ) => 'yes' ),
            "description" => esc_html__( "Use font family from the theme..", 'themetonaddon' ),
            'dependency' => array(
                'element' => 'rating_style',
                'value' => '0',
            ),
        ),
        array(
            "type" => "google_fonts",
            "param_name" => "fontfamily",
            "value" => "",
            "description" => esc_html__("WooCommerce Ratting font family", 'themetonaddon'),
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
            "description" => esc_html__("font color.", 'themetonaddon'),
            'dependency' => array(
                'element' => 'rating_style',
                'value' => '0',
            ),
        ),
        array(
            "type" => "colorpicker",
            "param_name" => "star_color",
            "heading" => esc_html__("Star Color", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("star color.", 'themetonaddon'),
            'dependency' => array(
                'element' => 'rating_style',
                'value' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "star_size",
            "heading" => esc_html__("Star Size", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("WooCommerce Price Star size example:53px", 'themetonaddon'),
            'dependency' => array(
                'element' => 'rating_style',
                'value' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "font_size",
            "heading" => esc_html__("Font Size", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("WooCommerce Ratting font size example:53px", 'themetonaddon'),
            'dependency' => array(
                'element' => 'rating_style',
                'value' => '0',
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "line_height",
            "heading" => esc_html__("Line Height", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("WooCommerce Ratting font line height", 'themetonaddon'),
            'dependency' => array(
                'element' => 'rating_style',
                'value' => '0',
            ),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "text_align",
            "heading" => esc_html__("WooCommerce Ratting align", 'themetonaddon'),
            "value" => array(
                "Left" => "left",
                "Center" => "center",
                "Right" => "right"
            ),
            "std" => 'left',
            'dependency' => array(
                'element' => 'rating_style',
                'value' => '0',
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
));