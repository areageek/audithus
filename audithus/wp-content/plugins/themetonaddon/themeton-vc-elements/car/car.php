<?php
if (!class_exists('WPBakeryShortCode_mungu_carrental')) {
class WPBakeryShortCode_mungu_carrental extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'count' => '6',
            'column' => '2',
            'layout' => 'list',
            'rent_type' => 'style1',
            'filter_widget' => 'yes',
            'pager' => 'no',
            'post_type' => 'rent',
            'categories' => '',
            'excerpt_length'  => '25',
            'title_position'=>'bottom',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'mungu_carrental', $atts );
        $extra_class .= ' '.$css_class;

        // Build category ids
        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }
        // build category ids
        $cats = array();
        if( !empty($categories) ){
            $exps = explode(",", $categories);
            foreach($exps as $val){
                if( (int)$val>-1 ){
                    $cats[]=(int)$val;
                }
            }
        }
        // build query
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $count,
            'category' => 'rent_category',
            'ignore_sticky_posts' => true,
            'paged' => $paged
        );
        if(!empty($cats)){
            $args['tax_query'] = array(
                'relation' => 'IN',
                array(
                    'taxonomy' => $post_type.'_category',
                    'field' => 'id',
                    'terms' => $cats
                ) 
            );
        }

        $cat_array = array();
        $items = '';
        $grid_class = '';
        $filter_html = $widget_html ='';
        $img = '';
        $posts_query = new WP_Query($args);
        
        //post_type
 if($posts_query->have_posts()) {
    while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            
            
            $img_html='';
            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
                $img_html ="<div class='car-thumb' data-bg-image='".$img."'><div class='entry-hover'></div></div>";
            }

           // Categories
           $cats = '';
           $last_cat = '';
           $cat_titles = array();
           $terms = wp_get_post_terms(get_the_ID(), 'rent_category');
            if (!isset($terms->errors))
           foreach ($terms as $term){
                if (isset($term->term_id)) {
                    $cat_title = $term->name;
                    $cat_slug = $term->slug;
     
                    $cat_titles []= $cat_title;
                    if( !in_array($term->term_id, $cat_array) ){
                        $filter_html .= '<li><input class="uk-checkbox" type="checkbox"><a href="javascript:;" class="filter-item" data-filter=".'.$cat_slug.'">'. $cat_title .'</a></li>';
                        $cat_array[] = $term->term_id;
                    }
     
                    $cats .= "$cat_slug";
                    $last_cat = $cat_title;
                }
           }
           
            

            $meta_item  = $stars = '';
            for( $i=0; $i < 5; $i++) {
              $color_class = '';
              if( $i < (int)Themeton_Std::getmeta('star') ) { $color_class = 'color-yellow'; }
                $stars .= "<span class='fa fa-star $color_class'></span>";
            }

            $rate ="<div class='rate'>  $stars  </div>";  
   
            $meta_items = Themeton_Std::getmeta_type_list('meta_option_name'); // return array     
            
            if(!empty($meta_items)){
                    foreach ($meta_items as $item  ) {
                        $meta_item .= '<li>'.'<span>'.$item['label'].'</span>'.'&nbsp;'.$item['content'];
                    }
            }

            $rent_html = '';
            if($rent_type == 'style1'){
                $rent_html.="<div class='car-grid-item uk-card-hover uk-box-shadow-small uk-position-relative'> 
                    <a href='".get_the_permalink()."'>".$img_html." <span class='deals'>".Themeton_Std::getmeta('rent_type')."</span></a>
                    <div class='meta-title uk-padding pl4'> <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3> </a> <p class='price'>".Themeton_Std::getmeta('car_price')."</p></div>
                    <div class='entry-meta'>
                        <div class='uk-grid uk-padding'>
                            <div class='uk-width-2-3 nxc-meta'>
                                <p> <img src='".get_template_directory_uri()."/images/icon_petroltank.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('full type','themetonaddon')." </p>  
                                <p> <img src='".get_template_directory_uri()."/images/icon_seat.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('seats','themetonaddon')." </p>    
                                <p> <img src='".get_template_directory_uri()."/images/icon_gear.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('Transmission','themetonaddon')." </p> 
                            </div>
                            <div class='uk-width-auto nxc-meta uk-padding-remove'>
                                <p class='price'>".Themeton_Std::getmeta('fuel_type')."</p>
                                <p class='price'>".Themeton_Std::getmeta('seats')."</p>
                                <p class='price'>".Themeton_Std::getmeta('transmission')."</p>
                            </div>
                        </div>
                        <a href='".get_the_permalink()."' class='uk-button uk-button-defualt'>".esc_html('rent it','mungu')."</a>
                    </div>
                </div>";
            }elseif($rent_type == 'style2'){
                $rent_html .= "<div class='car-feature' data-bg-image='".$img."'> <a href='".get_the_permalink()."'>More</a> <div class='entry-hover'></div><p class='price'>".Themeton_Std::getmeta('car_price')."</p></div>
                <div class='entry-meta uk-card-hover'>
                    <div class='meta-title pl4 uk-padding'><h3>".get_the_title()."</h3> ".$rate."</div>
                    <div class='uk-grid uk-padding'>
                        <div class='uk-width-2-3 nxc-meta'>
                            <p> <img src='".get_template_directory_uri()."/images/icon_petroltank.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('full type','themetonaddon')." </p>  
                            <p> <img src='".get_template_directory_uri()."/images/icon_seat.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('seats','themetonaddon')." </p>    
                            <p> <img src='".get_template_directory_uri()."/images/icon_gear.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('Transmission','themetonaddon')." </p> 
                        </div>
                        <div class='uk-width-auto nxc-meta style2 uk-padding-remove'>
                        <p class='price'>".Themeton_Std::getmeta('fuel_type')."</p>
                        <p class='price'>".Themeton_Std::getmeta('seats')."</p>
                        <p class='price'>".Themeton_Std::getmeta('transmission')."</p>
                        </div>
                    </div>
                </div>";
            }elseif($rent_type == 'style3'){
                $rent_html .="<div class='car-grid-item style3 uk-card-hover uk-position-relative'> 
                <a href='".get_the_permalink()."'><div class='car-thumb' data-bg-image='".$img."'><p class='uk-position-absolute'>".Themeton_Std::getmeta('car_price')."</p><div class='entry-hover'></div></div> 
                     <span class='deals'>".Themeton_Std::getmeta('rent_type')."</span> 
                     </a>
                    <div class='meta-title uk-padding pl4'> 
                        <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>  
                        <span>".$last_cat."</span>
                      </div>
                <div class='entry-meta style3'>
                    <div class='uk-grid uk-padding-remove uk-margin-remove'>
                       <div class='uk-width-2-3'>
                            <ul class='meta-details'>
                                ".$meta_item."
                            </ul>
                       </div>
                       <div class='uk-width-expand uk-flex uk-flex-middle uk-padding-remove'>
                            <a href='".get_the_permalink()."' class='uk-button uk-button-defualt'>".esc_html__('details','themetonaddon')."</a>
                       </div>
                    </div>
                </div>
            </div>";
            }elseif($rent_type == 'style4'){
                $rent_html .="style 4";
            }

            if($layout == 'list'){
                $items.= "<div class='uk-grid uk-width-1-1@m ml0@s pl0@s'>
                            <div class='uk-width-1-2@m pl0@s uk-position-relative'><a href='".get_the_permalink()."'><div class='car-thumb' data-bg-image='".$img."'><div class='entry-hover'></div></div> 
                            <span class='deals'>".Themeton_Std::getmeta('rent_type')." </span> 
                            </a></div>
                            <div class='uk-width-1-2@m pl0@s content '>
                                <div class='meta-title uk-padding-small pt4 pb0'> 
                                    <p>".Themeton_Std::getmeta('car_price')."</p>
                                    <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>  
                                    <span>".$last_cat."</span>
                                </div>
                                <ul class='meta-details'>
                                    ".$meta_item."
                                </ul>
                                <a href='".get_the_permalink()."' class='uk-button uk-button-defualt'>".esc_html__('details','themetonaddon')."</a>
                            </div>
                          </div>";
            }else{
                $items.= "<div class='uk-margin-medium-bottom uk-position-relative pl0@s uk-width-1-".$column."@m'>$rent_html</div>";
            }
        }
}
 else {
            return "There is no <i>$post_type</i> posts. Please instert your posts in <i>$post_type</i> post type or select different post type.";

        }

        // Pager
        $pagination = '';
        $pager_result = '';
        if( $pager=='yes' ){
            $pagination = Themeton_Tpl::pagination($posts_query);
            if( !empty($pagination) ){
                $pager_result .= "<div class='pagination-container uk-flex uk-flex-center uk-width-1-1@m'>$pagination<div class='uk-clearfix clearfix'></div></div>";
            }
        }
        else{
            $pagination;
        }
        // reset query
        wp_reset_postdata();

        if($filter_widget == 'yes'){
            $terms = get_terms( array(
                'taxonomy' => 'rent_category',
                'orderby' => 'id',
                'order'   => 'DESC',
                'parent' => 0,
                'hide_empty' => false,
            ) );
            $cat = '';
            foreach ($terms as $value)
            $cat .= "<li><input class='uk-checkbox' type='checkbox' data-cat-id='".$value->term_id."'> ".$value->name."</li>";
            $terms = get_terms( array(
                'taxonomy' => 'rent_tag',
                'orderby' => 'id',
                'order'   => 'DESC',
                'parent' => 0,
                'hide_empty' => false,
            ) );
            $tag = '';
            foreach ($terms as $value)
            $tag .= "<li><input class='uk-checkbox' type='checkbox' data-tag-id='".$value->term_id."'> ".$value->name."</li>";
            $args = array(
                'post_type' => 'rent',
                'posts_per_page' => -1,
                'ignore_sticky_posts' => true
            );
            $posts_query = new WP_Query($args);
            $price = array();
            $seats = array(); 
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                $st1 = '';
                $str = str_replace('$','',Themeton_Std::getmeta('car_price'));
                for ($i=0; $i<strlen($str); $i++)
                {
                    if ($str[$i]!='.') $st1 .= $str[$i];
                    else break;
                }
                $price[] = $st1;
                $seats[] = Themeton_Std::getmeta('seats');
            }
            $max_price = $min_price = 0;
            if (isset($price)) {
                $max_price = $min_price = $price[0];
                foreach ($price as $value) {
                    if ($max_price < $value) $max_price = $value;
                    if ($min_price > $value) $min_price = $value;
                }
            }
            $max_seats = $min_seats = 1;
            if (isset($seats)) {
                $max_seats = $seats[0];
                foreach ($seats as $value) {
                    if ($max_seats < $value) $max_seats = $value;
                    if ($min_seats > $value) $min_seats = $value;
                }
            }
            wp_reset_postdata();
            if ($rent_type=='style3' || $layout=='list') {
                $args1 = array(
                    'post_type' => 'rent',
                    'posts_per_page' => -1,
                    'ignore_sticky_posts' => true
                );
                $posts_query1 = new WP_Query($args1);
                $price = $sf = array();
                $bed_max = $bed_min = $bath_max = $bath_min = 1;
                while ( $posts_query1->have_posts() ) {
                    $posts_query1->the_post();
                    $str = str_replace('$','',Themeton_Std::getmeta('car_price'));
                    $str = str_replace(',','',$str);
                    $price[] = $str;
                    $meta_items = Themeton_Std::getmeta_type_list('meta_option_name');
                    foreach($meta_items as $value) {
                        if ($value['content']=='sf') $sf[]=$value['label'];
                        if (strtolower($value['content'])=='bed') {
                            if ($value['label']>$bed_max) $bed_max = $value['label'];
                            if ($value['label']<$bed_min) $bed_min = $value['label'];
                        }
                        if (strtolower($value['content'])=='bath') {
                            if ($value['label']>$bath_max) $bath_max = $value['label'];
                            if ($value['label']<$bath_min) $bath_min = $value['label'];
                        }
                    }
                }
                wp_reset_postdata();
                if (isset($price)) {
                    $max_price = $min_price = $price[0];
                    foreach ($price as $value) {
                        if ($max_price <= $value) $max_price = $value;
                        if ($min_price >= $value) $min_price = $value;
                    }
                }
                if (isset($sf)) {
                    $max_floor = $min_floor = $sf[0];
                    foreach ($sf as $value) {
                        if ($max_floor <= $value) $max_floor = $value;
                        if ($min_floor >= $value) $min_floor = $value;
                    }
                }
                $widget_html.="<div class='uk-width-1-4@m uk-padding-remove uk-box-shadow-small realstate-widget cwidgetd ml3@s' data-layout='$layout' data-page-count='$count'>
                <div class='cwidget-title uk-padding-small'>
                    <h2>FILTER SECTION</h2>
                </div>
                <div class='uk-padding mt4 uk-padding-remove-top'>
                <h3>PROPERTY TYPE</h3>
                    <select class='uk-select real_rent_type'>
                        <option>Select Property</option>
                        <option value='rent'>Rent</option>
                        <option value='buy'>Buy</option>
                    </select>
                </div>
                <div data-car-pmax='$max_price' data-car-pmin='$min_price'></div>
                <div class='price-range uk-padding uk-padding-remove-top'>
                <h3>PRICE RANGE</h3>
                    <div id='range-slider-with-tooltip' class='car-rent-range'></div>
                </div>
                <div class='price-range  uk-padding uk-padding-remove-top'>
                    <h3>FLOOR SPACE</h3>
                    <div data-car-smax='$max_floor' data-car-smin='$min_floor'></div>
                    <div id='range-slider-with-tooltip1' class='car-rent-range'></div>
                </div>
                <div class='uk-padding mt4 uk-padding-remove-top'>
                <h3>FACILITIES</h3>
                    <ul class='filter'> 
                        <li>Bedroom <input class='uk-form-width-xsmall real_bedroom' type='number' value='1' max='$bed_max' min='$bed_min'></li>
                        <li>Bathroom <input class='uk-form-width-xsmall real_bathroom' type='number' value='1' max='$bath_max' min='$bath_min'></li>
                        <li>Living Room <input class='uk-checkbox living_room' type='checkbox'></li>
                        <li>swimming pool <input class='uk-checkbox swimming_pool' type='checkbox'></li>
                    </ul>
                </div>
                <div class='uk-padding mt4 uk-padding-remove-top uk-flex uk-flex-center'>
                    <button id='real-ajax-btn' class='uk-button uk-button-default'>Search Now</button>
                </div>
            </div> ";
            }
            else {
            $widget_html.="<div class='uk-width-1-3@m uk-padding-remove cwidgetd ml3@s'>
            <div class='uk-box-shadow-small pb5'>
            <div class='cwidget-title'>
                <h2>Filter vechiles</h2>
            </div>
            <div data-car-pmax='$max_price' data-car-pmin='$min_price'></div>
            <div class='price-range uk-padding'>
            <h3>Price Range Per Hour</h3>
            <div id='range-slider-with-tooltip' class='car-rent-range'></div>
            </div>
            <div class='uk-padding mt4 uk-padding-remove-top'>
            <h3>Company</h3>
            <ul class='filter'>
                $tag
            </ul>
            </div>
            <div class='price-range  uk-padding'>
                <h3>Number Of Passangers</h3>
                <div data-car-smax='$max_seats' data-car-smin='$min_seats'></div>
                <div id='range-slider-with-tooltip1' class='car-rent-range'></div>
            </div>
            <div class='uk-padding mt4 uk-padding-remove-top'>
            <h3>Vechichle Type</h3>
                <ul class='filter'> 
                $cat
                </ul>
            </div>
            <div class='uk-padding mt4 uk-padding-remove-top'>
                <button id='car-ajax-btn' class='uk-button uk-button-default'>Search Now</button>
            </div>
            </div>
        </div> ";
            }
        }else{
            $widget_html.='';
        }

        // filter
        $grid_class.='';
        if($layout == 'grid'){
            $grid_class .="carrentalgrid uk-grid-medium uk-child-width-1-".$column."@m uk-child-width-1-1@s";
        }
        else{
            $grid_class.='list-item';
        }
        return "<div class='uk-grid $grid_class $extra_class'>
                    $widget_html
                    <div class='uk-width-expand@m uk-grid car-ajax ml0@s mt5@s'>
                        $items
                        $pager_result
                    </div> 
                </div>";
    }
}
}

