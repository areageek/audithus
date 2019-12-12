<?php

if (!class_exists('WPBakeryShortCode_woo_tab')) {
class WPBakeryShortCode_woo_tab extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'shadows' => "uk-box-shadow-small",
            'border' => false,
            'icons' => '',
            'size' => '',
            "href" => '',
            'icon_type' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_tab', $atts );
        $class .= ' '.$css_class;
        $result = $switcher = '';
        $tag = '';
        $content = '';
        $args = array(
            'post_type' => 'product',
        );
        $query = new WP_Query($args);
        if(isset($atts['group'])) {
            $tabs = '<ul class="uk-subnav uk-subnav-pill '.$class.'" uk-switcher="connect: .woo-tab, animation: uk-animation-fade">';
            $switcher = '<div class="uk-switcher uk-margin uk-animation-fade woo-tab">';
            $group = vc_param_group_parse_atts( $atts['group']);
            foreach ($group as $key => $value) {
                $img = sprintf('<img src="%s" />',wp_get_attachment_image_src( $value['icon'] )[0]);
                $tabs .= sprintf('<li>%s<div class="uk-text-center">%s</div></li>',$img,$value['title']);
                $tag = $value['tags'];
                $tab_post = '<div class="uk-grid uk-grid-collapse">';
                while ($query->have_posts()) {
                    $query->the_post();
                    $id = $query->post->ID;
                    $terms = get_the_terms( $id ,'product_tag' );
                    $bool = false;
                    if ($terms) {
                        foreach ($terms as $val) {
                            if ($val->name==$tag) {
                                $attr = get_post_meta($id)['_product_attributes'][0];
                                $array = unserialize($attr);
                                $case_size = $array['case-size'];
                                $water_resistance = $array['water-resistance'];
                                $thumb_url = get_the_post_thumbnail_url( $id, 'full' );
                                $video = $array['video-thumbnail'];
                                $video = $video['value'];
                                $video = '<iframe height="315"
                                src="'.$video.'">
                                </iframe>';
                                $tab_post .='
                                    <div class="uk-width-2-5@m">
                                    '.$video.'
                                    </div>
                                    <div class="uk-width-3-5@m">
                                    '.$val->name.'
                                    <h1>'.get_the_title().'</h1>
                                    <p>'.get_the_excerpt().'</p>
                                    <div class="uk-grid">
                                        <div class="uk-width-auto@m">
                                            <h4>'.$case_size['value'].'</h4>
                                            '.$case_size['name'].'
                                        </div>
                                        <div class="uk-width-auto@m">
                                            <h4>'.$water_resistance['value'].'</h4>
                                            '.$water_resistance['name'].'
                                        </div>
                                        <div class="uk-width-expand@m">
                                            
                                        </div>
                                    </div>
                                </div>';
                                //$tab_post .= sprintf('<>',);
                            }
                        }
                    }
                    wp_reset_postdata();
                    if ($bool) break;
                }
                $tab_post .= '</div>';
                $switcher .= $tab_post;
            }
            $tabs .='</ul>';
            $switcher .= '</div>';
        }
        $result .= $tabs.$switcher;
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Woo Tab', 'themetonaddon'),
    "description" => esc_html__("Woocommerce Tab", 'themetonaddon'),
    "base" => 'woo_tab',
    "icon" => "mungu-vc-icon mungu-vc-icon81",
    "class" => 'mungu-vc-element',
    "content_element" => true,
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
                    'admin_label' => true,
                    'holder' => 'div',
                    "heading" => esc_html__("Title of the tab", 'themetonaddon'),
                ),
                array(
                    "type" => 'textfield',
                    "param_name" => "tags",
                    'admin_label' => false,
                    "heading" => esc_html__("Product tag", 'themetonaddon'),
                ),
                array(
                    "type" => 'attach_image',
                    "param_name" => "icon",
                    'admin_label' => false,
                    "heading" => esc_html__("Title icon image (optional)", 'themetonaddon'),
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