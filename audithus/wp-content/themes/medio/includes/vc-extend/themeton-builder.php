<?php
class Medio_Extend_VC_BUILDER{

    function __construct(){
        add_action('init', array($this, 'row_init'));

        if(defined('WPB_VC_VERSION') && version_compare( WPB_VC_VERSION, '4.4', '>=' )) {
            add_filter('vc_shortcode_output', array($this, 'vc_shortcode_output'),10,3);
        }

        add_filter( 'vc_shortcodes_css_class', array($this, 'custom_css_classes_for_vc'), 10, 2 );
    }
    
    // Filter to replace default css class names
    function custom_css_classes_for_vc( $class_string, $tag ) {
        if( $tag == 'vc_row' || $tag == 'vc_row_inner' ){  }
        if( $tag == 'vc_column' || $tag == 'vc_column_inner' ){  }
        return $class_string;
    }

    public function vc_shortcode_output($output, $obj, $attr){
        if($obj->settings('base')=='vc_row' || $obj->settings('base')=='vc_row_inner') {

            $string = " data-array='{";
            $bool = false;
            $str = '';
            $class = '';
            if (isset($attr['el_class'])) { $string .= sprintf('"custom_class":"%s",',$attr['el_class']); $class .= $attr['el_class'].' ';  }
            if (isset($attr['vc_row_flex'])) { $string .= sprintf('"flex":"%s",',$attr['vc_row_flex']); $bool=true; $class .= $attr['vc_row_flex'].' '; }
            if (isset($attr['vc_row_container'])) { $string .= sprintf('"container":"%s",',$attr['vc_row_container']); $bool=true; $class .= $attr['vc_row_container'].' '; }
            if (isset($attr['vc_row_height'])) { $string .= sprintf('"height":"%s",',$attr['vc_row_height']); $bool=true; }
            if (isset($attr['vc_row_custom_css'])) { $string .= sprintf('"custom_css":"%s",',$attr['vc_row_custom_css']); $bool=true; }
            if (isset($attr['vc_row_sticky'])) { $string .= sprintf('"sticky":"%s",',$attr['vc_row_sticky']); $bool=true; $class .= $attr['vc_row_sticky'].' '; }
            if (isset($attr['vc_row_valignment'])) { $string .= sprintf('"valignment":"%s"',$attr['vc_row_valignment']); $bool=true; $class .= $attr['vc_row_valignment'].' '; }
            if ($string[strlen($string)-1]==',') {
                $string .= '"1":"1"';
            }
            $string .= "}'";
            if ($bool) {
                $string .= " data-row-themeton-option='yes'";
                $output = preg_replace('/ class="vc_row /', $string . ' class=" '.$class, $output, 1);
            }

            return $output;
        }
        else if($obj->settings('base')=='vc_column' || $obj->settings('base')=='vc_column_inner'){
            // themeton builder column data
            $string = " data-array='{";
            $bool = false;
            $str = '';
            if (isset($attr['vc_column_flex_auto'])) { $string .= sprintf('"width":"%s",',$attr['vc_column_flex_auto']); $bool=true; }
            if (isset($attr['el_class'])) $string .= sprintf('"custom_class":"%s",',$attr['el_class']);
            if (isset($attr['vc_column_custom_css'])) { $string .= sprintf('"custom_css":"%s",',$attr['vc_column_custom_css']); $bool=true; }
            if (isset($attr['vc_column_text_alignment'])) { $string .= sprintf('"text_alignment":"%s",',$attr['vc_column_text_alignment']); $bool=true; }
            if (isset($attr['vc_column_alignment'])) { $string .= sprintf('"alignment":"%s",',$attr['vc_column_alignment']); $bool=true; }
            if (isset($attr['vc_column_height'])) { $string .= sprintf('"height":"%s",',$attr['vc_column_height']); $bool=true; }
            if (isset($attr['vc_column_valignment'])) { $string .= sprintf('"valignment":"%s"',$attr['vc_column_valignment']); $bool=true; }
            if ($string[strlen($string)-1]==',') {
                $string .= '"1":"1"';
            }
            $string .= "}'";
            if ($bool) {
                $string .= " data-column-themeton-option='yes'";
                $output = preg_replace('/ class="/', $string . ' class="', $output, 1);
            }
            return $output;
        }

        return $output;
    }

