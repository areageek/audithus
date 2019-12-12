<?php
if (!class_exists('Extend_Tour')) {
class Extend_Tour{

    function __construct(){
        add_action('init', array($this, 'tour_init'));

        if(defined('WPB_VC_VERSION') && version_compare( WPB_VC_VERSION, '5.0', '>=' )) {
            add_filter('vc_shortcode_output', array($this, 'vc_shortcode_output'),10,3);
        }

        add_filter( 'vc_shortcodes_css_class', array($this, 'custom_css_classes_for_vc'), 10, 2 );
    }

    // Filter to replace default css class names
    function custom_css_classes_for_vc( $class_string, $tag ) { 
        if( $tag == 'vc_row' || $tag == 'vc_row_inner' ){  }
        if( $tag == 'vc_column' || $tag == 'vc_column_inner' ){  }
        return $class_string;
    }

    public function vc_shortcode_output($output, $obj, $attr){
        
        if($obj->settings('base')=='vc_tta_tour'){
            $data_attr = '';

            if( isset($attr['tab_style']) ){
                $data_attr .= ' data-style="'.$attr['tab_style'].'" ';
            }

            if( isset($attr['subtitle']) ){
                $data_attr .= ' data-subtitle="'.$attr['subtitle'].'" ';
            }
          
            $output = preg_replace('/ class="/', $data_attr . ' class="wpb_tour_extended ', $output, 1);
        }
        else if($obj->settings('base')=='vc_tta_section'){
            $data_attr = '';
           
            if( isset($attr['process']) && $attr['process'] != "" ){
                $data_attr .= ' data-number="'.$attr['process'].'" ';
            }
            $output = preg_replace('/ class="vc_tta-panel/', $data_attr . ' class="vc_tta-panel', $output, 1);
        }
        
        return $output;
    }



    public function tour_init(){

        // vc_tta_tour
        vc_add_param('vc_tta_tour', array(
            "type" => "dropdown",
            "heading" => esc_html__("Tour Style", 'medio'),
            "param_name" => "tab_style",
            "group" => esc_html__("Themeton", 'medio'),
            "value" => array(
                    esc_html__("Default", 'medio') => "default",
                    esc_html__("Service ", 'medio') => "service"
                )
        ));

        vc_add_param('vc_tta_tour', array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Process Number", 'medio'),
            "param_name" => "number",
            "value" => array(
                    esc_html__("Yes", 'medio') => "yes",
                    esc_html__("No", 'medio') => "no",
                ),
            
        ));

        vc_add_param('vc_tta_tour', array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'medio'),
            "param_name" => "subtitle",
            "value" => "",
            "group" => esc_html__("Themeton", 'medio'),
           
        ));

        vc_add_param('vc_tta_tour', array(
            "type" => "attach_image",
            "heading" => esc_html__("Content Background Image", 'medio'),
            "param_name" => "bgimage",
            "dependency" => Array("element" => "tab_style", "value" => array("service"))
        ));

        vc_add_param('vc_tta_tour', array(
            "type" => "dropdown",
            "heading" => esc_html__("Background Image Brightness", 'medio'),
            "param_name" => "brightness",
            "value" => array(
                    esc_html__("Dark", 'medio') => "dark",
                    esc_html__("Light", 'medio') => "light",
                ),
            "dependency" => Array("element" => "tab_style", "value" => array("service"))
        ));

        vc_add_param('vc_tta_section', array(
            "type" => "textfield",
            "heading" => esc_html__("Process number", 'medio'),
            "param_name" => "process",
            "value" => ""
        ));

    }
}
}

new Extend_Tour();