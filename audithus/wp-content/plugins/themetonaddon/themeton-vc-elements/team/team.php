<?php
if (!class_exists('WPBakeryShortCode_upking_team')) {
class WPBakeryShortCode_upking_team extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'title' => '',
            'subtitle' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'upking_team', $atts );
        $extra_class .= ' '.$css_class;
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1,
            'ignore_sticky_posts' => true,
        );
        $posts_query = new WP_Query($args);
        $posts_item = '';
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $name = Themeton_Std::getmeta('first_name').' '. Themeton_Std::getmeta('last_name');
            $img_url = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ),"full")[0];
            $posts_item .= '<div class="item"><a href="'.get_the_permalink().'">';
            $posts_item .= '<div class="team" style="background-image:url('.$img_url.'); background-size:cover; background-repeat:no-repeat; background-position:center center;">
                </div>
                <div class="meta mt5 uk-text-center">
                <h4 class="m0">'.$name.'</h4>
                <span>'.Themeton_Std::getmeta('position').'</span>
                </div>';
            $posts_item .= '</a></div>';
            wp_reset_postdata();
        }
        return '<div class="upking-team-owl uk-flex uk-flex-center uk-flex-middle owl-theme '.$extra_class.'" data-team-title="'.$title.'" data-team-subtitle="'.$subtitle.'" >'.$posts_item.'</div>';
    }
}
}

vc_map( array(
    "name" => esc_html__('Upking Team', 'themetonaddon'),
    "description" => esc_html__("You can add both custom and post", 'themetonaddon'),
    "base" => 'upking_team',
    "icon" => "mungu-vc-icon mungu-vc-icon26",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "param_name" => "subtitle",
            "heading" => esc_html__("Subtitle", 'themetonaddon'),
            "value" => "",
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