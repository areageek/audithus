<?php
if (!class_exists('WPBakeryShortCode_service_box')) {
class WPBakeryShortCode_service_box extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract( shortcode_atts( array(
            "style" => "left",
            "bgcolor" => "#1abc9c",
            "textcolor" => "",
            "image" => "",
            "carousel" => "",
            "imagesize" => "80x80",
            "icon" => "fa fa-question-circle-o",
            "size" => "medium",
            "link" => "#",
            "linktext" => "",
            "options" => "default",
            "title" => "Service title",
            "ycolumn" => "",
            "count" => "",
            "y_layout" => "layout1",
            'categories' => '',
            'phone' => "",
            'email' => '',
            "desc" => "Seamlessly provide access to distinctive vortals rather than multidisciplinary quality vectors.",
            "css_animation" => "",
            'icon' => 'fa fa-forumbee',
            'icon_type' => 'fontawesome',
            'extra_class' => '',
            'css' => ''
        ), $atts ) );

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'service_box', $atts );
        $extra_class .= ' '.$css_class;

        $icon = isset($atts["icon_$icon_type"]) ? $atts["icon_$icon_type"] : $icon;
        if (!empty($icon)) {
            wp_enqueue_style("vc_$icon_type");
        }
        $imgsize = "";
        if($icon_type == 'icon_image') {
            if ($imagesize == '') {
                $icon = wp_get_attachment_image_src($image, 'full'); 
            }
            else {
                $imgsize = explode('x', $imagesize);
                $imgsize = is_array($imgsize) ? $imgsize : array(64, 64);
                $icon = wp_get_attachment_image_src($image, $imgsize); 
            }
            $icon = "<img src='".$icon[0]."' width='".$imgsize[0]."' height='".$imgsize[1]."' alt='$title'/>";
        } else {
            $icon = $icon != '' ? $icon : "fa fa-question-circle-o";
            $icon = "<span class='$icon'></span>";
        }
        $icon = $link != '' ? "<a href='$link'>$icon</a>" : $icon;
        $icon = "<div class='service-icon'>$icon</div>";

        $title = "<a href='".$link."' class='more-link title-hover'>$title</a>";
        $titleheading = "<h3>$title</h3>";
        $desc = $desc !='' ? "<p>$desc</p>": '';
        
        $classes = $style;
        $classes .= ' '. $size;
        if($style != 'style-bordered' && $style != 'style-boxed') {
            $classes .= ' '. str_replace(',', ' ', $options);
        }
        $classes .= " $textcolor";
        $classes .= $this->getCSSAnimation( $css_animation );
        $classes .= $this->getExtraClass($extra_class);

        $inline_style = '';
        if($style == "style-boxed" && $bgcolor != '') {
            $inline_style = " style='background-color:$bgcolor;'";
        }
        $desc = $linktext != '' ? $desc ."<a href='$link' class='more-link'>$linktext</a>" : $desc;

        $result =   "<div class='mungu-element service-box $classes' $inline_style>
                        $icon
                        $titleheading
                        $desc
                    </div>";

        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => true,
            'paged' => $paged
        );
        $cats = array();
        if( !empty($categories) ){
            $exps = explode(",", $categories);
            foreach($exps as $val){
                if( (int)$val>-1 ){
                    $cats[]=(int)$val;
                }
            }
        }
        if(!empty($cats)){
            $args['tax_query'] = array(
                'relation' => 'IN',
                array(
                    'taxonomy' => 'service_category',
                    'field' => 'id',
                    'terms' => $cats
                )
            );
        }
        if ($style == 'cwa') {
            $result ='<div class="cwa-outer '.$extra_class.'">';
            $result .= '<div class="uk-card uk-card-hover uk-text-center" data-uk-toggle="target: > .toggle-text; mode: hover;animation: uk-animation-fade; cls: service-visible">
                <div class="scale-down">'.$icon.'</div>
                <div class="toggle-text uk-flex uk-flex-center service-hidden ">' . $desc . '</div>
                <div class="scale-down"><h3 class="uk-card-title">'.$title.'</h3></div>
            </div>';
            $result .='</div>';
        }
        if ($style == 'yoga-service') {
            $result = '<div class="uk-grid yoga-service uk-child-width-1-'.$ycolumn.'@m '.$extra_class.'">';
            $posts_query = new WP_Query($args);
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                $header = $thumb = '';
                if( has_post_thumbnail() ){
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    $img = !empty($img) ? $img[0] : '';
                    $thumb = '<div class="yoga-cart-back" data-bg-image="'.$img.'"></div>';
                }
                if ($y_layout=='layout1') {
                    $desc = '';
                    if (get_post_field('desc')!='') $desc = get_post_field('desc'); 
                    $header = '<div class="uk-padding pb2"><h3>'.get_the_title().'</h3>'.$desc.'</div><div class="yoga-back-color"></div>';
                }
                if ($y_layout=='layout2') {
                    $day = $time = '';
                    if (get_post_field('day')!='') $day = get_post_field('day'); 
                    if (get_post_field('time')!='') $time = get_post_field('time'); 
                    $header = '<div class="uk-padding pb2"><h5 class="day mt0 mb0">'.$day.'</h5><h3 class="mt0">'.get_the_title().'</h3><h4 class="time pt1 mt0 mb0">'.$time.'</h4></div><div class="yoga-back-color"></div>';
                }
                $result .= '<div class="mb5"><div class="yoga-service-item">
                    '.$header.$thumb.'
                </div></div>';
            }
            wp_reset_postdata();
            $result .='</div>';
        }

        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__("Service Icon", 'themetonaddon'),
    "description" => esc_html__("Icon Text and Description combination", 'themetonaddon'),
    "base" => "service_box",
    "content_element" => true,
    "category" => 'Themeton',
    "icon" => "mungu-vc-icon mungu-vc-icon38",
    "class" => 'mungu-vc-element',
    "params" => array(
        array(
            'type' => 'dropdown',
            "param_name" => "style",
            "heading" => esc_html__("Service Layout", 'themetonaddon'),
            "value" => array(
                "Default (left side)" => "default",
                "Center" => "style-center",
                "Right side" => "style-right",
                "Icon above" => "style-center style-above",
                "Inline" => "style-inline",
                "Inline Right" => "style-inline style-right",
                "Bordered" => "style-bordered",
                "Boxed" => "style-boxed",
                "Yoga" => "yoga-service",
                "Center with animation" => "cwa",
            ),
            "std" => "left",
        ),
        array(
            'type' => 'colorpicker',
            "param_name" => "bgcolor",
            "heading" => esc_html__("Background color", 'themetonaddon'),
            "value" => '#1abc9c',
            "dependency" => Array("element" => "style", "value" => array("style-boxed"))
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "textcolor",
            "heading" => esc_html__("Text color", 'themetonaddon'),
            "value" => array(
                "Text color white?" => "text-light"
            ),
            "dependency" => Array("element" => "style", "value" => array("style-boxed")),
        ),
         array(
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
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-smile',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
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
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
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
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
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
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
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
            'settings' => array(
                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image Image", 'themetonaddon'),
            "value" => '',
            "dependency" => Array("element" => "icon_type", "value" => array("icon_image"))
        ),
        array(
            'type' => 'textfield',
            "param_name" => "imagesize",
            "heading" => esc_html__("Image Size", 'themetonaddon'),
            "value" => '80x80',
            "description"  => 'Ex: 64x64 ( Width x Height, in pixels )',
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
            'type' => 'dropdown',
            "param_name" => "size",
            "heading" => esc_html__("Icon Size", 'themetonaddon'),
            "value" => array(
                "Extra Small" => "extra-small",
                "Small" => "small",
                "Medium (default)" => "medium",
                "Large" => "large",
            ),
            "std" => "medium",
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
        ),
        array(
            'type' => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Service Title", 'themetonaddon'),
            "value" => 'Service Title',
            "holder" => 'div',
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
        ),
        array(
            'type' => 'textarea',
            "param_name" => "desc",
            "heading" => esc_html__("Short Description", 'themetonaddon'),
            "value" => 'Seamlessly provide access to distinctive vortals rather than multidisciplinary quality vectors.',
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Specify category Id or leave blank to display items from all categories.", 'themetonaddon'),
            "value" => '',
            'dependency' => array(
                'element' => 'style',
                'value' => 'yoga-service',
            ),
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "options",
            "heading" => esc_html__("Options", 'themetonaddon'),
            "value" => array(
                "Filled" => "filled",
                "Transparent" => "transparent",
            ),
            "dependency" => Array("element" => "style", "value" => array("default", "style-center", "style-right"))
        ),
        array(
            'type' => 'textfield',
            "param_name" => "link",
            "heading" => esc_html__("Icon link (optional)", 'themetonaddon'),
            "value" => '',
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
        ),
        array(
            'type' => 'textfield',
            "param_name" => "linktext",
            "heading" => esc_html__("Link text (optional)", 'themetonaddon'),
            "value" => '',
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => 'yoga-service',
            ),
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "y_layout",
            "heading" => esc_html__("Layout", 'themetonaddon'),
            "value" => array(
                "Layout 1" => "layout1",
                "Layout 2" => "layout2"
            ),
            "std" => "layout1",
            'dependency' => array(
                'element' => 'style',
                'value' => 'yoga-service',
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "phone",
            "heading" => esc_html__("Phone number", 'themetonaddon'),
            "value" => "",
            'dependency' => array(
                'element' => 'style',
                'value' => 'yoga-service',
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "ycolumn",
            "heading" => esc_html__("Column number", 'themetonaddon'),
            "value" => "",
            'dependency' => array(
                'element' => 'style',
                'value' => 'yoga-service',
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "count",
            "heading" => esc_html__("Count", 'themetonaddon'),
            "value" => "",
            'dependency' => array(
                'element' => 'style',
                'value' => 'yoga-service',
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "email",
            "heading" => esc_html__("Email", 'themetonaddon'),
            "value" => "",
            'dependency' => array(
                'element' => 'style',
                'value' => 'yoga-service',
            ),
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