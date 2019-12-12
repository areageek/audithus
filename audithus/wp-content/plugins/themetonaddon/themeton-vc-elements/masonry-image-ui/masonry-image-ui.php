<?php
if (!class_exists('WPBakeryShortCode_mungu_images_mosanry_simple_ui')) {
class WPBakeryShortCode_mungu_images_mosanry_simple_ui extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(
            "layout" => 'standard',
            "arrows" => 'show',
            "columns" => '3',
            "bullets" => "show",
            "bg_color" => "",
            "link"  => "",
            "list" => "",
            'extra_class' => '',
            'css' => ''
        ), $atts));
        
        $extra_class = esc_attr($extra_class);
        $list = vc_param_group_parse_atts($list);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_images_mosanry_simple_ui', $atts );
        $extra_class .= ' '.$css_class;
        $lists = '';
           
        if (is_array($list)) {
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";

                $atach_src = wp_get_attachment_image_src($image, 'large');
                $image = is_array($atach_src) ? $atach_src[0] : "";

                $img_width = isset($item['img_width']) ? $item['img_width'] : "";
                $img_width = !empty($img_width) ? "$img_width" : "";

                $link = isset($item['link']) ? $item['link'] : ""; 
                $link = !empty($link) ? "$link" : "";

                $align = isset($item['align']) ? $item['align'] : ""; 
                $align = !empty($align) ? "$align" : "";

                $img_height = isset($item['img_height']) ? $item['img_height'] : "";
                $img_height = !empty($img_height) ? "$img_height" : "";

                $img_width = isset($item['img_width']) ? $item['img_width'] : "";
                $img_width = !empty($img_width) ? "$img_width" : "";
     
                $addclass = isset($item['addclass']) ? $item['addclass'] : "";
                $addclass = !empty($addclass) ? "$addclass" : "";

                $url = isset($item['url']) ? $item['url'] : "";
                $url = !empty($url) ? "$url" : "";
                $img_bg = ''; 
                if(!empty($image)){
                    $img_bg.="<img src='".$image."' style='opacity:0' data-uk-scrollspy='cls:uk-animation-top' alt='".esc_html(' image alt','lagom')."'></img>";
                }
                $styling = $bg_color != '' ? 'background-color:'.$bg_color : '';

                $lists .= '<div class="uk-flex uk-flex-'.$align.'@m uk-flex-center@s "><div class="'.$addclass.' uk-background-cover uk-background-top-center "  style="'.$styling.' width:max-content" data-bg-image="'.$image.'">
                          '.$img_bg.'</div></div>';
            }
        }
        $result = '<div class="uk-child-width-1-1@s uk-child-width-1-'.$columns.'@m uk-grid" data-uk-grid="masonry: true;">
                         '.$lists.'
                    </div>';
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Masonry uikit", 'themetonaddon'),
    "description" => esc_html__("Mosanry image item", 'themetonaddon'),
    "base" => "mungu_images_mosanry_simple_ui",
    "class" => "",
    "icon" => "mungu-vc-icon mungu-vc-icon63",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "param_name" => "columns",
            "heading" => esc_html__("Column", 'themetonaddon'),
            "value" => array(
                "Column 1" => "1",
                "Column 2" => "2",
                "Column 3" => "3",
                "Column 4" => "4",
                "Column 5" => "5",
            ),
            "std" => '3'
        ),
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
                    'heading' => esc_html__('Add class', 'themetonaddon'),
                    'param_name' => 'addclass',
                    'value' => ''
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image height', 'themetonaddon'),
                    'param_name' => 'img_height',
                    'value' => ''
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image width', 'themetonaddon'),
                    'param_name' => 'img_width',
                    'value' => ''
                ),
                array(
                    "type" => "dropdown",
                    "param_name" => "align",
                    "heading" => esc_html__("Image align", 'themetonaddon'),
                    "value" => array(
                        "Left" => "left",
                        "Center" => "center",
                        "Right" => "right",
                    ),
                    "std" => 'center'
                ),
                array(
                    "type" => "textfield",
                    "heading" => __( "background", 'themetonaddon' ),
                    "param_name" => "bg_color",
                    "value" => '', 
                    "description" => __( "color code input . #9da2e0", 'themetonaddon' )
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
		),
    )
));