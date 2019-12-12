<?php
if (!class_exists('WPBakeryShortCode_themeton_ukk_slider')) {
class WPBakeryShortCode_themeton_ukk_slider extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'title' => '',
            'image' => '',
            'images' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));
 
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'themeton_ukk_slider', $atts );
        $extra_class .= ' '.$css_class;
        $image_url = $next = $prev = '';
        if( !empty($image) ){
            $image_url = wp_get_attachment_image_url($image, 'full');
            $next = "<a href='javascript:;' data-uk-slider-item='next'><img class='next' src='".$image_url."' alt='next'></a>";
            $prev = "<a href='javascript:;' data-uk-slider-item='prev'><img class='prev' src='".$image_url."' alt='prev'></a>";
        }
        else {
            $next = "<a class='prev' href='javascript:;' data-uk-slidenav-previous data-uk-slider-item='prev'></a>";
            $prev = "<a class='next' href='javascript:;' data-uk-slidenav-next data-uk-slider-item='next'></a>";
        }
        $pagination = '';
        $pagination = $prev.$next;
        $column = '';
        $slider = '';
        $images_id = '';
        if ($images!='') {
            $images_id = explode(',',$images);
            foreach ($images_id as $id) {
                $img = wp_get_attachment_image_src( $id, 'full' );
                $img = "<img src='".$img[0]."' alt='$id'/>";
                $slider .= "<li class='uk-width-2-3'><div class='uk-panel'>$img</div></li>";
            }
            if ($slider!='') $slider = sprintf("<ul class='uk-slider-items uk-grid uk-grid-match'>%s</ul>",$slider);
        } 
        $content = esc_attr($content);
        $result = "<div class='bussiness-uk-slider uk-position-relative uk-visible-toggle uk-dark $extra_class' data-uk-slider='finite: true'><div class='uk-grid uk-grid-match' data-uk-grid>";
        $result .= "<div class='uk-width-2-3'>$slider</div>";
        $column = "<div class='uk-padding-medium'><h2 class='uk-heading'>$title</h2><p class='mr5 mr3@s'>$content</p><div class='uk-slidenav-container mt3'>$pagination</div></div>";
        $result .= "<div class='uk-width-1-3 uk-flex-first uk-flex uk-flex-middle bussiness-slidenav-background'>$column</div>";
        $result .= "</div></div>";
        return $result;
    }
}
}
vc_map( array(
    "name" => esc_html__('Uk Slider', 'themetonaddon'),
    "description" => esc_html__("uikit slider", 'themetonaddon'),
    "base" => 'themeton_ukk_slider',
    "icon" => "mungu-vc-icon mungu-vc-icon64",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
        ),
        array(
            'type' => 'textarea_html',
            "param_name" => "content",
            "heading" => esc_html__("Content", 'themetonaddon'),
        ),
        array(
            "type" => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Slider Arrow Image", 'themetonaddon'),
        ),
        array(
            "type" => 'attach_images',
            "param_name" => "images",
            "heading" => esc_html__("Slider Images", 'themetonaddon'),
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

/*

<div class='uk-grid' data-uk-grid>
  <div class="uk-width-2-3">
      <ul class="uk-slider-items uk-grid">
          <li class="uk-width-2-3">
              <div class="uk-panel">
              <img src="https://getuikit.com/docs/images/photo.jpg" alt="">
              </div>
          </li>
          <li class="uk-width-2-3">
              <div class="uk-panel">
               <img src="https://getuikit.com/docs/images/dark.jpg" alt="">
              </div>
          </li>
          <li class="uk-width-2-3">
              <div class="uk-panel">
              <img src="https://getuikit.com/docs/images/light.jpg" alt="">
              </div>
          </li>
          <li class="uk-width-2-3">
              <div class="uk-panel">
              <img src="https://getuikit.com/docs/images/photo2.jpg" alt="">
              </div>
          </li>
          <li class="uk-width-2-3">
              <div class="uk-panel">
               <img src="https://getuikit.com/docs/images/photo3.jpg" alt="">
              </div>
          </li>
      </ul>
    </div>
    <div class="uk-width-1-3 uk-flex-first uk-flex uk-flex-middle bussiness-slidenav-background uk-dark">
      <div class="uk-padding-large ">
          <h3 class="uk-heading">Enter your Project Heading</h3>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
        </p>
        <div class="uk-slidenav-container">
          <a class="" href="#" uk-slider-item="previous">a</a>
          <a class="" href="#" uk-slider-item="next">b</a>
        </div>
      </div>
  </div>
</div>
</div>
 */