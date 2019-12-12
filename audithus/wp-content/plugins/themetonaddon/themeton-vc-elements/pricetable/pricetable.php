<?php
if (!class_exists('WPBakeryShortCode_pricetable')) {
class WPBakeryShortCode_pricetable extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        // Initial argument sets
        extract(shortcode_atts(array(
            'title' => '',
            'subtitle' => '',
            'body' => '',
            'footer' => '',
            'mediaposition' => '',
            'hover' => '0',
            'icons' => '',
            'icon' => '',
            'color' => '',
            'size' => '',
            'href' => '',
            'icon_type' => '',
            'style_layout' => 'Default',
            'icon_type' => '',
            'image' => '',
            'imagesize' => '80x80',
            'alignment' => 'left',
            'price' => '',
            'list' => '',
            'listm' => '',
            'list_text' => '',
            'group' => '',
            'conbutton' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'pricetable', $atts );
        $class .= ' '.$css_class;

        $href = vc_build_link( $href );
        $url = ($href['url']);
        $btntxt = ($href['title']);
        $conbutton = vc_build_link ($conbutton);
        $img = '';

        $list = vc_param_group_parse_atts($list);
        $list_text = vc_param_group_parse_atts($list_text);
        $lists = '';

        if( $hover == 1) {
            $hover = 'uk-card-hover';
        }
        $result = $group = '';
        if (isset($atts['group'])) $group = vc_param_group_parse_atts( $atts['group']);

        foreach ((array)$group as $val) {
            (isset($val['footer'])) ? $footer = ($val['footer']) : '';
            $result .= " <p>$footer</p> ";
        }
        if ($style_layout == 'Default') {
            if (isset($price)) {
                $price_array = explode('/',$price);
                $amount = $price_array[0];
                $day = $price_array[1];
                $price ='<span>'.$amount.'</span>/'.$day;
            }
            
            $rel = $conbutton["rel"]!=''?'rel="'.$conbutton["rel"].'"':'';
            $target = $conbutton["target"]!=''?'target="'.$conbutton["target"].'"':'';

            $result = " 
            <div class='mungu-element  uk-card uk-box-shadow-medium $hover $class uk-text-center pricetable'>
                <div class='uk-card-body'>
                    <h4 class='uk-card-title uk-margin-remove'>$title</h4>
                    <h4 class='uk-margin-remove-top'>$body</h4>
                    ".$result."
                    <p class='nxt-price'>".$price."</p>
                </div>
                <div class='mungu-element mungu-price-button uk-flex uk-flex-".$alignment." uk-float-".$alignment."'>
                    <a class='uk-button uk-button-default ".$class."' $rel $target href='".$conbutton["url"]."'>".esc_html($conbutton["title"])."</a>
                 </div>
            </div>";
        }
        elseif ($style_layout == 'meissa') {

            if( is_array($list_text) ){
                foreach ($list_text as $item) {
                    $name = isset($item['name']) ? $item['name'] : "";
                    $name = !empty($name) ? "$name" : "";
                    $lists .= "<li><i data-uk-icon='check'></i> $name</li>";
                    
                }
            }
            if (isset($price)) {
                $price_array = explode('/',$price);
                $amount = $price_array[0];
                $day = $price_array[1];
                $price =' <span>$'.$amount.'</span><br/>'.$day;
            }
            
            $rel = $conbutton["rel"]!=''?'rel="'.$conbutton["rel"].'"':'';
            $target = $conbutton["target"]!=''?'target="'.$conbutton["target"].'"':'';

            $result = " 
            <div class='mungu-element uk-card $hover $class uk-text-center pricetable meissa'>
                <div class='uk-card-body'>
                    <h5 class='uk-card-title uk-margin-remove uk-text-uppercase uk-text-center'>$title</h5>
                    <p class='nxt-price uk-text-center'>".$price."</p>
                    <ul class ='pricing-item uk-text-center'>
                        $lists
                    </ul>
                </div>
                <div class='mungu-element mungu-price-button uk-flex uk-flex-".$alignment." uk-float-".$alignment."'>
                    <a class='uk-button uk-shadow uk-button-default ".$class."' $rel $target href='".$conbutton["url"]."'>".esc_html($conbutton["title"])."</a>
                 </div>
            </div>";
        }
        elseif ($style_layout == 'hosting') {
            $imgsize = explode('x', $imagesize);
            $imgsize = is_array($imgsize) ? $imgsize : array(64, 64);

            $icon = wp_get_attachment_image_src($image, $imgsize);
            $icon = "<img src='".$icon[0]."' height='50' alt='$title'/>";

            if( is_array($list) ){
                foreach ($list as $item) {
                    $image_icon = isset($item['image_icon']) ? $item['image_icon'] : "";
                    $atach_src = wp_get_attachment_image_src($image_icon, 'medium');
                    $image_icon = is_array($atach_src) ? $atach_src[0] : "";

                    $name = isset($item['name']) ? $item['name'] : "";
                    $name = !empty($name) ? "$name" : "";

                    $lists .= "<li class='uk-grid uk-margin-small-top'>
                                <div class='uk-width-1-6 uk-flex uk-flex-middle uk-padding-remove-horizontal'><img src='$image_icon' alt='$name'></div>
                                <div class='uk-width-expand svs-item uk-padding-remove-horizontal uk-padding-small uk-flex uk-flex-middle'>
                                    <p>$name</p></div>
                                </li>";
                    
                }
            }
            $result = "<div class='pricetable hosting uk-card uk-card-hover $class uk-text-center'>
                        <div class='uk-card-body head-card'>
                            ".$icon."
                            <h3 class='small-card-title uk-margin-remove uk-text-capitalize'>$title</h3>
                            ".$body."
                        </div>
                        <div class='uk-card-body head-body uk-position-relative'>
                        <div class='entry-bg'></div>
                            $price
                            <a href='".$conbutton["url"]."' class='uk-button-default uk-position-absolute'>".esc_html($conbutton["title"])."</a>
                        </div>
                        <div class='uk-card-footer uk-padding-large '>
                            <ul class ='pricing'>
                                $lists
                            </ul>
                        </div>
                    </div>";
        }elseif ($style_layout == 'style4') {
            if( is_array($list) ){
                foreach ($list as $item) {
                   
                    $name = isset($item['name']) ? $item['name'] : "";
                    $name = !empty($name) ? "$name" : "$name";

                    $price = isset($item['price']) ? $item['price'] : "";
                    $price = !empty($price) ? "$price" : "";

                    $subtitle = isset($item['subtitle']) ? $item['subtitle'] : "";
                    $subtitle = !empty($subtitle) ? "$subtitle" : "";

                    $button_name = isset($item['button_name']) ? $item['button_name'] : "";
                    $button_name = !empty($button_name) ? "$button_name" : "";
                    $button_url = isset($item['button_url']) ? $item['button_url'] : "";
                    $button_url = !empty($button_url) ? "$button_url" : "";

                    $lists .= "<div class='item ml3 uk-card uk-card-default uk-padding uk-flex  uk-flex-center'>
                                    <h4 class='uk-text-center uk-text-uppercase'>$name</h4>
                                    <span>$price</span>
                                    <p class='uk-text-center uk-text-uppercase'>$subtitle</p>
                                    <a href='$button_url' class='uk-button uk-default-button'>$button_name</a>
                                </div>";
                }
            }
            $result = "<div class='pricetable style4 uk-grid-match uk-child-width-expand@s uk-grid $class uk-text-center'>
                                ".$lists."
                        </div>";
        }elseif($style_layout == 'style5'){
            $rel = $conbutton["rel"]!=''?'rel="'.$conbutton["rel"].'"':'';
            $target = $conbutton["target"]!=''?'target="'.$conbutton["target"].'"':'';

            $result = "<div class='pricetable  $style_layout uk-card uk-card-hover uk-padding-small $class uk-text-center'>
                        <div class='uk-card-header head-card'>
                            <h3 class='small-card-title uk-margin-remove uk-text-capitalize'>$title</h3>
                            <h2>$price</h2>
                        </div>
                        <div class='uk-padding-small body uk-position-relative'>
                           $body
                        </div>
                        <div class='uk-card-footer uk-padding '>
                             <a class='uk-button uk-button-default ".$class."' $rel $target href='".$conbutton["url"]."'>".esc_html($conbutton["title"])."</a> 
                        </div>
                    </div>";
        }elseif($style_layout == 'style6'){
            $rel = $conbutton["rel"]!=''?'rel="'.$conbutton["rel"].'"':'';
            $target = $conbutton["target"]!=''?'target="'.$conbutton["target"].'"':'';
            
            if( is_array($list_text) ){
                foreach ($list_text as $item) {
                    
                    $name = isset($item['name']) ? $item['name'] : "";
                    $name = !empty($name) ? "$name" : "$name";

                    $lists .= "<li> <span data-uk-icon='icon: check; ratio: 1.2'></span>$name</li>";
                }
            }
            $result = "<div class='pricetable $style_layout uk-card uk-padding-small $class uk-text-center'>
                        <div class='uk-card-header'>
                            <div class='figcaption'>
                               <span>$price</span>
                            </div>
                            <div class='head-card'><h2 class='uk-text-capitalize'>$title</h2><span>$subtitle</span></div>
                        </div>
                        <div class='uk-padding uk-card-body uk-padding-remove-bottom uk-position-relative'>
                            <ul>$lists</ul>
                        </div>
                        <div class='uk-card-footer uk-padding uk-padd '>
                            <div class='btn'><a class='uk-button uk-button-default' $rel $target href='".$conbutton["url"]."'>".esc_html($conbutton["title"])."</a> <a href='".$conbutton["url"]."' class='btndetails'>".esc_attr('Detials','mungu')."<span data-uk-icon='icon:chevron-right;'></span></a></div>
                        </div>
                    </div>";
        }
        elseif($style_layout == 'style8'){
            $rel = $conbutton["rel"]!=''?'rel="'.$conbutton["rel"].'"':'';
            $target = $conbutton["target"]!=''?'target="'.$conbutton["target"].'"':'';

            $result = "<div class='pricetable $style_layout pr5 pl5 pt7 pb7  uk-text-left $class'>
                        <div class=''>
                            <div class='head-card'><h2 class=''>$title</h2><span>$subtitle</span></div> 
                            <div class='mb8'>
                               <span>$price</span>
                            </div>  
                        </div>
                        <div class='uk-position-relative'>
                            <div class='pl0 uk-text-left'>
                                ".$result."
                            </div>
                        </div>
                    </div>
                    <div class='mt5 uk-text-center'>
                            <div class='btn'><a class='uk-button uk-button-default' $rel $target href='".$conbutton["url"]."'>".esc_html($conbutton["title"])."</a></div>
                        </div>"; 
        }else{
            $imgsize = explode('x', $imagesize);
            $imgsize = is_array($imgsize) ? $imgsize : array(64, 64);
            $icon = wp_get_attachment_image_src($image, $imgsize);
            $icon = "<img src='".$icon[0]."' height='50' alt='$title'/>";
            if (isset($price_amount)) {
                $price_amount = explode(' ', $price);
                $price_s = "<p class='small-price'>".$price_amount[0]."</p><br><p class='small-price-type'>".$price_amount[1]."</p>"; 
            }
            else $price_s = '';
            $price_s = explode(' ', $price);
            $result = "<div class='mungu-element uk-card uk-card-hover $class uk-text-center pricetable'>
                <div class='uk-card-body small-pricetable-card'>
                    ".$icon."
                    <h3 class='small-card-title uk-margin-remove'>$title</h3>
                    <h1 class='price-heading'>".$price_s[0]."</h1><p class='price-value uk-text-center'>".$price_s[1]."</p>
                </div>
            </div>";
        }
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Price table', 'themetonaddon'),
    "description" => esc_html__("Price table column", 'themetonaddon'),
    "base" => 'pricetable',
    "icon" => "mungu-vc-icon mungu-vc-icon42",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "style_layout",
            "heading" => esc_html__("Pricetable Style", 'themetonaddon'),
            "value" => array(
                esc_html__('Default', 'themetonaddon') => 'Default',
                esc_html__('Small Pricetable', 'themetonaddon') => 'small_pricetable',
                esc_html__('Hosting', 'themetonaddon') => 'hosting',
                esc_html__('Style - 4', 'themetonaddon') => 'style4',
                esc_html__('Style - 5 / yoga skin usage/', 'themetonaddon') => 'style5',
                esc_html__('Style - 6 / yoga skin usage/', 'themetonaddon') => 'style6',
                esc_html__('Style - 7 / meissa/', 'themetonaddon') => 'meissa',
                esc_html__('Minimal', 'themetonaddon') => 'style8',
            ),
            "std" => "none",
            "admin_label" => true
        ),

        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image Image", 'themetonaddon'),
            "value" => '',
            "dependency" => Array("element" => "style_layout", "value" => array("small_pricetable","hosting"))
        ),
        array(
            "type" => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "holder" => 'div'
        ),

        array(
            "type" => 'textfield',
            "param_name" => "subtitle",
            "heading" => esc_html__("Sub title", 'themetonaddon'),
            "holder" => 'div',
            "dependency" => Array("element" => "style_layout", "value" => array("style6"))
        ),
       
        array(
            "type" => 'textarea',
            "param_name" => "body",
            "heading" => esc_html__("Description", 'themetonaddon')
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Item', 'themetonaddon'),
            'param_name' => 'list',
            'value' => '',
            "dependency" => Array("element" => "style_layout", "value" => array("hosting","style4")),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    "param_name" => "image_icon",
                    "heading" => esc_html__("Icon image", 'themetonaddon')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Name: insert name of the person', 'themetonaddon'),
                    'param_name' => 'name',
                    'value' => 'Shela Mathews',
                    "dependency" => Array("element" => "style_layout", "value" => array("style4")),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Price', 'themetonaddon'),
                    'param_name' => 'price',
                    'value' => '$4.99',
                    "dependency" => Array("element" => "style_layout", "value" => array("style4")),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Sub title', 'themetonaddon'),
                    'param_name' => 'subtitle',
                    'value' => 'PER MONTH',
                    "dependency" => Array("element" => "style_layout", "value" => array("style4")),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button', 'themetonaddon'),
                    'param_name' => 'button_name',
                    'value' => 'Buy now',
                    "dependency" => Array("element" => "style_layout", "value" => array("style4")),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button url', 'themetonaddon'),
                    'param_name' => 'button_url',
                    'value' => '#',
                    "dependency" => Array("element" => "style_layout", "value" => array("style4")),
                ),
                
            )
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Item', 'themetonaddon'),
            'param_name' => 'list_text',
            'value' => '',
            "dependency" => Array("element" => "style_layout", "value" => array("style6","meissa")),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Service: insert service', 'themetonaddon'),
                    'param_name' => 'name',
                    'value' => 'Shela Mathews',
                    'admin_label' => true
                ),
            )
        ),
        array(
            "type" => 'param_group',
            "value" => '',
            "heading" => esc_html__("Value", 'themetonaddon'),
            "param_name" => 'group',
            "dependency" => Array("element" => "style_layout", "value" => array("small_pricetable","Default","style8")),
            "params" => array(
                array(
                    "type" => 'textfield',
                    "param_name" => "footer",
                    "description" => esc_html__("Body text", 'themetonaddon'),
                    "heading" => esc_html__("Body", 'themetonaddon')
                ),            
            )
        ),
        array(
            'type' => 'checkbox',
            "param_name" => "hover",
            "heading" => esc_html__("Hover effect", 'themetonaddon'),
            'value' => array( esc_html__( 'Yes', 'themetonaddon' ) => '1' ),
            "std" => "0"
        ),

        array(
            "type" => "vc_link",
            "param_name" => "conbutton",
            "heading" => esc_html__("URL", 'themetonaddon'),
        ),

        array(
            "type" => "dropdown",
            "param_name" => "alignment",
            "heading" => esc_html__("Alignment", 'themetonaddon'),
            "value" => array(
                'Left' => 'left',
                'Right' => 'right',
                'Center' => 'center',
                'Block width' => 'block',
            ),
            "description" => esc_html__("Select button alignment.", 'themetonaddon'),
        ),
        array(
            "type" => 'textarea',
            "param_name" => "price",
            "heading" => esc_html__("Price/MONTH", 'themetonaddon')
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