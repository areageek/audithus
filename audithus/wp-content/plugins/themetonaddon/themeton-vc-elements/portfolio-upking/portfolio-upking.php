<?php
if (!class_exists('WPBakeryShortCode_Upking_Portfolio')) {
class WPBakeryShortCode_Upking_Portfolio extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'upking_portfolio', $atts );
        $extra_class .= ' '.$css_class;

        // build query
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => true,
        );
        $title='';
        $item = $result = '';
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $title = '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
            if (Themeton_Std::getmeta('portfolio_gallery')!='') {
                $images = explode(',',Themeton_Std::getmeta('portfolio_gallery'));
                $item = '';
                foreach ($images as $attachment_id) {
                    $url = wp_get_attachment_image_src( $attachment_id, 'full');
                    $item .='<li>
                        <img src="'.$url[0].'" alt="upking" data-uk-cover>
                    </li>';
                }
                $result .= '<div class="upking-portfolio-item mb12 mb5@s"><div class="uk-position-relative uk-visible-toggle uk-light upking-portfolio" data-uk-slideshow>
                    <ul class="uk-slideshow-items">
                        '.$item.'
                    </ul>
                    <a class="uk-slidenav-large upking-carousel-btn uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
                    <a class="uk-slidenav-large upking-carousel-btn uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
                </div><div class="uk-flex uk-flex-center uk-text-center upking-port-date"><div class="uk-flex uk-flex-center uk-flex-middle uk-flex-column"><h3>'.get_the_time( 'j' ).'</h3><i>'.get_the_time( 'M' ).'</i></div></div><h1 class="upking-portfoliot-title ml15 mr15 ml3@s mr3@s">'.$title.'</h1></div>';
            }
        }
        // reset query
        wp_reset_postdata();
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Upking Portfolio', 'themetonaddon'),
    "description" => esc_html__("portfolio gallery", 'themetonaddon'),
    "base" => 'upking_portfolio',
    "icon" => "mungu-vc-icon mungu-vc-icon27",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(

        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Show", 'themetonaddon'),
            "value" => '3'
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

