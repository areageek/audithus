<?php
if (!class_exists('WPBakeryShortCode_Mungu_events')) {
class WPBakeryShortCode_Mungu_events extends WPBakeryShortCode {
    protected function content( $atts, $content = null) {
        extract(shortcode_atts(array(
            'style' => '1',
            'masonry' => 'no',
            'columns' => '3',
            'count' => '6',
            'email' => '',
            'ratio' => '1x1',
            'carousel' => 'yes',
            'search' => 'no',
            'pager' => 'no',
            'excepts_count' => '20',
            'category' => 'default',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), get_template().'_events', $atts );
        $extra_class .= ' '.$css_class;
        
        global $post;
        
        $event ='';
        $format ='';
        
        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }

        $allevents = array();
        
        if( function_exists('tribe_get_events') ){
            if ($category != 'default')
            {   
                $allevents = tribe_get_events( array(
                    'posts_per_page' => $count,
                    'paged' => $paged,
                    'tax_query'=> array(
                        array(
                            'taxonomy' => 'tribe_events_cat',
                            'field' => 'slug',
                            'terms' => $category
                        )
                    )
                ) );
            } 
            else  {
                $allevents = tribe_get_events( array(
                    'posts_per_page' => $count,
                    'paged' => $paged,
                    'order' => 'desc'
                ) );
            }
        }
        foreach($allevents as $post) {
            setup_postdata($post); 
            $address = $image_src = $thumb = '';
            $event_id = get_the_ID();
            if( has_post_thumbnail() ){
                $thumb = tribe_event_featured_image( $event_id, get_template().'-vc-ceo-team', false );
            }
            $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $event_id ), 'large' );
            $image_tag = wp_get_attachment_image( get_post_thumbnail_id( $event_id ), 'large', false );

            if(has_excerpt()) $excerpt = get_the_excerpt();
            else $excerpt = Themeton_Tpl::clear_urls( wp_trim_words( wp_strip_all_tags(strip_shortcodes(get_the_content())), $excepts_count ) );
            $end_datetimed = tribe_get_end_date(null,true,'Y-m-j');

            $end_datetitle = tribe_get_end_date(null,true,'j M');
            $time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
            $time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

            $start_datetime = tribe_get_start_date();
            $start_datetime_n = tribe_get_start_date(null,true,'j M');

            $start_date = tribe_get_start_date( null, false );
            $start_time = tribe_get_start_date( null, false, $time_format );
            $start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

            $end_datetime = tribe_get_end_date();
            $end_date = tribe_get_display_end_date( null, false );
            $end_time = tribe_get_end_date( null, false, $time_format );
            
            $icon_url = plugin_dir_url( __FILE__ );
            if ($style == 1 ) {
                $event.= "<div class='event_content mb4'>
                                <div class='uk-box-shadow-small'>
                                    <div class='feature_image'>
                                        <ul class='metadate'>
                                            <li class='mount'> $end_datetitle</li>
                                            <li class='date'> $start_time - $end_time </li>
                                        </ul>
                                        <a href='".esc_url( tribe_get_event_link() )."'>
                                            $image_tag
                                        </a>
                                    </div>
                                    <div class='event_meta uk-padding'>
                                         <h3><a href='".get_the_permalink( )."'>".get_the_title()."</a></h3>    
                                         <p>$excerpt </p>  
                                         <a href='".esc_url( tribe_get_event_link() )."' class='more'>Read more</a>            
                                    </div> 
                                </div>
                            </div>";
            }
            if ($style == 7) {
                $event.=
                $custom_field = '';
                $container_video = '';
                $container_music = '';
                $container_video = 'event-container-video'.get_the_ID();
                $container_music = 'event-container-music'.get_the_ID();
                if (get_post_field( 'camera', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="#%s" class="uk-toggle"><img src="%s" alt=""/></a> ',$container_video,$icon_url.'video.png');
                $video_embed = ''; $video_embed = wp_oembed_get(get_post_field( 'camera', null, 'display' ),array( 'width' => '100%' , 'height' => '500px' ));
                $custom_field .= '<div id="'.$container_video.'" class="uk-modal-container church-modal-video uk-modal">
                <div class="uk-modal-dialog uk-modal-body">
                    <button class="uk-modal-close-default uk-close" type="button" data-uk-close></button>
                    '.$video_embed.'
                </div>
            </div>';
                if (get_post_field( 'head_phone', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="#%s" class="uk-toggle"><img src="%s" alt=""/></a> ',$container_music,$icon_url.'headphone.png');
                $music_embed = get_post_field( 'head_phone', null, 'display' );
                $custom_field .= '<div id="'.$container_music.'" class="uk-modal-container church-modal-video uk-modal">
                <div class="uk-modal-dialog uk-modal-body">
                    <button class="uk-modal-close-default uk-close" type="button" data-uk-close></button>
                    '.$music_embed.'
                </div>
            </div>';
                if (get_post_field( 'pdf', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="%s"><img src="%s" alt=""/></a> ',get_post_field( 'pdf', null, 'display' ),$icon_url.'pdf.png');
                
                $thumb = get_the_post_thumbnail_url($event_id);
                $day = tribe_get_start_date(null,false,'l');
                $event .= "<div class='uk-width-1-$columns@m'>
                                <div class='sermons-content'>
                                    <div class='thumb' data-src='$thumb'></div>
                                        <div class='sermons-meta'>
                                         By <a href='".get_the_author_link()."'>".get_the_author()."</a>, $day <a href='".get_the_permalink()."'>".get_the_date()."</a>
                                        <h3><a href='".get_the_permalink()."'>".get_the_title()."</a></h3>
                                        <p>".get_the_excerpt()."</p>
                                        </div>
                                        <div class='field-icon'>$custom_field</div>
                                    </div>
                            </div>";
            }
            if ($style == 2) {
                if ($email!='') $email = "mailto:".$email."?subject=".str_replace(' ', '%20',get_the_title())."&body=".get_the_permalink();
                $event_org_id = get_post_meta( $event_id,'_EventOrganizerID',true); 
                $event_ven_id = get_post_meta( $event_id,'_EventVenueID',true); 
                $address = get_post_meta( $event_ven_id,'_VenueAddress',true);
                $day = tribe_get_start_date(null,false,'l');
                if (strpos($start_time,':00')!=false) $start_time = str_replace(':00', '', $start_time);
                if (strpos($end_time,':00')!=false) $end_time = str_replace(':00', '', $end_time);
                $event.= "<div class='event-church-post event_content mt3'>
                <div class='uk-box-shadow-small'>
                    <div class='feature_image'>
                        <a href='".esc_url( tribe_get_event_link() )."'>
                            $thumb
                        </a>
                    </div>
                    <div class='event_meta uk-padding'>
                        <div>
                            <div class='social-icon'>
                                <a href='https://plus.google.com/share?url=".get_the_permalink()."'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <line fill='none' stroke='#000' stroke-width='1.1' x1='13.4' y1='14' x2='6.3' y2='10.7'></line> <line fill='none' stroke='#000' stroke-width='1.1' x1='13.5' y1='5.5' x2='6.5' y2='8.8'></line> <circle fill='none' stroke='#000' stroke-width='1.1' cx='15.5' cy='4.6' r='2.3'></circle> <circle fill='none' stroke='#000' stroke-width='1.1' cx='15.5' cy='14.8' r='2.3'></circle> <circle fill='none' stroke='#000' stroke-width='1.1' cx='4.5' cy='9.8' r='2.3'></circle></svg></i></a>&nbsp;&nbsp;
                                <a href='$email'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <polyline fill='none' stroke='#000' points='1.4,6.5 10,11 18.6,6.5'></polyline> <path d='M 1,4 1,16 19,16 19,4 1,4 Z M 18,15 2,15 2,5 18,5 18,15 Z'></path></svg></i></a>
                            </div>
                            <div class='register'>
                                <a href='".get_the_permalink()."'>".esc_html__('MORE INFO','themetonaddon')." ".Themeton_Tpl::the_arrow_icon()."</a>
                            </div>
                        </div>
                        <h3> ".get_the_title()."</h3>    
                        <div>
                            <div class='date'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <circle fill='none' stroke='#000' stroke-width='1.1' cx='10' cy='10' r='9'></circle> <rect x='9' y='4' width='1' height='7'></rect> <path fill='none' stroke='#000' stroke-width='1.1' d='M13.018,14.197 L9.445,10.625'></path></svg></i> $day, <span>$start_time</span> - <span>$end_time</span></div>
                            <div class='address'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path fill='none' stroke='#000' stroke-width='1.01' d='M10,0.5 C6.41,0.5 3.5,3.39 3.5,6.98 C3.5,11.83 10,19 10,19 C10,19 16.5,11.83 16.5,6.98 C16.5,3.39 13.59,0.5 10,0.5 L10,0.5 Z'></path> <circle fill='none' stroke='#000' cx='10' cy='6.8' r='2.3'></circle></svg></i> $address</div>
                        </div>
                    </div> 
                    </div>
                </div>";
            }
            if ($style == 4) {
                $event_org_id = get_post_meta( $event_id,'_EventOrganizerID',true); 
                $event_ven_id = get_post_meta( $event_id,'_EventVenueID',true); 
                $address = tribe_get_address( $event_id,'_EventVenueID',true);
                $day = tribe_get_start_date(null,false,'l');
                $start_ts = tribe_get_start_date( null, false, 'd F Y');


                if (strpos($start_time,':00')!=false) $start_time = str_replace(':00', '', $start_time);
                if (strpos($end_time,':00')!=false) $end_time = str_replace(':00', '', $end_time);
                $event.= "<div class='event-church-feature event_content'>
                    <div class='feature-content'>
                        <div class='feature_image uk-background-cover uk-background-center' data-bg-image = '$image_src[0]'>
                        </div>
                        <div class='event_meta uk-padding'>
                            <h3> ".get_the_title()."</h3>    
                            <div class='date'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <circle fill='none' stroke='#000' stroke-width='1.1' cx='10' cy='10' r='9'></circle> <rect x='9' y='4' width='1' height='7'></rect> <path fill='none' stroke='#000' stroke-width='1.1' d='M13.018,14.197 L9.445,10.625'></path></svg></i><span class='pl2'>$start_ts</span></div>
                            <div class='address'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path fill='none' stroke='#000' stroke-width='1.01' d='M10,0.5 C6.41,0.5 3.5,3.39 3.5,6.98 C3.5,11.83 10,19 10,19 C10,19 16.5,11.83 16.5,6.98 C16.5,3.39 13.59,0.5 10,0.5 L10,0.5 Z'></path> <circle fill='none' stroke='#000' cx='10' cy='6.8' r='2.3'></circle></svg></i><span class='pl2'>$address</span></div>
                            <a href='".esc_url( tribe_get_event_link() )."' class='uk-button uk-button-default mt5'>".esc_html('more impormation')." <i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <polyline fill='none' stroke='#000' points='10 5 15 9.5 10 14'></polyline> <line fill='none' stroke='#000' x1='4' y1='9.5' x2='15' y2='9.5'></line></svg></i></a>
                        </div> 
                    </div>
                </div>";
            }
            if($style == 11){
                $address = $image_src = $thumb = '';
                $event_id = get_the_ID();
                if( has_post_thumbnail() ){
                    $thumb = tribe_event_featured_image( $event_id, get_template().'-vc-ceo-team', false );
                }
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $event_id ), 'large' );
                $image_tag = wp_get_attachment_image( get_post_thumbnail_id( $event_id ), 'large', false );

                $time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
                $end_datetitle = tribe_get_end_date(null,true,'j M');
                $end_datetime = tribe_get_end_date();
                $start_time = tribe_get_start_date( null, false, $time_format );
                $start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
    
                $end_datetime = tribe_get_end_date();
                $end_date = tribe_get_display_end_date( null, false );
    
                $thecost = tribe_get_cost( null, true );
                $start_datetime = tribe_get_start_date();
                $time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
              
                $event.="<div class='uk-grid uk-margin-medium-bottom uk-width-1-1 m0'>
                            <div class='uk-width-1-2@m uk-width-1-2@l uk-position-relative p0 '>
                                <a href='".get_the_permalink()."'>
                                    <div class='feature_image uk-background-cover uk-background-center' data-bg-image='$image_src[0]'>
                                    </div>
                                </a>
                            </div>
                            <div class='uk-width-1-2@m uk-grid uk-width-1-2@l item uk-padding-small m0'>
                                <div class='event_meta pb4 '>
                                    <h2 class='pt4 m0 '> ".get_the_title()."</h2>
                                    <span>$start_datetime  $time_range_separator $end_date </span><br/>
                                    <a href='".esc_url( tribe_get_event_link() )."' class='uk-button uk-button-default mt4'>".esc_html('book your ticket')." </a>
                                </div> 
                            </div>
                        </div>";
            }
            if($style == 5){
                $address = $image_src = $thumb = '';
                $event_id = get_the_ID();
                if( has_post_thumbnail() ){
                    $thumb = tribe_event_featured_image( $event_id, get_template().'-vc-ceo-team', false );
                }
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $event_id ), 'large' );
                $image_tag = wp_get_attachment_image( get_post_thumbnail_id( $event_id ), 'large', false );

                $address = tribe_get_address( $event_id,'_EventVenueID',true);
                $event.="<div class='uk-grid uk-margin-large-bottom uk-width-1-1 '>
                            <div class='uk-width-1-2@m uk-width-1-2@l uk-position-relative'>
                                <a href='".get_the_permalink()."'>
                                    <div class='feature_image uk-background-cover uk-background-center' data-bg-image='$image_src[0]'>
                                    </div>
                                </a>
                            </div>
                            <div class='uk-width-1-2@m uk-grid uk-width-1-2@l uk-padding-small pl6 '>
                                <div class='event_meta '>
                                    <h3> ".get_the_title()."</h3>    
                                    $excerpt
                                    <div class='date mt3'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <circle fill='none' stroke='#000' stroke-width='1.1' cx='10' cy='10' r='9'></circle> <rect x='9' y='4' width='1' height='7'></rect> <path fill='none' stroke='#000' stroke-width='1.1' d='M13.018,14.197 L9.445,10.625'></path></svg></i><span class='pl2'>$start_ts</span></div>
                                    <div class='address mt1'><i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path fill='none' stroke='#000' stroke-width='1.01' d='M10,0.5 C6.41,0.5 3.5,3.39 3.5,6.98 C3.5,11.83 10,19 10,19 C10,19 16.5,11.83 16.5,6.98 C16.5,3.39 13.59,0.5 10,0.5 L10,0.5 Z'></path> <circle fill='none' stroke='#000' cx='10' cy='6.8' r='2.3'></circle></svg></i><span class='pl2'>$address</span></div>
                                    <a href='".esc_url( tribe_get_event_link() )."' class='uk-button uk-button-default mt5'>".esc_html('more impormation')." <i class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <polyline fill='none' stroke='#000' points='10 5 15 9.5 10 14'></polyline> <line fill='none' stroke='#000' x1='4' y1='9.5' x2='15' y2='9.5'></line></svg></i></a>
                                </div> 
                            </div>
                        </div>";
            }
            if($style == 9){
                $startday= tribe_get_start_date( null, false, 'd');
                $startmonth= tribe_get_start_date( null, false, 'M');

                // Categories
                $cats = '';
                $last_cat = '';
                $cat_title = '';
                $cat_titles = array();
                $terms = wp_get_post_terms(get_the_ID(), 'tribe_events_cat');
                foreach ($terms as $term){
                    $cat_title = $term->name;
                    $cat_slug = $term->slug;
                }
                $event.="<div><div class='uk-card uk-card-body'>
                                <div class='uk-card-title bushido-title '><i>$startday</i><br/>$startmonth</div>
                                <span class='uk-text-uppercase '>  <a href='".esc_url( tribe_get_event_link() )."'>".$cat_title."</a></span>  
                                <a href='".esc_url( tribe_get_event_link() )."'> <h2> ".get_the_title()."</h2></a>
                                <p class='pr7'>$excerpt</p>
                                <a href='".esc_url( tribe_get_event_link() )."' class='uk-button uk-button-default mt4'>".esc_html('read more')."</a>
                        </div></div>";
            }
            if($style == 12){

                $address = $image_src = $thumb = '';
                $event_id = get_the_ID();
                if( has_post_thumbnail() ){
                    $thumb = tribe_event_featured_image( $event_id, get_template().'-vc-ceo-team', false );
                }
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $event_id ), 'large' );
                $image_tag = wp_get_attachment_image( get_post_thumbnail_id( $event_id ), 'large', false );

                $startday= tribe_get_start_date( null, false, 'd');
                $startmonth= tribe_get_start_date( null, false, 'M');

                // Categories
                $cats = '';
                $last_cat = '';
                $cat_title = '';
                $cat_titles = array();
                $terms = wp_get_post_terms(get_the_ID(), 'tribe_events_cat');
                foreach ($terms as $term){
                    $cat_title = $term->name;
                    $cat_slug = $term->slug;
                }
                $time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
                $end_datetitle = tribe_get_end_date(null,true,'j M');
                $end_datetime = tribe_get_end_date();
                $start_time = tribe_get_start_date( null, false, $time_format );
                $start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
    
                $end_datetime = tribe_get_end_date();
                $end_date = tribe_get_display_end_date( null, false );
    
                $thecost = tribe_get_cost( null, true );
                $start_datetime = tribe_get_start_date();
                $time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );
                $event.="<div class='mt3 item evgrid' >
                            <a href='".esc_url( tribe_get_event_link() )."'>
                                <div class='uk-inline'>
                                    <img src='$image_src[0]' alt=''>
                                    <div class='uk-overlay uk-overlay-defualt  uk-position-bottom'>
                                       <h3> ".get_the_title()."</h3>
                                       <span>$start_datetime  $time_range_separator $end_date </span>
                                    </div>
                                </div>
                            </a>
                        </div>";
            }
            if($style == 10){
                $address = $image_src = $thumb = '';
                $event_id = get_the_ID();
                if( has_post_thumbnail() ){
                    $thumb = tribe_event_featured_image( $event_id, get_template().'-vc-ceo-team', false );
                }
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $event_id ), 'large' );
                $image_tag = wp_get_attachment_image( get_post_thumbnail_id( $event_id ), 'large', false );
                $startday= tribe_get_start_date( null, false, 'd');
                $startmonth= tribe_get_start_date( null, false, 'M');

                // Categories
                $cats = '';
                $last_cat = '';
                $cat_title = '';
                $cat_titles = array();
                $terms = wp_get_post_terms(get_the_ID(), 'tribe_events_cat');
                foreach ($terms as $term){
                    $cat_title = $term->name;
                    $cat_slug = $term->slug;
                }
                $event.="<li class='slideitem'>
                         <div class='uk-card uk-padding-remove'>
                            <div class='uk-body'>
                                <a href='".esc_url( tribe_get_event_link() )."'>
                                    <div class='themeton-image uk-background-cover uk-background-center' data-bg-image='$image_src[0]'>
                                        <img src='".get_template_directory_uri()."/images/dim/".$ratio.".png' alt='".esc_attr__('Ratio', 'themetonaddon')."'/>
                                    </div>
                                </a>
                             </div>
                            <div class='uk-footer uk-grid m0 uk-padding-remove '>
                                <div class='uk-width-auto uk-card-title uk-padding uk-text-center'><i>$startday</i><br/>$startmonth</div>
                                <div class='uk-width-expand'> 
                                    <a href='".esc_url( tribe_get_event_link() )."'> <h2 class='pt3 m0 '> ".get_the_title()."</h2></a>
                                    <p>$excerpt</p>
                                </div>
                            </div>
                        </div></li>";
            }
            if($style == 13){
                $address = $image_src = $thumb = '';
                $event_id = get_the_ID();
                if( has_post_thumbnail() ){
                    $thumb = tribe_event_featured_image( $event_id, get_template().'-vc-ceo-team', false );
                }
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $event_id ), 'large' );
                $image_tag = wp_get_attachment_image( get_post_thumbnail_id( $event_id ), 'large', false );
                $startday= tribe_get_start_date( null, false, 'd');
                $startmonth= tribe_get_start_date( null, false, 'M');

                // Categories
                $cats = '';
                $last_cat = '';
                $cat_title = '';
                $cat_titles = array();
                $terms = wp_get_post_terms(get_the_ID(), 'tribe_events_cat');
                foreach ($terms as $term){
                    $cat_title = $term->name;
                    $cat_slug = $term->slug;
                }
                $event.="<li class='slideitem'>
                        <div class='mt3 item'>
                        <a href='".esc_url( tribe_get_event_link() )."'>
                        <figure class='effect-selena'>
                            <div class='themeton-image uk-background-cover uk-background-center' data-bg-image='$image_src[0]'>
                                <img src='".get_template_directory_uri()."/images/dim/".$ratio.".png' alt='".esc_attr__('Ratio', 'themetonaddon')."'/>
                            </div>
                            <figure><figcaption>
                            <div class='desc pl3'>
                                <h3 class='pt3 m0 '> ".get_the_title()."</h3>
                                <span>$start_datetime  $time_range_separator $end_date </span>
                               
                            </div>
                            </figcaption></figure>
                        </figure>
                        <a href='".esc_url( tribe_get_event_link() )."' class='uk-button uk-button-default mt4'>".esc_html('book your ticket')." </a>
                        
                        </a>
                    </div></li>";
            }

            if ($style == 3) {
                $custom_field = '';
                $container_video = '';
                $container_music = '';
                $container_video = 'event-container-video'.get_the_ID();
                $container_music = 'event-container-music'.get_the_ID();
                if (get_post_field( 'camera', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="#%s" class="uk-toggle"><img src="%s" alt=""/></a> ',$container_video,$icon_url.'video.png');
                $video_embed = ''; $video_embed = wp_oembed_get(get_post_field( 'camera', null, 'display' ),array( 'width' => '100%' , 'height' => '500px' ));
                $custom_field .= '<div id="'.$container_video.'" class="uk-modal-container church-modal-video uk-modal">
                <div class="uk-modal-dialog uk-modal-body">
                    <button class="uk-modal-close-default uk-close" type="button" data-uk-close></button>
                    '.$video_embed.'
                </div>
            </div>';
            if (get_post_field( 'head_phone', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="#%s" class="uk-toggle"><img src="%s" alt="%s"/></a> ', esc_url($container_music),$icon_url.'headphone.png', esc_attr__('Phone icon', 'themetonaddon'));
                $music_embed = get_post_field( 'head_phone', null, 'display' );
                $custom_field .= '<div id="'.$container_music.'" class="uk-modal-container church-modal-video uk-modal">
                <div class="uk-modal-dialog uk-modal-body">
                    <button class="uk-modal-close-default uk-close" type="button" data-uk-close></button>
                    '.$music_embed.'
                </div>
            </div>';
                if (get_post_field( 'pdf', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="%s"><img src="%s" alt=""/></a> ',get_post_field( 'pdf', null, 'display' ),$icon_url.'pdf.png');
                
                $thumb = tribe_event_featured_image( $event_id, get_template().'-vc-ceo-team', false );
                $day = tribe_get_start_date(null,false,'l');
                $event .= "<li class='pl1@s pr1@s'><div class='uk-grid uk-grid-collapse'>
                <div class='thumb uk-width-auto'><div class='date'><h5>$start_date</h5></div>$thumb</div>
                <div class='uk-width-expand'><h3><a href='".get_the_permalink()."'>".get_the_title()."</a></h3>
                By <a href='".get_the_author_link()."'>".get_the_author()."</a>, $day <a href='".get_the_permalink()."'>".get_the_date()."</a>
                <div class='field-icon'>$custom_field</div>
                </div>
                </div></li>";
            }
            if ($style == 6) {
                $custom_field = '';
                if (get_post_field( 'camera', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="%s"><img src="%s" alt=""/></a> ',get_post_field( 'camera', null, 'display' ),$icon_url.'video.png');
                if (get_post_field( 'head_phone', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="%s"><img src="%s" alt=""/></a> ',get_post_field( 'head_phone', null, 'display' ),$icon_url.'headphone.png');
                if (get_post_field( 'pdf', null, 'display' )!=NULL) $custom_field .= sprintf('<a href="%s"><img src="%s" alt=""/></a> ',get_post_field( 'pdf', null, 'display' ),$icon_url.'pdf.png');

                
                $thumb = get_the_post_thumbnail_url($event_id);
                $day = tribe_get_start_date(null,false,'l');
                $event .= "<li class='pl1@s pr1@s'><div class='uk-grid uk-grid-collapse'>
                <div class='thumb' data-src='".$thumb."'></div>
                <div class='uk-width-expand'>
                By <a href='".get_the_author_link()."'>".get_the_author()."</a>, $day <a href='".get_the_permalink()."'>".get_the_date()."</a>
                <h3><a href='".get_the_permalink()."'>".get_the_title()."</a></h3>
                <p>".get_the_excerpt()."</p>
                <div class='field-icon'>$custom_field</div>
                </div>
                </div></li>";
            }
            if ($style == 8) {
                $custom_field = '';
                $day = tribe_get_start_date(null,false,'l');
                $event .= '<div class="mt3">
                                <a href="'.get_the_permalink().'">
                                    <div class="uk-card uk-card-default uk-card-body">
                                        <h2 class="uk-text-uppercase m0">'.$start_datetime_n.'</h2>
                                        <p>'.$excerpt.'</p>
                                    </div>
                                </a>
                            </div>';
            }
        }
        $msizer = $mclass ='';
        if($masonry =='yes'){
            $mclass .="masonry-events";
            $msizer .="<div class='grid-sizer'></div>";
        }

        if ($style == 1 ) {
            // Pager
            $pagination = '';
            $pager_result = '';
            if( $pager=='yes' ){
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ){
                    $pager_result.= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            else{
                $pagination;
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return "$search<div class='uk-grid $mclass event-grid uk-grid-medium uk-child-width-1-".$columns."@m uk-child-width-1-1@s $extra_class'>
                        $msizer
                        ".$event."
                         $pager_result
                    </div>";
        }
        if ($style == 8) {
            // Pager
            $pagination = '';
            $pager_result = '';
            if( $pager=='yes' ){
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ){
                    $pager_result.= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            else{
                $pagination;
            }

            wp_reset_postdata();
            return "<div class='uk-grid $mclass event-grid uk-grid-medium uk-child-width-1-".$columns."@m uk-child-width-1-1@s $extra_class yoga'>
                        ".$event."
                    </div>";
        }
        if ($style == 2) {
            $pagination = '';
            $pager_result = '';
            if( $pager=='yes' ){
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ){
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return $search."<div class='uk-grid event-grid uk-grid-medium uk-child-width-1-".$columns."@m uk-child-width-1-1@s $extra_class'>
                        ".$event."
                        $pager_result
                    </div>";
        }
        if ($style == 3) {
            $pagination = '';
            $pager_result = '';
            if( $pager=='yes' ){
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ){
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return "$search<ul class='event-list'>".$event."</ul>".$pager_result;
        }
        if ($style == 6) {
            $pagination = '';
            $pager_result = '';
            if( $pager=='yes' ){
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ){
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return "$search<ul class='sermons-list'>".$event."</ul>$pager_result";
        }
        if ($style == 7) {
            $pagination = '';
            $pager_result = '';
            if( $pager=='yes' ){
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ){
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return $search ."<div class='uk-grid sermons-grid'>".$event."</div>$pager_result";
        }
        if ($style == 4) {
            $pagination = '';
            $pager_result = '';
            if( $pager=='yes' ){
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ){
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return "$search<div class='uk-grid event-feature $mclass uk-grid-medium uk-child-width-1-".$columns."@m uk-child-width-1-1@s $extra_class'>
                        $msizer
                        ".$event."
                        $pager_result
                    </div>";
        }
        if ($style == 5) {
            $pagination = '';
            $pager_result = '';
            if( $pager == 'yes' ) {
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ) {
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return "$search<div class='event-list uk-grid-medium $extra_class'>
                        $event
                        $pager_result
                    </div>";
        }
        if ($style == 11) {
            $pagination = '';
            $pager_result = '';
            if( $pager == 'yes' ) {
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ) {
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            return "$search<div class='event-list-style uk-grid-medium $extra_class'>
                        $event
                        $pager_result
                    </div>";
        }
        if ($style == 9) {
            $pagination = '';
            $pager_result = '';
            if( $pager == 'yes' ) {
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ) {
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
            return "<div class='uk-grid uk-child-width-1-".$columns."@m  bushido-event uk-scrollspy $extra_class'>
                        $event
                        $pager_result
                    </div>";
        }
        if ($style == 12) {
            $pagination = '';
            $pager_result = '';
            if ($search == 'yes') $search = include get_template_directory().'/tribe-events/modules/bar.php';
            else $search = '';
            if( $pager == 'yes' ) {
                $pagination = Themeton_Tpl::pagination($allevents,true);
                if( !empty($pagination) ) {
                    $pager_result .= "<div class='uk-width-1-1@ uk-flex-center uk-flex'>$pagination</div>";
                }
            }
            wp_reset_postdata();
           
            return "$search <div class='uk-grid uk-grid-medium uk-child-width-1-".$columns."@m club-event $extra_class'>
                        $event
                        $pager_result
                    </div>";
        }
        if ($style == 10){

            return '<div class="uk-position-relative uk-visible-toggle uk-slider eventslide" data-uk-slider="autoplay: true;sets: true;finite: true;">
                            <ul class="uk-slider-items uk-child-width-1-'.$columns.'@m uk-child-width-1-1@s uk-grid uk-grid-small">
                            '.$event.'
                            </ul></div>';
        }
        if ($style == 13){

            return '<div class="uk-position-relative uk-visible-toggle uk-slider clubslide2" data-uk-slider="autoplay: true;sets: true;finite: true;">
                            <ul class="uk-slider-items  uk-child-width-1-'.$columns.'@m uk-child-width-1-1@s uk-grid uk-grid-small">
                            '.$event.'
                            </ul></div>';
        }
    }
}
}

$terms = get_terms();
$arg = array(
    'All' => 'default'
    );
if (isset($terms)) {
    foreach ($terms as $cat) {
        if ( $cat->taxonomy == "tribe_events_cat") { $arg[$cat->name] = $cat->name; }
    }
}

vc_map( array(
    "name" => esc_html__('Event', 'themetonaddon'),
    "description" => esc_html__("Only post type: event", 'themetonaddon'),
    "base" => 'mungu_events',
    "icon" => "mungu-vc-icon mungu-vc-icon55",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                "Style 1" => "1",
                "Style 2" => "2",
                "Style 3" => "3",
                "Style 4" => "4",
                "List list 1" => "5",
                "List style 2" => "11",
                "Grid " => "12",
                "Sermons" => "7",
                "Sermons List" => "6",
                "Style 8 " => "8",
                "Style 9 used for kendo" => "9",
                "Carousel style 1" => "10",
                "Carousel style 2 " => "13",
            ),
            "std" => "1",
            'admin_label' => true
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
            "dependency" => Array("element" => "style", "value" => array("10","12","13"))
        ),
        array(
            "type" => "dropdown",
            "param_name" => "masonry",
            "heading" => esc_html__("Mosanry ? ", 'themetonaddon'),
            "value" => array(
                "Yes" => "yes",
                "NO" => "no",
            ),
            "std" => "no",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "search",
            "heading" => esc_html__("Search Bar ? ", 'themetonaddon'),
            "value" => array(
                "Yes" => "yes",
                "No" => "no",
            ),
            "std" => "no",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "columns",
            "heading" => esc_html__("Columns", 'themetonaddon'),
            "value" => array(
                "5 Columns" => "5",
                "4 Columns" => "4",
                "3 Columns" => "3",
                "2 Columns" => "2",
                "1 Column" => "1"
            ),
            "std" => "3",
            'admin_label' => true
        ),
        array(
            "type" => "dropdown",
            "param_name" => "category",
            "heading" => esc_html__("Category", 'themetonaddon'),
            "value" => $arg,
            "std" => "default",
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '6'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "excepts_count",
            "heading" => esc_html__("Excepts", 'themetonaddon'),
            "value" => '20'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "pager",
            "heading" => esc_html__("Pagination", 'themetonaddon'),
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
            "std" => "no"
        ),
        array(
            "type" => "textfield",
            "param_name" => "email",
            "heading" => esc_html__("Email", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("Mailto email info@next.com", 'themetonaddon'),
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