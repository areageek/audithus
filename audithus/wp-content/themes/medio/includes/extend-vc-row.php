<?php
class Medio_Extend_VC_Row{

    function __construct(){
        add_action('init', array($this, 'row_init'));

        if(defined('WPB_VC_VERSION') && version_compare( WPB_VC_VERSION, '4.4', '>=' )) {
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
        if($obj->settings('base')=='vc_row' || $obj->settings('base')=='vc_row_inner') {
            if( isset($attr['vc_row_overlay'], $attr['vc_row_overlay_color']) && $attr['vc_row_overlay']=='yes' ){
                $data_attr = ' data-overlay="'.$attr['vc_row_overlay_color'].'"';
                $output = preg_replace('/ class="vc_row /', $data_attr . ' class="vc_row ', $output, 1);
            }

            if( isset($attr['one_page_section'], $attr['one_page_label']) && $attr['one_page_section']=='yes' && !empty($attr['one_page_label']) ){
                $slug = isset($attr['one_page_slug']) ? $attr['one_page_slug'] : '';
                if( empty($slug) ){
                    $slug = Themeton_Std::create_slug($attr['one_page_label']);
                }
                $data_attr = ' data-onepage-title="'.$attr['one_page_label'].'"';
                $data_attr .= ' data-onepage-slug="'.$slug.'"';
                $output = preg_replace('/ class="vc_row /', $data_attr . ' class="vc_row ', $output, 1);
            }

            // parallax column option
            if( isset($attr['parallax_row']) && !empty($attr['parallax_row']) && $attr['parallax_row']!='1' ){
                $data_attr = sprintf(' data-parallax-row="%s"', esc_attr($attr['parallax_row']) );
                $output = preg_replace('/ class="vc_row /', $data_attr . ' class="vc_row ', $output, 1);
            }

            return $output;
        }
        else if($obj->settings('base')=='vc_column' || $obj->settings('base')=='vc_column_inner'){
            // parallax column option
            if( array_key_exists('parallax_column', $attr) ){
                $data_attr = '';
                $data_attr .= array_key_exists('parallax_column', $attr) ? ' data-parallax="'.esc_attr($attr['parallax_column']).'"' : '';
                $output = preg_replace('/ class="/', $data_attr . ' class="', $output, 1);

                return $output;
            }

            return $output;
        }
        else if( $obj->settings('base')=='vc_tta_tabs' ){
            if( array_key_exists('tab_style', $attr) && array_key_exists('text_style', $attr) ){
                $data_attr = '';
                $data_attr .= array_key_exists('tab_style', $attr) ? ' data-tab-style="'.esc_attr($attr['tab_style']).'"' : '';
                $data_attr .= array_key_exists('text_style', $attr) ? ' data-text-style="'.esc_attr($attr['text_style']).'"' : '';
                $output = preg_replace('/ class="/', $data_attr . ' class="', $output, 1);

                return $output;
            }

        }

        return $output;
    }



    public function row_init(){
        if( function_exists('vc_add_param') ){
            // Row overlay
            vc_add_param('vc_row', array(
                "type" => "dropdown",
                "heading" => esc_html__("Overlay", 'medio'),
                "param_name" => "vc_row_overlay",
                "value" => array(
                        esc_html__("No", 'medio') => "no",
                        esc_html__("Yes", 'medio') => "yes",
                    )
            ));

            vc_add_param('vc_row', array(
                "type" => "colorpicker",
                "heading" => esc_html__("Overlay Color", 'medio'),
                "param_name" => "vc_row_overlay_color",
                "value" => "",
                "dependency" => Array("element" => "vc_row_overlay", "value" => array("yes"))
            ));

        }
    }
}

if( function_exists('vc_map') ){
    new Medio_Extend_VC_Row();
}