function mungu_carrental() {
    global $paged;
    if( is_front_page() ){
        $paged = get_query_var('page') ? get_query_var('page') : 1;
    }
    $filter = 0;
    $categories = '';
    if ($_POST['cat_ids']!='') {
        $categories = $_POST['cat_ids'];
        $categories = explode(',',$categories);
        $categories = array(
            'taxonomy' => 'rent_category',
            'field'    => 'term_id',
            'terms'    => $categories,
            'operator' => 'IN',
        );
        $filter = 1;
    }
    $tags = '';
    if ($_POST['tag_ids']!='') {
        $tags = $_POST['tag_ids'];
        $tags = explode(',',$tags);
        $tags = array(
            'taxonomy' => 'rent_tag',
            'field'    => 'term_id',
            'terms'    => $tags,
            'operator' => 'IN',
        );
        $filter = 1;
    }
    $max_price = $min_price = '';
    if ($_POST['max_price']!='') $max_price = '$'.$_POST['max_price'].'.00 /hour';
    if ($_POST['min_price']!='') $min_price = '$'.$_POST['min_price'].'.00 /hour';

    $meta_max_price = $meta_min_price = '';
    if ($max_price!='' && $min_price!='') {
        $meta_max_price = array(
            'key'     => '_car_price',
            'value'   => $max_price,
            'compare' => '<=',
        );
        $meta_min_price = array(
            'key'     => '_car_price',
            'value'   => $min_price,
            'compare' => '>=',
        );
        $filter = 1;
    }
    $meta_max_seats = $meta_min_seats = '';
    if ($_POST['min_seats']!='' && $_POST['max_seats']) {
        $meta_max_seats = array(
            'key'     => '_seats',
            'value'   => $_POST['max_seats'],
            'compare' => '<=',
        );
        $meta_min_seats = array(
            'key'     => '_seats',
            'value'   => $_POST['min_seats'],
            'compare' => '>=',
        );
        $filter = 1;
    }
    $args = array(
        'post_type' => 'rent',
        'posts_per_page' => 6,
        'tax_query' => array(
            'relation' => 'AND',
            $categories,
            $tags,
        ),
        'meta_query' => array(
            'relation' => 'AND',
            $meta_min_price,
            $meta_max_price,
            $meta_min_seats,
            $meta_max_seats,
        ),
        'ignore_sticky_posts' => true,
        'paged' => $paged
    );
    
    $posts_query = new WP_Query($args);
    while ( $posts_query->have_posts() ) {
        $posts_query->the_post();
        if( has_post_thumbnail() ){
            $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
            $img = !empty($img) ? $img[0] : '';
        }
        $meta_item  = $stars = '';
        for( $i=0; $i < 5; $i++) {
          $color_class = '';
          if( $i < (int)Themeton_Std::getmeta('star') ) { $color_class = 'color-yellow'; }
            $stars .= "<span class='fa fa-star $color_class'></span>";
        }

        $rate ="<div class='rate'>  $stars  </div>";  
        $items.= "
        <div class='uk-margin-medium-bottom uk-position-relative uk-width-1-2@m pl0@s'>
        <div class='car-feature' style='background:url(".$img."); background-size:cover;' data-bg-image='".$img."'> <a href='".get_the_permalink()."'>More</a> <div class='entry-hover'></div><p class='price'>".Themeton_Std::getmeta('car_price')."</p></div>
        <div class='entry-meta uk-card-hover'>
            <div class='meta-title pl4 uk-padding'><h3>".get_the_title()."</h3> ".$rate."</div>
            <div class='uk-grid uk-padding'>
                <div class='uk-width-2-3 nxc-meta'>
                    <p> <img src='".get_template_directory_uri()."/images/icon_petroltank.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('full type','themetonaddon')." </p>  
                    <p> <img src='".get_template_directory_uri()."/images/icon_seat.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('seats','themetonaddon')." </p>    
                    <p> <img src='".get_template_directory_uri()."/images/icon_gear.png' alt='".esc_html__('Icon', 'themetonaddon')."'> ".esc_html__('Transmission','themetonaddon')." </p> 
                </div>
                <div class='uk-width-auto nxc-meta style2 uk-padding-remove'>
                <p class='price'>".Themeton_Std::getmeta('fuel_type')."</p>
                <p class='price'>".Themeton_Std::getmeta('seats')."</p>
                <p class='price'>".Themeton_Std::getmeta('transmission')."</p>
                </div>
            </div>
        </div>
        </div>";
    }
    wp_reset_postdata();
    echo sprintf('%s',$items);
    exit;
}

