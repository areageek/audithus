<?php
if (!class_exists('WPBakeryShortCode_modal')) {
class WPBakeryShortCode_modal extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        
        // Initial argument sets
        extract(shortcode_atts(array(
            'url' => 'https://player.vimeo.com/video/1166968?',
            'css' => '',
            'extra_class' => ''
        ), $atts));

$modalid = rand(50, 99999);
$class = esc_attr($extra_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'modal', $atts );

$result='';
$button2 = '';
$result = "
    <div class='themeton-play-button uk-flex uk-flex-middle ".$class." ".$css_class." uk-flex-center'>
        <a href='#media-$modalid' class='uk-icon-link uk-toggle uk-flex uk-flex-middle uk-flex-center'><i class='fa fa-play' aria-hidden='true'></i></a>
        <div id='media-$modalid' class='uk-flex-top uk-modal'>
            <div class='uk-modal-dialog uk-width-auto uk-margin-auto-vertical'>
                <a href='' class='uk-icon-link uk-icon uk-close uk-modal-close-outside'><svg width='14' height='14' viewBox='0 0 14 14' xmlns='http://www.w3.org/2000/svg'><line fill='none' stroke='#000' stroke-width='1.1' x1='1' y1='1' x2='13' y2='13'></line><line fill='none' stroke='#000' stroke-width='1.1' x1='13' y1='1' x2='1' y2='13'></line></svg></a>
                <iframe src='".$url."' width='880' height='495' class='uk-video'></iframe>
            </div>
            </div>
        </div>";
return $result;
    }
}
}
vc_map( array(
    "name" => esc_html__('Play button', 'themetonaddon'),
    "description" => esc_html__("Plays youtube and vimeo.)", 'themetonaddon'),
    "base" => 'modal',
    "icon" => "mungu-vc-icon mungu-vc-icon73",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "url",
            "heading" => esc_html__("Media URL", 'themetonaddon'),
            "value" => "https://player.vimeo.com/video/1166968",
            "description" => esc_html__("Works with YouTube, Vimeo etc.", 'themetonaddon'),
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
			'heading' => esc_html__('CSS box', 'themetonaddon' ),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'themetonaddon' ),
		),
    )
));
