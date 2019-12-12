<?php

if (!class_exists('Themeton_Social_Links_Widget')) {
class Themeton_Social_Links_Widget extends WP_Widget {

    public $social_icons = array(
        "facebook" => "facebook",
        "twitter" => "twitter",
        "pinterest" => "pinterest",
        "instagram" => "instagram",
        "googleplus" => "google-plus",
        "dribbble" => "dribbble",
        "skype" => "skype",
        "wordpress" => "wordpress",
        "vimeo" => "vimeo-square",
        "flickr" => "flickr",
        "linkedin" => "linkedin",
        "youtube" => "youtube",
        "tumblr" => "tumblr",
        "link" => "link",
        "stumbleupon" => "stumbleupon",
        "delicious" => "delicious",
        "style" => "",
        "target" => "",
    );

    function __construct() {
        $widget_ops = array(
            'classname' => 'widget_social',
            'description' => esc_html__('Displays your social profile.', 'themetonaddon')
        );
        parent::__construct(false, esc_html__(': Social Links', 'themetonaddon'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $style = empty($instance['style']) ? '' : $instance['style'];
        $target = empty($instance['target']) ? '' : $instance['target'];
        $title = apply_filters('widget_title', $instance['title']);

        print($before_widget);

        if( $title ){
            echo "$before_title $title $after_title";
        }
        $targetBlank = "";
        if($target=='yes') {$targetBlank="target='_blank'"; }
        
        echo '<div class="social-links '.$style.'">';
        foreach ($this->social_icons as $social => $icon) {
            if (isset($instance['social_' . $social]) && $instance['social_' . $social] != "") {
                $url = $instance['social_' . $social];
                if($url != '#!' && $url != '#') {
                    if($social != 'email' && $social != 'skype') {
                        if(strpos($url, 'http:') === false) $url = "http://" . $url;
                    } elseif($social == 'email') {
                        $url = 'mailto:' . $url . '?subject=' . get_bloginfo('name') . '&body=Your message here!';
                    } elseif($social != 'skype') {
                        $url = $url;
                    }
                }                
                if(function_exists("vc_icon_element_fonts_enqueue")) {
                    // Enqueue needed icon font.
                    vc_icon_element_fonts_enqueue( 'fontawesome' );
                }
                echo '<a class="social_'.$social.'" href="'.esc_url($url).'" '.$targetBlank.'><i  class="social-'.$social.' fa fa-'.$icon.'"></i></a>';
            }
        }
        echo '</div>';

        print($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        /* Strip tags (if needed) and update the widget settings. */
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['style'] = $new_instance['style'];
        $instance['target'] = $new_instance['target'];
        foreach ($this->social_icons as $social => $icon) {
            $instance['social_' . $social] = sanitize_text_field($new_instance['social_' . $social]);
        }
        return $instance;
    }

    function form($instance) {
        //Output admin widget options form
        extract(shortcode_atts(array(
                    'title' => '',
                    'style' => 'style1',
                    'target' => '',
                ), $instance));
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e('Widget Style:', 'themetonaddon'); ?>
                <select class="uk-select widefat" id="<?php print $this->get_field_id('style'); ?>"
                   name="<?php print $this->get_field_name('style'); ?>" type="text">
                    <option value='style1'<?php echo ($style=='style1')?'selected':''; ?>>
                       Style 1 - Colored fill.
                     </option>
                     <option value='style2'<?php echo ($style=='style2')?'selected':''; ?>>
                       Style 2 - Icon list
                     </option> 
                     <option value='style3'<?php echo ($style=='style3')?'selected':''; ?>>
                       Style 3 - Outline
                     </option> 
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e('Open in a new tab:', 'themetonaddon'); ?></label>
            <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('target')); ?>" name="<?php echo esc_attr($this->get_field_name('target')); ?>" value="yes" <?php checked($target, 'yes'); ?>>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget Title:', 'themetonaddon'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr(isset($instance['title']) ? $instance['title'] : ''); ?>"  />
        </p>
        <?php
        foreach ($this->social_icons as $social => $icon) { ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('social_' . $social)); ?>"><?php echo ucwords($social); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('social_' . $social)); ?>" name="<?php echo esc_attr($this->get_field_name('social_' . $social)); ?>" value="<?php echo esc_attr(isset($instance['social_' . $social]) ? $instance['social_' . $social] : ''); ?>"  />
            </p>
            <?php
        }
    }
}
}

return register_widget("Themeton_Social_Links_Widget");