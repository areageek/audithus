<?php
class ThemetonStd{

    // Redux select option
    public static function redux($post_type) {
        global $post;
        $args = array( 'post_type' => $post_type );
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
                if ($lib['extension']=='png' || $lib['extension']=='jpg' || $lib['extension']=='jpeg') {
                    $img = preg_replace( '/\s/', '%20', get_template_directory_uri().'/vc-library/'.$file.'/'.$name);
                    $content['image_path'] = $img;
                }
                if ($lib['extension']=='php') {
                    $layout = $name;
                    $element = $element_folder.'/'.$name;
                    $content = include $element;
                    if ($img!=NULL) $content['image_path'] = $img;
                }
            }
            if ($content!=NULL) {
                array_unshift($data, $content);
            }
        }

        return $data;
    }

    public static function get_redux_vc_skin($post_id)
    {
        global $post;
        $pp = get_post($post_id);;
        if ($pp->post_type=='header' || $pp->post_type=='footer' || $pp->post_type=='page_title') echo do_shortcode($pp->post_content);
        wp_reset_postdata();
    }

    public static function clear_xss($value){
        return preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $value);
    }


    // Get meta field value from post
    public static function getmeta($meta, $post_id = NULL) {
        global $post;
        $result = '';
        if ($post_id != NULL && (int) $post_id > 0) {
            $result = get_post_meta($post_id, '_' . $meta, true);
        } else if (isset($post->ID)) {
            $result = get_post_meta($post->ID, '_' . $meta, true);
        }
        if( is_array($result) )
            return '';
        if( is_bool($result) )
            return '';
        return $result;
    }
    
    // Set meta value for post
    public static function setmeta($post_id, $meta, $value){
        if(count(get_post_meta($post_id , '_'.$meta)) == 0){
            add_post_meta($post_id , '_'.$meta, trim($value), true);
        }
        else{
            update_post_meta($post_id , '_'.$meta, trim($value));
        }
    }

    // 
    public static function getmeta_type_list($meta, $post_id = NULL){
        global $post;
        $result = '';
        if ($post_id != NULL && abs($post_id) > 0) {
            $result = get_post_meta($post_id, '_' . $meta, true);
        } else if (isset($post->ID)) {
            $result = get_post_meta($post->ID, '_' . $meta, true);
        }

        if( !empty($result) ){
            try {
                $contents = array();
                $result = json_decode($result);
                foreach ($result->contents as $item) {
                    $contents[] = array(
                        'label' => $item->label,
                        'content' => $item->content
                    );
                }

                return $contents;
            }
            catch (Exception $e){  }
        }

        return array();
    }


    // Get Theme mod value
    public static function get_mod($name, $default = false){
        global $post;
        $mod_value = get_theme_mod( $name, $default );
        if( !$mod_value ){
            return '';
        }
        return !empty($mod_value) ? ThemetonStd::clear_xss($mod_value) : '';
    }


    public static function getopt($key, $subkey = false){
        global $themeton_redux;
        if( isset($themeton_redux[$key]) && !empty($themeton_redux[$key]) ){
            if( $subkey!==false ){
                if( !empty($subkey) && isset($themeton_redux[$key][$subkey]) && !empty($themeton_redux[$key][$subkey]) ){
                    return $themeton_redux[$key][$subkey];
                }
            }
            return $themeton_redux[$key];
        }
        return '';
    }

    public static function get_sidebars(){
        $sidebars_list = (array)Themeton_Std::getopt('sidebars');
        $sidebars = array();

        foreach($sidebars_list as $sbar) {
            if( !empty($sbar) ){
                $sidebars[sanitize_title_with_dashes($sbar)] = $sbar;
            }
        }

        return $sidebars;
    }
    

    public static function get_option_array($value){
        $result = array();
        if( !empty($value) ){
            $s_bos = explode("|", $value);
            $s_dot = explode(":", $s_bos[0]);
            if( count($s_dot)>1 ){
                foreach ($s_bos as $item) {
                    $s = explode(":", $item);
                    if( isset($s[0],$s[1]) )
                        $result[$s[0]] = $s[1];
                }
            }
            else{
                return $s_bos;
            }
        }
        return $result;
    }

    public static function get_option_bg($value){
        $result = array();
        if( empty($value) )
            return $result;
        $ex = explode("|", $value);
        if( count($ex)>3 ){
            $result['url'] = $ex[0];
            $result['repeat'] = $ex[1];
            $result['position'] = $ex[2];
            $result['attach'] = $ex[3];
        }
        return $result;
    }



    public static function get_option_bg_value($value){
        $bg = ThemetonStd::get_option_bg(ThemetonStd::get_mod($value));
        $result = ThemetonStd::extract_bg_values($bg);
        return $result;
    }



    public static function get_meta_bg_value($value){
        $val = ThemetonStd::getmeta($value);
        $val = str_replace("$", "|", $val);
        $bg = ThemetonStd::get_option_bg($val);
        $result = ThemetonStd::extract_bg_values($bg);
        return $result;
    }


    
    public static function extract_bg_values($bg){
        $result = '';
        if( !empty($bg) && !empty($bg['url']) ){
            $result .= sprintf( "background-image:url(%s);", esc_url($bg['url']) );
            if( $bg['repeat']=="cover" ){
                $result .= "background-size:cover; background-repeat:no-repeat;";
            }
            else if( $bg['repeat']=="contain" ){
                $result .= "background-size:contain; background-repeat:no-repeat;";
            }
            else{
                $result .= sprintf( "background-repeat:%s;", esc_attr($bg['repeat']) );
            }
            $result .= sprintf( "background-position:%s;", esc_attr($bg['position']) );
            $result .= sprintf( "background-attachment:%s;", esc_attr($bg['attach']) );
        }
        return $result;
    }


    // Get admin post type for current page
    public static function admin_post_type(){
        global $post, $typenow, $current_screen;

        // Check to see if a post object exists
        if ($post && $post->post_type)
            return $post->post_type;

        // Check if the current type is set
        elseif ($typenow)
            return $typenow;

        // Check to see if the current screen is set
        elseif ($current_screen && $current_screen->post_type)
            return $current_screen->post_type;

        // Finally make a last ditch effort to check the URL query for type
        elseif (isset($_REQUEST['post_type']))
            return sanitize_key($_REQUEST['post_type']);
     
        return '-1';
    }


    // Validate URL
    public static function validateURL($url){
        return filter_var($url, FILTER_VALIDATE_URL);

        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)){
            return false;
        }
        return true;
    }


    public static function create_slug($string){
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }


    // Get sliders for external sliders LayerSlider | Rev slider | Master slider
    public static function get_sliders($type = ''){
        $sliders = array();

        if( $type == 'layerslider' || $type == '' ){
            if( class_exists('LS_Sliders') ){
                $layer_sliders = LS_Sliders::find(array('data'=>false));
                foreach ($layer_sliders as $item) {
                    $sliders = array_merge($sliders, array("layerslider_" . $item['id'] => "LayerSlider - " . $item['name']));
                }
            }
        }
        if( $type == 'revslider' || $type == ''){
            if( class_exists('RevSlider') ){
                $revo = new RevSlider();
                $revo_sliders = $revo->getArrSlidersShort();
                foreach ($revo_sliders as $rev_id => $rev_title) {
                    $s = new RevSlider();
                    $s->initByID($rev_id);
                    $alias = $s->getAlias();
                    $sliders = array_merge($sliders, array("revslider_" . $alias => "Revolution Slider - " . $rev_title));
                }
            }
        }
        if( $type == 'masterslider' || $type == '' ){
            if( function_exists('get_mastersliders') ){
                $master_sliders = get_mastersliders();
                foreach ($master_sliders as $slider) {
                    $sliders = array_merge($sliders, array("masterslider_" . $slider['ID'] => "Master Slider - " . $slider['title']));
                }
            }
        }
        return $sliders;
    }


    // File Get Content
    public static function fs_get_contents($path){
        
        $host = parse_url($path, PHP_URL_HOST);
        if( !empty( $host ) ){
            $remote_data = wp_remote_get( $path );
            $rdate = array_key_exists('body', $remote_data) ? $remote_data['body'] : '';
            return $rdate;
        }
        else{
            global $wp_filesystem;
            if( empty($wp_filesystem) ){
                require_once ABSPATH . 'wp-admin/includes/file.php';
                WP_Filesystem();
            }
            
            $file_content = $wp_filesystem->get_contents($path);
            return $file_content;
        }

    }

    public static function fs_get_contents_array($path){
        $file_content = ThemetonStd::fs_get_contents($path);
        return explode("\n", $file_content );
    }


    public static function list_files( $directory ){
        if( !function_exists('list_files') ){
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        $all_files = list_files($directory);
        return $all_files;
    }
    

    // get post types
    public static function get_post_types(){
        global $themeton_post_types;

        if( !empty($themeton_post_types) ){
            return $themeton_post_types;
        }

        $result = array();
        $post_arr = array();
        $post_arr['post'] = get_post_type_object('post');
        $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects', 'and');
        $post_types = array_merge($post_arr, $post_types);
        foreach ($post_types as $type) {
            $result[$type->name] = $type->labels->name;
        }
        $themeton_post_types = $result;
        return $result;
    }


    // get category name of post type
    public static function get_taxonomy_post_type($object){
        global $wp_taxonomies;
        $object = (array) $object;

        $taxonomies = array();
        foreach ( (array) $wp_taxonomies as $tax_name => $tax_obj ) {
            if ( array_intersect($object, (array) $tax_obj->object_type) ) {
                if( $tax_obj->hierarchical ){
                    $taxonomies = $tax_obj;
                    break;
                }
            }
        }
        return !empty($taxonomies) ? $taxonomies->name : '';
    }

    

    
    // HEX to RGBA - blox_hex2rgba($color, 0.7);
    public static function hex2rgba($color, $opacity = false){

        $default = 'rgb(0,0,0)';

        //Return default if no color provided
        if (empty($color))
            return $default;

        //Sanitize $color if "#" is provided 
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        } elseif (strlen($color) == 3) {
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        } else {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
    }

}