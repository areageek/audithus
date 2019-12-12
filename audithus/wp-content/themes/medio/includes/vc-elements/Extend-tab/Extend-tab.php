<?php
if (!class_exists('Extend_Tabs')) {
class Extend_Tabs{

    function __construct(){
        add_action('init', array($this, 'tabs_init'));

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
        if($obj->settings('base')=='vc_tta_tabs'){
            $data_attr = '';

            if( isset($attr['tab_style'] ) ){
                $data_attr .= ' data-style="'.$attr['tab_style'].'"';
            }

            if( isset($attr['sub_title'] ) ){
                 $data_attr .= ' data-subtitle="'.$attr['sub_title'].'"';
            }
            
            if( isset($attr['bgimage'], $attr['brightness'])  ){
                $bgimage = wp_get_attachment_image_src($attr['bgimage'], 'full');
                $bgimage = !empty($bgimage) ? $bgimage[0] : '';
                $data_attr .= ' data-bgimage="'.$bgimage.'"';
                $data_attr .= ' data-brightness="'.$attr['brightness'].'"';
            }
            $el_class = isset($attr['el_class']) ? $attr['el_class'] : '';
            $output = preg_replace('/ class="/', $data_attr . ' class="wpb_tabs_extended '.$el_class.' ', $output, 1);
        }
        else if($obj->settings('base')=='vc_tta_section'){
            $data_attr = '';
            if( isset($attr['icon'], $attr['icon_type']) && $attr['icon_type'] != 'icon_image' ){
                $data_attr .= ' data-icon="'.$attr['icon'].'" ';
            } else {
                $thumb = isset($attr['image']) ? wp_get_attachment_image_src($attr['image'], 'thumbnail') : "";
                $data_attr .= !empty($thumb) ? ' data-icon="'.$thumb[0].'" ' : '';
            }
            if( isset($attr['subtitle']) ){
                $data_attr .= ' data-subtitle="'.$attr['subtitle'].'"';
            }

            $output = preg_replace('/ class="vc_tta-panel/', $data_attr . ' class="vc_tta-panel', $output, 1);
        }

        return $output;
    }



    public function tabs_init(){

        // vc_tta_tabs
        vc_add_param('vc_tta_tabs', array(
            "type" => "dropdown",
            "heading" => esc_html__("Tabs Style", 'medio'),
            "param_name" => "tab_style",
            "value" => array(
                    esc_html__("Default", 'medio') => "default",
                    esc_html__("Process (beautiful, allows process line)", 'medio') => "process",
                    esc_html__("Service (creative, left 50% navigations)", 'medio') => "service"
                )
        ));

        vc_add_param('vc_tta_tabs', array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Process Number", 'medio'),
            "param_name" => "number",
            "value" => array(
                    esc_html__("Yes", 'medio') => "yes",
                    esc_html__("No", 'medio') => "no",
                ),
            
        ));
        vc_add_param('vc_tta_tabs', array(
            "type" => "dropdown",
            "heading" => esc_html__("Sub title add", 'medio'),
            "param_name" => "sub_title",
            "value" => array(
                    esc_html__("Yes", 'medio') => "yes",
                    esc_html__("No", 'medio') => "no",
                ),
        ));

        vc_add_param('vc_tta_tabs', array(
            "type" => "attach_image",
            "heading" => esc_html__("Content Background Image", 'medio'),
            "param_name" => "bgimage",
            "dependency" => Array("element" => "tab_style", "value" => array("service"))
        ));

        vc_add_param('vc_tta_tabs', array(
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
                    'type' => 'dropdown',
                    "param_name" => "icon_type",
                    "heading" => esc_html__("Icon Type", 'medio'),
                    "value" => array(
                        "Icon font" => "icon_font",
                        "Icon image" => "icon_image"
                    ),
                    "std" => "icon_font",
        ));

        vc_add_param('vc_tta_section', array(
            'type' => 'iconpicker',
            "param_name" => "icon",
            "heading" => esc_html__("Icon", 'medio'),
            "description" => "",
            'value' => '', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ),
            "std" => "fa fa-adjust",
            "dependency" => Array("element" => "icon_type", "value" => array("icon_font"))
        ));

        vc_add_param('vc_tta_section', array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image Image", 'medio'),
            "value" => '',
            "dependency" => Array("element" => "icon_type", "value" => array("icon_image"))
        ));

        vc_add_param('vc_tta_section', array(
            "type" => "textfield",
            "heading" => esc_html__("Sub title add", 'medio'),
            "param_name" => "subtitle",
            "value" => "subtitle"
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

new Extend_Tabs();