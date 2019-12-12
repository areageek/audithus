<?php
if (!class_exists('WPBakeryShortCode_service_alt')) {
class WPBakeryShortCode_service_alt extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract( shortcode_atts( array(
            "icon_type" => "icon_font",
            "image" => "",
            "icon" => "fa fa-question-circle-o",
            "link" => "",
            "titletop" => "01",
            "title" => "Service title",
            "desc" => "Seamlessly provide access to distinctive vortals rather than multidisciplinary quality vectors.",
            'extra_class' => '',
            'css' => ''
        ), $atts ) );

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'service_alt', $atts );
        $extra_class .= ' '.$css_class;

        if($icon_type == 'icon_image') {
            $icon = wp_get_attachment_image($image, 'thumbnail', false, array('class'=>'serv-icon'));
        } else {
            $icon = $icon != '' ? $icon : "fa fa-question-circle-o";
            $icon = "<span class='serv-icon $icon'></span>";
        }

        $title = "$icon<h3>$title</h3>";

        $title = $link != '' ? "<a class='uk-flex uk-flex-middle' href='$link'>$title</a>" : $title;
        $title = "<div class='serv-icon-holder uk-flex uk-flex-middle'>$title</div>";

        
        $desc = "<p>$desc</p>";
        $titletop = "<h2 class='title-top'>$titletop</h2><div class='under-line'></div>";

        $result =   "<div class='mungu-element serv-alt $extra_class'>
                        $titletop
                        $title
                        $desc
                    </div><!-- end .service-alt -->";
        
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Service Alternate Box", 'themetonaddon'),
    "description" => esc_html__("Icon, Line and Text", 'themetonaddon'),
    "base" => "service_alt",
    "content_element" => true,
    "category" => 'Themeton',
    "icon" => "mungu-vc-icon mungu-vc-icon83",
    "class" => 'mungu-vc-element',
    "params" => array(
        array(
            'type' => 'dropdown',
            "param_name" => "icon_type",
            "heading" => esc_html__("Icon Type", 'themetonaddon'),
            "value" => array(
                "Icon font" => "icon_font",
                "Icon image" => "icon_image"
            ),
            "std" => "icon_font",
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image Image", 'themetonaddon'),
            "value" => '',
            "dependency" => Array("element" => "icon_type", "value" => array("icon_image"))
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'themetonaddon' ),
            'param_name' => 'icon',
            'value' => 'fa fa-question-circle-o', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => true,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 100,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page

            ),
            "dependency" => Array("element" => "icon_type", "value" => array("icon_font"))
        ),
        array(
            'type' => 'textfield',
            "param_name" => "link",
            "heading" => esc_html__("Icon link (optional)", 'themetonaddon'),
            "value" => ''
        ),
        array(
            'type' => 'textfield',
            "param_name" => "titletop",
            "heading" => esc_html__("Service Top Title", 'themetonaddon'),
            "value" => '01',
            "holder" => 'div'
        ),
        array(
            'type' => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Service Title", 'themetonaddon'),
            "value" => 'Service Title',
            "holder" => 'div'
        ),
        array(
            'type' => 'textarea',
            "param_name" => "desc",
            "heading" => esc_html__("Short Description", 'themetonaddon'),
            "value" => 'Seamlessly provide access to distinctive vortals rather than multidisciplinary quality vectors.'
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
)
);