<?php
if (!class_exists('WPBakeryShortCode_mungu_team')) {
class WPBakeryShortCode_mungu_team extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'style' => 'default',
            'member' => '',
            'post_type' => 'team',
            'image_type' => 'background',
            'input_type' => 'custom',
            'ratio' => '1x1',
            'space' => 'no',
            'categories' => '',
            'count' => '3',
            'column' => '3',
            'carousel' => 'yes',
            'contentposition' => 'center',
            'kendo_input_type' => 'custom',
            'kendo_hover' => 'hover-style-cover',
            'kendo_carousel_layout' => 'default',
            'kendo_carousel' => '',
            'kendo_member' => '',
            'title_show' => 'yes',
            'space_size' => 'collapse',
            'kendo_count' => '-1',
            'show' => '3',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_team', $atts );
        $extra_class .= ' '.$css_class;
        $c_class = $extra_class;
        $extra_class .= ' content-position-'.$contentposition;

        if ($style == 'hover_social') {
            $args = array(
                'post_type' => 'team',
                'posts_per_page' => -1,
                'ignore_sticky_posts' => true,
            );
            $posts_query = new WP_Query($args);
            $posts_item = '';
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                $img_url = $data = $social ='';
                $name = Themeton_Std::getmeta('first_name').' '. Themeton_Std::getmeta('last_name');
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ),"full")[0];
                $social = json_decode(Themeton_Std::getmeta('meta_option_name'),true);
                foreach ($social['contents'] as $value) {
                    $data .= '<a href="'.$value['content'].'" target="_blank"><i class="'.$value['label'].'"></i></a>';
                }
                $posts_item .= '<div class="item">';
                $posts_item .= '<div class="hover_social_style">
                    <div class="team" style="background-image:url('.$img_url.'); background-size:cover; background-repeat:no-repeat; background-position:center center;">
                        <div class="overlay">
                            <div class="social_icon uk-flex uk-flex-center">
                            '.$data.'
                            </div>
                        </div>
                    </div>
                    <div class="meta mt3">
                    <h4 class="m0"><a href="'.get_the_permalink().'">'.$name.'</a></h4>
                    <span>'.Themeton_Std::getmeta('position').'</span>
                    </div>
                </div>';
                $posts_item .= '</div>';
            }
            wp_reset_postdata();
            return '<div class="hover-team-owl owl-theme '.$c_class.'">'.$posts_item.'</div>';
        }
        if ($style == 'default') {
            $member = vc_param_group_parse_atts($member);
            if (isset($carousel) && $carousel == 'yes') {
             $result ='<div uk-slider>';
           }else{
               $result = '<div class="uk-grid '.$extra_class.'"><div class="uk-width-1-1@m uk-text-center"></div>';
           }

            $cls = '';
            
            $spacehtml='';
            if($space=='yes'){
                $spacehtml.='uk-grid-'.$space_size;
            }else{
                $spacehtml.='';
            }
    
            if (isset($carousel) && $carousel == 'yes') {
                $result .= '<div class="uk-grid uk-slider-items uk-child-width-1-2@s uk-child-width-1-'.abs($column).'@m uk-grid-small">';
                $class='slide'; 
            } else {
                $gridclass = 'uk-width-1-1@s uk-width-1-3@m';
                if(abs($column) >1)$gridclass = 'uk-width-1-1@s uk-width-1-'.abs($column).'@m';
                $result .= '<div class="'.$spacehtml.' uk-grid mungu-team-container-no uk-scrollspy">';
                $class='team-response uk-grid-margin '.$gridclass;
            }
    
    
            // build query
            $args = array(
                'post_type' => 'team',
                'posts_per_page' => $count,
                'ignore_sticky_posts' => true,
            );
            $cats = array();
            if( !empty($categories) ){
                $exps = explode(",", $categories);
                foreach($exps as $val){
                    if( (int)$val>-1 ){
                        $cats[]=(int)$val;
                    }
                }
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'team_category',
                        'terms' => $cats,
                        'field' => 'term_id'
                    )
                );
            }
    
            $meta_query = array();
    
            $args['meta_query'] = $meta_query;
    
            $posts_query = new WP_Query($args);
            $post_result = '';
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
    
                $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), get_template().'-vc-ceo-team', false, array('class'=>'mungu-team-img','alt'=>Themeton_Std::getmeta('first_name') .' '. Themeton_Std::getmeta('last_name')) )[0];
                $shadow = 'team-shadow';
    
                $firstname = get_the_title();
                if(Themeton_Std::getmeta('first_name')!='') {
                    $firstname = Themeton_Std::getmeta('first_name').' '. Themeton_Std::getmeta('last_name');
                }
                $title_html ='';
                if($title_show=='yes'){
                    $title_html.=' <div class="mungu-seo-message '.$cls.'">
                        <h4>'. $firstname .'</h4>
                        <span>'. Themeton_Std::getmeta('position') .'</span>
                    </div>';
                }else{
                    $title_html.='';
                }
                if($image_type == 'circle'){
                    $post_result .='<div class="mungu-element image-circle '.$class.'">
                                        <div class="uk-flex uk-flex-center mungu-item">
                                            <div class="entry-hover"></div>
                                            <div class="uk-inline ">
                                            <a href="'.get_the_permalink().'"> 
                                                <div class="mungu-team-circle-img">
                                                <img src="'.$img_url.'" alt="'.esc_attr('Circle item','mungu').'">
                                                </div>
                                                <div class="mungu-seo-message '.$cls.'">
                                                    <h4>'. $firstname .'</h4>
                                                    <span>'. Themeton_Std::getmeta('position') .'</span>
                                                </div>
                                            </a>   
                                            </div>
                                        </div>
                                    </div>';
                }elseif($image_type == 'octogon'){
                    $post_result .='<div class="mungu-element image-octogn '.$class.'">
                        <div class="uk-flex uk-flex-center mungu-item">
                            <div class="uk-inline ">
                            <a href="'.get_the_permalink().'"> 
                                <div class="mungu-team-ogtogon">
                                <div class="mungu-team-ogtogon1 ">
                                     <img src="'.$img_url.'" alt="'.esc_attr('octogon item','mungu').'">
                                </div>
                                </div>
                                <div class="mungu-seo-message uk-text-center mt2 '.$cls.'">
                                    <h4>'. $firstname .'</h4>
                                </div>
                            </a>   
                            </div>
                        </div>
                    </div>';
                }else{
                    $post_result .='<div class="mungu-element '.$class.'">
                        <div class="uk-flex uk-flex-center mungu-team full-size">
                            <div class="uk-inline mungu-item full-size">
                            <a href="'.get_the_permalink().'" class=""> 
                                <div class="themeton-image uk-transition-toggle" data-src="'. $img_url .'">
                                    <img src="'.get_template_directory_uri().'/images/dim/'.$ratio.'.png" alt="'.esc_attr__('Ratio', 'themetonaddon').'"/>
                                    <div class="uk-transition-fade uk-animation-toggle uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                                        <span class="uk-animation-slide-bottom-small text-white uk-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20">
                                                <path fill="none" stroke="#000" stroke-width="1.1" d="M10.625,12.375 L7.525,15.475 C6.825,16.175 5.925,16.175 5.225,15.475 L4.525,14.775 C3.825,14.074 3.825,13.175 4.525,12.475 L7.625,9.375"></path> <path fill="none" stroke="#000" stroke-width="1.1" d="M9.325,7.375 L12.425,4.275 C13.125,3.575 14.025,3.575 14.724,4.275 L15.425,4.975 C16.125,5.675 16.125,6.575 15.425,7.275 L12.325,10.375"></path>
                                                <path fill="none" stroke="#000" stroke-width="1.1" d="M7.925,11.875 L11.925,7.975"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                               '.$title_html.'
                            </a>
                        </div>
                    </div>
                </div>';
                }
            }
    
            if (isset($member)) {
    
               $image= $member_result = '';
                
                foreach ((array)$member as  $value) {
    
                    if (isset($value['firstname'])) $firstname = $value['firstname'];
                    else $firstname = '';
    
                    if (isset($value['lastname'])) $lastname = $value['lastname'];
                    else $lastname = '';
    
                    if (isset($value['position'])) $position = $value['position'];
                    else $position = '';
                    if (isset($value['link'])) $link = $value['link'];
                    else $link = '';
    
                    $image = isset($value['image'])?$value['image']:'';
    
                    $img_url = wp_get_attachment_image_src($image,"medium")[0];
    
                    $shadow = 'team-shadow';
    
                    if ($firstname == '' && $lastname == '' && $position == '') { $shadow = ''; $cls="clear-top"; }
    
                    $member_result .= '<div class="mungu-element customteam '.$class.'">
                            <div class="uk-flex uk-flex-center mungu-team">
                            <div class="uk-inline mungu-item">
                             <a href="'.$link.'"> 
                                <div class="mungu-team-img" data-bg-image="'. $img_url .'"></div></a>
                                <div class="uk-position-cover uk-overlay '.$shadow.'"></div>
                                <div class="mungu-seo-message '.$cls.'">
                                <h4>'.$firstname.' '.$lastname.'</h4>
                                <span>'.$position.'</span>
                            </div></div></div>
                        </div>';
                }
    
            }
    
            if($input_type =='custom'){
                $result.= $member_result;
            }else{
                $result .= $post_result;
            }
    
            if (isset($carousel) && $carousel == 'yes'){
                $result .= '</ul></div>';
                $result .= '<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>';
            }else {
                $result .= '</div>';
            }
    
            $result .= '</div>';
            wp_reset_postdata();
            return $result;
        }
        elseif ($style=='kendo') {
            $c=1; $carousel_grid = $carousel_list = $item = $grid_list = '';
            if ($kendo_input_type=='custom') {
                $member = vc_param_group_parse_atts($kendo_member);
                $member_item = '';
                $animete_class1 = $animete_class2 = $mb ='';
                if ($kendo_hover == 'hover-style-cover') {
                    $animete_class1 = 'uk-inline-clip uk-transition-toggle';
                    $animete_class2 = 'uk-transition-slide-bottom';
                    $mb = 'mb4';
                }
                else {
                    $mb = 'mb15';
                }
                if (isset($member)) {
                    foreach ((array)$member as $value) {
                        extract($value);
                        $link = '';
                        $link = vc_build_link($link);
                        if (isset($link)) {
                            $target = $title = $rel = '';
                            $url = 'javascript:;';
                            if (isset($link['target'])) $target = "target='".$link['target']."'";
                            if (isset($link['title'])) $title = "title='".$link['title']."'";
                            if (isset($link['rel'])) $rel = "rel='".$link['rel']."'";
                            if (isset($link['url'])) $url = $link['url'];
                            $link = sprintf("<a href='%s' %s %s %s>",$url,$title,$rel,$target);
                        }
                        $firstname = (isset($firstname)) ? $firstname : "";
                        $lastname = (isset($lastname)) ? $lastname : "";
                        $club = (isset($club)) ? $club : "";
                        $dan = (isset($dan)) ? $dan : "";
                        $point = (isset($point)) ? $point : "";
                        $rank = (isset($rank)) ? $rank : "";
                        $image = (isset($image)) ? $image : "";
                        $img_url = wp_get_attachment_image_src($image,"full")[0];
                        if ($img_url!='') $img_url = "style='background-image:url($img_url)'";
                        $hover_label = "<div class='hover $animete_class1'>
                            <ul class='pl4 $animete_class2'>
                            <li><i>".esc_html( 'Name:' , 'mungu' )."</i> <span>$firstname</span></li>
                            <li><i>".esc_html( 'Club:' , 'mungu' )."</i> <span>$club</span></li>
                            <li><i>".esc_html( 'Dan:' , 'mungu' )."</i> <span>$dan</span></li>
                            <li><i>".esc_html( 'Point:' , 'mungu' )."</i> <span>$point</span></li>
                            </ul>
                        </div>";
                        $label = "<div class='uk-padding team-label'><h3>$firstname $lastname</h3>$position</div>";
                        $member_item .= "<div class='team-bushido $mb'>
                            <h1>$rank</h1>
                            $link<div $img_url class='uk-background-cover uk-background-norepeat uk-position-relative bushido-team-item $kendo_hover'>
                            $label
                            $hover_label
                            </div></a>
                        </div>";
                        $item = "<div class='team-bushido $mb'>
                            <h1>$rank</h1>
                            $link<div $img_url class='uk-background-cover uk-background-norepeat uk-position-relative bushido-team-item $kendo_hover'>
                            $label
                            $hover_label
                            </div></a>
                        </div>";
                        if ($kendo_carousel_layout=='grid') {
                            $grid_list .= $item;
                            if ($c==$show) {
                                $c=1;
                                $carousel_grid .= '<div class="item"><div class="uk-grid uk-grid-large uk-child-width-1-'.$column.'@m">'.$grid_list.'</div></div>';
                                $grid_list = '';
                            }
                        } elseif ($kendo_carousel_layout=='default') {
                            $carousel_list .= "<div class='item'>$item</div>";
                        }
                        $c++;
                    }
                }
                if ($kendo_carousel!='yes') return "<div class='uk-grid uk-grid-large uk-child-width-1-$column@m'>$member_item</div>";
                if ($kendo_carousel_layout=='grid') {
                    $result = '';
                    if ($carousel_grid!='') $result = '<div class="bushido-team-owl-grid owl-theme" data-kendoshow="1">'.$carousel_grid.'</div>';
                    return $result;
                }
                elseif ($kendo_carousel_layout=='default') return '<div class="bushido-team-owl owl-theme" data-kendoshow="'.$show.'">'.$carousel_list.'</div>';
                return "<div class='uk-grid uk-grid-large uk-child-width-1-$column@m'>$member_item</div>";
            }elseif ($kendo_input_type=='post') {
                $member_item = '';
                $animete_class1 = $animete_class2 = $mb ='';
                if ($kendo_hover == 'hover-style-cover') {
                    $animete_class1 = 'uk-inline-clip uk-transition-toggle';
                    $animete_class2 = 'uk-transition-slide-bottom';
                    $mb = 'mb10';
                }
                else {
                    $mb = 'mb15';
                }
                $args = array(
                    'post_type' => 'team',
                    'posts_per_page' => $kendo_count,
                    'ignore_sticky_posts' => true,
                );
                $posts_query = new WP_Query($args);
                $paged = $last_post = 0;
                $p = 1;
                if ($posts_query->post_count%$show==0) $paged = $posts_query->post_count/$show;
                else {
                    $paged = floor($posts_query->post_count/$show);
                    $last_post = $posts_query->post_count%$show;
                }
                while ( $posts_query->have_posts() ) {
                    $posts_query->the_post();
                    $img_url = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID()),"full")[0];
                    if ($img_url!='') $img_url = "style='background-image:url($img_url)'";
                    $firstname = Themeton_Std::getmeta('first_name');
                    $lastname = Themeton_Std::getmeta('last_name');
                    $link = '<a href="'.get_the_permalink().'">';
                    $meta = Themeton_Std::getmeta('meta_option_name');
                    $meta = json_decode($meta,true)['contents'];
                    $club = $dan = $point = $rank = '';
                    foreach ($meta as $value) {
                        if (strtolower($value['label'])=='club') $club = $value['content'];
                        if (strtolower($value['label'])=='dan') $dan = $value['content'];
                        if (strtolower($value['label'])=='point') $point = $value['content'];
                        if (strtolower($value['label'])=='rank') $rank = $value['content'];
                    }
                    $hover_label = "<div class='hover $animete_class1'>
                        <ul class='pl4 $animete_class2'>
                        <li><i>".esc_html( 'Name:' , 'mungu' )."</i> <span>$firstname</span></li>
                        <li><i>".esc_html( 'Club:' , 'mungu' )."</i> <span>$club</span></li>
                        <li><i>".esc_html( 'Dan:' , 'mungu' )."</i> <span>$dan</span></li>
                        <li><i>".esc_html( 'Point:' , 'mungu' )."</i> <span>$point</span></li>
                        </ul>
                    </div>";
                    $position = Themeton_Std::getmeta('position');
                    $label = "<div class='uk-padding team-label'><h3>$firstname $lastname</h3>$position</div>";
                    $member_item .= "<div class='team-bushido $mb'>
                        <h1>$rank</h1>
                        $link<div $img_url class='uk-background-cover uk-background-norepeat uk-position-relative bushido-team-item $kendo_hover'>
                        $label
                        $hover_label
                        </div></a>
                    </div>";
                    $item = "<div class='team-bushido $mb'>
                        <h1>$rank</h1>
                        $link<div $img_url class='uk-background-cover uk-background-norepeat uk-position-relative bushido-team-item $kendo_hover'>
                        $label
                        $hover_label
                        </div></a>
                    </div>";
                    if ($kendo_carousel_layout=='grid') {
                        $grid_list .= $item;
                        if ($p<=$paged) {
                            if ($c==$show) {
                                $c=0;
                                $carousel_grid .= '<div class="item"><div class="uk-grid uk-grid-large uk-child-width-1-'.$column.'@m">'.$grid_list.'</div></div>';
                                $grid_list = '';
                                $p++;
                            }
                        }
                        else {
                            if ($c==$last_post) {
                                $c=0;
                                $carousel_grid .= '<div class="item"><div class="uk-grid uk-grid-large uk-child-width-1-'.$column.'@m">'.$grid_list.'</div></div>';
                                $grid_list = '';
                                $p++;
                            }
                        }
                    } elseif ($kendo_carousel_layout=='default') {
                        $carousel_list .= "<div class='item'>$item</div>";
                    }
                    $c++;
                }
                wp_reset_postdata();
                if ($kendo_carousel!='yes') return "<div class='uk-grid uk-grid-large uk-child-width-1-$column@m'>$member_item</div>";
                if ($kendo_carousel_layout=='grid') {
                    $result = '';
                    if ($carousel_grid!='') $result = '<div class="bushido-team-owl-grid owl-theme" data-kendoshow="1" data-uk-scrollspy="cls: uk-animation-fade; target: .owl-stage .item .team-bushido; delay: 200; repeat: false">'.$carousel_grid.'</div>';
                    return $result;
                }
                elseif ($kendo_carousel_layout=='default') return '<div class="bushido-team-owl owl-theme" data-kendoshow="'.$show.'">'.$carousel_list.'</div>';
            }

        }
       
    }
}
}

