<?php

class WPBakeryShortCode_Themetonaddon_Music_Player extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'postformat' => '0',
            'list' => '',
            'extra_class' => ''
        ), $atts));


        $list = vc_param_group_parse_atts($list);
        $songs = '';
        $index = 0;

        $first = array(
            'image' => '',
            'song' => '',
            'title' => '',
            'artist' => '',
            'duration' => '01:00'
        );

    if($postformat == '0') {

        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                $song = isset($item['song']) ? $item['song'] : "";
                $title = isset($item['title']) ? $item['title'] : "";
                $artist = isset($item['artist']) ? $item['artist'] : "";
                $duration = isset($item['duration']) ? $item['duration'] : "01:00";
                $index++;

                if( !empty($image) ){
                    $image = wp_get_attachment_image_src($image, 'thumbnail');
                    $image = !empty($image) ? $image[0] : '';
                }

                if( $index==1 ){
                    $first = array(
                        'image' => $image,
                        'song' => $song,
                        'title' => $title,
                        'artist' => $artist,
                        'duration' => $duration
                    );
                }

                $songs .= sprintf('<tr class="tr-item" data-id="mpid%s">
                                        <td class="td-num">
                                            <span class="number" data-value="%s"></span>
                                        </td>
                                        <td class="td-title">
                                            <a href="javascript:;" class="pl-audio-item" data-url="%s" data-thumb="%s">
                                                <span class="pl-item-title">%s</span>
                                                <span class="pl-item-duration">%s</span>
                                                <span class="pl-item-artist">%s</span>
                                            </a>
                                        </td>
                                    </tr>', $index, $index, $song, $image, $title, $duration, $artist);

            }
        }
    } else {
        $args = array(
            'post_type' => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array( 
                        'post-format-audio',
                    ),
                )
            )
        );

        // The Query
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();

                // Audio
                $pattern = get_shortcode_regex();
                preg_match('/'.$pattern.'/s', get_the_content(), $matches);
                if (is_array($matches) && isset($matches[2]) && $matches[2] == 'audio') {
                    $shortcode = $matches[0];
                    $media = preg_match('/"([^"]+)"/', $shortcode, $m);
                    $media = isset($m[1])?$m[1]:'';
                }else{
                    $frame = "frame";
                    $regx = "/<i$frame(.)*<\/i$frame>/msi";
                    preg_match($regx, get_the_content(), $matches);
                    if( isset($matches[0]) && !empty($matches[0]) ){
                        $media = $matches[0];
                    }
                    else{
                        if ( preg_match( '|^\s*(https?://[^\s"]+)\s*$|im', get_the_content(), $matches ) ) {
                            if(isset($matches[1])) {
                                $media = $matches[1];
                            }
                        }
                    }
                }

                $song = $media;
                $title = get_the_title();
                $artist = isset($item['artist']) ? $item['artist'] : "Author";
                $duration = "01:00";
                $index++;
                
                $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                $image = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
                $image = !empty($image) ? $image[0] : '';
                

                if( $index==1 ){
                    $first = array(
                        'image' => $image,
                        'song' => $song,
                        'title' => $title,
                        'artist' => $artist,
                        'duration' => $duration
                    );
                }

                $songs .= sprintf('<tr class="tr-item" data-id="mpid%s">
                                        <td class="td-num">
                                            <span class="number" data-value="%s"></span>
                                        </td>
                                        <td class="td-title">
                                            <a href="javascript:;" class="pl-audio-item" data-url="%s" data-thumb="%s">
                                                <span class="pl-item-title">%s</span>
                                                <span class="pl-item-duration">%s</span>
                                                <span class="pl-item-artist">%s</span>
                                            </a>
                                        </td>
                                    </tr>', $index, $index, $song, $image, $title, $duration, $artist);

            }
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            echo 'No audio posts found';
        }
    }

        return sprintf('<div id="music_player">
                            <div class="uk-container container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="ms-table">
                                            <tr>
                                                <td class="ms-buttons">
                                                    <a href="javascript:;" class="ms-prev">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 15" xml:space="preserve">
                                                            <path d="M0.1,7.2l9.5-6.7c0.1-0.1,0.2-0.1,0.4,0c0.1,0.1,0.2,0.2,0.2,0.3v6.3l9.3-6.6c0.1-0.1,0.2-0.1,0.4,0C19.9,0.5,20,0.6,20,0.8v13.5c0,0.1-0.1,0.3-0.2,0.3c-0.1,0-0.1,0-0.2,0c-0.1,0-0.1,0-0.2-0.1l-9.3-6.6v6.3c0,0.1-0.1,0.3-0.2,0.3c-0.1,0-0.1,0-0.2,0c-0.1,0-0.1,0-0.2-0.1L0.1,7.8C0.1,7.7,0,7.6,0,7.5C0,7.4,0.1,7.3,0.1,7.2z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="javascript:;" class="ms-play">
                                                        <svg id="ms_play_pause" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 26" enable-background="new 0 0 20 26" xml:space="preserve">
                                                            <g id="ms_pause" style="display:none;">
                                                                <path d="M8.3,25.1c0,0.5-0.4,0.9-0.9,0.9h-5c-0.5,0-0.9-0.4-0.9-0.9V0.9C1.5,0.4,1.9,0,2.4,0h5c0.5,0,0.9,0.4,0.9,0.9V25.1L8.3,25.1z"/>
                                                                <path d="M18.5,25.1c0,0.5-0.4,0.9-0.9,0.9h-5c-0.5,0-0.9-0.4-0.9-0.9V0.9c0-0.5,0.4-0.9,0.9-0.9h5c0.5,0,0.9,0.4,0.9,0.9V25.1z"/>
                                                            </g>
                                                            <g id="ms_play">
                                                                <path d="M19.2,12.5L1.5,0.1C1.3,0,1,0,0.8,0.1C0.6,0.2,0.5,0.4,0.5,0.6v24.8c0,0.2,0.1,0.4,0.3,0.5C0.9,26,1,26,1.1,26c0.1,0,0.2,0,0.3-0.1l17.8-12.4c0.2-0.1,0.3-0.3,0.3-0.5C19.5,12.8,19.4,12.6,19.2,12.5z"/>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                    <a href="javascript:;" class="ms-next">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 15" xml:space="preserve">
                                                            <path d="M19.9,7.2l-9.5-6.7c-0.1-0.1-0.2-0.1-0.4,0C9.9,0.5,9.8,0.6,9.8,0.8v6.3L0.6,0.5c-0.1-0.1-0.2-0.1-0.4,0C0.1,0.5,0,0.6,0,0.8v13.5c0,0.1,0.1,0.3,0.2,0.3c0.1,0,0.1,0,0.2,0c0.1,0,0.1,0,0.2-0.1l9.3-6.6v6.3c0,0.1,0.1,0.3,0.2,0.3c0.1,0,0.1,0,0.2,0c0.1,0,0.1,0,0.2-0.1l9.5-6.7C19.9,7.7,20,7.6,20,7.5C20,7.4,19.9,7.3,19.9,7.2z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="ms-wrap">
                                                    <audio id="msplayer" class="msplayer-skin" src="%s" type="audio/mp3" controls="controls"></audio>
                                                </td>
                                                <td class="ms-controls">
                                                    <div class="ms-entry-controls">
                                                        <div class="ec-item ec-repeat">
                                                            <a href="javascript:;" class="ms-control-repeat active">
                                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 16" xml:space="preserve">
                                                                    <g>
                                                                        <path d="M10.4,7.7c-0.3-0.4-0.9-0.4-1.2,0C8.8,8,8.8,8.6,9.2,9l1.2,1.2H5.2c-1.9,0-3.5-1.6-3.5-3.5c0-1.9,1.6-3.5,3.5-3.5h4c0.5,0,0.9-0.4,0.9-0.9c0-0.5-0.4-0.9-0.9-0.9h-4C2.3,1.3,0,3.7,0,6.6C0,9.6,2.3,12,5.2,12h5.1l-1.2,1.2c-0.3,0.4-0.3,0.9,0,1.3c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3l2.7-2.7c0.3-0.4,0.3-0.9,0-1.3L10.4,7.7z"/>
                                                                        <path d="M18.8,4h-5.1l1.2-1.2c0.3-0.4,0.3-0.9,0-1.3c-0.3-0.4-0.9-0.4-1.2,0l-2.7,2.7c-0.3,0.4-0.3,0.9,0,1.3l2.7,2.7c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3c0.3-0.4,0.3-0.9,0-1.3l-1.2-1.2h5.1c1.9,0,3.5,1.6,3.5,3.5s-1.6,3.5-3.5,3.5h-4c-0.5,0-0.9,0.4-0.9,0.9s0.4,0.9,0.9,0.9h4c2.9,0,5.2-2.4,5.2-5.3C24,6.4,21.7,4,18.8,4z"/>
                                                                    </g>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="ec-item ec-shuffle">
                                                            <a href="javascript:;" class="ms-control-shuffle">
                                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 16" xml:space="preserve">
                                                                    <g>
                                                                        <path d="M11.3,8.5c0.3-0.7,0.5-1.3,0.7-1.7c0.2-0.3,0.3-0.6,0.4-0.8c0.1-0.2,0.3-0.4,0.5-0.6c0.2-0.2,0.4-0.4,0.7-0.5c0.2-0.1,0.5-0.1,0.8-0.1h2.4v1.9c0,0.1,0,0.2,0.1,0.2C17,7,17.1,7,17.2,7c0.1,0,0.2,0,0.2-0.1l3-3.2c0.1-0.1,0.1-0.1,0.1-0.2c0-0.1,0-0.2-0.1-0.2l-3-3.2C17.3,0,17.2,0,17.2,0c-0.1,0-0.2,0-0.2,0.1c-0.1,0.1-0.1,0.1-0.1,0.2v1.9h-2.4c-0.4,0-0.8,0.1-1.2,0.2c-0.4,0.1-0.7,0.2-1,0.4c-0.3,0.2-0.6,0.4-0.9,0.7c-0.3,0.3-0.5,0.6-0.7,0.8c-0.2,0.3-0.4,0.6-0.6,1C9.8,5.7,9.7,6.1,9.5,6.4C9.4,6.7,9.2,7.1,9.1,7.5C8.8,8.2,8.5,8.8,8.3,9.2C8.2,9.5,8,9.8,7.9,10c-0.1,0.2-0.3,0.4-0.5,0.6C7.2,10.8,7,11,6.7,11.1c-0.2,0.1-0.5,0.1-0.8,0.1H3.8c-0.1,0-0.2,0-0.2,0.1c-0.1,0.1-0.1,0.1-0.1,0.2v1.9c0,0.1,0,0.2,0.1,0.2c0.1,0.1,0.1,0.1,0.2,0.1h2.1c0.4,0,0.8-0.1,1.2-0.2c0.4-0.1,0.7-0.2,1-0.4C8.4,13,8.7,12.8,9,12.5c0.3-0.3,0.5-0.6,0.7-0.8c0.2-0.3,0.4-0.6,0.6-1c0.2-0.4,0.4-0.8,0.5-1.1C11,9.3,11.1,8.9,11.3,8.5z"/>
                                                                        <path d="M3.8,4.8h2.1c0.3,0,0.5,0,0.8,0.1C6.9,5,7.1,5.2,7.3,5.3c0.2,0.1,0.3,0.3,0.5,0.6c0.2,0.2,0.3,0.5,0.4,0.6c0.1,0.2,0.2,0.4,0.4,0.7C9,6,9.4,5.1,9.8,4.5C8.8,3,7.5,2.2,5.9,2.2H3.8c-0.1,0-0.2,0-0.2,0.1C3.5,2.4,3.5,2.5,3.5,2.6v1.9c0,0.1,0,0.2,0.1,0.2C3.6,4.8,3.7,4.8,3.8,4.8z"/>
                                                                        <path d="M17.4,9.1C17.3,9,17.2,9,17.2,9c-0.1,0-0.2,0-0.2,0.1c-0.1,0.1-0.1,0.1-0.1,0.2v1.9h-2.4c-0.3,0-0.5,0-0.8-0.1c-0.2-0.1-0.4-0.2-0.6-0.4c-0.2-0.1-0.3-0.3-0.5-0.6c-0.2-0.2-0.3-0.5-0.4-0.6c-0.1-0.2-0.2-0.4-0.4-0.7c-0.5,1.2-0.9,2.1-1.3,2.7c0.2,0.3,0.3,0.5,0.5,0.7c0.2,0.2,0.4,0.4,0.5,0.5c0.2,0.2,0.4,0.3,0.6,0.4c0.2,0.1,0.4,0.2,0.6,0.3c0.2,0.1,0.4,0.1,0.6,0.2c0.2,0,0.4,0.1,0.6,0.1c0.2,0,0.4,0,0.7,0.1c0.3,0,0.5,0,0.7,0c0.2,0,0.4,0,0.8,0c0.3,0,0.6,0,0.8,0v1.9c0,0.1,0,0.2,0.1,0.2C17,16,17.1,16,17.2,16c0.1,0,0.2,0,0.2-0.1l3-3.2c0.1-0.1,0.1-0.1,0.1-0.2c0-0.1,0-0.2-0.1-0.2L17.4,9.1z"/>
                                                                    </g>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="ec-item ec-volume">
                                                            <a href="javascript:;">
                                                                <svg id="ec_volume" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 16" xml:space="preserve">
                                                                    <g id="vol_middle" style="display:none;">
                                                                        <path d="M15.8,12.1c-0.2,0-0.4-0.1-0.6-0.3c-0.3-0.3-0.3-0.9,0-1.2c1.4-1.4,1.4-3.8,0-5.3c-0.3-0.3-0.3-0.9,0-1.2c0.3-0.3,0.9-0.3,1.2,0c2.1,2.1,2.1,5.6,0,7.7C16.2,12,16,12.1,15.8,12.1z"/>
                                                                        <path d="M13.4,16c-0.1,0-0.3-0.1-0.4-0.2l-4.4-4.4h-2c-0.3,0-0.6-0.3-0.6-0.6V5.1c0-0.3,0.3-0.6,0.6-0.6h2L13,0.2C13.2,0,13.4,0,13.6,0C13.9,0.1,14,0.3,14,0.6v14.9c0,0.2-0.1,0.4-0.4,0.5C13.6,16,13.5,16,13.4,16z"/>
                                                                    </g>
                                                                    <g id="vol_mute" style="display:none;">
                                                                        <path d="M15.4,16c-0.1,0-0.3-0.1-0.4-0.2l-4.4-4.4h-2c-0.3,0-0.6-0.3-0.6-0.6V5.1c0-0.3,0.3-0.6,0.6-0.6h2L15,0.2C15.2,0,15.4,0,15.6,0C15.9,0.1,16,0.3,16,0.6v14.9c0,0.2-0.1,0.4-0.4,0.5C15.6,16,15.5,16,15.4,16z"/>
                                                                    </g>
                                                                    <g id="vol_max">
                                                                        <path d="M18.2,15.3c-0.2,0-0.4-0.1-0.6-0.3c-0.3-0.3-0.3-0.9,0-1.2C19.1,12.3,20,10.2,20,8c0-2.2-0.9-4.3-2.4-5.9c-0.3-0.3-0.3-0.9,0-1.2c0.3-0.3,0.9-0.3,1.2,0c1.9,1.9,2.9,4.4,2.9,7.1c0,2.7-1,5.2-2.9,7.1C18.6,15.2,18.4,15.3,18.2,15.3L18.2,15.3z M15.1,13.7c-0.2,0-0.4-0.1-0.6-0.3c-0.3-0.3-0.3-0.9,0-1.2c2.3-2.3,2.3-6.1,0-8.5c-0.3-0.3-0.3-0.9,0-1.2c0.3-0.3,0.9-0.3,1.2,0C17.2,4,18,5.9,18,8c0,2.1-0.8,4-2.3,5.5C15.6,13.6,15.4,13.7,15.1,13.7L15.1,13.7L15.1,13.7z M12.1,12.1c-0.2,0-0.4-0.1-0.6-0.3c-0.3-0.3-0.3-0.9,0-1.2c1.4-1.4,1.4-3.8,0-5.3c-0.3-0.3-0.3-0.9,0-1.2c0.3-0.3,0.9-0.3,1.2,0c2.1,2.1,2.1,5.6,0,7.7C12.5,12,12.3,12.1,12.1,12.1z"/>
                                                                        <path d="M9.7,16c-0.1,0-0.3-0.1-0.4-0.2l-4.4-4.4h-2c-0.3,0-0.6-0.3-0.6-0.6V5.1c0-0.3,0.3-0.6,0.6-0.6h2l4.4-4.4C9.5,0,9.7,0,9.9,0c0.2,0.1,0.4,0.3,0.4,0.5v14.9c0,0.2-0.1,0.4-0.4,0.5C9.9,16,9.8,16,9.7,16z"/>
                                                                    </g>
                                                                </svg>
                                                            </a>
                                                            <div class="ec-volume-control">
                                                                <div class="ec-vol-el"></div>
                                                            </div>
                                                        </div>
                                                        <div class="ec-item ec-playlist">
                                                            <a href="javascript:;">
                                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 16" xml:space="preserve">
                                                                    <g>
                                                                        <path d="M5.7,6.2c-0.5,0-0.9,0.2-1.2,0.5C4.2,7.1,4,7.5,4,8c0,0.5,0.2,0.9,0.5,1.3c0.3,0.4,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5C7.3,8.9,7.4,8.5,7.4,8c0-0.5-0.2-0.9-0.5-1.3C6.6,6.4,6.2,6.2,5.7,6.2z"/>
                                                                        <path d="M5.7,1.3c-0.5,0-0.9,0.2-1.2,0.5C4.2,2.2,4,2.6,4,3.1c0,0.5,0.2,0.9,0.5,1.3C4.8,4.8,5.2,5,5.7,5c0.5,0,0.9-0.2,1.2-0.5c0.3-0.4,0.5-0.8,0.5-1.3c0-0.5-0.2-0.9-0.5-1.3C6.6,1.5,6.2,1.3,5.7,1.3z"/>
                                                                        <path d="M5.7,11c-0.5,0-0.9,0.2-1.2,0.5C4.2,11.9,4,12.4,4,12.9c0,0.5,0.2,0.9,0.5,1.3c0.3,0.4,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5c0.3-0.4,0.5-0.8,0.5-1.3c0-0.5-0.2-0.9-0.5-1.3C6.6,11.2,6.2,11,5.7,11z"/>
                                                                        <path d="M19.9,2c-0.1-0.1-0.1-0.1-0.2-0.1H8.9c-0.1,0-0.1,0-0.2,0.1C8.6,2.1,8.6,2.1,8.6,2.2V4c0,0.1,0,0.2,0.1,0.2c0.1,0.1,0.1,0.1,0.2,0.1h10.9c0.1,0,0.1,0,0.2-0.1C20,4.2,20,4.1,20,4V2.2C20,2.1,20,2.1,19.9,2z"/>
                                                                        <path d="M19.7,6.8H8.9c-0.1,0-0.1,0-0.2,0.1C8.6,6.9,8.6,7,8.6,7.1v1.8c0,0.1,0,0.2,0.1,0.2c0.1,0.1,0.1,0.1,0.2,0.1h10.9c0.1,0,0.1,0,0.2-0.1C20,9.1,20,9,20,8.9V7.1c0-0.1,0-0.2-0.1-0.2C19.9,6.8,19.8,6.8,19.7,6.8z"/>
                                                                        <path d="M19.7,11.6H8.9c-0.1,0-0.1,0-0.2,0.1c-0.1,0.1-0.1,0.1-0.1,0.2v1.8c0,0.1,0,0.2,0.1,0.2c0.1,0.1,0.1,0.1,0.2,0.1h10.9c0.1,0,0.1,0,0.2-0.1c0.1-0.1,0.1-0.1,0.1-0.2V12c0-0.1,0-0.2-0.1-0.2C19.9,11.7,19.8,11.6,19.7,11.6z"/>
                                                                    </g>
                                                                </svg>
                                                            </a>
                                                            <div class="ec-playlist-control">
                                                                <div class="pl-head">
                                                                    <h5>%s <span>(%s)</span></h5>
                                                                    <a href="javascript:;" class="ms-control-shuffle">
                                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 16" xml:space="preserve">
                                                                            <g>
                                                                                <path d="M11.3,8.5c0.3-0.7,0.5-1.3,0.7-1.7c0.2-0.3,0.3-0.6,0.4-0.8c0.1-0.2,0.3-0.4,0.5-0.6c0.2-0.2,0.4-0.4,0.7-0.5c0.2-0.1,0.5-0.1,0.8-0.1h2.4v1.9c0,0.1,0,0.2,0.1,0.2C17,7,17.1,7,17.2,7c0.1,0,0.2,0,0.2-0.1l3-3.2c0.1-0.1,0.1-0.1,0.1-0.2c0-0.1,0-0.2-0.1-0.2l-3-3.2C17.3,0,17.2,0,17.2,0c-0.1,0-0.2,0-0.2,0.1c-0.1,0.1-0.1,0.1-0.1,0.2v1.9h-2.4c-0.4,0-0.8,0.1-1.2,0.2c-0.4,0.1-0.7,0.2-1,0.4c-0.3,0.2-0.6,0.4-0.9,0.7c-0.3,0.3-0.5,0.6-0.7,0.8c-0.2,0.3-0.4,0.6-0.6,1C9.8,5.7,9.7,6.1,9.5,6.4C9.4,6.7,9.2,7.1,9.1,7.5C8.8,8.2,8.5,8.8,8.3,9.2C8.2,9.5,8,9.8,7.9,10c-0.1,0.2-0.3,0.4-0.5,0.6C7.2,10.8,7,11,6.7,11.1c-0.2,0.1-0.5,0.1-0.8,0.1H3.8c-0.1,0-0.2,0-0.2,0.1c-0.1,0.1-0.1,0.1-0.1,0.2v1.9c0,0.1,0,0.2,0.1,0.2c0.1,0.1,0.1,0.1,0.2,0.1h2.1c0.4,0,0.8-0.1,1.2-0.2c0.4-0.1,0.7-0.2,1-0.4C8.4,13,8.7,12.8,9,12.5c0.3-0.3,0.5-0.6,0.7-0.8c0.2-0.3,0.4-0.6,0.6-1c0.2-0.4,0.4-0.8,0.5-1.1C11,9.3,11.1,8.9,11.3,8.5z"/>
                                                                                <path d="M3.8,4.8h2.1c0.3,0,0.5,0,0.8,0.1C6.9,5,7.1,5.2,7.3,5.3c0.2,0.1,0.3,0.3,0.5,0.6c0.2,0.2,0.3,0.5,0.4,0.6c0.1,0.2,0.2,0.4,0.4,0.7C9,6,9.4,5.1,9.8,4.5C8.8,3,7.5,2.2,5.9,2.2H3.8c-0.1,0-0.2,0-0.2,0.1C3.5,2.4,3.5,2.5,3.5,2.6v1.9c0,0.1,0,0.2,0.1,0.2C3.6,4.8,3.7,4.8,3.8,4.8z"/>
                                                                                <path d="M17.4,9.1C17.3,9,17.2,9,17.2,9c-0.1,0-0.2,0-0.2,0.1c-0.1,0.1-0.1,0.1-0.1,0.2v1.9h-2.4c-0.3,0-0.5,0-0.8-0.1c-0.2-0.1-0.4-0.2-0.6-0.4c-0.2-0.1-0.3-0.3-0.5-0.6c-0.2-0.2-0.3-0.5-0.4-0.6c-0.1-0.2-0.2-0.4-0.4-0.7c-0.5,1.2-0.9,2.1-1.3,2.7c0.2,0.3,0.3,0.5,0.5,0.7c0.2,0.2,0.4,0.4,0.5,0.5c0.2,0.2,0.4,0.3,0.6,0.4c0.2,0.1,0.4,0.2,0.6,0.3c0.2,0.1,0.4,0.1,0.6,0.2c0.2,0,0.4,0.1,0.6,0.1c0.2,0,0.4,0,0.7,0.1c0.3,0,0.5,0,0.7,0c0.2,0,0.4,0,0.8,0c0.3,0,0.6,0,0.8,0v1.9c0,0.1,0,0.2,0.1,0.2C17,16,17.1,16,17.2,16c0.1,0,0.2,0,0.2-0.1l3-3.2c0.1-0.1,0.1-0.1,0.1-0.2c0-0.1,0-0.2-0.1-0.2L17.4,9.1z"/>
                                                                            </g>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="pl-list-container">
                                                                    <table class="pl-list">%s</table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ms-nowplaying">
                                                    <span class="np-thumb" style="background-image:url(%s);"></span>
                                                    <span class="np-meta">
                                                        <span class="np-title">%s</span>
                                                        <span class="np-artist">%s</span>
                                                    </span>
                                                    <a href="javascript:;" class="ms-love ms-add-fav active">
                                                        <svg viewBox="0 0 11 11">
                                                            <path d="M5.5,10.7L4.7,9.9C1.9,7.3,0,5.6,0,3.4c0-1.7,1.3-3.1,3-3.1c0.9,0,1.9,0.4,2.5,1.2C6.1,0.8,7,0.3,8,0.3c1.7,0,3,1.3,3,3.1c0,2.1-1.9,3.9-4.7,6.4L5.5,10.7z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>', $first['song'], esc_html__('Songs', 'themeton'), "$index", $songs, $first['image'], $first['title'], $first['artist']);

    }

}

vc_map( array(
    "name" => esc_html__('Music Player', 'themeton'),
    "description" => esc_html__("Create Playlist", 'themeton'),
    "base" => 'themetonaddon_music_player',
    "icon" => "mungu-vc-icon mungu-vc-icon37",
    "content_element" => true,
    "category" => 'Themeton',
    "class" => 'themeton-vc-element',
    'params' => array(
        
        array(
            'type' => 'checkbox',
            "param_name" => "postformat",
            "heading" => esc_html__("From Static Audio Data?", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "0",
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Custom Audio Files', 'themeton'),
            'param_name' => 'list',
            "dependency" => array("element" => "postformat", "value" => array("1")),
            'params' => array(

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'themeton'),
                    'param_name' => 'title',
                    "value" => esc_html__('Title', 'themeton'),
                    'admin_label' => true,
                    'holder' => 'div'
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Artist', 'themeton'),
                    'param_name' => 'artist',
                    'value' => 'Artist'
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Song Url', 'themeton'),
                    'param_name' => 'song',
                    'value' => ''
                ),

                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Poster Image", 'themeton'),
                    "value" => ''
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Duration', 'themeton'),
                    'param_name' => 'duration',
                    'value' => '01:00'
                )

            )
        )

    )
));