<?php

if (!class_exists('WPBakeryShortCode_wp_search')) {
class WPBakeryShortCode_wp_search extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'palaceholder' => 'Search',
            'button' => '',
            'style' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'wp_search', $atts );
        $class .= ' '.$css_class;
        

        if ($style=='1') {
            $result = '
            <form role="search" method="get" id="searchform" action="'.esc_url(home_url( '/' )).'" class="'.$class.'">
                <div class="wp-search">
                    <input type="text" value="" name="s" id="s" placeholder="'.$palaceholder.'" />
                    <button type="submit">
                        <i class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle> <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"></path></svg></i>
                    </button>
                </div>
            </form>';
        }
        elseif ($style=='2') {
            $result = '
            <a class="'.$class.'" href="#modal-full-search" data-uk-search-icon data-uk-toggle></a>
            <div id="modal-full-search" class="uk-modal-full uk-modal" data-uk-modal>
                <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" data-uk-height-viewport>
                    <button class="uk-modal-close-full" type="button" data-uk-close></button>
                    <form role="search" method="get" id="searchform" action="'.esc_url(home_url( '/' )).'" class="uk-search uk-search-large ">
                        <input class="uk-search-input uk-text-center" name="s" id="s" type="search" placeholder="'.$palaceholder.'">
                    </form>
                </div>
            </div>';
        }

        
                    
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Search', 'themetonaddon'),
    "description" => esc_html__("WP site search", 'themetonaddon'),
    "base" => 'wp_search',
    "icon" => "mungu-vc-icon mungu-vc-icon57",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Search styles", 'themetonaddon'),
            "value" => array(
                'Left icon ' => '1',
                'Modal style' => '2'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Palaceholder', 'themetonaddon' ),
            'param_name' => 'palaceholder',
            'value' => 'Search..',
            "admin_label" => true
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