<?php
if (!class_exists('WPBakeryShortCode_con_counter')) {
class WPBakeryShortCode_con_counter extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'list' => '',
            'layout' => 'with-image',
            'size' => '',
            'icon_image' => '',
            'image' => '',
            'number_ss' => '36',
            //'title' => '',
            'icon' => 'fa fa-forumbee',
            'icon_type' => 'fontawesome',
            "imagesize" => "80x80",
            'align' => '',
            'style' => '1',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'con_counter', $atts );
        $class .= ' '.$css_class;

        $icon = isset($atts["icon_$icon_type"]) ? $atts["icon_$icon_type"] : $icon;
        if (!empty($icon)) {
            wp_enqueue_style("vc_$icon_type");
        }

        if($icon_type == 'icon_image') {
            $imgsize = explode('x', $imagesize);
            $imgsize = is_array($imgsize) ? $imgsize : array(64, 64);
            $icon = wp_get_attachment_image_src($image, $imgsize); 
            $icon = "<img src='".$icon[0]."' width='".$imgsize[0]."' height='".$imgsize[1]."' alt='$title'/>";
        } else {
            $icon = $icon != '' ? $icon : "fa fa-question-circle-o";
            $icon = "<span class='$icon'></span>";
        }

        $list = vc_param_group_parse_atts($list);
        $lists = '';
        $iconsize = '';
        $atach_src = '';
        $image = '';
        $icon_type = '';
        $number = '';
        $output = '';
        $counter = '';
        $ukflexalign = 'uk-flex-center uk-text-center';
        $letter = 'letter';
        $iconsize = 'icon';
        
        if ($size == '1') {
            $counter = 'countersmall';
            $letter = 'lettersmall';
            $iconsize = 'iconsmall';
        }
        elseif ($size == '3') {
            $counter = 'counterlarge';
            $letter = 'letterlarge';
            $iconsize = 'iconlarge';
        }
        elseif ($size == '4') {
            $counter = 'countersmall counterxsmall';
            $letter = 'lettersmall letterxsmall';
            $iconsize = 'iconsmall';
        }

        if ($align == '1') {
            $ukflexalign = 'uk-flex-left uk-text-left';
        }
        elseif ($align == '3') {
            $ukflexalign = 'uk-flex-right uk-text-right';
        }

        if( is_array($list) ){
            foreach ($list as $item) {
                
                $image = isset($item['image']) ? $item['image'] : "";
                $atach_src = wp_get_attachment_image_src($image, 'full');
                $image = is_array($atach_src) ? $atach_src[0] : "";
                $icon_type = array_key_exists('icon_type', $item) ? $item['icon_type'] : '';
                $icon = isset($item["icon_$icon_type"]) ? $item["icon_$icon_type"] : '';
                $icon = !empty($icon) ? "$icon" : "";

                if (!empty($icon)) {
                    wp_enqueue_style("vc_$icon_type");
                }

                $number = isset($item['number']) ? $item['number'] : "";
                preg_match("/([^\d]?)([0-9.,]+)(.*)/", $number, $matches);
                $number = !empty($number) ? "<span class='$letter'>$matches[1]</span><span class='counter $counter'>$matches[2]</span><span class='$letter'>$matches[3]</span>" : "<span class='counter $counter'>$number</span>";

                $body = isset($item['body']) ? $item['body'] : "";
                $body = !empty($body) ? "$body" : "";

                $title = isset($item['title']) ? $item['title'] : "";
                $title = !empty($title) ? "$title" : "";

                $icon_types = '';

                $layout = $item['layout'];

                if ($layout == 'with-image') {
                    $icon_types = "<img src='".$image."' alt='".$body."'>";
                }elseif($layout =='icon'){
                    $icon_types ="<i class='" . $iconsize . ' ' . $icon."'></i>";
                }
                else {
                    $icon_types = "";
                }
                if ($style == '1') {
                    $lists .="
                        <div class='mungu-counter-item uk-grid uk-width-1-1@s uk-width-expand@m uk-grid-medium uk-flex size-$size'>
                            <div class='uk-width-auto cntrdc'>
                                $icon_types                     
                            </div>
                            <div class='uk-width-expand $ukflexalign'>
                                $number
                                <div class='cntrdcs'><span class='counterdecs'>$body</span></div>
                            </div>
                        </div>";
                }
                if ($style == '2') {
                    if (!empty($icon_types)) {
                        $icon_types = "<div class='uk-width-auto mr3'>$icon_types</div>";
                    }
                    $lists .="
                        <div class='uk-card uk-card-default uk-card-hover uk-card-body'>
                            $icon_types
                            <h3 class='uk-card-title uk-flex uk-flex-top'>$number</h3>
                            <span class='counterdecs'>$body</span>
                        </div>";
                }
                if ($style == '3') {
                    $lists .="
                        <div class='uk-card-outer mt0 mt2@s'>
                            <div class='uk-card uk-card-body '>
                                <h2 class='counter'>$number</h2>
                                <h3>$title</h3>
                                <p>$body</p>
                            </div>
                        </div>";
                }
            }
        }

       

        if ($style =='1') {
            $output = "
            <div class='mungu-element mungu-element-counter uk-section $class'>
                <div class='uk-grid uk-grid-small uk-scrollspy uk-child-width-expand $ukflexalign'>
                    " . $lists . "
                </div>
            </div>";
        }
        elseif ($style == '3') {
            $output = "
            <div class='uk-width-1-1 uk-flex uk-flex-between uk-text-center uk-flex-wrap counter-style3 $class'>
                " . $lists . "
            </div>";
        }
        elseif ($style == '4') {
            $output = "
            <div class='uk-grid uk-flex uk-flex-middle counter-style4 $size $class'>
                <div class='uk-width-auto'>$icon</div>
                <div class='uk-width-expand'>
                <span class='counter'>$number_ss</span><br/>
                    <h5 class='m0'>$title</h5>  
                </div>
            </div>";
        }
        elseif ($style == '2') {
            $output = "
            <div class='mungu-element mungu-element-counter uk-scrollspy uk-text-left uk-grid-small uk-grid-match uk-grid uk-child-width-expand@s style2 $class'>
                " . $lists . "
            </div>";
        }
        

        return $output;
    }
}
}