vc_map( array(
    "name" => esc_html__('Team', 'themetonaddon'),
    "description" => esc_html__("You can add both custom and post", 'themetonaddon'),
    "base" => 'mungu_team',
    "icon" => "mungu-vc-icon mungu-vc-icon26",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Select element style", 'themetonaddon'),
            "value" => array(
                "Default" => "default",
                "Kendo" => "kendo",
                "Hover Social" => "hover_social"
            ),
            "holder" => "div",
            "std" => "default"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "kendo_input_type",
            "heading" => esc_html__("Content type", 'themetonaddon'),
            "value" => array(
                "Manual data from next group options" => "custom",
                "Team post type" => "post",
            ),
            "std" => "custom",
            "dependency" => Array("element" => "style", "value" => array("kendo")),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "kendo_count",
            "heading" => esc_html__("Number of post", 'themetonaddon'),
            "value" => '-1',
            "dependency" => Array("element" => "kendo_input_type", "value" => array("post")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "kendo_hover",
            "heading" => esc_html__("Hover effect", 'themetonaddon'),
            "value" => array(
                "Cover" => "hover-style-cover",
                "Down details" => "hover-style-down",
            ),
            "dependency" => Array("element" => "style", "value" => array("kendo")),
        ),
        array(
            "type" => "checkbox",
            "param_name" => "kendo_carousel",
            "heading" => esc_html__("Carousel?", 'themetonaddon'),
            "value" => array('Yes' => 'yes' ),
            "dependency" => Array("element" => "style", "value" => array("kendo")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "kendo_carousel_layout",
            "heading" => esc_html__("Carousel Layout", 'themetonaddon'),
            "value" => array(
                "Default" => "default",
                "Grid" => "grid",
            ),
            "dependency" => Array("element" => "kendo_carousel", "value" => array("yes")),
        ),
        array(
            "type" => "param_group",
            "param_name" => "kendo_member",
            "heading" => esc_html__("Our team members", 'themetonaddon'),
            "dependency" => Array("element" => "kendo_input_type", "value" => array("custom")),
            "params" => array(
                array(
                    "type" => "textfield",
                    "param_name" => "rank",
                    "heading" => esc_html__("Rank number", 'themetonaddon'),
                    'description' => esc_html__('Example:#1,1 ... etc', 'themetonaddon'),
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "firstname",
                    'admin_label' => true,
                    "heading" => esc_html__("Firstname", 'themetonaddon'),
                    'holder' => 'div',
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "lastname",
                    'admin_label' => true,
                    "heading" => esc_html__("Lastname", 'themetonaddon'),
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "position",
                    'admin_label' => true,
                    "heading" => esc_html__("Position", 'themetonaddon'),
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "club",
                    "heading" => esc_html__("Club name", 'themetonaddon'),
                    'description' => esc_html__('Example:Chikara, Orgil, UB kendo ... etc', 'themetonaddon'),
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "dan",
                    "heading" => esc_html__("Dan", 'themetonaddon'),
                    'description' => esc_html__('Example:1 Shodan, 2 Nidan, 3 Sandan ... etc', 'themetonaddon'),
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "point",
                    "heading" => esc_html__("Point", 'themetonaddon')
                ),
                array(
                    "type" => "vc_link",
                    "param_name" => "link",
                    "heading" => esc_html__("Link", 'themetonaddon'),
                ),
                array(
                    "type" => "attach_image",
                    "param_name" => "image",
                    "heading" => esc_html__("Attachment image", 'themetonaddon'),
                ),
            ),
        ),
        array(
            "type" => "checkbox",
            "param_name" => "carousel",
            "heading" => esc_html__("Carousel?", 'themetonaddon'),
            "value" => array('Yes' => 'yes' ),
            "std"   => "yes",
            "dependency" => Array("element" => "style", "value" => array("default")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "contentposition",
            "heading" => esc_html__("Content align position", 'themetonaddon'),
            "value" => array(
                "Center" => "center",
                "Left" => "left",
                "Right" => "right",
            ),
            "std" => "center",
            "dependency" => Array("element" => "carousel", "value" => array("yes")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "space",
            "heading" => esc_html__("Space", 'themetonaddon'),
            "value" => array(
                "No" => "yes",
                "Yes" => "no"
            ),
            "std" => "no",
            "dependency" => Array("element" => "style", "value" => array("default")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "space_size",
            "heading" => esc_html__("Space grid size", 'themetonaddon'),
            "value" => array(
                "Small" => "small",
                "Medium" => "medium",
                "Large" => "large",
                "Collapse" => "collapse"
            ),
            "std" => "collapse",
            "dependency" => Array("element" => "space", "value" => array("yes")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "input_type",
            "heading" => esc_html__("Content type", 'themetonaddon'),
            "value" => array(
                "Manual data from next group options" => "custom",
                "Team post type" => "post",
            ),
            "std" => "custom",
            "dependency" => Array("element" => "style", "value" => array("default")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "image_type",
            "heading" => esc_html__("Image type", 'themetonaddon'),
            "value" => array(
                "Circle" => "circle",
                "Background" => "background",
                "Octogon" => "octogon",

            ),
            "std" => "background",
            "dependency" => Array("element" => "input_type", "value" => array("post")),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "title_show",
            "heading" => esc_html__("Title show ", 'themetonaddon'),
            "value" => array(
                "Show" => "yes",
                "Hide" => "no",
            ),
            "std" => "yes",
            "dependency" => Array("element" => "image_type", "value" => array("background")),
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
            "dependency" => Array("element" => "image_type", "value" => array("background"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Number of post", 'themetonaddon'),
            "value" => '3',
            "dependency" => Array("element" => "input_type", "value" => array("post")),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "column",
            "heading" => esc_html__("Columns", 'themetonaddon'),
            "value" => '3'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "show",
            "heading" => esc_html__("Show number", 'themetonaddon'),
            "value" => '3',
            "dependency" => Array("element" => "style", "value" => array("kendo")),
        ),
        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Specify category Id or leave blank to display items from all categories.", 'themetonaddon'),
            "value" => '',
            "dependency" => Array("element" => "style", "value" => array("default")),
        ),
        array(
            "type" => "param_group",
            "param_name" => "member",
            "heading" => esc_html__("Our team members", 'themetonaddon'),
            "dependency" => Array("element" => "input_type", "value" => array("custom")),
            "params" => array(
                array(
                    "type" => "textfield",
                    "param_name" => "firstname",
                    'admin_label' => true,
                    "heading" => esc_html__("Firstname", 'themetonaddon'),
                    'holder' => 'div',
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "lastname",
                    'admin_label' => true,
                    "heading" => esc_html__("Lastname", 'themetonaddon'),
                    'holder' => 'div',
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "position",
                    "heading" => esc_html__("Position", 'themetonaddon'),
                    'description' => esc_html__('Example: Designer, Art Director, Developer ... etc', 'themetonaddon'),
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "link",
                    "heading" => esc_html__("Link", 'themetonaddon'),
                    'description' => esc_html__('url ....', 'themetonaddon'),
                ),
                array(
                    "type" => "attach_image",
                    "param_name" => "image",
                    "heading" => esc_html__("Attachment image", 'themetonaddon'),
                ),
            ),
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