    public function row_init(){
        if( function_exists('vc_add_param') ){
            // Row overlay
            for ($i=0; $i<2; $i++)
            {
                if ($i == 0) $inner = '';
                else $inner = '_inner';

                vc_add_param('vc_row'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Container", 'medio'),
                    "param_name" => "vc_row_container",
                    "value" => array(
                            esc_html__("Default", 'medio') => "",
                            esc_html__("Container", 'medio') => "uk-container",
                            esc_html__("Small container", 'medio') => "uk-container uk-container-small",
                            esc_html__("Large container", 'medio') => "uk-container uk-container-large",
                            esc_html__("Expand container", 'medio') => "uk-container uk-container-expand",
                        ),
                    "description" => esc_html__("Container blabla", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_row'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Vertical alignment", 'medio'),
                    "param_name" => "vc_row_valignment",
                    "value" => array(
                            esc_html__("Default", 'medio') => "",
                            esc_html__("Top", 'medio') => "uk-flex-top",
                            esc_html__("Middle", 'medio') => "uk-flex-middle",
                            esc_html__("Bottom", 'medio') => "uk-flex-bottom",
                        ),
                    "description" => esc_html__("Vertical alignment", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_row'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Flex", 'medio'),
                    "param_name" => "vc_row_flex",
                    "value" => array(
                            esc_html__("Default", 'medio') => "",
                            esc_html__("Uk Flex", 'medio') => "uk-flex",
                            esc_html__("Uk Grid", 'medio') => "uk-grid",
                            esc_html__("Uk Navbar", 'medio') => "uk-navbar"
                        ),
                    "description" => esc_html__("uk-flex, uk-grid", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_row'.$inner, array(
                    "type" => "textfield",
                    "heading" => esc_html__("Height", 'medio'),
                    "param_name" => "vc_row_height",
                    "value" => "",
                    "description" => esc_html__("Row height blabla", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_row'.$inner, array(
                    "type" => "textarea",
                    "heading" => esc_html__("Custom CSS", 'medio'),
                    "param_name" => "vc_row_custom_css",
                    "value" => "",
                    "description" => esc_html__("Custom css blabla", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));


                vc_add_param('vc_row'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Sticky", 'medio'),
                    "param_name" => "vc_row_sticky",
                    "value" => array(
                            esc_html__("Scroll", 'medio') => "",
                            esc_html__("Sticky", 'medio') => "sticky",
                            esc_html__("Up sticky", 'medio') => "upsticky",
                            esc_html__("Fixed", 'medio') => "fixed",
                        ),
                    "description" => esc_html__("Sticky blabla", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));
                
            }


            // Column
            for ($i=0; $i<2; $i++)
            {
                if ($i == 0) $inner = '';
                else $inner = '_inner';

                vc_add_param('vc_column'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Column flex", 'medio'),
                    "param_name" => "vc_column_flex_auto",
                    "value" => array(
                            esc_html__("Default", 'medio') => "",
                            esc_html__("Auto", 'medio') => "uk-width-auto@m",
                            esc_html__("Expand", 'medio') => "uk-width-expand@m",
                            esc_html__("Navbar Left", 'medio') => "uk-navbar-left",
                            esc_html__("Navbar Right", 'medio') => "uk-navbar-right",
                            esc_html__("1/1", 'medio') => "uk-width-1-1@m",
                            esc_html__("1/2", 'medio') => "uk-width-1-2@m",
                            esc_html__("1/3", 'medio') => "uk-width-1-3@m",
                            esc_html__("2/3", 'medio') => "uk-width-2-3@m",
                            esc_html__("1/4", 'medio') => "uk-width-1-4@m",
                            esc_html__("3/4", 'medio') => "uk-width-3-4@m",
                            esc_html__("1/5", 'medio') => "uk-width-1-5@m",
                            esc_html__("2/5", 'medio') => "uk-width-2-5@m",
                            esc_html__("3/5", 'medio') => "uk-width-3-5@m",
                            esc_html__("4/5", 'medio') => "uk-width-4-5@m",
                            esc_html__("1/6", 'medio') => "uk-width-1-6@m",
                            esc_html__("5/6", 'medio') => "uk-width-5-6@m"
                        ),
                    "description" => esc_html__("blablablablalb", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_column'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Text Alignment", 'medio'),
                    "param_name" => "vc_column_text_alignment",
                    "value" => array(
                            esc_html__("Default", 'medio') => "",
                            esc_html__("Left", 'medio') => "uk-text-left",
                            esc_html__("Right", 'medio') => "uk-text-right",
                            esc_html__("Center", 'medio') => "uk-text-center",
                            esc_html__("Justify", 'medio') => "uk-text-justify",
                        ),
                    "description" => esc_html__("text alignment blabla", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_column'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Vertical alignment", 'medio'),
                    "param_name" => "vc_column_valignment",
                    "value" => array(
                            esc_html__("Default", 'medio') => "",
                            esc_html__("Top", 'medio') => "uk-flex uk-flex-top",
                            esc_html__("Middle", 'medio') => "uk-flex uk-flex-middle",
                            esc_html__("Bottom", 'medio') => "uk-flex uk-flex-bottom",
                        ),
                    "description" => esc_html__("Vertical alignment", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_column'.$inner, array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Horizontal alignment", 'medio'),
                    "param_name" => "vc_column_alignment",
                    "value" => array(
                            esc_html__("Default", 'medio') => "",
                            esc_html__("Left", 'medio') => "uk-flex uk-flex-left",
                            esc_html__("Right", 'medio') => "uk-flex uk-flex-right",
                            esc_html__("Center", 'medio') => "uk-flex uk-flex-center",
                            esc_html__("Between", 'medio') => "uk-flex uk-flex-between",
                            esc_html__("Around", 'medio') => "uk-flex uk-flex-around",
                        ),
                    "description" => esc_html__("Horizontal alignment", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_column'.$inner, array(
                    "type" => "textarea",
                    "heading" => esc_html__("Custom CSS", 'medio'),
                    "param_name" => "vc_column_custom_css",
                    "value" => "",
                    "description" => esc_html__("Custom css blabla", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));

                vc_add_param('vc_column'.$inner, array(
                    "type" => "textfield",
                    "heading" => esc_html__("Height", 'medio'),
                    "param_name" => "vc_column_height",
                    "value" => "",
                    "description" => esc_html__("Column height blabla", 'medio'),
                    "group" => esc_html__("Themeton", 'medio')
                ));
            }

        }
    }
}

if( function_exists('vc_map') ){
    new Medio_Extend_VC_BUILDER();
}

function redux_css_compiler($post_id,$type)
{
    if ($type == 'header') {
        $css = '';
        $background = $padding = $margin = array();
        $background = get_post_meta($post_id,'header-background',true);
        $padding = get_post_meta($post_id,'header-padding',true);
        $margin = get_post_meta($post_id,'header-margin',true);
        $style = get_post_meta($post_id,'header-style',true);
        $css .= '#header {';
            if (is_array($background))
            foreach ($background as $key => $value) {
                if ($key!='media' && $key!='background-image' && $value!='') $css .= $key.':'.$value.';';
                else {
                    if ($key == 'background-image' && $value!='') $css .= $key.':url('.$value.');';
                }
            }
            if (is_array($padding))
            foreach ($padding as $key => $value) {
                if ($key!='units' && $value!='') $css .= $key.':'.$value.';';
            }
            if (is_array($margin))
            foreach ($margin as $key => $value) {
                if ($key!='units' && $value!='') $css .= $key.':'.$value.';';
            }
            if (isset($style) && $style!='') {
                if ($style != '1' && $style != 'menu-sticky') $css .= 'position:'.$style.';';
                if ($style == 'absolute' || $style == 'fixed') $css .= 'width:100%; z-index:9999;';
            }
        $css .= '}';
        if(get_post_meta($post_id,'mobile-header-background',true)){
            $mobile_bg_color = get_post_meta($post_id,'mobile-header-background',true);
            $css .=".medio-responsive-menu{background:".$mobile_bg_color.";}";
        }


        /*
         * Primary menu styles
         */
        $menu_font = get_post_meta($post_id,'header-font-menu',true);
        $menu_color = isset(get_post_meta($post_id,'header-color-menu',true)['regular']) ? get_post_meta($post_id,'header-color-menu',true)['regular'] : '';
        $menu_hover_color = isset(get_post_meta($post_id,'header-color-menu',true)['hover']) ? get_post_meta($post_id,'header-color-menu',true)['hover'] : '';
        $menu_active_color = isset(get_post_meta($post_id,'header-color-menu',true)['active']) ? get_post_meta($post_id,'header-color-menu',true)['active'] : '';
        $menu_padding = get_post_meta($post_id,'header-menu-padding',true);
        $css .= '.themeton-menu > li > a {';
            if (is_array($menu_font)) {
                foreach ($menu_font as $key => $value) {
                    if ($key!='google' && $key!='font-options' && $key!='font-backup' && $key!='subsets' && $value!='') {
                        $css .= $key.':'.$value.'!important;';
                    }
                }
            }
            if (isset($menu_color) && $menu_color!='') $css .= 'color:'.$menu_color.'!important;';
        $css .= '}';
        // Primary menu padding
        $css .= '.themeton-menu > li > a {';
            if (is_array($menu_padding)) {
                foreach ($menu_padding as $key => $value) {
                    if ($value!='' && $key!='units') $css .= $key.':'.$value.' !important;';
                }
            }
        $css .= '}';
        // Primary menu hover color
        if (isset($menu_hover_color) && $menu_hover_color!='') {
            $css .= '.themeton-menu > li > a:hover,.themeton-menu > li > a:focus {';
            $css .= 'color:'.$menu_hover_color.'!important;';
            $css .= '}';
        }
        // Primary menu active color
        if (isset($menu_active_color) && $menu_active_color!='') {
            $css .= '.themeton-menu li.current_page_item > a {';
            $css .= 'color:'.$menu_active_color.'!important;';
            $css .= '}';
        }



        /*
         * Secondary & Dropdown menu styles
         */
        $submenu_font = get_post_meta($post_id,'header-font-submenu',true);        
        $submenu_color = isset(get_post_meta($post_id,'header-color-submenu',true)['regular']) ? get_post_meta($post_id,'header-color-submenu',true)['regular'] : '';
        $submenu_hover_color = isset(get_post_meta($post_id,'header-color-submenu',true)['hover']) ? get_post_meta($post_id,'header-color-submenu',true)['hover'] : '';
        $submenu_active_color = isset(get_post_meta($post_id,'header-color-submenu',true)['active']) ? get_post_meta($post_id,'header-color-submenu',true)['active'] : '';
        $submenu_padding = get_post_meta($post_id,'header-submenu-padding',true);
        $submenu_submenu_bg = get_post_meta($post_id,'header-color-submenubg',true); // HEVLEEGUI
        $submenu_submenuborder = get_post_meta($post_id,'header-color-submenuborder',true); // HEVLEEGUI
        $css .= '.themeton-menu li ul li a {';
            if (is_array($submenu_font)) {
                foreach ($submenu_font as $key => $value) {
                    if ($key!='google' && $key!='font-options' && $key!='font-backup' && $key!='subsets' && $value!='') {
                        $css .= $key.':'.$value.'!important;';
                    }
                }
            }
            if (isset($submenu_color) && $submenu_color!='') $css .= 'color:'.$submenu_color.'!important;';
        $css .= '}';
        $css .= '.themeton-menu > li ul li {';
            if (is_array($submenu_padding)) {
                foreach ($submenu_padding as $key => $value) {
                    if ($value!='' && $key!='units') $css .= $key.':'.$value.' !important;';
                }
            }
        $css .= '}';
        if (isset($submenu_hover_color) && $submenu_hover_color!='') {
            $css .= '.themeton-menu > li ul li a:hover {';
            $css .= 'color:'.$submenu_hover_color.'!important;';
            $css .= '}';
        }
        if (isset($submenu_active_color) && $submenu_active_color!='') {
            $css .= '.themeton-menu > li ul li.current_page_item > a {';
            $css .= 'color:'.$submenu_active_color.'!important;';
            $css .= '}';
        }
        if (isset($submenu_submenu_bg['rgba']) && $submenu_submenu_bg['rgba']!='') {
            $css .= '.themeton-menu > li > .sub-menu, .themeton-menu > li > .sub-menu > li .sub-menu  {';
            $css .= 'background-color:'.$submenu_submenu_bg['rgba'].'!important;';
            $css .= '}';
        }
        if (isset($submenu_submenuborder['rgba']) && $submenu_submenuborder['rgba']!='') {
            $css .= '.themeton-menu > li ul li {';
            $css .= 'border-color:'.$submenu_submenuborder['rgba'].'!important;';
            $css .= '}';
        }

        return $css;
    }
    if ($type == 'page-title') {
        $css = '';
        $background = $padding = $margin = array();
        $background = get_post_meta($post_id,'page-title-background',true);
        $padding = get_post_meta($post_id,'page-title-section',true);
        $margin = get_post_meta($post_id,'page-title-margin',true);
        $main_font = get_post_meta($post_id,'page-title-font',true);
        $main_color = get_post_meta($post_id,'page-title-main-color-menu',true);
        $css .= '#page-title {';
            if (is_array($background))
            foreach ($background as $key => $value) {
                if ($key!='media' && $key!='background-image' && $value!='') $css .= $key.':'.$value.'!important;';
                else {
                    if ($key == 'background-image' && $value!='') $css .= $key.':url('.$value.')!important;';
                }
            }
            if (is_array($padding))
            foreach ($padding as $key => $value) {
                if ($key!='units' && $value!='') $css .= $key.':'.$value.'!important;';
            }
            if (is_array($margin))
            foreach ($margin as $key => $value) {
                if ($key!='units' && $value!='') $css .= $key.':'.$value.'!important;';
            }

            if (isset($main_color) && $main_color!='') $css .= 'color:'.$main_color.'!important;';

            if (is_array($main_font)) {
                foreach ($main_font as $key => $value) {
                    if ($key!='google' && $key!='font-options' && $key!='font-backup' && $key!='subsets' && $value!='') {
                        $css .= $key.':'.$value.'!important;';
                    }
                }
            }
        $css .= '}';
       return $css;
    }
    if ($type == 'footer') {
        $css = '';
        $background = $padding = $margin = array();
        $background = get_post_meta($post_id,'footer-background',true);
        $padding = get_post_meta($post_id,'footer-padding',true);
        $margin = get_post_meta($post_id,'footer-margin',true);
        $main_font = get_post_meta($post_id,'footer-text-font',true);
        $widget_title_font = get_post_meta($post_id,'footer-widget-title-font',true);
        $link_color = get_post_meta($post_id,'footer-link-color',true);
        $hover_color = get_post_meta($post_id,'footer-link-hover-color',true);
        $active_color = get_post_meta($post_id,'footer-active-hover-color',true);
        $css .= '#footer {';
            if (is_array($background))
            foreach ($background as $key => $value) {
                if ($key!='media' && $key!='background-image' && $value!='') $css .= $key.':'.$value.';';
                else {
                    if ($key == 'background-image' && $value!='') $css .= $key.':url('.$value.');';
                }
            }
            if (is_array($padding))
            foreach ($padding as $key => $value) {
                if ($key!='units' && $value!='') $css .= $key.':'.$value.';';
            }
            if (is_array($margin))
            foreach ($margin as $key => $value) {
                if ($key!='units' && $value!='') $css .= $key.':'.$value.';';
            }

            if (isset($main_color) && $main_color!='') $css .= 'color:'.$main_color.';';

            if (is_array($main_font)) {
                foreach ($main_font as $key => $value) {
                    if ($key!='google' && $key!='font-options' && $key!='font-backup' && $key!='subsets' && $value!='') {
                        $css .= $key.':'.$value.'!important;';
                    }
                }
            }
        $css .= '}';
        if (isset($main_font['color']) && $main_font['color']!='') $css .= '#footer, #footer p, #footer strong { color:'.$main_font['color'].';}';
        if (isset($link_color) && $link_color!='') $css .= '#footer a { color:'.$link_color.';}';
        if (isset($hover_color) && $hover_color!='') $css .= '#footer a:hover { color:'.$hover_color.';}';
        if (isset($active_color) && $active_color!='') $css .= '#footer a:active { color:'.$active_color.';}';
        
        $css .= '#footer .widget .widget-title,#footer .widget .widgettitle {';
            if (is_array($widget_title_font)) {
                foreach ($widget_title_font as $key => $value) {
                    if ($key!='google' && $key!='font-options' && $key!='font-backup' && $key!='subsets' && $value!='') {
                        $css .= $key.':'.$value.'!important;';
                    }
                }
            }
        $css .= '}';
       return $css;
    }
}


/*--------- Themeton Builder CSS Enqueue ----------*/

function themeton_builder_custom_css() {
    $css = '';
    $header_id = $page_title_id = $footer_id = NULL;

    if (Themeton_Std::getmeta('header')!=='default' && Themeton_Std::getmeta('header')!==NULL) $header_id = Themeton_Std::getmeta('header');

    if (Themeton_Std::getmeta('page-title')!=='default' && Themeton_Std::getmeta('page-title')!==NULL) $page_title_id = Themeton_Std::getmeta('page-title');

    if (Themeton_Std::getmeta('footer')!=='default' && Themeton_Std::getmeta('footer')!==NULL) $footer_id = Themeton_Std::getmeta('footer');
    
    if( class_exists('Redux') ) {
        if ($page_title_id==NULL || $page_title_id==1) $page_title_id = Themeton_Std::getopt('page_title_layout');
        if ($header_id==NULL || $header_id==1) $header_id = Themeton_Std::getopt('header_layout');
        if ($footer_id==NULL || $footer_id==1) $footer_id = Themeton_Std::getopt('footer_layout');
    }
    if ($header_id) {
        $post_custom_css = get_post_meta( $header_id, '_wpb_post_custom_css', true );
        $shortcodes_custom_css = get_post_meta( $header_id, '_wpb_shortcodes_custom_css', true );
        $css .= $post_custom_css.$shortcodes_custom_css;
        $css .= redux_css_compiler($header_id,'header');
    }
    if ($page_title_id) {
        $post_custom_css = get_post_meta( $page_title_id, '_wpb_post_custom_css', true );
        $shortcodes_custom_css = get_post_meta( $page_title_id, '_wpb_shortcodes_custom_css', true );
        $css .= $post_custom_css.$shortcodes_custom_css;
        $css .= redux_css_compiler($page_title_id,'page-title');
    }
    if ($footer_id) {
        $post_custom_css = get_post_meta( $footer_id, '_wpb_post_custom_css', true );
        $shortcodes_custom_css = get_post_meta( $footer_id, '_wpb_shortcodes_custom_css', true );
        $css .= $post_custom_css.$shortcodes_custom_css;
        $css .= redux_css_compiler($footer_id,'footer');
    }
    if ($css != '') {
        echo sprintf('<style type="text/css" data-type="vc_shortcodes-custom-css">%s</style>',$css);
    }
}
add_action( 'wp_head', 'themeton_builder_custom_css');

/*--------- Enqueue Script JS ------------*/

function themeton_builder_script() {
    wp_enqueue_script('themeton-builder-script', get_template_directory_uri() . '/includes/vc-extend/scripts.js', array('jquery'), false, true );
}

add_action( 'wp_enqueue_scripts', 'themeton_builder_script' );