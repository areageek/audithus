<?php
if (!class_exists('WPBakeryShortCode_login')) {
    class WPBakeryShortCode_login extends WPBakeryShortCode {
        protected function content( $atts, $content = null){
            // Initial argument sets
            extract(shortcode_atts(array(
                'title' => 'Login',
                'image' => '',
                'position' => 'uk-text-center',
                'imageurl' => '',
                'icon' => 'fa fa-map-marker',
                'icons' => 'yes',
                'icon_type' => 'fontawesome',
                'extra_class' => '',
                'css' => ''
            ), $atts));

            $extra_class = esc_attr($extra_class);
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'login', $atts );
            $extra_class .= ' '.$css_class;

            $resultlog = $formlogo = $iconhtml = $result = $loginform = '';

            $loginform = array(
                    'echo' => true,
                    // Default 'redirect' value takes the user back to the request URI.
                    'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                    'form_id' => 'loginform',
                    'label_username' => esc_html__( 'Your name *', 'themetonaddon' ),
                    'label_password' => esc_html__( 'Password *', 'themetonaddon' ),
                    'label_remember' => esc_html__( 'Remember Me', 'themetonaddon' ),
                    'label_log_in' => esc_html__( 'Login Now', 'themetonaddon' ),
                    'id_username' => 'user_login',
                    'id_password' => 'user_pass',
                    'id_remember' => 'rememberme',
                    'id_submit' => 'wp-submit',
                    'remember' => true,
                    'value_username' => '',
                    'value_remember' => false,
                ) ;
            $login_form_top = apply_filters( 'login_form_top', '', $loginform );
            $login_form_middle = apply_filters( 'login_form_middle', '', $loginform );
            $login_form_bottom = apply_filters( 'login_form_bottom', '', $loginform );

            $icon = isset($atts["icon_$icon_type"]) ? $atts["icon_$icon_type"] : $icon;
            $image = wp_get_attachment_image($image, 'medium',false , array('class'=> 'icon-image'));

            

            if (!empty($icon)) {
                wp_enqueue_style("vc_$icon_type");
            }

            if($icons =='yes' && $icon !== ''){
                $iconhtml.='<i class="'.$icon.' pr1" aria-hidden="true"></i>';
            }else{
                $iconhtml.=$image;
            }

            $formlogo = '<span class="formlogo uk-position-absolute" ><img src="http://next.themeton.com/hosting/wp-content/uploads/sites/13/2017/06/lock_icon.png"  alt="'.esc_attr('form logo','mungu').'"></span>';
            $form = ' <form name="' . $loginform['form_id'] . '" id="' . $loginform['form_id'] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
                        ' . $login_form_top . '
                        <p class="login-username">
                            <input type="text" name="log" id="' . esc_attr( $loginform['id_username'] ) . '"  placeholder="' . esc_html( $loginform['label_username'] ) . '" class="input" value="' . esc_attr( $loginform['value_username'] ) . '" size="50" />
                        </p>
                        <p class="login-password">
                            <input type="password" name="pwd" id="' . esc_attr( $loginform['id_password'] ) . '" placeholder="' . esc_html( $loginform['label_password'] ) . '" class="input" value="" size="50" />
                        </p>
                        
                        <p class="login-submit">
                            <input type="submit" name="wp-submit" id="' . esc_attr( $loginform['id_submit'] ) . '" class="uk-button uk-button-default" value="' . esc_attr( $loginform['label_log_in'] ) . '" />
                            <input type="hidden" name="redirect_to" value="' . esc_url( $loginform['redirect'] ) . '" />
                        </p>
                        ' . $login_form_bottom . '
                        <a href="'. wp_lostpassword_url().'" title="'.esc_attr('Forgot Password ?','mungu').'">'.esc_attr('Forgot Password ?','mungu').'</a>
                    </form>';    
            
         
            if ( ! is_user_logged_in() ){
                $resultlog = '<a class="login-btn uk-toggle" href="#modal-center">'.$iconhtml.'
                '.$title.'</a>
                        <div id="modal-center" class="uk-flex-top uk-modal">
                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                <div id="login-form" class="pb8 pt8 hidden">
                                    <div class="uk-text-center mb3">
                                        <h2 class=" uk-margin-remove">'.esc_attr('Account login','mungu').'</h2>
                                        <p class="uk-margin-remove">'.esc_attr('Not remember yet ?','mungu').' <a href="'.esc_url(wp_registration_url()).'">'.esc_attr('sign up','mungu').'</a></p>
                                    </div>
                                    
                                <div class="login-wrap clearfix uk-flex uk-flex-center">
                                '. $form.'
                                </div>
                            </div>
                            </div></div>'; 
                    } 
            else{
                  $resultlog = wp_loginout( $_SERVER['REQUEST_URI'], false );
            }       

            $result ='<div class = "loginbox  uk-flex '.$position.' '.$extra_class.'" >'.$resultlog.' </div>' ;  

            return $result;
             
        }
    }
}

vc_map( array(
    "name" => esc_html__('Sign in and Signup', 'themetonaddon'),
    "description" => esc_html__("wp login and wp log ourt ", 'themetonaddon'),
    "base" => 'login',
    "icon" => "mungu-vc-icon mungu-vc-icon61",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => 'textfield',
            "param_name" => "title",
            "heading" => esc_html__("Name", 'themetonaddon'),
            "holder" => 'div',
            "value" => 'Login'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "position",
            "heading" => esc_html__("Align", 'themetonaddon'),
            "value" => array(
                "Left" => "uk-text-left",
                "Center" => "uk-text-center",
                "Right" => "uk-text-right",
            ),
            "std" => "uk-text-left"
        ),
        array(
            "type" => 'textfield',
            "param_name" => "imageurl",
            "heading" => esc_html__("Form logo url", 'themetonaddon'),
            "value" => 'http://next.themeton.com/hosting/wp-content/uploads/sites/13/2017/06/lock_icon.png'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "icons",
            "heading" => esc_html__("Icon - Font and image", 'themetonaddon'),
            "value" => array(
                "Font icon" => "yes",
                "Image" => "image",
            ),
            "std" => "yes"
        ),
        
        array(
            "type" => "attach_image",
            "param_name" => "image",
            "heading" => esc_html__("Insert image", 'themetonaddon'), 
            "dependency" => Array("element" => "icons", "value" => array("image"))
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library', 'themetonaddon'),
            'value' => array(
                esc_html__('Font Awesome', 'themetonaddon') => 'fontawesome',
                esc_html__('Open Iconic', 'themetonaddon') => 'openiconic',
                esc_html__('Typicons', 'themetonaddon') => 'typicons',
                esc_html__('Entypo', 'themetonaddon') => 'entypo',
                esc_html__('Linecons', 'themetonaddon') => 'linecons'
            ),
            'param_name' => 'icon_type',
            "dependency" => Array("element" => "icons", "value" => array("yes")),
            'description' => esc_html__('Select icon library.', 'themetonaddon'),
            "std" => "show",
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'themetonaddon'),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__('Select icon from library.', 'themetonaddon'),
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