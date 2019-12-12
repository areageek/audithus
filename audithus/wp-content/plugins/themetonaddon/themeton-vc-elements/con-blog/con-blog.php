<?php
if (!class_exists('WPBakeryShortCode_con_post')) {
class WPBakeryShortCode_con_post extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'readmore' => '',
            'hover_style' => 'standard',
            'title' => '1',
            'excerpts' => '1',
            'meta' => '1',
            'style' => '1',
            'columns' => '3',
            'ratio' => '5x3',
            'categories' => '',
            'count' => '6',
            'cat' => '0',
            'show' => '3',
            'readmore' => '1',
            'readmoretext' => 'Read more',
            'pagination' => '0',
            'image_active ' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'con_post', $atts );
        $extra_class .= ' '.$css_class;
        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }
        $result = '';

        $column = 'uk-width-1-'.$columns.'@m';
        $category_name = '';
        $category_link = '';
        $class ='';

        global $post,$paged;

        $args = array ('post_type' => 'post', 'posts_per_page' => $count, 'paged' => $paged, 'ignore_sticky_posts' => 1 );

        if (isset($categories)) $args['category_name'] = $categories;

        $the_query = new WP_Query( $args );       
        if ($style == '1') { // Full style
            ob_start();            
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                get_template_part( 'content' );
            }
            $result .= ob_get_contents();
            ob_end_clean();
            wp_reset_postdata();
        }
        
        if ($style == '2') {
            if ( $the_query->have_posts() ) {
                $result .= '<div class="uk-scrollspy uk-grid '.$extra_class.' mungu-blog-element" data-uk-grid data-uk-grid-match>';
                $c = 0; $k = 0;
                while ( $the_query->have_posts() ) {
                    $k = 0;
                    $the_query->the_post();
                    $author_avatar = get_avatar_url(get_the_author_meta( 'ID' ));
                    $excerpt = get_the_excerpt();
                    
                    if ($c == 0) { $class = 'uk-width-2-3@m uk-width-2-3@l mungu-blog1'; $excerpt = substr( $excerpt , 0, 150); }
                    if ($c == 1) { $class = 'uk-width-1-3@m uk-width-1-3@l mungu-blog2'; $excerpt = substr( $excerpt , 0, 70); }
                    if ($c < 2) {
                        if ( has_post_thumbnail() ) {
                            $result .= '<div class="post uk-grid-margin '.$class.'">';
                            if ($c == 0) {
                                $result .= '<a href="'.get_the_permalink().'"><div class="blog-vc-thumbnail" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id(), get_template().'-vc-blog-thumbnail_wide')[0].')"></div></a>';
                            } else {
                                $result .= '<a href="'.get_the_permalink().'"><div class="blog-vc-thumbnail" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id(), get_template().'-vc-blog-thumbnail_wide')[0].')"></div></a>';
                            }
                            
                        }
                        else {
                            $result .= '<div class="'.$class.'"><div class="blog-vc-thumbnail uk-flex uk-flex-center"></div>';
                        }
                        $result .= '<div class="cont-blog-element-cat">'.get_the_category_list( esc_html__( ', ', 'themetonaddon' ) ).'</div>';
                        if (isset($title) && $title == '1')  $result .= '<div class="mungu-blog-element-content"><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
                        else $result .= '<div class="mungu-blog-element-content"><h3></h3>';
                        if (isset($excerpts) && $excerpts == '1') $result .= '<p>'.$excerpt.' ...</p></div>';
                        else  $result .= '<p></p></div>';
                        global $themeton_redux;
                        $share = $themeton_redux['social_shares'];
                        $share_button = array( 
                            'facebook' => array('url' => 'https://www.facebook.com/sharer.php?u='.get_the_permalink() ,
                                                'icon' => 'fa fa-facebook' ),
                            'twitter' => array('url' => 'https://twitter.com/share?url='.get_the_permalink() ,
                                               'icon' => 'fa fa-twitter' ),
                            'googleplus' => array('url' => 'https://plus.google.com/share?url='.get_the_permalink(),
                                                  'icon' => 'fa fa-google' ),
                            'pinterest' => array('url' => esc_url( "http://pinterest.com/pin/create/button/?url=" . get_the_permalink()."&media=" . wp_get_attachment_image_src(get_post_thumbnail_id())[0] . "&description=".get_the_title() ),
                                                 'icon' => 'fa fa-pinterest' ),
                            'email' => array('url' => 'mailto:?subject='.get_the_title().'&body='.get_the_permalink(),
                                                 'icon' => 'fa fa-envelope' ) 
                        );
                        $output = '';
                        foreach ($share as $key => $value) {
                            if ($value==1) $output .= '<li><a href="'.$share_button[$key]['url'].'" target="_blank"><i class="'.$share_button[$key]['icon'].'" aria-hidden="true"></i></a></li>'; 
                        }
                        if (isset($meta) && $meta == '1') $result .= '<div class="mungu-blog-element-footer">'.get_avatar( $post->post_author, 28 ,'','' , array('class' => 'author_avatar' )).'<span><a href="'.get_author_posts_url( $post->post_author).'">'.get_the_author().'</a></span> &nbsp; &nbsp;| &nbsp; &nbsp;<span><a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a></span>
                        <div class="blog-seo">
                            <ul class="expanded">
                                '.$output.'
                            </ul>
                            <a href="javascript:;" class="more_btn">
                                <span class="uk-animation-slide-bottom-small text-white uk-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20">
                                        <path fill="none" stroke="#000" stroke-width="1.1" d="M10.625,12.375 L7.525,15.475 C6.825,16.175 5.925,16.175 5.225,15.475 L4.525,14.775 C3.825,14.074 3.825,13.175 4.525,12.475 L7.625,9.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M9.325,7.375 L12.425,4.275 C13.125,3.575 14.025,3.575 14.724,4.275 L15.425,4.975 C16.125,5.675 16.125,6.575 15.425,7.275 L12.325,10.375"></path>
                                        <path fill="none" stroke="#000" stroke-width="1.1" d="M7.925,11.875 L11.925,7.975"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>';
                        else $result .= '<div class="mungu-blog-element-footer">
                        <div class="blog-seo">
                            <ul class="expanded">
                                '.$output.'
                            </ul>
                            <a href="javascript:;" class="more_btn">
                                <span class="uk-animation-slide-bottom-small text-white uk-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20">
                                        <path fill="none" stroke="#000" stroke-width="1.1" d="M10.625,12.375 L7.525,15.475 C6.825,16.175 5.925,16.175 5.225,15.475 L4.525,14.775 C3.825,14.074 3.825,13.175 4.525,12.475 L7.625,9.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M9.325,7.375 L12.425,4.275 C13.125,3.575 14.025,3.575 14.724,4.275 L15.425,4.975 C16.125,5.675 16.125,6.575 15.425,7.275 L12.325,10.375"></path>
                                        <path fill="none" stroke="#000" stroke-width="1.1" d="M7.925,11.875 L11.925,7.975"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>';
                        $result .= '</div></div>'; 
                    }
                    else { $c = 0; $k = 1; }
                    if ($k == 0) $c++;
                            else $k = 0;
                }

                wp_reset_postdata();
                $result .='</div></div>';
            } else $result = 'Not Found Page';
        } else {
            if ($style == '3') { // Layout 3 - 2 thumbail post and next no image post

                $layout_class = array(
                        'uk-width-1-2@s uk-width-1-4@m uk-width-2-5@l',
                        'uk-width-1-2@s uk-width-1-4@m uk-width-2-5@l',
                        'uk-width-1-2@m uk-width-1-5@l'
                    );
                $result .='<div class="uk-scrollspy uk-grid '.$extra_class.' mungu-blog-col3">';
                $c= 0; $k = 0;
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    $thumbnail = $excerpt = '';
                    
                    $class = $layout_class[$c%3];
                    if ($c==2) { 
                        $thumbnail = '';
                        if(has_excerpt()) {
                            $excerpt = get_the_excerpt();
                        } else {
                            $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content($post->ID))), 12 ) );
                        }
                    }
                    else {
                        $thumbnail = Themeton_Tpl::get_post_image('mungu-project-thumb', $ratio, 'plus', true);
                    }

                    $result .= '<div class="post uk-grid-margin '.$class.'">' . $thumbnail . '<div class="mungu-blog-content">';

                    if (isset($meta) && $meta == '1') { $result .='<div class="blog-date"><a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a></div>'; }

                    if (isset($title) && $title == '1') $result .='<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

                    if ($thumbnail=='') $result .='<p>'.$excerpt.'</p>';
                    if($readmore == '1') { $result .= '<a class="uk-button uk-button-text readmorelink" href="'.get_the_permalink().'">'.$readmoretext.'</a>'; }

                    if ($c==2) { $c=0; $k=1; }
                    $result .='</div></div>';
                    if ($k == 0) $c++;
                    else $k = 0;
                }
                wp_reset_postdata();
                $result .='</div>';
            }
            elseif ($style == '7') {
                if ( $the_query->have_posts() ) {
                
                   $items1= $thumb = $items='';
                    $i = 1;
                    while ( $the_query->have_posts() ) {
                       
                        $the_query->the_post();
                        $author_avatar = get_avatar_url(get_the_author_meta( 'ID' ));
                        $excerpt = get_the_excerpt();
                        if( has_post_thumbnail() ){
                            $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                            $image_active = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                            $image_active = !empty($image_active) ? $image_active[0] : '';
                        }else{
                            $image_active = '';
                        }
                        if ($i == 1) { 
                            $items .='<div class="jewitem jew-feature uk-padding-remove uk-card uk-card-default uk-card-body "> 
                            <a href="'.get_the_permalink().'"><div class="blog-vc-thumbnail" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id(),'large')[0].')"></div></a>
                                        <h3><a href="'.get_the_permalink().'">'.$excerpt = substr( $excerpt , 0, 50).'</a></h3>
                                        <a href="'.get_the_permalink().'" class="jewdate">' . get_the_date(get_option('date-format')).'</a>
                                     </div>';
                        }else {
                              $items .='<div class="jewitem uk-padding-remove uk-card uk-card-default uk-card-body mungu-blog2-jew">
                              <a href="'.get_the_permalink().'"><div class="blog-vc-thumbnail" style="background-image:url('.wp_get_attachment_image_src(get_post_thumbnail_id(),'medium')[0].')"></div></a>
                                          <h3><a href="'.get_the_permalink().'">'.$excerpt = substr( $excerpt , 0, 20).'</a></h3>
                                        </div>';
                        }
                        $i++;
                    }
                      
                    wp_reset_postdata();
                  

                $result ='<div class="mungu-element-blog jew-blog uk-flex uk-margin-medium">'.$items.'</div> ';
                    
                  
                } else $result = 'Not Found Page';
            }
            elseif ($style == '8') {
                if ( $the_query->have_posts() ) {
                
                   $thumb = $items='';
                    while ( $the_query->have_posts() ) {
                       
                        $the_query->the_post();
                        $author_avatar = get_avatar_url(get_the_author_meta( 'ID' ));
                        $excerpt = get_the_excerpt();
                        if( has_post_thumbnail() ){
                            $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                            $image_active = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                            $image_active = !empty($image_active) ? $image_active[0] : '';
                        }else{
                            $image_active = '';
                        }
                        $thumbnail = Themeton_Tpl::get_post_image('mungu-project-thumb', $ratio, 'plus', true);
                            $items .='<div class="uk-width-1-4 uk-margin-small">'. $thumbnail.'</div><div class="uk-width-3-4"> 
                                            <a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                                        </div>';
                    }
                      
                    wp_reset_postdata();
                $result ='<div class="mungu-element-blog blog-resent uk-grid uk-flex ">'.$items.'</div> ';
                } else $result = 'Not Found Page';
            }
            elseif ($style == '12') {
                if ( $the_query->have_posts() ) {
                
                    $rcat= $thumb = $items='';
                    while ( $the_query->have_posts() ) {
                       
                        $the_query->the_post();
                        $author_avatar = get_avatar_url(get_the_author_meta( 'ID' ));
                        $excerpt = get_the_excerpt();
                        if( has_post_thumbnail() ){
                            $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                            $image_active = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                            $image_active = !empty($image_active) ? $image_active[0] : '';
                        }else{
                            $image_active = '';
                        }
                        $thumbnail = Themeton_Tpl::get_post_image('mungu-project-thumb', $ratio, 'plus', true);
                            $items .='<div class="uk-width-1-3 uk-margin">'. $thumbnail.'</div>
                                        <div class="uk-width-2-3 pt1 chudur"> 
                                           <div><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></div>
                                            '.get_the_category_list( esc_html__( ', ', 'themetonaddon' ) ).' <br/>
                                            '.$excerpt.'
                                        </div>';
                    }
                      
                    wp_reset_postdata();
                  

                $result ='<div class="mungu-element-blog blog-resent uk-grid uk-flex ">'.$items.'</div> ';
                    
                  
                } else $result = 'Not Found Page';
            }
            elseif ($style == 'masonry' || $style == 4) {

                $gridimage = true;
                if($style == 'masonry') {
                    $ratio = 'auto';
                    $extra_class .= ' masonry-layout';
                    $column .= ' masonry-item';
                    $gridimage = false;
                }
                $result .='<div class="uk-scrollspy uk-grid '.$extra_class.' mungu-blog-col4">';

                while ( $the_query->have_posts() ) {
                    $the_query->the_post();

                    if($hover_style !='thumb_backound'){
                        $result .='<div class="post uk-grid-margin '.$column.'">';

                            $excerpt = get_the_excerpt();

                            $thumbnails = Themeton_Tpl::get_post_media('mungu-featured-image',$ratio,'plus',$gridimage);
                            if($thumbnails !='' ) { 
                                $thumbnail = '<div class="uk-inline-clip uk-transition-toggle uk-light">'.$thumbnails.'</div>'; $excerpt = substr( $excerpt , 0, 90); 
                            }
                            else { $thumbnail = ''; $excerpt = substr( $excerpt , 0, 200); }

                            $result .=$thumbnail;

                            if (isset($meta) && $meta == '1') $result .='<div class="blog-date"><span><a href="'.get_author_posts_url( $post->post_author).'">'.get_the_author().'</a></span> &nbsp; &nbsp;| &nbsp; &nbsp;<span><a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a></span></div>';

                            if (isset($title) && $title == '1') $result .='<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

                            if (($excerpts ==NULL || $excerpts == '') && $thumbnail != '') $excerpt='';
                            else $result .='<p>'.$excerpt.' ...</p>';
                            if($readmore == '1') { $result .= '<a class="uk-button uk-button-text readmorelink" href="'.get_the_permalink().'">'.$readmoretext.'</a>'; }

                            $result .='</div>';
                    }else{
                        if( has_post_thumbnail() ){
                            $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                            $image_active = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                            $image_active = !empty($image_active) ? $image_active[0] : '';
                        }else{
                            $image_active = '';
                        }

                        $result .='<div class="post uk-grid-margin bg-hovered '.$column.'">'; 

                        $result .='<div class="thumb_backound pr4 pl4 uk-transition-toggle uk-light uk-flex uk-flex-bottom" data-bg-image="'.$image_active.'">';
                        $result .='<div class="entry-hover">';  $result .='</div>';
                        $result .='<div class="uk-flex uk-flex-column">';
                        if( has_excerpt() ) { $excerpt = get_the_excerpt(); }
                        else { $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), 10)); }

                        if (isset($meta) && $meta == '1') $result .='<div class="blog-date animation-delay-01"><span><a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a></span></div>';

                        if (isset($title) && $title == '1') $result .='<h3 class="animeblogtitle animation-delay-04"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

                        if (($excerpts ==NULL || $excerpts == '') && $thumbnail != '') $excerpt='';
                        else $result .='<p class="animeblogtext animation-delay-07">'.$excerpt.'</p>';
                        if($readmore == '1') { $result .= '<div class="animeblogbutton pb4"><a class="uk-button uk-button-default " href="'.get_the_permalink().'">'.$readmoretext.'</a></div>'; }

                        $result .='</div>'; 
                        $result .='</div>'; 
                        $result .='</div>';
                    }
                }
                wp_reset_postdata();
                $result .='</div>';
            }elseif ($style == 10) {

                $gridimage = true;
                if($style == 'masonry') {
                    $extra_class .= ' masonry-layout';
                    $column .= ' masonry-item';
                    $gridimage = false;
                }
                $result .='<div class="uk-scrollspy uk-grid '.$extra_class.' mungu-blog-col4">';

                while ( $the_query->have_posts() ) {
                    $the_query->the_post();

                    if($hover_style !='thumb_backound'){
                        $result .='<div class="post uk-grid-margin '.$column.'">';

                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                $result .='<a href="'.get_the_permalink().'"><span class="uk-label color-brand-bg text-dark">'.esc_html( $categories[0]->name ).'</span></a>';
                            }

                            if (isset($title) && $title == '1') $result .='<h3 class="mv2"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

                            $excerpt = get_the_excerpt();

                            $thumbnails = Themeton_Tpl::get_post_media('mungu-featured-image',$ratio,'plus',$gridimage);
                            if($thumbnails !='' ) { 
                                $thumbnail = '<div class="uk-inline-clip uk-transition-toggle uk-light">'.$thumbnails.'</div>'; $excerpt = substr( $excerpt , 0, 90); 
                            }
                            else { $thumbnail = ''; $excerpt = substr( $excerpt , 0, 200); }

                            $result .=$thumbnail;
                            

                            if (($excerpts ==NULL || $excerpts == '') && $thumbnail != '') $excerpt='';
                            else $result .='<p class="mt0">'.$excerpt.' ...</p>';
                            //if($readmore == '1') { $result .= '<a class="uk-button uk-button-text readmorelink" href="'.get_the_permalink().'">'.$readmoretext.'</a>'; }
                            $result .='</div>';
                    }else{
                        if( has_post_thumbnail() ){
                            $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                            $image_active = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                            $image_active = !empty($image_active) ? $image_active[0] : '';
                        }else{
                            $image_active = '';
                        }

                      
                        $result .='<div class="post uk-grid-margin bg-hovered '.$column.'">'; 

                        $result .='<div class="thumb_backound pr4 pl4 uk-transition-toggle uk-light uk-flex uk-flex-bottom" data-bg-image="'.$image_active.'">';
                        $result .='<div class="entry-hover">';  $result .='</div>';
                        $result .='<div class="uk-flex uk-flex-column">';

                        if (isset($title) && $title == '1') $result .='<h3 class="animeblogtitle animation-delay-04"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

                        if( has_excerpt() ) { $excerpt = get_the_excerpt(); }
                        else { $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), 15)); }

                        if (isset($meta) && $meta == '1') $result .='<div class="blog-date animation-delay-01"><span><a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a></span></div>';


                        if (($excerpts ==NULL || $excerpts == '') && $thumbnail != '') $excerpt='';
                        else $result .='<p class="animeblogtext animation-delay-07">'.$excerpt.'</p>';
                        if($readmore == '1') { $result .= '<div class="animeblogbutton pb4"><a class="uk-button uk-button-default " href="'.get_the_permalink().'">'.$readmoretext.'</a></div>'; }

                        $result .='</div>'; 
                        $result .='</div>'; 
                        $result .='</div>';
                    }
                }
                wp_reset_postdata();
                $result .='</div>';
            } elseif ($style == '6') { 

                $layout_class = array(
                    'uk-width-1-2@s uk-width-1-3@m uk-width-1-3@l',
                    'uk-width-1-2@s uk-width-1-3@m uk-width-1-3@l',
                    'uk-width-1-2@s uk-width-1-3@m uk-width-1-3@l'
                );
                $result .='<div class="uk-grid uk-scrollspy '.$extra_class.' mungu-blog-col3 mungu-blog-thumb">';
                $c= 0; $k = 0;
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    $thumbnail = $excerpt = '';
                    
                    $class = $layout_class[$c%3];
  
                    $thumbnail = Themeton_Tpl::get_post_image('mungu-project-thumb', $ratio, 'plus', true);

                    $result .= '<div class="post uk-grid-margin '.$class.'">' . $thumbnail . '<div class="mungu-blog-content">';

                    if (isset($title) && $title == '1') $result .='<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

                    if ($thumbnail=='') $result .='<p>'.$excerpt.'</p>';

                    $result .= '<div class="mungu-thumb-meta uk-grid uk-grid-collapse uk-child-width-1-2">';
                    if (isset($meta) && $meta == '1') { $result .='<div class="blog-date uk-flex uk-flex-middle uk-text-left"><a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a></div>'; }
                    $result .= '<div class="blog-author uk-text-right">'.get_the_author().'</div>';
                    $result .= '</div>';

                    if ($c==2) { $c=0; $k=1; }
                    $result .='</div></div>';
                    if ($k == 0) $c++;
                    else $k = 0;
                }
                wp_reset_postdata();
                $result .='</div>';
            }
            
        }
        
        
        if ($style == '9') { 
            $c = 0;
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $thumbnail = $excerpt = $thumb_url = '';
                if( has_post_thumbnail() ){
                    $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];
                }
                $c++;
                if ($thumb_url!='') $thumb_url='data-bg-image="'.$thumb_url.'"';
                $thumbnail = '<div class="uk-width-1-2@m uk-background-cover" '.$thumb_url.'></div>';
                if ( $c%2 != 0 ) $cls = 'uk-flex uk-flex-left pl10';
                else $cls = 'uk-flex uk-flex-right pr10';
                $excerpt = '<div class="blog-style9 pt10 pb15 uk-width-1-2@m '.$cls.'"><div class="uk-width-3-5@m"><h1 class="mb3"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1><span>'.get_the_date(get_option('date-format')).'</span><p class="mt30">'.get_the_excerpt().'</p></div></div>';
                if ( $c%2 != 0 ) $result .=$thumbnail.$excerpt;
                else $result .=$excerpt.$thumbnail;
            }
            wp_reset_postdata();
            $result = '<div class="uk-grid '.$extra_class.'">'.$result.'</div>';
            return $result;
        }
        if ($style == '11') {
            $club = $data = $last = '';
            $c = 1; $p = 1;
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $thumbnail = $excerpt = $thumb_url = $h0 = '';
                if( has_post_thumbnail() ){
                    $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];
                }
                if ($thumb_url == '') $h0 = "height:0px;";
                $clublogo = '';
                if (Themeton_Std::getmeta('club_logo')!='') $clublogo = '<img src="'.Themeton_Std::getmeta('club_logo').'" alt="'.get_the_title().'" style="width:74px;" >';
                $title = get_the_title();
                $excerpt = get_the_excerpt();
                $readmore = '<a href="'.get_permalink().'" class="uk-button uk-button-default full mt5 mt3@s">'.esc_html__( 'Read more', 'themetonaddon' ).'</a>';
                $club .= "<div class='uk-grid bushido-blog-club mb mb5@s'>
                    <div class='uk-width-1-4@m thumb ml3@s uk-background-cover uk-background-norepeat' style='background-image:url($thumb_url); $h0'></div>
                    <div class='uk-width-3-4@m uk-padding-large pt5 pb5 mt3@s' style='background:#212121;'>
                        <div class='uk-flex'>
                            <div class='uk-width-auto mr3'>
                            $clublogo
                            </div>
                            <div class='uk-width-expand'>
                                <span>Club</span>
                                <h3 class='mt0'>$title</h3>
                            </div>
                        </div>
                        <div class='mt3 mt0@s'>$excerpt</div>
                        $readmore
                    </div>
                </div>";
                if ($c==$show) {
                    $data .='<div class="item">'.$club.'</div>';
                    $club = '';
                    $c=0;
                    $p++;
                }
                $c++;
            }
            wp_reset_postdata();
            if ($count%$show!=0) $data .='<div class="item">'.$club.'</div>';
            $result = '<div class="bushido-blog-owl-grid owl-theme" data-kendoshow="1" data-uk-scrollspy="cls: uk-animation-fade; target: .owl-stage .item .bushido-blog-club; delay: 200; repeat: false">'.$data.'</div>';
            return $result;
        }
        if ($style=='12') {
            $item = '';
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $day = get_the_date( 'd', get_the_ID() );
                $month = get_the_date( 'M', get_the_ID() );
                $thumb_url = '';
                $author = get_the_author();
                if( has_post_thumbnail() ){
                    $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];
                    $thumb_url = "style='background: 
                    linear-gradient(
                      rgba(43, 37, 76, 0.67), 
                      rgba(43, 37, 76, 0.67)
                    ),
                    url($thumb_url);'";
                    $thumb_class = 'thumb-yes';
                }
                else {
                    $thumb_class = 'thumb-no';
                }
                
                $item .= "<div class='uk-grid meissa-blog-layout uk-position-relative $thumb_class' >
                    <div class='uk-position-absolute cover' $thumb_url></div>
                    <div class='uk-width-auto date-col pt10 pb10 uk-text-center'>
                        <h3 class='date day m0'>$day</h3>
                        <h3 class='date month m0'>$month</h3>
                    </div>
                    <div class='uk-width-expand pt10 pr5@s blog-content'>
                        <p class='author mb1'>$author</p>
                        <h1 class='mt0'><a href='".get_the_permalink()."'>".get_the_title()."</a></h1>
                        <div class='blog-excerpt'>".get_the_excerpt()."</div>
                    </div>
                </div>";
            }
            wp_reset_postdata();
            $result = '<div class="meissa-blog'.$extra_class.'">'.$item.'</div>';
            if (isset($pagination) && $pagination == '1') $result .= '<div class="pagination-container mt5 meissa-pagination uk-flex uk-flex-center">'.Themeton_Tpl::pagination($the_query).'<div class="uk-clearfix clearfix"></div></div>';
            return $result;
        }
        if ($style=='13') {
            $result .='<div class="uk-grid uk-scrollspy '.$extra_class.' uk-child-width-1-1@s blog-style-13">';
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $thumbnail = $excerpt = $thumbnailbg = $imagebg = $comment = '';

                $thumbnail = Themeton_Tpl::get_post_image('mungu-project-thumb', $ratio, 'plus', true);


                if( has_post_thumbnail() ){
                    $thumbnailbg = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    $thumbnailbg = !empty($thumbnailbg) ? $thumbnailbg[0] : '';
                }

                global $themeton_redux;
                $share = $themeton_redux['social_shares'];
                $share_button = array( 
                    'facebook' => array('url' => 'https://www.facebook.com/sharer.php?u='.get_the_permalink() ,
                                        'icon' => 'fa fa-facebook' ),
                    'twitter' => array('url' => 'https://twitter.com/share?url='.get_the_permalink() ,
                                       'icon' => 'fa fa-twitter' ),
                    'googleplus' => array('url' => 'https://plus.google.com/share?url='.get_the_permalink(),
                                          'icon' => 'fa fa-google' ),
                    'pinterest' => array('url' => esc_url( "http://pinterest.com/pin/create/button/?url=" . get_the_permalink()."&media=" . wp_get_attachment_image_src(get_post_thumbnail_id())[0] . "&description=".get_the_title() ),
                                         'icon' => 'fa fa-pinterest' ),
                    'email' => array('url' => 'mailto:?subject='.get_the_title().'&body='.get_the_permalink(),
                                         'icon' => 'fa fa-envelope' ) 
                );

                $result .= '<div class="post uk-grid '.$class.'"><div class="uk-width-1-3">' . $thumbnail . '</div><div class="mungu-blog-content uk-width-expand uk-position-relative uk-overflow-hidden"><div class="style-13-blurred" data-bg-image="' . $thumbnailbg . '"></div>';
                
                $result .= '<div class="blog-meta-collection uk-grid uk-grid uk-grid-divider uk-grid-small uk-child-width-expand mb2">';
                if (isset($meta) && $meta == '1') { $result .='<div class="blog-meta uk-flex uk-flex-middle uk-flex-left text-white">
                    <a href="'.get_the_permalink().'">' . get_the_date(get_option('date-format')).'</a></div>'; }
                    $result .= '<div class="cont-blog-element-cat uk-text-center text-white">'.get_the_category_list( esc_html__( ', ', 'themetonaddon' ) ).'</div>';
                    $result .= '<div class="blog-author uk-text-center text-white">'.get_the_author().'</div>';
                    $result .= '<div class="uk-flex uk-flex-around color-brand">'; foreach ($share as $key => $value) {
                        if ($value==1) $result .= '<li><a href="'.$share_button[$key]['url'].'" target="_blank"><i class="'.$share_button[$key]['icon'].'" aria-hidden="true"></i></a></li>'; 
                    }
                    $result .= '</div>';
                $result .= '</div>';
                
                if (isset($title) && $title == '1') $result .='<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';

                $result .= "<div class='blog-excerpt'>".get_the_excerpt()."</div>";

                $result .= '<div class="uk-flex uk-flex-between uk-flex-middle">';
                    if($readmore == '1') { $result .= '<a class="uk-button uk-button-default mt2" href="'.get_the_permalink().'">'.$readmoretext.'</a>'; }
                    
                    $result .="<span class='color-brand'><a href='".get_permalink()."/#comments'><span class='uk-icon'><svg viewBox='0 0 20 20' width='20' height='20'>
                        <path d='M6,18.71 L6,14 L1,14 L1,1 L19,1 L19,14 L10.71,14 L6,18.71 L6,18.71 Z M2,13 L7,13 L7,16.29 L10.29,13 L18,13 L18,2 L2,2 L2,13 L2,13 Z'></path>
                    </svg></span> ".get_comments_number()."</a></span>";
                $result .= '</div>';

                $result .='</div></div>';
            }
            wp_reset_postdata();
            $result .='</div>';
        }

        if (isset($pagination) && $pagination == '1') $result = $result.'<div class="pagination-container uk-flex uk-flex-center">'.Themeton_Tpl::pagination($the_query).'<div class="uk-clearfix clearfix"></div></div>';
        
        return '<div class="mungu-element mungu-element-blog uk-scrollspy '.$extra_class.'">'.$result.'</div><!-- end .mungu-element/blog -->';
    }
}
}

