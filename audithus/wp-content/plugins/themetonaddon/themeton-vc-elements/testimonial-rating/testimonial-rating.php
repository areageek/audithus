<?php
if (!class_exists('WPBakeryShortCode_testimonial_rating')) {
class WPBakeryShortCode_testimonial_rating extends WPBakeryShortCode {
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
            'style' => '0',
            'color' => '',
            'fontsize' => '',
            'text_align' => '',
            'fontfamily' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $result = "";
        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'testimonial_ratting', $atts );
        $query = new WP_Query( array(
            'post_type' => 'testimonials',
            'posts_per_page' => -1
        ) );
        if ($style == 0) {
            $count = 0; $i = 0;
            while ($query->have_posts()) 
            {
                $i++;
                $query->the_post();
                $count += Themeton_Std::getmeta('star');
            }
            wp_reset_postdata();
            if ($count!=0) {
                $inline_css = '';
                if ($color!='') $inline_css .= 'color:'.$color.';';
                if ($fontsize!='') $inline_css .='font-size:'.$fontsize.';';
                if ($text_align!='') $inline_css .= 'text-align:'.$text_align.';';
                $text_font_data = $this->getFontsData( $fontfamily );
                $text_font_inline_style = $this->googleFontsStyles( $text_font_data );   
                $this->enqueueGoogleFonts( $text_font_data );
                $inline_css .= $text_font_inline_style;
                if ($inline_css!='') $inline_css = 'style="'.$inline_css.'"';
                $total = round($count/$i,1);
                $result =<<<HTML
            <div class="uk-flex testimonail-rating wpb_content_element uk-child-width-auto $class $css_class">
                <div class="rating-number"><h1 $inline_css>$total/5</h1></div>
            </div>
HTML;
            }
            return $result;
        }
        if ($style == 1 ) {
            $count = 0; $i = 0;
            while ($query->have_posts()) 
            {
                $i++;
                $query->the_post();
                $count += Themeton_Std::getmeta('star');
            }
            wp_reset_postdata();
            if ($count!=0) { 
                $total = round($count/$i,1);
                $star =  $inline_css = $flex_class = '';
                if ($color!='') $inline_css .= 'color:'.$color.';';
                if ($inline_css!='') $inline_css = 'style="'.$inline_css.'"';
                if ($text_align!='') $flex_class = 'uk-flex-'.$text_align;
                if ($total!=5) {
                    for ($i=1; $i<$total; $i++)
                    $star .= '<span class="fa fa-star" '.$inline_css.'></span>';
                    if (is_float($total)) {
                        $star .= '<span class="fa fa-star-half-o" '.$inline_css.'></span>';
                    }
                    else $star .= '<span class="fa fa-star" '.$inline_css.'></span>';
                    for ($i=$total+1; $i<=5; $i++)
                        $star .= '<span class="fa fa-star-o" '.$inline_css.'></span>';
                }
                else {
                    for ($i=0; $i<5; $i++)
                    $star .= '<span class="fa fa-star" '.$inline_css.'></span>';
                }
                $result =<<<HTML
                    <div class="uk-flex testimonail-rating wpb_content_element uk-child-width-auto $class $css_class">
                        <div class="uk-flex $flex_class single-testimonail-star">$star</div>
                    </div>
HTML;
            return $result;
            }
    }
}
}
}

vc_map( array(
    "name" => esc_html__('Rating', 'themetonaddon'),
    "description" => esc_html__("Testimonial avarage rating", 'themetonaddon'),
    "base" => 'testimonial_rating',
    "icon" => "mungu-vc-icon mungu-vc-icon71",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                "Text Ratting" => "0",
                "Star Ratting" => "1"
            ),
            "std" => '0',
            "admin_label" => true
        ),
        array(
            "type" => "colorpicker",
            "param_name" => "color",
            "heading" => esc_html__("Rating Color", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("Rating Color.", 'themetonaddon')
        ),
        array(
            "type" => "textfield",
            "param_name" => "fontsize",
            "heading" => esc_html__("Font Size", 'themetonaddon'),
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__( 'Select Font Family.', 'themetonaddon' ),
                    'font_style_description' => esc_html__( 'Select Font Style.', 'themetonaddon' ),
                ),
            ), 
            "description" => esc_html__("Rating Text font size example:50px", 'themetonaddon'),
            'dependency' => array(
                'element' => 'style',
                'value' =>'0',
            ),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "text_align",
            "heading" => esc_html__("Text Align", 'themetonaddon'),
            "value" => array(
                "Left" => "left",
                "Center" => "center",
                "Right" => "right"
            ),
            "std" => '0'
        ),
        array(
            "type" => "google_fonts",
            "param_name" => "fontfamily",
            "value" => "",
            "description" => esc_html__("Rating Text font family", 'themetonaddon'),
            'dependency' => array(
                'element' => 'style',
                'value' =>'0',
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