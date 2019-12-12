<?php
if (!class_exists('WPBakeryShortCode_hamburger_button')) {
class WPBakeryShortCode_hamburger_button extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'display' => 'mobile',
            'style' => 'default',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        $result = $class='';
        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'hamburger_button', $atts );

        $canvas =  wp_nav_menu( array(
            'menu_id'           => 'primary-nav2',
            'menu_class'        => 'uk-nav one-page-menu bushido-menu bushido-menu-normal',
            'theme_location'    => 'primary',
            'container'         => '',
            'fallback_cb'       => 'themeton_sidebarmenu_callback',
            'walker'            => new Walker_Nav_Uikit_Side(),
            'echo' => false
        ) );
        $navnew = wp_nav_menu( array(
            'menu_id'           => 'uk-kitnav',
            'menu_class'        => 'uk-nav-parent-icon uk-nav uk-scrollspy pr4 bushido-menu',
            'theme_location'    => 'primary',
            'container'         => '',
            'fallback_cb'       => 'themeton_sidebarmenu_callback',
            'walker'            => new Walker_Nav_Uikit_Side(),
            'echo' => false
        ) );
        $e_class = '';
        if ($style == 'style1') $e_class = 'uk-navbar-nav bushido-menu bushido-menu-normal uk-flex uk-flex-around uk-width-1-1';
        $nav =  wp_nav_menu( array(
            'menu_id'           => '',
            'menu_class'        => $e_class,
            'theme_location'    => 'primary',
            'container'         => '',
            'fallback_cb'       => 'themeton_sidebarmenu_callback',
            'echo' => false
        ) );

        

        if($display =='mobile'){
            $result .= '<a href="#offcanvas" class="hamburger-menu uk-navbar-toggle uk-hidden@m $class uk-hidden@l uk-navbar-right uk-navbar-toggle-icon uk-flex pr0 pl2 uk-flex-right">
                            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <rect y="9" width="20" height="2"></rect>
                                <rect y="3" width="20" height="2"></rect>
                                <rect y="15" width="20" height="2"></rect>
                            </svg>
                        </a>';
        }else{
            if ( $style == 'default' )  $result .=' <div class="burger-menu">
                                                        <nav class="main-nav">
                                                              '.$nav.'
                                                            <div class="grid-menu-container">
                                                                <div class="grid-menu" data-grid="1"></div>
                                                            </div>
                                                        </nav>
                                                        <div class="header-right-content">
                                                            <a href="javascript:;" id="menu-handler">
                                                              <span>'.esc_attr('Menu','mungu').'</span>
                                                                <div id="menu-toggle">
                                                                    <div id="hamburger">
                                                                        <span></span>
                                                                        <span></span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div id="cross">
                                                                       <span></span>
                                                                       <span></span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div> ';
            if ( $style == 'style1' )   $result .='<div class="burger-menu style-relative-cancel">
                                                        <nav class="main-nav">
                                                              <div class="nav-inner-back uk-flex uk-flex-middle">'.$nav.'</div>
                                                        </nav>
                                                        <div class="header-right-content">
                                                            <a href="javascript:;" id="menu-handler">
                                                                <div id="menu-toggle">
                                                                    <div id="hamburger">
                                                                        <span></span>
                                                                        <span></span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div id="cross">
                                                                       <span></span>
                                                                       <span></span>
                                                                    </div>
                                                                    <span class="ham-menu-text">'.esc_attr('Menu','mungu').'</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div> ';
                if ( $style == 'style2' )   $result .='
                <div class="uk-container">
                    <a href="#" class="uk-icon-link bushido-menu-hamburger">
                        <svg width="34" height="34" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                            <rect x="2" y="4" width="16" height="1"></rect> <rect x="2" y="9" width="16" height="1"></rect>
                            <rect x="7" y="14" width="11" height="1"></rect>
                        </svg>
                        
                    </a>
                </div>
                <div class="uk-width-auto" data-uk-drop="pos: bottom-right; boundary: .uk-container; boundary-align: true; offset: 0; mode: click; animation: uk-animation-fade; duration: 800"> 
                        '.$navnew.'
                </div>
                ';
        }
        
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Hamburger', 'themetonaddon'),
    "description" => esc_html__("Hamburger menu", 'themetonaddon'),
    "base" => 'hamburger_button',
    "icon" => "mungu-vc-icon mungu-vc-icon59",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "display",
            "heading" => esc_html__("display on device", 'themetonaddon'),
            "value" => array(
                'Mobile' => 'mobile',
                'Desktop' => 'desktop',
            ),
            "holder" => 'div'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Hamburger Style", 'themetonaddon'),
            "value" => array(
                'Default' => 'default',
                'Right text Left Hamburger button' => 'style1',
                'Minimal' => 'style2',
            ),
            "holder" => 'div'
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