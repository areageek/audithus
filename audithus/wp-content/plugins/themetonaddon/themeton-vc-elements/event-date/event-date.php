<?php

if (!class_exists('WPBakeryShortCode_event_date')) {
    class WPBakeryShortCode_event_date extends WPBakeryShortCode {
        protected function content( $atts, $content = null){
            extract( shortcode_atts( array(
                "list" => "",
                'extra_class' => '',
                'category' => '',
                'css' => ''
            ), $atts ) );

            $extra_class = esc_attr($extra_class);
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'event_date', $atts );
            global $post;
        
            $event ='';
            $format ='';
            
            global $paged;
            if( is_front_page() ){
                $paged = get_query_var('page') ? get_query_var('page') : 1;
            }
    
            if ($category != 'default')
            {
                $allevents = tribe_get_events( array(
                    'posts_per_page' => -1,
                    'paged' => 1,
                    'tax_query'=> array(
                        array(
                            'taxonomy' => 'tribe_events_cat',
                            'field' => 'slug',
                            'terms' => 'featured',
                            'operator' => 'IN'
                        )
                    )
                ) );
            } 
            else  {
                $allevents = tribe_get_events( array(
                    'posts_per_page' => -1,
                    'paged' => 1,
                    'order' => 'desc'
                ) );
            }
            $time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
            $end_datetitle = tribe_get_end_date(null,true,'j M');
            $end_datetime = tribe_get_end_date();
            $start_time = tribe_get_start_date( null, false, $time_format );
            $start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

            $end_datetime = tribe_get_end_date();
            $end_date = tribe_get_display_end_date( null, false );

            $thecost = tribe_get_cost( null, true );
            $start_datetime = tribe_get_start_date();
            $time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
        
            $result = "<div class='uk-grid event_date_simple $extra_class m0'>
                            <div class='uk-width-2-3@m uk-width-1-2@s pt3 pb3'><a href='".esc_url( tribe_get_event_link() )."'><h3 class='mb0'>".get_the_title()."</h3></a>
                            <span>$start_datetime  $time_range_separator $end_date </span></div> 
                            <div class='uk-width-expand@m  uk-width-1-1@s uk-text-center pt3'> <span class='cost'>$thecost</span></div>   
                        </div>";
            return $result; 
        }
    }
}

vc_map( array(
    "name" => esc_html__("Event date", 'themetonaddon'),
    "base" => "event_date",
    "class" => "",
    "icon" => "mungu-vc-icon",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    "show_settings_on_create" => true,
    "params" => array(
        
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
) );