vc_map( array(
    "name" => esc_html__('Blog post', 'themetonaddon'),
    "description" => esc_html__("Home page blog post", 'themetonaddon'),
    "base" => 'con_post',
    "icon" => "mungu-vc-icon mungu-vc-icon02",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    "params" => array(
        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Specify category SLUG (not name) or leave blank to display items from all categories. Ex: news,image.", 'themetonaddon'),
            "value" => '',
            "holder" => 'div'
        ),
        array(
            "type" => "textfield",
            "param_name" => "count",
            "heading" => esc_html__("Posts Limit", 'themetonaddon'),
            "value" => "6",
            "holder" => 'div'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Blog Post style", 'themetonaddon'),
            "value" => array(
                'Default' => '1',
                'Layout 2 - Left big and right small' => '2',
                'Layout 3 - 2 thumbail post and next no image post' => '3',
                'Layout 4 - Grid layout' => '4',
                'Layout 5 - Masonry layout' => 'masonry',
                'Layout 6 - Thumbnail Post' => '6',
                'Layout 7 - Left big and right 4 post' => '7',
                'Layout 8 - Resent post (left thumbnail)' => '8',
                'Layout 9 - Fullwidth left & right thumbnail blog' => '9',
                'Layout 10 - Udriin Toim' => '10',
                'Layout 11 - Kendo' => '11',
                'Layout 12 - Meissa Blog Layout' => '12',
                'Layout 13' => '13'
            )
        ),
        array(
            "type" => "textfield",
            "param_name" => "show",
            "heading" => esc_html__("Display show number", 'themetonaddon'),
            "value" => "3",
            "dependency" => Array("element" => "style", "value" => array("11"))
        ),
        array(
            "type" => "dropdown",
            "param_name" => "columns",
            "heading" => esc_html__("Columns", 'themetonaddon'),
            "value" => array(
                "1 Column" => "1",
                "2 Columns" => "2",
                "3 Columns" => "3",
                "4 Columns" => "4",
                "6 Columns" => "6"
            ),
            "std" => "3",
            "dependency" => Array("element" => "style", "value" => array("4", "masonry"))
        ),
         array(
            "type" => "dropdown",
            "param_name" => "hover_style",
            "heading" => esc_html__("Hover type", 'themetonaddon'),
            "value" => array(
                "Standard" => "standard",
                "Feature image backrounded" => "thumb_backound"
            ),
            "dependency" => Array("element" => "style", "value" => array("4", "masonry"))
        ),
        array(
            "type" => "dropdown",
            "param_name" => "ratio",
            "heading" => esc_html__("Image ratio (width x height)", 'themetonaddon'),
            "value" => array(
                "1x1 (tile)" => "1x1",
                "1x2" => "1x2",
                "2x1" => "2x1",
                "1x3" => "1x3",
                "3x1" => "3x1",
                "2x3" => "2x3",
                "3x2" => "3x2",
                "3x4" => "3x4",
                "4x3" => "4x3",
                "3x5" => "3x5",
                "5x3 (default)" => "5x3",
                "5x2" => "5x2",
                "2x5" => "2x5",
                "8x5" => "8x5",
                "8x7" => "8x7",
                "8x15" => "8x15",
                "16x7" => "16x7",
                "Masonry (Custom height)" => "auto"
            ),
            "std" => "5x3",
            "dependency" => Array("element" => "style", "value" => array("4", "3","6","8","13"))
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1",
            "dependency" => Array("element" => "style", "value" => array("2","3","4","6","13")),
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "excerpts",
            "heading" => esc_html__("Excerpt", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1",
            "dependency" => Array("element" => "style", "value" => array("2","3","4","6")),
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "meta",
            "heading" => esc_html__("Meta", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "1",
            "dependency" => Array("element" => "style", "value" => array("2","3","4","6","13")),
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "cat",
            "heading" => esc_html__("Category", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "dependency" => Array("element" => "style", "value" => array("2","3","4","6","13")),
            "std" => "1",
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "readmore",
            "heading" => esc_html__("Read more link", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "dependency" => Array("element" => "style", "value" => array("3", "4")),
            "std" => "1",
        ),
        array(
            'type' => 'textfield',
            "param_name" => "readmoretext",
            "heading" => esc_html__("Read more text", 'themetonaddon'),
            'value' => esc_html__( 'Read more', 'themetonaddon' ),
            "dependency" => Array("element" => "style", "value" => array("3", "4","6","13")),
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "pagination",
            "heading" => esc_html__("Pagination", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "0"
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