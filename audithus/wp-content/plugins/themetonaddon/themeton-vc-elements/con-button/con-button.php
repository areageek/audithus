<?php
if (!class_exists('WPBakeryShortCode_con_button')) {
class WPBakeryShortCode_con_button extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'conbutton' => '',
            'alignment' => 'left',
            'color' => '',
            'border'    => '',
            'colorborder' => '',
            'borderwidth' => '1px',
            'colortext' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $result = '';
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'con_button', $atts );
        $extra_class .= ' '.$css_class;

        $conbutton = vc_build_link ($conbutton);
        $style = '';
        if ($color != '') {
            $color = "background-color: $color;"; 
        }
        if ($colortext != '') {
            $colortext = "color: $colortext;";
        }
        if ($border == '1' && $borderwidth != '') {
            $border = "border: solid; border-width: $borderwidth;";
            if($colorborder!=''){$border.="border-color: $colorborder;";}
        }
        elseif ($border == '') {
            $border = "border: none; border-width: 0px; border-color: transparent;";
        }
        
        $rel = $conbutton["rel"]!=''?'rel="'.$conbutton["rel"].'"':'';
        $target = $conbutton["target"]!=''?'target="'.$conbutton["target"].'"':'';

        $style= " style='$color $border $colortext'";
        if ($conbutton["title"]!="") {
            $conbutton["target"] = array_key_exists('target', $conbutton) && !empty($conbutton["target"]) ? $conbutton["target"] : '_self';
            $result .= '<div class="mungu-element mungu-button uk-flex uk-flex-'.$alignment.' uk-float-'.$alignment.'">
            <a class="uk-button uk-button-default '.$extra_class.'" '.$rel.' '.$target.' href="'.$conbutton["url"].'" '.$style.'><span class="uk-icon"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline> <line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>'.esc_html($conbutton["title"]).'</a>
            </div>'; 
        }

        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Button', 'themetonaddon'),
    "description" => esc_html__("Next Button", 'themetonaddon'),
    "base" => 'con_button',
    "icon" => "mungu-vc-icon mungu-vc-icon39",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "vc_link",
            "param_name" => "conbutton",
            "heading" => esc_html__("URL", 'themetonaddon'),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "alignment",
            "heading" => esc_html__("Alignment", 'themetonaddon'),
            "holder"  =>  "div",
            "value" => array(
                'Left' => 'left',
                'Right' => 'right',
                'Center' => 'center',
                'Block width' => 'block',
            ),
            "description" => esc_html__("Select button alignment.", 'themetonaddon'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Background color (optional)', 'themetonaddon' ),
            'param_name' => 'color',
            'description' => esc_html__('Default color is your brand color but you can change it.', 'themetonaddon'),
            'value' => '', // default value to backend editor admin_label
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Text color (optional)', 'themetonaddon' ),
            'param_name' => 'colortext',
            'description' => esc_html__('Color of the text in button.', 'themetonaddon'),
            'value' => '', // default value to backend editor admin_label
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "border",
            "heading" => esc_html__("Enable Border", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "0"
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Border width', 'themetonaddon'),
            'value' => array(
                esc_html__('1px', 'themetonaddon') => '1px',
                esc_html__('2px', 'themetonaddon') => '2px',
                esc_html__('3px', 'themetonaddon') => '3px',
                esc_html__('4px', 'themetonaddon') => '4px',
                esc_html__('5px', 'themetonaddon') => '5px'
            ),
            'param_name' => 'borderwidth',
            'description' => esc_html__('Select width of the border.', 'themetonaddon'),
            "std" => "1px",
            "dependency" => Array("element" => "border", "value" => array("1"))
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Border color (optional)', 'themetonaddon' ),
            'param_name' => 'colorborder',
            'description' => esc_html__('Select border color.', 'themetonaddon'),
            'value' => '', // default value to backend editor admin_label
            "dependency" => Array("element" => "border", "value" => array("1"))
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