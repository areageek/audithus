<?php
if (!class_exists('WPBakeryShortCode_mungu_images_mosanry_simple')) {
class WPBakeryShortCode_mungu_images_mosanry_simple extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(
            "layout" => 'standard',
            "arrows" => 'show',
            "columns" => '3',
            "bullets" => "show",
            "bg_color" => "#9da2e0",
            "link"  => "",
            "list" => "",
            'extra_class' => '',
            'css' => ''
        ), $atts));
        
        wp_enqueue_script( 'isotope-packaged', get_template_directory_uri() . '/vendors/packery-mode.pkgd.min.js', array('jquery', 'isotope'), false, true );
        $extra_class = esc_attr($extra_class);
        $list = vc_param_group_parse_atts($list);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_images_mosanry_simple', $atts );
        $extra_class .= ' '.$css_class;
        $lists = '';
           
        if (is_array($list)) {
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";

                $atach_src = wp_get_attachment_image_src($image, 'large');
                $image = is_array($atach_src) ? $atach_src[0] : "";

                $role = isset($item['role']) ? $item['role'] : "";
                $role = !empty($role) ? "<h2>$role</h2>" : "";

                $link = isset($item['link']) ? $item['link'] : ""; 
                $link = !empty($link) ? "$link" : "";

                $desc = isset($item['desc']) ? $item['desc'] : "";
                $desc = !empty($desc) ? "<p>$desc</p>" : "";
     
                $addclass = isset($item['addclass']) ? $item['addclass'] : "";
                $addclass = !empty($addclass) ? "$addclass" : "";

                $url = isset($item['url']) ? $item['url'] : "";
                $url = !empty($url) ? "$url" : "";
                $img_bg = ''; 
                if(!empty($image)){
                    $img_bg.="<img src='".esc_attr($image)."' alt='".esc_attr__('author image','themetonaddon')."'>";
                }
                $lists .= "<div class='image-item $addclass uk-transition-toggle' style='background-color:$bg_color'>
                                <a href='$link'>$img_bg</a>  
                                <div class='uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle'></div>
                                <div class='figcaption'>   
                                    $role
                                    $desc
                                </div>                                   
                           </div>";
            }
        }
        $result = '<div class="simple-image uk-grid uk-margin-small '.$extra_class.' uk-width-1-1"> 
                        '.$lists.'
                    </div>';
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Masonry images", 'themetonaddon'),
    "description" => esc_html__("Mosanry image item", 'themetonaddon'),
    "base" => "mungu_images_mosanry_simple",
    "class" => "",
    "icon" => "mungu-vc-icon mungu-vc-icon63",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Image item', 'themetonaddon'),
            'param_name' => 'list',
            'value' => '',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'themetonaddon')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'themetonaddon'),
                    'param_name' => 'role',
                    'value' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link', 'themetonaddon'),
                    'param_name' => 'link',
                    'value' => ''
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description', 'themetonaddon'),
                    'param_name' => 'desc',
                    'value' => ''
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Add class', 'themetonaddon'),
                    'param_name' => 'addclass',
                    'value' => ''
                ),
                array(
                    "type" => "textfield",
                    "heading" => __( "background", 'themetonaddon' ),
                    "param_name" => "bg_color",
                    "value" => '', 
                    "description" => __( "color code input . #9da2e0", 'themetonaddon' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image url ', 'themetonaddon'),
                    'param_name' => 'url',
                    'value' => '#'
                )
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
		),
    )
));