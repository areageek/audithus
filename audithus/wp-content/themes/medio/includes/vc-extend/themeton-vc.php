<?php
class Medio_extend_VC_functions {

    // Redux select option
    public static function redux($post_type) {
        global $post;
        $args = array( 'post_type' => $post_type ,'posts_per_page' => 100 );
        $myposts = get_posts( $args );
        $redux['default'] = 'Default';
        $redux['disable'] = 'Disable';
        foreach ( $myposts as $post ) : setup_postdata( $post );
        $redux[get_the_ID()] = get_the_title();
        endforeach;
        wp_reset_postdata();
        if (isset($redux)) return $redux;
        else return NULL;
    }

    public static function header() {
        $bool = true;
        $type = get_post_type();
        if ($type == 'header' || $type == 'page_title' || $type == 'footer') $bool = false;
        if ($bool) {
            $post_id = NULL;
            if (Themeton_Std::getmeta('header')!=='default' && Themeton_Std::getmeta('header')!==NULL) $post_id = Themeton_Std::getmeta('header');
            if( class_exists('Redux') ) if ($post_id == NULL) $post_id = Themeton_Std::getopt('header_layout');
            if (Themeton_Std::getmeta('header') == 'disable') $post_id = NULL;
            $content = get_post($post_id);
            $cclass = Themeton_Std::getopt('container_size');
            if (is_numeric($post_id)) {
                $sticky = '';
                $sticky = get_post_meta($post_id,'header-style',true);
                if ($sticky=='menu-sticky') $sticky = 'uk-sticky';
                return sprintf('<header id="header" class="%s uk-visible@m"><div class="uk-container %s uk-position-relative uk-visible@s">%s</div></header>
                <div class="uk-flex uk-child-width-1-2 medio-responsive-menu uk-hidden@m uk-padding-small">
                    <div class="uk-flex uk-flex-middle">%s</div>
                    <div class="uk-flex uk-flex-middle uk-flex-right"><a href="#offcanvas" class="hamburger-menu uk-navbar-toggle uk-navbar-toggle-icon uk-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <rect y="9" width="20" height="2"></rect>
                        <rect y="3" width="20" height="2"></rect>
                        <rect y="15" width="20" height="2"></rect>
                    </svg>
                    </a>
                    </div>
                </div>',$sticky, 'uk-container-'.$cclass, do_shortcode($content->post_content), Themeton_Tpl::get_logo(true));
            }
            else return NULL;
            wp_reset_postdata();
        }
    }

    public static function page_title() {
        $bool = true;
        $type = get_post_type();
        if ($type == 'header' || $type == 'page_title' || $type == 'footer') $bool = false;
        if ($bool) {
            $post_id = NULL;
            if ( Themeton_Std::getmeta('page-title') !== '' && Themeton_Std::getmeta('page-title') === 0) return NULL;
            if ( Themeton_Std::getmeta('page-title') === '' || Themeton_Std::getmeta('page-title') === 'default') {

                if (class_exists('Redux') ) {

                    if ($type == 'page') {
                        if (Themeton_Std::getopt('page_title_show')==1) {
                                $post_id = Themeton_Std::getopt('page_title_layout');
                                if (is_numeric($post_id)) {
                                    $content = get_post($post_id);
                                    return sprintf('<section id="page-title"><div class="uk-container uk-position-relative">%s</div></section>',do_shortcode($content->post_content));
                                }
                                else return NULL;
                        }
                        else return NULL;
                    }
                    else {
                        if (Themeton_Std::getopt('post_title_show')==1) {
                                $post_id = Themeton_Std::getopt('page_title_layout');
                                if (is_numeric($post_id)) {
                                    $content = get_post($post_id);
                                    return sprintf('<section id="page-title"><div class="uk-container uk-position-relative">%s</div></section>',do_shortcode($content->post_content));
                                }
                                else return NULL;
                        }
                        else return NULL;
                    }
            }
        }
        if (Themeton_Std::getmeta('page-title') == 1) {
            $post_id = Themeton_Std::getopt('page_title_layout');
            if (is_numeric($post_id)) {
                $content = get_post($post_id);
                $cclass = Themeton_Std::getopt('container_size');
                return sprintf('<section id="page-title"><div class="uk-container %s uk-position-relative">%s</div></section>','uk-container-'.$cclass,do_shortcode($content->post_content));
            }
            else return NULL;
        }
        wp_reset_postdata(); 
        } else return NULL;
    }

    public static function footer() {
        $bool = true;
        $type = get_post_type();
        if ($type == 'header' || $type == 'page_title' || $type == 'footer') $bool = false;
        if ($bool) {
            $post_id = NULL;
            $cclass = Themeton_Std::getopt('container_size');
            if (Themeton_Std::getmeta('footer')!=='default' && Themeton_Std::getmeta('footer')!==NULL) $post_id = Themeton_Std::getmeta('footer');
            if( class_exists('Redux') ) if ($post_id == NULL) $post_id = Themeton_Std::getopt('footer_layout');
            if (Themeton_Std::getmeta('footer')=='disable') $post_id = NULL;
            if (is_numeric($post_id)) {
                $content = get_post($post_id);
                return sprintf('<footer id="footer"><div class="uk-container %s uk-position-relative">%s</div></footer>','uk-container-'.$cclass,do_shortcode($content->post_content));
            }
            else return NULL;
            wp_reset_postdata();
        }
    }

    public static function vc_get_library() {
        $folder = get_template_directory().'/vc-library/';
        $arg = array_diff(scandir($folder), array('..', '.'));
        $data = array();
        foreach ($arg as $file) {
            $element_folder = $folder.$file;
            $files = array_diff(scandir($element_folder), array('..', '.'));
            $img = NULL; $content = NULL;
            foreach ($files as $name) {
                $lib = pathinfo($name);
                if ($lib['extension']=='png' || $lib['extension']=='PNG' || $lib['extension']=='JPEG' || $lib['extension']=='jpg' || $lib['extension']=='JPG' || $lib['extension']=='jpeg') {
                    $img = preg_replace( '/\s/', '%20', get_template_directory_uri().'/vc-library/'.$file.'/'.$name);
                }
                if ($lib['extension']=='php') {
                    $layout = $name;
                    $element = $element_folder.'/'.$name;
                    $content = include $element;
                    if ($content['image_path']=='') if ($img!=NULL) $content['image_path'] = $img;
                }
            }
            if ($content!=NULL) {
                $content['disabled'] = true;
                array_unshift($data, $content);
            }
        }

        return $data;
    }

 }
class Themeton_VC extends Medio_extend_VC_functions { }