vc_map( array(
    "name" => esc_html__('Counter', 'themetonaddon'),
    "description" => esc_html__("Counter", 'themetonaddon'),
    "base" => 'con_counter',
    "content_element" => true,
    "icon" => "mungu-vc-icon mungu-vc-icon33",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Choose style", 'themetonaddon'),
            "value" => array(
                esc_html__( 'Default style', 'themetonaddon' ) => '1',
                esc_html__( 'Style 2 - Boxed', 'themetonaddon' ) => '2',
                esc_html__( 'Style 3 - Rectangle border', 'themetonaddon' ) => '3',
                esc_html__( 'Style 4 - Image on left', 'themetonaddon' ) => '4',
            ),
            "std" => "0"
        ),
/*        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library', 'themetonaddon'),
            'value' => array(
                esc_html__('Font Awesome', 'themetonaddon') => 'fontawesome',
                esc_html__('Open Iconic', 'themetonaddon') => 'openiconic',
                esc_html__('Typicons', 'themetonaddon') => 'typicons',
                esc_html__('Entypo', 'themetonaddon') => 'entypo',
                esc_html__('Linecons', 'themetonaddon') => 'linecons',
                esc_html__('Custom Image', 'themetonaddon') => 'icon_image'
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__('Select icon library.', 'themetonaddon'),
            "std" => "show",
            
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-smile',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "iconsize",
            "heading" => esc_html__("Icon Size", 'themetonaddon'),
            "value" => array(
                "Extra Small" => "extra-small",
                "Small" => "small",
                "Medium (default)" => "medium",
                "Large" => "large",
            ),
            "std" => "medium",
            'dependency' => Array("element" => "style", "value" => array("4")),
        ),
*/
        array(
            "type" => "dropdown",
            "param_name" => "size",
            "heading" => esc_html__("Size", 'themetonaddon'),
            "value" => array(
                esc_html__( 'Medium (default)', 'themetonaddon' ) => '2',
                esc_html__( 'Extra small', 'themetonaddon' ) => '4',
                esc_html__( 'Small', 'themetonaddon' ) => '1',
                esc_html__( 'Large', 'themetonaddon' ) => '3',
            ),
            'dependency' => Array("element" => "style", "value" => array("1","2","3")),
            "std" => "2"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "align",
            "heading" => esc_html__("Align", 'themetonaddon'),
            "value" => array(
                esc_html__( 'Center (default)', 'themetonaddon' ) => '2',
                esc_html__( 'Left', 'themetonaddon' ) => '1',
                esc_html__( 'Right', 'themetonaddon' ) => '3',
            ),
            "std" => "2",
            'dependency' => Array("element" => "style", "value" => array("1","2","3")),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'themetonaddon'),
            'param_name' => 'list',
            'value' => '',
            'dependency' => Array("element" => "style", "value" => array("1","2","3")),
            'params' => array(
                array(
                    "type" => "dropdown",
                    "param_name" => "layout",
                    "heading" => esc_html__("Icon or image", 'themetonaddon'),
                    "value" => array(
                        "With icon" => "icon",
                        "With image" => "with-image",
                        "None" => "none",
                    ),
                    "dependency" => Array("element" => "style", "value" => array("1"))
                ),                
                array(
                    "type" => 'textfield',
                    "param_name" => "number",
                    'admin_label' => true,
                    'value' => '128',
                    "heading" => esc_html__("Number", 'themetonaddon'),
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "body",
                    'admin_label' => true,
                    'holder' => 'div',
                    'value' => 'happy',
                    "heading" => esc_html__("Description text", 'themetonaddon'),
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "title",
                    'admin_label' => true,
                    'holder' => 'div',
                    'value' => 'Clients',
                    "heading" => esc_html__("Title text (for Style 3)", 'themetonaddon'),
                    "dependency" => Array("element" => "style", "value" => array("2"))
                ),
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon'),
                    "value" => '',
                    "std" => "show",
                    "dependency" => Array("element" => "layout", "value" => array("with-image"))
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Icon library', 'themetonaddon'),
                    'value' => array(
                        esc_html__('Font Awesome', 'themetonaddon') => 'fontawesome',
                        esc_html__('Open Iconic', 'themetonaddon') => 'openiconic',
                        esc_html__('Typicons', 'themetonaddon') => 'typicons',
                        esc_html__('Entypo', 'themetonaddon') => 'entypo',
                        esc_html__('Linecons', 'themetonaddon') => 'linecons'
                    ),
                    'param_name' => 'icon_type',
                    'description' => esc_html__('Select icon library.', 'themetonaddon'),
                    "std" => "show",
                    "dependency" => Array("element" => "layout", "value" => array("icon"))
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'themetonaddon'),
                    'param_name' => 'icon_fontawesome',
                    'value' => 'fa fa-smile',
                    'settings' => array(
                        'emptyIcon' => true,
                        'std' => 'fa fa-smile',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'fontawesome',
                    ),
                    'description' => esc_html__('Select icon from library.', 'themetonaddon'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'themetonaddon'),
                    'param_name' => 'icon_openiconic',
                    'value' => 'vc-oi vc-oi-umbrella',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'openiconic',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'openiconic',
                    ),
                    'description' => esc_html__('Select icon from library.', 'themetonaddon'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'themetonaddon'),
                    'param_name' => 'icon_typicons',
                    'value' => 'typcn typcn-arrow-repeat',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'typicons',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'typicons',
                    ),
                    'description' => esc_html__('Select icon from library.', 'themetonaddon'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'themetonaddon'),
                    'param_name' => 'icon_entypo',
                    'value' => 'entypo-icon entypo-icon-star',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'entypo',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'entypo',
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'themetonaddon'),
                    'param_name' => 'icon_linecons',
                    'value' => 'vc_li vc_li-bulb',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'linecons',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'linecons',
                    ),
                    'description' => esc_html__('Select icon from library.', 'themetonaddon'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link url (optional)', 'themetonaddon'),
                    'param_name' => 'link',
                    'value' => '',
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