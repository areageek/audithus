<?php

// wp_oembedd media filter
global $wp_embed;
add_filter( 'themeton_media_filter', array( $wp_embed, 'autoembed' ), 8 );


class Themeton_Tpl{

    // Print Sites Logo
    public static function get_logo($bool = false, $width = ''){
        $custom_logo = '';
        if( function_exists('get_custom_logo') ){
            $custom_logo = get_custom_logo();
        } else {
            $logo = Themeton_Std::get_mod('logo');
            if( !empty($logo) ){
                if ($width!='') $width = sprintf('style="width:%spx;"',abs($width));
                $custom_logo = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home"><img src="%2$s" alt="'.get_bloginfo('name').'" %3$s class="custom-logo"></a>',
                    esc_url(home_url('/')),
                    esc_url($logo),
                    $width
                );
            }
        }
        
        // Logo from Theme Options
        if($custom_logo == '') {
            $logo = Themeton_Std::getopt('logo');
            if( !empty($logo) ){
                if ($logo['url']!='') {
                    if ($width!='') $width = sprintf('style="width:%spx;"',abs($width));
                    $custom_logo = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home"><img src="%2$s" alt="%3$s" %4$s class="custom-logo"></a>',
                    esc_url(home_url('/')),
                    esc_url($logo['url']),
                    get_bloginfo('name'),
                    $width
                );}
                else {
                    $custom_logo = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
                        esc_url(home_url('/')),
                        get_bloginfo('name')
                    );
                }
            }
        }

        if( !empty($custom_logo) && strpos($custom_logo, " src=") ){
            $custom_logo = str_replace(' itemprop="url"', '', $custom_logo);
            $custom_logo = str_replace(' itemprop="logo"', '', $custom_logo);
            if ($bool) return $custom_logo;
            else printf($custom_logo);
        }
        else{
            printf('<a href="%s" rel="home" class="logo-text-link">%s</a>', esc_url(home_url('/')), get_bloginfo('name') );
            $description = get_bloginfo('description', 'display');
            if ( !empty($description) ){
                if ($bool) return sprintf('<p class="site-description uk-hidden">%s</p>', $description);
                else printf('<p class="site-description uk-hidden">%s</p>', $description);
            }
        }
    }

    public static function inline_script(){
        $cookie = array();
        if( array_key_exists('reactions_of_posts', $_COOKIE) ){
            $cookie = (array)json_decode($_COOKIE['reactions_of_posts']);
        }

        return sprintf('var theme_options = { ajax_url: "%s" };
                        var themeton_reaction_of_posts = %s;',
                        esc_url(admin_url('admin-ajax.php')), json_encode($cookie) );
    }

    // get post types
    public static function get_post_types($reverse = false){

        $result = array();
        $post_arr = array();
        $post_arr['post'] = get_post_type_object('post');
        $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects', 'and');
        
        $post_types = array_merge($post_arr, $post_types);
        foreach ($post_types as $type) {
            if(!$reverse) {
                $result[$type->name] = $type->labels->name;
            } else {
                $result[$type->labels->name] = $type->name;
            }
        }
        return $result;
    }
    
    public static function the_arrow_icon($class = ''){
        return '
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" data-name="icon arrow" x="0px" y="0px" viewBox="0 0 50 50" style="" xml:space="preserve" width="35px" height="35px" class="'.$class.' default-arrow-next">
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" d="M46.525,25L2.025,25" class="yGXnEgOA_0"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" d="M38.025,35L47.625,25L38.025,15" class="yGXnEgOA_1"/>
        </svg>';
    }


    public static function build_theme_image_support(){
        add_theme_support('custom-header');
        add_theme_support('custom-background');
        add_editor_style( array('css/editor-style.css') );
    }


    public static function get_post_image($size = 'full', $ratio = '16x7', $hover = 'fade', $grid = true, $label = '') {
        return self::get_post_media($size, $ratio, $hover, $grid, $label);
    }

    public static function get_post_media($size = 'large', $ratio = '16x7', $hover = 'plus', $grid = true, $label = '' ){

        global $post;
        $media = $image_src = $image_media = "";

        if(has_post_thumbnail(get_the_ID())) {
            $image_media = wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), $size);
            $thumb_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size);
            $image_src = $media = $thumb_src[0];
        } else {
            ob_start();
            ob_end_clean();
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
            if(isset($matches[1][0])) {
                $image_src = $media = $matches[1][0];
            }
        }

        // Post format details
        $format = get_post_format();
        if($format == false && $media == '') {
            return '';
        } elseif($format == 'aside' || $format == 'chat' || $format == 'status') {
            return '';
        }

        $class = $icon = '';
        if ($hover == 'both') {
            $hovermarkup='<div class="overlay uk-transition-toggle uk-light"><div class="uk-position-center"><span class="uk-transition-fade zoom-lightbox uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle> <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"></path></svg></span><span class="uk-transition-fade uk-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="none" stroke="#000" stroke-width="1.1" d="M10.625,12.375 L7.525,15.475 C6.825,16.175 5.925,16.175 5.225,15.475 L4.525,14.775 C3.825,14.074 3.825,13.175 4.525,12.475 L7.625,9.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M9.325,7.375 L12.425,4.275 C13.125,3.575 14.025,3.575 14.724,4.275 L15.425,4.975 C16.125,5.675 16.125,6.575 15.425,7.275 L12.325,10.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M7.925,11.875 L11.925,7.975"></path></svg></span></div></div>';
            $class = 'icon-circle';
        } elseif ($hover == 'fade') {
            $hovermarkup='<div class="overlay"></div>';
        } elseif ($hover == 'link') {
            $hovermarkup='<div class="overlay uk-transition-toggle uk-light"><div class="uk-position-center"><span class="uk-transition-fade uk-icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20"><path fill="none" stroke="#000" stroke-width="1.1" d="M10.625,12.375 L7.525,15.475 C6.825,16.175 5.925,16.175 5.225,15.475 L4.525,14.775 C3.825,14.074 3.825,13.175 4.525,12.475 L7.625,9.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M9.325,7.375 L12.425,4.275 C13.125,3.575 14.025,3.575 14.724,4.275 L15.425,4.975 C16.125,5.675 16.125,6.575 15.425,7.275 L12.325,10.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M7.925,11.875 L11.925,7.975"></path></svg></span></div></div>';
            $class = 'icon-circle';
        } elseif ($hover == 'lightbox') {
            $hovermarkup='<div class="overlay uk-transition-toggle uk-light"><div class="uk-position-center"><span class="uk-transition-fade zoom-lightbox uk-icon"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle> <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"></path></svg></span></div></div>';
            $class = 'icon-circle';
        } else { // plus
            $hovermarkup='<div class="overlay uk-transition-toggle uk-light"><div class="uk-position-center"><span class="uk-animation-slide-bottom-small text-white uk-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20">
                <path fill="none" stroke="#000" stroke-width="1.1" d="M10.625,12.375 L7.525,15.475 C6.825,16.175 5.925,16.175 5.225,15.475 L4.525,14.775 C3.825,14.074 3.825,13.175 4.525,12.475 L7.625,9.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M9.325,7.375 L12.425,4.275 C13.125,3.575 14.025,3.575 14.724,4.275 L15.425,4.975 C16.125,5.675 16.125,6.575 15.425,7.275 L12.325,10.375"></path>
                <path fill="none" stroke="#000" stroke-width="1.1" d="M7.925,11.875 L11.925,7.975"></path>
            </svg>
        </span></div></div>';
        }

        // Post format details
        $ratio = $format == 'gallery' ? '5x3' : $ratio;

        if($grid == false && $image_media != '') {
            $ratioimage = $image_media;
        } else {
            $ratioimage = "<img src='".get_template_directory_uri()."/images/dim/$ratio.png' alt='".esc_attr__('Ratio', 'medio')."'/>";
        }

        if($ratio != 'auto') {
            $ratioimage = "<img src='".get_template_directory_uri()."/images/dim/$ratio.png' alt='".esc_attr__('Ratio', 'medio')."'/>";
        } else {
            $ratioimage = $media;
        }

        if($ratio == 'auto') {
            $media = "<a href='".get_permalink()."' class='$class'><div class='themeton-image'><img src='$media' alt=''/>$hovermarkup</div></a>";
        } else {
            $media = $media != '' ? "<a href='".get_permalink()."' class='$class'><div class='themeton-image' data-src='$media'>$ratioimage$hovermarkup</div></a>" : '';
        }
        
        if( current_theme_supports('post-formats', $format) ){


            // blockquote
            if( $format=='quote' ){
                preg_match("/<blockquote>(.*?)<\/blockquote>/msi", get_the_content(), $matches);
                if( isset($matches[0]) && !empty($matches[0]) ){
                    $media = $matches[0];
                    $media = str_replace("<blockquote", "<blockquote class='quote-element'", $media);
                    if($grid == true) {
                        $media = "<div class='themeton-image'>$ratioimage<div class='media-middle'>$media</div></div>";    
                    }
                }
            }


            // link
            else if( $format=='link' ){
                preg_match('/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU', get_the_content(), $matches);
                if( isset($matches[1],$matches[2]) && !empty($matches[2]) ){
                    $media = "<blockquote class='link-element'>
                                $matches[2]
                                <cite><a href='$matches[1]'>$matches[1]</a></cite>
                              </blockquote>";
                    if($grid == true) {
                        $media = "<div class='themeton-image'>$ratioimage<div class='media-middle'>$media</div></div>";
                    }

                }
            }


            // gallery
            else if( $format=='gallery' && has_shortcode($post->post_content, 'gallery') ){
                $galleryObject = get_post_gallery( get_the_ID(), false );
                $ids = explode(",", isset($galleryObject['ids']) ? $galleryObject['ids'] : "");

                $gallery = '';
                if( $ids == "" || count($ids) < 2) {
                    if ( is_array($galleryObject['src']) ) {
                        foreach ($galleryObject['src'] as $key => $value) {
                            $gallery .= "<div class='swiper-slide'><div class='themeton-image' data-src='$value'>$ratioimage</div></div>";
                        }
                    }
                } else {
                    foreach ($ids as $gid) {
                        $img = wp_get_attachment_image_src( $gid, $size );
                        $gallery .= "<div class='swiper-slide'><div class='themeton-image' data-src='$img[0]'>$ratioimage</div></div>";
                    }
                }


                $media = !empty($gallery) ? "<div class='gallery-slideshow'>
                        <div class='swiper-container gallery-container'>
                            <div class='swiper-wrapper'>$gallery</div>
                        </div>
                        <div class='swiper-button-prev uk-light uk-icon'><svg viewBox='0 0 20 20' width='20' height='20'>
    <polyline fill='none' stroke='#000' stroke-width='1.03' points='13 16 7 10 13 4'></polyline>
</svg></div>
                        <div class='swiper-button-next uk-light uk-icon'><svg viewBox='0 0 20 20' width='20' height='20'>
    <polyline fill='none' stroke='#000' stroke-width='1.03' points='7 4 13 10 7 16'></polyline>
</svg></div>
                    </div>" : $media;
            }


            // audio
            else if( $format=='audio' ){

                $pattern = get_shortcode_regex();
                preg_match('/'.$pattern.'/s', $post->post_content, $matches);
                if (is_array($matches) && isset($matches[2]) && $matches[2] == 'audio') {
                    $shortcode = $matches[0];
                    $media = '<div class="mejs-wrapper audio">'. do_shortcode($shortcode) . '</div>';
                }
                else{
                    $frame = "frame";
                    $regx = "/<i$frame(.)*<\/i$frame>/msi";
                    preg_match($regx, get_the_content(), $matches);
                    if( isset($matches[0]) && !empty($matches[0]) ){
                        $media = $matches[0];
                    }
                    else{
                        if ( preg_match( '|^\s*(https?://[^\s"]+)\s*$|im', $post->post_content, $matches ) ) {
                            if(isset($matches[1])) {
                                $media = "<div class='audio-post'>".apply_filters( "themeton_media_filter", $matches[1] )."</div>";
                            }
                        }
                    }
                }
                $ratioimage = "<img src='".get_template_directory_uri()."/images/dim/3x1.png' style='width:100%' alt='".esc_attr__('Ratio', 'rehub')."'/>";
                $media = "<div class='themeton-image $class' data-src='$image_src'>$ratioimage $media</div>";
            }


            // video
            else if( $format=='video' ){
                if ( preg_match( '|^\s*(https?://[^\s"]+)\s*$|im', $post->post_content, $matches ) ) {
                    if(isset($matches[1])) {
                        $ratioimage = "<img src='".get_template_directory_uri()."/images/dim/16x9.png' style='width:100%' alt='".esc_attr__('Ratio', 'rehub')."'/>";
                        $media = "<div class='video-post'>".apply_filters( "themeton_media_filter", $matches[1] )."</div>";
                        $media = "<div class='$class themeton-image'>$ratioimage $media</div>";
                    }
                }
            }
            
        }

        return !empty($media) ? "<div class='entry-media'>$media</div>" : "";
    }

    public static function get_post_video_url(){
        global $post;

        if( Themeton_Std::get_mod('video_lightbox_disable') == '1' ) {
            return get_permalink();
        }

        $format = get_post_format();
        if( $format=='video' ){
            if ( preg_match( '|^\s*(https?://[^\s"]+)\s*$|im', $post->post_content, $matches ) ) {
                if (isset($matches[1]) && !empty($matches[1])) {
                    return $matches[1];
                }
            }
        }
        return '';
    }    


    public static function get_author_link_address(){
        global $post;
        return get_author_posts_url(get_the_author_meta('ID'));
    }


    public static function gallery_slideshow( $galleryObject = array() ) {

        $ids = explode(",", isset($galleryObject['ids']) ? $galleryObject['ids'] : "");

        $gallery = $gallery_thumbs = $meta_html = '';
        if( $ids == "" || count($ids) < 2) {
            if( !empty($galleryObject) && array_key_exists('src', $galleryObject) ){
                foreach ($galleryObject['src'] as $key => $value) {
                    $gallery .= "<div class='swiper-slide'>
                            <a href='#'>
                                <div class='project-feautured-item' data-bg-image='".esc_attr($value)."'></div>
                            </a>
                        </div>";
                }
            }
        }
        else {
            foreach ($ids as $gid) {
                $value = wp_get_attachment_image_src( $gid, 'large' );
                $value = $value[0];
                $thumb = wp_get_attachment_image_src( $gid, 'large' );
                $thumb = $thumb[0];
                $img = get_post( $gid );
                $caption = isset($img->post_excerpt) && $img->post_excerpt != '' ? $img->post_excerpt : '';
                $alt = get_post_meta( $gid, '_wp_attachment_image_alt', true );

                $gallery .= "<div class='swiper-slide' style='background-image: url(".esc_attr($value).");'>
                                <span class='gallery-caption'>$caption</span>
                            </div>";
                $gallery_thumbs .= "<div class='swiper-slide' style='background-image: url(".esc_attr($thumb).");'></div>";
            }
        }

        $gallery_id = uniqid();

        $media = !empty($gallery) ? "<div class='medio-element medio-gallery-element' id='$gallery_id'>
                        <div class='swiper-container gallery-top'>
                            <div class='swiper-wrapper'>
                                $gallery
                            </div>
                            <span class='swiper-button-next arrow next uk-icon' data-uk-icon='icon: arrow-right; ratio: 2;'></span>
                            <span class='swiper-button-prev arrow right uk-icon' data-uk-icon='icon: arrow-right; ratio: 2;'></span>
                        </div>
                    <div class='swiper-container gallery-thumbs'>
                        <div class='swiper-wrapper'>
                            $gallery_thumbs
                        </div>
                    </div>
                </div>" : '';

        return $media;
    }

     
    public static function pagination( $query=null ,$event=false, $custom = null ) {
        global $wp_query,$paged;
        $query = $query ? $query : $wp_query;
        if ($event) {
            $query = new WP_Query ($query);
        }
        $big = 999999999;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : $paged;
        }
        else $paged = max( 1, $paged );
        $arrow_svg = "<span class='uk-icon' data-uk-icon='icon: arrow-right; ratio: 2;'></span>";
        $paginate = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'type' => 'array',
            'prev_next'    => true,
            'total' => $query->max_num_pages,
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'prev_text' => '<i class="medical-arrow left">'.$arrow_svg.'</i>',
            'next_text' => '<i class="medical-arrow right">'.$arrow_svg.'</i>',
            )
        );

        $result = '';

        if ($query->max_num_pages > 1) :
            $previous_post = get_previous_post(); 
            
            $link_prev = $link_next = 'javascript:;';
            $link_prev_class = $link_next_class = 'inactive';
            $result_list = '';

            $result .= "<ul class='pagination uk-flex uk-flex-middle'>";
            $k = 0;
            foreach ( $paginate as $page ) {
                if(strpos($page, 'prev ') !== false) {
                    $url = preg_match('/href=["\']?([^"\'>]+)["\']?/', $page, $match);
                    $link_prev = $match[1];
                    $link_prev_class = '';
                } elseif(strpos($page, 'next ') !== false) {
                    $url = preg_match('/href=["\']?([^"\'>]+)["\']?/', $page, $match);
                    $link_next = $match[1];
                    $link_next_class = '';
                } else {
                    $result_list .= "<li>$page</li>";
                }
            }
            if ($custom != null) $result .= "<li class='previous-link $link_prev_class'><a class='prev page-numbers' href='$link_prev'>".$custom['prev']."</a></li>";
            else $result .= "<li class='previous-link $link_prev_class'><a class='prev page-numbers' href='$link_prev'><i class='medical-arrow left uk-icon' data-uk-icon='icon: arrow-right; ratio: 2;'></i></a></li>";
            $result .= $result_list;
            if ($custom != null) $result .= "<li class='next-link $link_next_class'><a class='next page-numbers' href='$link_next'>".$custom['next']."</a></li>";
            else $result .= "<li class='next-link $link_next_class'><a class='next page-numbers' href='$link_next'><i class='medical-arrow right uk-icon' data-uk-icon='icon: arrow-right; ratio: 2;'></i></a></li>";
            $result .= "</ul>";
        endif;
        
        return $result;
    }

    public static function getCategories($post_id, $post_type){
        $cats = array();
        $taxonomies = get_object_taxonomies($post_type);
        if( !empty($taxonomies) ){
            $tax = $taxonomies[0];
            if( $post_type=='product' )
                $tax = 'product_cat';
            $terms = wp_get_post_terms($post_id, $tax);
            foreach ($terms as $term){
                $cats[] = array(
                                'term_id' => $term->term_id,
                                'name' => $term->name,
                                'slug' => $term->slug,
                                'link' => get_term_link($term)
                                );
            }
        }

        return $cats;
    }


    public static function get_related_post_types( $options=array() ){

        global $post;
        $type = get_post_type( get_the_ID() );
        $options = array_merge(array(
                    'per_page'=>'5'
                    ),
                    $options);
        $args = array(
            'post__not_in' => array($post->ID),
            'posts_per_page' => $options['per_page']
        );

        $categories = get_the_category($post->ID);
        if ($categories) {
            $category_ids = array();
            foreach ($categories as $individual_category) {
                $category_ids[] = $individual_category->term_id;
            }
            $args['category__in'] = $category_ids;
        }

        // For portfolio post and another than Post
        if( 'post' !== $type && 'page' !== $type) {
            $tax_name = $type.'_category'; //should change it to dynamic and for any custom post types
            $args['post_type'] =  get_post_type(get_the_ID());
            $args['tax_query'] = array(
                array(
                    'taxonomy' => $tax_name,
                    'field' => 'id',
                    'terms' => wp_get_post_terms($post->ID, $tax_name, array('fields'=>'ids'))
                )
            );
        }

        if(isset($args)) {
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {

                $html = '';
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    $img = $thumb = $thumb_src = '';

                    if(has_post_thumbnail()) {
                        $thumb = wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'medio-related-post', false, array('class'=>'related_thumb'));
                        $thumb_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medio-related-post');
                        $thumb_src = "<div class='themeton-image mmb5' data-src='".$thumb_src[0]."'><img src='".get_template_directory_uri()."/images/dim/4x3.png' class='related_thumb' alt='".esc_attr__('Ratio image','medio')."'/></div>";
                    }
                                       
                    if(has_excerpt()){
                        $excerpt = get_the_excerpt();
                        $excerpt = wp_trim_words( $excerpt, 12 );
                    } else {
                        $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content($post->ID))), 12 ) );
                    }

                    if( $type == 'team' ) {
                        $html.= "<div class='swiper-slide'>
                                        <a href='".get_the_permalink($post->ID)."'>
                                            <div class='service-item-section'>
                                                ".$thumb."
                                                <div class='entry-meta'>
                                                    <h3>".get_the_title($post->ID)."</h3>
                                                    <p>".$excerpt."</p>
                                                </div>
                                            </div>
                                        </a>
                                   </div>";
                    }elseif( $type == 'service' ) {
                        if(Themeton_Std::getmeta('icon_image') != '') $thumb ="<img class='p35 pb0' src='".Themeton_Std::getmeta('icon_image') ."' alt='".esc_attr__('Icon','medio')."'>";
                        $html .= "<div class='swiper-slide'>
                                        <a href='".get_the_permalink($post->ID)."'>
                                            <div class='service-item-section'>
                                                ".$thumb."
                                                <div class='entry-meta'>
                                                    <h3>".get_the_title($post->ID)."</h3>
                                                    <p>".$excerpt."</p>
                                                </div>
                                            </div>
                                        </a>
                                   </div>";
                    }
                    elseif( $type == 'tribe_events' ) {
                        if(Themeton_Std::getmeta('icon_image') != '') $thumb ="<img class='p35 pb0' src='".Themeton_Std::getmeta('icon_image') ."' alt='".esc_attr__('Icon','medio')."'>";
                        $html .= "<div class='swiper-slide'>
                                        <a href='".get_the_permalink($post->ID)."'>
                                            <div class='service-item-section'>
                                                ".$thumb."
                                                <div class='entry-meta'>
                                                    <h3>".get_the_title($post->ID)."</h3>
                                                    <p>".$excerpt."</p>
                                                </div>
                                            </div>
                                        </a>
                                   </div>";
                    }
                    elseif( $type == 'faq' ) {
                       $html .= "<div class='swiper-slide'>
                                        <a href='".get_the_permalink($post->ID)."'>
                                            <div class='service-item-section'>
                                                ".$thumb."
                                                <div class='entry-meta'>
                                                    <h3>".get_the_title($post->ID)."</h3>
                                                    <p>".$excerpt."</p>
                                                </div>
                                            </div>
                                        </a>
                                   </div>";
                    }
                    else {
                       $html .= "<div class='swiper-slide'>
                                        <a href='".get_the_permalink($post->ID)."'>
                                            <div class='service-item-section'>
                                                ".$thumb_src."
                                                <div class='entry-meta'>
                                                    <span class='post-date z-index-1 color-brand-bg text-white pl1 pr1 mb2'>".get_the_date()."</span>
                                                    <h3>".get_the_title($post->ID)."</h3>
                                                    <p>".$excerpt."</p>
                                                </div>
                                            </div>
                                        </a>
                                   </div>";
                    }
                }
                
                if( $html !== '' ){
                    printf('<div class="related_post post-type-'.$type.'">
                        <h2 class="related-posts-title">'.esc_html__('Você também pode se interessar','medio').'</h2>
                        <div class="swiper-container related-container">
                            <div class="swiper-wrapper">
                                %s
                            </div>
                            <div class="arrow button-next swiper-button-next uk-icon mt0" data-uk-icon="icon: arrow-right; ratio: 2"></div>
                            <div class="arrow button-prev swiper-button-prev uk-icon mt0" data-uk-icon="icon: arrow-left; ratio: 2"></div>
                        </div>
                    </div>', $html);
                }
            }
            wp_reset_postdata();
        }
    }

    

    public static function clear_urls($content){
        $pattern = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?]))/";
        $content = preg_replace($pattern, "", $content);
        return trim( $content );
    }



    public static function get_page_title(){
        global $post;
        $title = '';
        if( function_exists('is_shop') && is_shop() ):
            $title = esc_html__('Shop', 'medio');
        elseif( function_exists('is_shop') && is_product() ):
            $title = get_the_title();
        elseif( is_archive() ):
            if(function_exists('the_archive_title')) :
                $title = get_the_archive_title();
            else:
                $title = sprintf( esc_html__('Category: %s', 'medio'), single_cat_title( '', false ) );
            endif;

        elseif( is_search() ):
            $title = sprintf( esc_html__('For: %s', 'medio'), get_search_query() );
        elseif( is_singular('portfolio') ):
            $title = get_the_title();
        elseif( is_single() ):
            $title = get_the_title();
        elseif( is_front_page() || is_home() ):
            if( is_home() ):
                $title = esc_html__('Blog', 'medio');
            elseif( get_query_var('post_type')=='portfolio' ):
                $title = esc_html__('Projects', 'medio');
            elseif( !is_front_page() && is_home() ):
                $reading_blog_page = get_option('page_for_posts');
                $po = get_post($reading_blog_page);
                $title = apply_filters('the_title', $po->post_title);
            else:
                $title = esc_html__('Home', 'medio');
            endif;
        elseif( is_404() ):
            $title = esc_html__('404 Page', 'medio');
        else:
            $title = get_the_title();
        endif;

        return $title;
    }


    /*-----------SHORTCODE TESTER-----------*/
    public static function generate_shortcode ()
    {
        $variable = WPBMap::getAllShortCodes();
        ?>
        <form method="POST">
        <select name="vc_element">
        <option value="Default">--- Select Your Element ---</option>
        <?php
        foreach ($variable as $key => $value) {
            if (isset($value['category'])) { 
                if ($value['category'] == 'Consult aid' ) {
                    ?>
                    <option value="<?php echo esc_attr($value['base']); ?>"><?php echo esc_attr($value['name']); ?></option>
                    <?php
                }
            }
        }
        ?>
        </select>
        <input type="number" name="colnum" placeholder="<?php esc_attr_e('Insert Column number', 'medio'); ?>">
        <input class="uk-button uk-button-default" style="padding: 0px 10px;" type="submit" value="Test" name="vc_element_test" />
        </form>
        <hr>
        <div class="mb5"></div>
        <?php
        if (isset($_POST['vc_element_test']) && $_POST['vc_element'] != 'Default') { 

            $base = $variable[$_POST['vc_element']]['base'];

            $item = $variable[$_POST['vc_element']];

            $result =  $singular = '';

            foreach((array)$item['params'] as $attr) {
                if( isset($attr['value']) && !is_array($attr['value'])) {
                    $singular .= $attr['param_name']."='".$attr['value']."' ";
                }
                else $singular .= $attr['param_name']."='Default' ";
            }

            $variations['singular'] = $singular;
            $plural = array();
            
            foreach((array)$item['params'] as $attr) {
                if( isset($attr['value']) && is_array($attr['value']) && $attr['param_name']!='textcolor') {
                    foreach($attr['value'] as $val) {
                        $plural[$attr['param_name']][] = $val;
                    }
                }
            }
            $newarray = array();
            foreach ($plural as $key => $value) {
                foreach($value as $val) {
                    foreach($variations as $inside) {
                        $newarray[] = "$inside $key='$val' ";
                    }
                }
                $variations = $newarray;
                $newarray = array();
            }
            $i = $j = 0;
            foreach($variations as $shortcode) {
                if (isset($_POST['colnum'])) {
                    if ($_POST['colnum']==1) $col = '6/6';
                    else $col = '1/'.$_POST['colnum'];
                }
                else $col = '6/6';
                if($i%4==0) {$result .= '[vc_row]';}
                $i++;
                $result .= '[vc_column width="'.$col.'"]';
                $result .= "[$base $singular $shortcode]";
                $result .= '[/vc_column]';
                if($i%4==0) {$result .= '[/vc_row]';}
            }
        }
        // Update post 37
        global $post;
        if (isset($result))
        {
        $my_post = array(
          'ID'           => $post->ID,
          'post_content' => $result,
        );
        wp_update_post( $my_post );
        header("Location:".get_the_permalink()."");
        }
        // Update the post into the database
    }


    public static function get_notfound(){
        $custom_logo = '';
        if($custom_logo == '') {
            $notfound = Themeton_Std::getopt('notfound');
            if ($notfound['url']!='') {
            $custom_logo = sprintf( '<a href="%1$s" rel="home"><img src="%2$s" alt="%3$s" class="notfound"></a>',
                esc_url(home_url('/')),
                esc_url($notfound['url']),
                get_bloginfo('name')
            );}
            else {
                $custom_logo = '';
            }
        }
        return $custom_logo;
    }
    

    public static function get_sidebar_layout($position = 'right') {

        global $post, $themeton_sidebar;

        // Identifying sidebar position
        $sidebar_class = array();

        if($position == 'left') {
            $sidebar_class[] = 'uk-flex-first mb4';
        }

        // Declaring default sidebar options
        $sidebar_width = 'uk-width-1-4@m';
        $sidebar_id = $position.'-sidebar';
        $layout = '';
        // Checking sidebar options
        $prefix = $themeton_sidebar;
        if( isset($themeton_sidebar) && !empty($themeton_sidebar) ){
            if($themeton_sidebar == 'archive') {

                $layout = Themeton_Std::getopt('archive_layout');
                $sidebar_id = Themeton_Std::getopt($prefix.'_sidebar'.$position);

            } else if( is_singular() ) {
                $layout = Themeton_Std::getmeta('layout');
                if( !isset($layout) || $layout == '' || $layout == 'default') {
                    $layout = Themeton_Std::getopt($prefix.'_layout');
                }
                $sidebar_id = Themeton_Std::getmeta('sidebar_'.$position);
                if( !isset($sidebar_id) || $sidebar_id == '' || $sidebar_id == 'default') {
                    $sidebar_id = Themeton_Std::getopt($prefix.'_sidebar'.$position);
                }
            }

            if($layout == 'dual') {
                $sidebar_width = 'uk-width-1-5@m';
            }
        }

        $sidebar_class = array_merge(array($sidebar_width, '', 'sidebar'), $sidebar_class);
        $sidebar_class[] = "area-" . $sidebar_id;

        $sidebar_class = implode(' ', $sidebar_class);

        $sidebar_id = $sidebar_id == '' ? 'right-sidebar' :$sidebar_id;
        if ( is_active_sidebar( $sidebar_id ) ) :
        ?>
        <div class="<?php echo esc_attr($sidebar_class); ?>">
            <div class="entry-sidebar theiaStickySidebar">
                <?php dynamic_sidebar($sidebar_id); ?>
            </div>
        </div>
        <?php
        endif;
    }

    /*WPML */
    public static function language_selector_flags(){
        if(function_exists('icl_get_languages')){
            $languages = icl_get_languages('skip_missing=0');
        }
        $activeclass = $lan_item ='';
        if(!empty($languages)){
            foreach($languages as $l){
                if($l['active']==1){
                   $activeclass = 'active';
                }else{
                   $activeclass = '';
                }
                $lan_item .= '<li><a href="' . $l['url'] . '" class="item '. $activeclass.'">' . $l['native_name'] . '</a></li>';
            }
        }
        $result = "<ul class='languagepicker'>$lan_item</ul>";
       return $result;
    }

}


class Walker_Nav_Uikit_Side extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t",$depth);
        $output .= '<ul class="uk-nav-sub">';
    }
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ($depth) ? str_repeat("\t",$depth) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'uk-parent' : '';
        $classes[] .= ($item->current || $item->current_item_ancestor) ? 'uk-active' : '';
        $classes[] .= 'menu-item-' . $item->ID;     
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter ($classes ), $item, $args ) );
        $class_names = ' class="'. esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' .esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes  = !empty($item->attr_title) ? 'title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? 'target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? 'rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? 'href="' . esc_attr($item->url) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a ' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth ==0 && isset($args->has_children) ) ? ' </a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters ('walker_nav_menu_start_el', $item_output, $item, $depth, $args);    
        $indent = ($depth) ? str_repeat("\t",$depth) : '';
    }
}