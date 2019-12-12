<?php

if (!class_exists('WPBakeryShortCode_hiring')) {
class WPBakeryShortCode_hiring extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'title' => 'Title',
            'body' => 'Lorem Ipsum',
            'btn1' => 'Button', 
            'btn2' => 'Button',
            'showbutton' => '1',
            'btntext' => 'APPLY NOW',
            'shortcodes'=> 'Enter shortcode here',
            'extra_class' => '', 
            'css' => ''
        ), $atts));

        $modalid ='';
        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'hiring', $atts );
        $class .= ' '.$css_class;
        $group = vc_param_group_parse_atts( $atts['group']);
        $result='';
        $button2 = '';
        foreach ((array)$group as $val) {
            $modalid++;
            (isset($val['btn2'])) ? $btn2 = ($val['btn2']) : '';
            (isset($val['title'])) ? $title = ($val['title']) : '';
            (isset($val['body'])) ? $body = ($val['body']) : '';
            (isset($val['shortcodes'])) ? $shortcodes = ($val['shortcodes']) : '';
            (isset($val['btntext'])) ? $btntext = ($val['btntext']) : '';
            (isset($val['showbutton'])) ? $showbutton = ($val['showbutton']) : $showbutton='';
            
            $button1 = sprintf( '<button class="uk-button uk-button-default uk-text-truncate uk-toggle" data-uk-toggle="target: #modalid' . $modalid . '">' . $btntext . '</button>');
            if ($showbutton == '1') {    
                $btn2 = vc_build_link( $btn2 );
                if (empty($btn2['title'])) { $btn2['title'] = 'READ MORE'; }
                $button2 = '<a href="' . $btn2['url'] . '"> <button class="uk-button uk-button-white uk-text-truncate">' . $btn2['title'] . '</button></a>';
            }
            if ($showbutton != '1') {
                $button2 = '';
            }    
            
            $result .= "
            <div class='mungu-element'>$button1 $button2
                <div id='modalid$modalid' class='mungu-modal-element data-uk-modal'>
                    <div class='uk-modal-dialog uk-modal-body' >
                        <button class='uk-modal-close-outside uk-close' type='button' data-uk-close></button>
                        <p class='uk-text-center color-title text-600 mb0'>$body</p>
                        <h2 class='uk-modal-title uk-text-center mt0 color-brand'>$title</h2>
                        <hr>
                        <div>". do_shortcode($shortcodes). "</div>
                    </div>
                </div>
            </div>";
        }
        $result = "
        <div class='uk-grid uk-child-width-1-2@m uk-child-width-1-1@s uk-grid-large uk-text-left $class'>$result</div>";
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Hiring', 'themetonaddon'),
    "description" => esc_html__("We are hiring section", 'themetonaddon'),
    "base" => 'hiring',
    "content_element" => true,
    "icon" => "mungu-vc-icon mungu-vc-icon10",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
            array(
                "type" => 'param_group',
                "value" => '',
                "param_name" => 'group',
                "params" => array(
                array(
                    "type" => 'textfield',
                    "param_name" => "title",
                    "heading" => esc_html__("Title", 'themetonaddon'),
                    'admin_label' => true,
                    'holder' => 'div',
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "body",
                    "heading" => esc_html__("Body text", 'themetonaddon'),
                    'admin_label' => true,
                    'holder' => 'div',
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "btntext",
                    "heading" => esc_html__("Text of the first button", 'themetonaddon'),
                ),
                array(
                    'type' => 'checkbox',
                    "param_name" => "showbutton",
                    "heading" => esc_html__("Show extra button ?", 'themetonaddon'),
                    'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
                    "std" => "1"
                ),
                array(
                'type' => 'vc_link',
                'value' => 'READ MORE',
                "heading" => esc_html__("Extra button", 'themetonaddon'),
                'param_name' => 'btn2',
                "std" => "APPLY NOW",
                "dependency" => Array("element" => "showbutton", "value" => array("1"))
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "shortcodes",
                    "heading" => esc_html__("Shortcode", 'themetonaddon'),
                    'description' => esc_html__( 'You can enter your contact forms shortcode or other shortcodes.', 'themetonaddon' )
                ),
            )
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