function mungu_realstate() {
    global $paged;
    if( is_front_page() ){
        $paged = get_query_var('page') ? get_query_var('page') : 1;
    }

    $args = array(
        'post_type' => 'rent',
        'posts_per_page' => -1,
        'ignore_sticky_posts' => true
    );
    $posts_query = new WP_Query($args);
    $postid = array();
    while ( $posts_query->have_posts() ) {
        $posts_query->the_post();
        $filter = 0;
        $price = str_replace('$','',Themeton_Std::getmeta('car_price'));
        $price = str_replace(',','',$price);
        if ($_POST['max_price'] < $price || $_POST['min_price'] > $price ) $filter = 1;
        $meta_items = Themeton_Std::getmeta_type_list('meta_option_name');
        $floor = $bed_number = $bath_number = '';
        foreach($meta_items as $value) {
            if ($value['content']=='sf') $floor=$value['label'];
            if (strtolower($value['content']) == 'bed') $bed_number = $value['label'];
            if (strtolower($value['content']) == 'bath') $bath_number = $value['label'];
        }
        if ($floor != '') if ($_POST['max_floor'] < $floor || $_POST['min_floor'] > $floor ) $filter = 1;
        if ($bed_number != '') if ($_POST['bedroom'] != $bed_number) $filter = 1;
        if ($bath_number != '') if ($_POST['bathroom'] != $bath_number) $filter = 1;
        if ($_POST['rent_type'] != 'Select Property') if ($_POST['rent_type'] != Themeton_Std::getmeta('rent_type')) $filter = 1;
        if ($filter == 0) $postid[] = get_the_ID();
    }
    wp_reset_postdata();
    $items = '';
    $args = array(
        'post_type' => 'rent',
        'posts_per_page' => -1,
        'ignore_sticky_posts' => true,
    );
    $posts_query = new WP_Query($args);
    $items = $rent_html = '';
    while ( $posts_query->have_posts() ) {
        $posts_query->the_post();
        if (in_array(get_the_ID(),$postid)) {
            $last_cat = '';
            $terms = wp_get_post_terms(get_the_ID(), 'rent_category');
             if (!isset($terms->errors))
            foreach ($terms as $term){
                 if (isset($term->term_id)) {
                     $cat_title = $term->name;
                     $last_cat = $cat_title;
                 }
            }
            $meta_item = '';
            $meta_items = Themeton_Std::getmeta_type_list('meta_option_name'); // return array     
            if(!empty($meta_items)){
                    foreach ($meta_items as $item  ) {
                        $meta_item .= '<li>'.'<span>'.$item['label'].'</span>'.'&nbsp;'.$item['content'];
                    }
            }
            $img = '';
            if( has_post_thumbnail() ){
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
            }
        if ($_POST['layout']=='grid') {
            $items .="<div class='uk-margin-medium-bottom uk-position-relative pl0@s uk-width-1-2@m'>
            <div class='car-grid-item style3 uk-card-hover uk-position-relative'> 
            <a href='".get_the_permalink()."'><div class='car-thumb' style='background:url($img); background-size:cover;' data-bg-image='".$img."'><p class='uk-position-absolute'>".Themeton_Std::getmeta('car_price')."</p><div class='entry-hover'></div></div> 
                 <span class='deals'>".Themeton_Std::getmeta('rent_type')."</span> 
                 </a>
                <div class='meta-title uk-padding pl4'> 
                    <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>  
                    <span>".$last_cat."</span>
                  </div>
            <div class='entry-meta style3'>
                <div class='uk-grid uk-padding-remove uk-margin-remove'>
                   <div class='uk-width-2-3'>
                        <ul class='meta-details'>
                            ".$meta_item."
                        </ul>
                   </div>
                   <div class='uk-width-expand uk-flex uk-flex-middle uk-padding-remove'>
                        <a href='".get_the_permalink()."' class='uk-button uk-button-defualt'>".esc_html__('details','themetonaddon')."</a>
                   </div>
                </div>
            </div>
        </div></div>";
            }
            else {
                $items.= "<div class='uk-grid uk-width-1-1@m ml0@s pl0@s'>
                <div class='uk-width-1-2@m pl0@s uk-position-relative'><a href='".get_the_permalink()."'><div class='car-thumb' style='background:url($img); background-size:cover;' data-bg-image='".$img."' data-bg-image='".$img."'><div class='entry-hover'></div></div> 
                <span class='deals'>".Themeton_Std::getmeta('rent_type')." </span> 
                </a></div>
                <div class='uk-width-1-2@m pl0@s content '>
                    <div class='meta-title uk-padding-small pt4 pb0'> 
                        <p>".Themeton_Std::getmeta('car_price')."</p>
                        <a href='".get_the_permalink()."'><h3>".get_the_title()."</h3></a>  
                        <span>".$last_cat."</span>
                    </div>
                    <ul class='meta-details'>
                        ".$meta_item."
                    </ul>
                    <a href='".get_the_permalink()."' class='uk-button uk-button-defualt'>".esc_html__('details','themetonaddon')."</a>
                </div>
                </div>";
            }
        }
       
    }
    echo sprintf('%s',$items);
    wp_reset_postdata();
    exit;
}


add_action('wp_ajax_mungu_carrental','mungu_carrental');
add_action('wp_ajax_nopriv_mungu_carrental','mungu_carrental');
add_action('wp_ajax_mungu_realstate','mungu_realstate');
add_action('wp_ajax_nopriv_mungu_realstate','mungu_realstate');

vc_map( array(
    "name" => esc_html__('Rent', 'themetonaddon'),
    "description" => esc_html__("post type: rent", 'themetonaddon'),
    "base" => 'mungu_carrental',
    "icon" => "mungu-vc-icon mungu-vc-icon74",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            'type' => 'dropdown',
            "param_name" => "layout",
            "heading" => esc_html__("layout", 'themetonaddon'),
            "value" => array(
                "List" => "list",
                "Grid" => "grid"
            ),
            "std" => "list",
            "holder"=>"div"
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "filter_widget",
            "heading" => esc_html__("Filter widget", 'themetonaddon'),
            "value" => array(
                "Yes" => "yes",
                "no" => "no"
            ),
            "std" => "yes",
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "rent_type",
            "heading" => esc_html__("layout", 'themetonaddon'),
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "style2",
                "Style 3" => "style3"
            ),
            "std" => "style1",
            "dependency" => Array("element" => "layout", "value" => array("grid"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "column",
            "heading" => esc_html__("Column", 'themetonaddon'),
            "value" => '2',
            "dependency" => Array("element" => "layout", "value" => array("grid"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'themetonaddon'),
            "value" => '6'
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
            "param_name" => "excerpt_length",
            "heading" => esc_html__("Excerpt length", 'themetonaddon'),
            "value" => "7",
            "dependency" => Array("element" => "title_position", "value" => array("center"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Specify category Id or leave blank to display items from all categories.", 'themetonaddon'),
            "value" => ''
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
        ),
        array(
            'type' => 'dropdown',
            "param_name" => "post_type",
            "heading" => esc_html__("Type", 'themetonaddon'),
            "group" => esc_html__( 'General options', 'themetonaddon' ),
            "value" => array(
                "Rent" => "rent",
                "Portfolio" => "portfolio",
                "Service" => "service",
                "Team" => "team",
                "Faq" => "faq",
                "Post" => "post",
                "Testimonials" => "testimonials",
                "Hotel" => "hotelroom",
                "Event Calendar" => "tribe_events",
                "Cause" => "cause",
                "Hotel rooms" => "hotelroom",
            ),
            "dependency" => Array("element" => "slidetype", "value" => array("posttype")),
            "std" => "team",
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));