<?php
/*
Plugin Name: ThemeTon AddOn
Plugin URI: http://www.themeton.com
Description: Post Types, VC elements and Predefined Layouts
Author: ThemeTon
Version: 2.6.7
Author URI: http://www.themeton.com
*/


/*
  ==========================================================================
  Next Post Types
  ==========================================================================
*/
function themetonaddon_enqueue_script() {
    wp_enqueue_style( 'mungu_elements', plugin_dir_url( __FILE__ ) .'css/main.css');
    wp_enqueue_script( 'mungu_elements', plugin_dir_url( __FILE__ ) . 'js/elements.min.js', array('jquery'), false, true );

}
add_action('wp_enqueue_scripts', 'themetonaddon_enqueue_script', 10);

// Meta fields for Posts
require_once 'metabox/class.render.meta.php';
require_once 'metabox/meta-page.php';


function themetonaddon_plugin_activation( $plugin, $network_activation ) {
    if( !get_option('themetonaddon_placeholder_image') ){

        $placeholder = plugin_dir_path( __FILE__ ).'images/placeholder.jpg';
        $filetype = wp_check_filetype( basename( $placeholder ), null );
        $wp_upload_dir = wp_upload_dir();
        $attachment = array(
            'guid'           => $wp_upload_dir['url'] . '/' . basename( $placeholder ), 
            'post_mime_type' => $filetype['type'],
            'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $placeholder ) ),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );
        $attach_id = wp_insert_attachment( $attachment, basename( $placeholder ) );

        update_option('themetonaddon_placeholder_image', $attach_id);
    }
    //exit( wp_redirect( admin_url( 'themes.php?page=themeton-plugin-licence' ) ) );
}
//add_action( 'activated_plugin', 'themetonaddon_plugin_activation', 10, 2 );

/* Initialize Widget */
if(!function_exists('themetonaddon_widget_init')):
    function themetonaddon_widget_init() {
        /* Custom widgets */
        $template_widget_files = array(
            'widgets/social-links.php',
            'widgets/recent-posts.php',
            'widgets/address.php'
        );
        foreach ($template_widget_files as $load_file) {
            require_once(trailingslashit(plugin_dir_path( __FILE__ )) . $load_file);
        }
    }
endif;
add_action('widgets_init','themetonaddon_widget_init');

if (!class_exists('TT_Post_type_PT')) {
class TT_Post_type_PT{

    private $post_types = array(
                'portfolio' => 'Portfolio',
                'service' => 'Services',
                'team' => 'Team members',
                'cause' => 'Cause',
                'faq' => 'FAQ',
                'testimonials' => 'Testimonials',
                'hotelroom' => 'Hotel room',
                'header' => 'Header',
                'footer' => 'Footer',
                'megamenu'=> 'Mega menu',
                'page_title' => 'Page Title',
                'rent' => 'Rent',
            );


    function __construct(){
        add_action('init', array($this, 'register_pt'));
        add_action('admin_init', array($this, 'settings_flush_rewrite'));
        add_action( 'init', array($this,'create_rent_tag_taxonomies'), 0 );
        foreach ($this->post_types as $slug => $label ) {
            add_filter('manage_edit-'.$slug.'_columns', array($this, $slug.'_edit_columns'));

            if( $this->admin_post_type() == $slug ){
                add_action("manage_posts_custom_column", array($this, $slug.'_custom_columns'));
            }
        }
    }

    
    public function create_rent_tag_taxonomies() {

        $labels = array(
            'name' => __( 'Tags', 'themetonaddon' ),
            'singular_name' => __( 'Tag', 'themetonaddon' ),
            'search_items' =>  __( 'Search Tags', 'themetonaddon' ),
            'popular_items' => __( 'Popular Tags', 'themetonaddon' ),
            'all_items' => __( 'All Tags', 'themetonaddon' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Tag', 'themetonaddon' ), 
            'update_item' => __( 'Update Tag', 'themetonaddon' ),
            'add_new_item' => __( 'Add New Tag', 'themetonaddon' ),
            'new_item_name' => __( 'New Tag Name', 'themetonaddon' ),
            'separate_items_with_commas' => __( 'Separate tags with commas', 'themetonaddon' ),
            'add_or_remove_items' => __( 'Add or remove tags', 'themetonaddon' ),
            'choose_from_most_used' => __( 'Choose from the most used tags', 'themetonaddon' ),
            'menu_name' => __( 'Tags', 'themetonaddon' ),
        ); 

        register_taxonomy('rent_tag','rent',array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'rent_tag' ),
        ));
    }


    // re-flush rewrite
    public function settings_flush_rewrite(){
        flush_rewrite_rules();
    }


    // register post type
    public function register_pt(){

        foreach ($this->post_types as $slug => $label) {

            $label_custom = get_theme_mod($slug.'_label');
            $label_custom= !empty($label_custom) ? $label_custom : __($label, 'themetonaddon');

            $labels = array(
                'name'          => $label_custom,
                'singular_name' => $label_custom,
                'edit_item'     => sprintf(__('Edit %s', 'themetonaddon'), $label_custom),
                'new_item'      => sprintf(__('New %s', 'themetonaddon'), $label_custom),
                'all_items'     => sprintf(__('All %s', 'themetonaddon'), $label_custom),
                'view_item'     => sprintf(__('View %s', 'themetonaddon'), $label_custom),
                'menu_name'     => sprintf(__('%s', 'themetonaddon'), $label_custom)
            );

            $slug_custom = get_theme_mod($slug.'_slug');
            $slug_custom = !empty($slug_custom) ? $slug_custom : __($slug.'-item', 'themetonaddon');

            $args = array(
                'labels'            => $labels,
                'public'            => true,
                '_builtin'          => false,
                'capability_type'   => 'post',
                'hierarchical'      => false,
                'rewrite'           => array('slug' => $slug_custom),
                'supports'          => array('title', 'editor', 'thumbnail', 'comments', 'excerpt', 'custom-fields', 'page-attributes')
            );

            if($slug == 'services') {
                $args['hierarchical'] = true;
            }

            register_post_type($slug, $args);


            if( $slug!='services' ){
                $tax = array(
                    "hierarchical"  => true,
                    "label"         => __("Categories", 'themetonaddon'),
                    "labels"        => array(
                            "menu_name" => $label . __(" Categories", 'themetonaddon'),
                            "name" => $label . __(" Categories", 'themetonaddon'),
                            "all_items" => $label . __("    Categories", 'themetonaddon'),
                        ),
                    "singular_label"=> sprintf(__('Category', 'themetonaddon'), $label),
                    "rewrite"       => true
                );

                register_taxonomy($slug.'_category', $slug, $tax);
            }
            
        }
    }


    // edit team columns
    public function team_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Team", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }
   
    // custom team columns
    public function team_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'team_category', '', ', ', '');
                break;
        }
    }

    // edit header columns
    public function header_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Header", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }

    // custom header columns
    public function header_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'header_category', '', ', ', '');
                break;
        }
    }

    // edit footer columns
    public function footer_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Footer", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }

    // custom footer columns
    public function footer_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'footer_category', '', ', ', '');
                break;
        }
    }

    // edit page columns
    public function page_title_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Page Title", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }

    // custom page_title columns
    public function page_title_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'page_title_category', '', ', ', '');
                break;
        }
    }


    // edit cause columns
    public function cause_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Cause", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // custom cause columns
    public function cause_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'cause_category', '', ', ', '');
                break;
        }
    }


    // edit faq columns
    public function faq_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Faq", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // custom faq columns
    public function faq_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'faq_category', '', ', ', '');
                break;
        }
    }


    // edit mega menu columns
    public function megamenu_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Mega menu", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // custom mega menu columns
    public function megamenu_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'megamenu_category', '', ', ', '');
                break;
        }
    }


    // edit testimonials columns
    public function testimonials_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Testimonials", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // custom testimonials columns
    public function testimonials_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'testimonials_category', '', ', ', '');
                break;
        }
    }


    // edit hotel room columns
    public function hotelroom_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Hotel Room", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // custom hotelroom columns
    public function hotelroom_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'hotelroom_category', '', ', ', '');
                break;
        }
    }


    // edit rent columns
    public function rent_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Rent", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // custom rental columns
    public function rent_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'rent_category', '', ', ', '');
                break;
        }
    }


    // edit service columns
    public function service_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("service", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // custom service columns
    public function service_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'service_category', '', ', ', '');
                break;
        }
    }

  
    // portfolio edit columns
    public function portfolio_edit_columns($columns) {
        $columns = array(
            "cb"        => "<input type=\"checkbox\" />",
            "thumbnail column-comments" => "Image",
            "title"     => __("Portfolio Title", 'themetonaddon'),
            "category"  => __("Categories", 'themetonaddon'),
            "date"      => __("Date", 'themetonaddon'),
        );
        return $columns;
    }


    // portfolio custom columns
    public function portfolio_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail column-comments":
                if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, array(45,45));
                }
                break;
            case "category":
                echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');
                break;
            case "team":
                echo get_the_term_list($post->ID, 'position', '', ', ', '');
                break;
            case "testimonial":
                echo get_the_term_list($post->ID, 'testimonials', '', ', ', '');
                break;
        }
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
}
}

/*function themeton_verify_envato_purchase_code($code_to_verify) {
	$username = 'themeton';
	$api_key = 'lsh6w1prqj2qvxkb10mqr1svracic96w';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/". $username ."/". $api_key ."/verify-purchase:". $code_to_verify .".json");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);	 
	$output = json_decode(curl_exec($ch), true);
	curl_close($ch);
	return $output;
}
if (get_option('themeton_plugin_purchase_code')!='') { 
    $key = '';
    $key = get_option('themeton_plugin_purchase_code');
    $purchase_data = themeton_verify_envato_purchase_code( $key );

    if( isset($purchase_data['verify-purchase']['buyer']) ) {

    } else{
        return '';
    } 
}
else {
    add_action('admin_menu', 'themeton_plugin_code_checker');
    function themeton_plugin_code_checker() {
        add_submenu_page(
            'themes.php',
            'Plugin Licence',
            'Plugin Licence',
            'manage_options',
            'themeton-plugin-licence',
            'themeton_plugin_purchase' );
    }
    function themeton_plugin_purchase() {
        echo sprintf('<div class="wrap"><h2>%s</h2>',esc_html__( 'Plugin Licence', 'themeton' ));
        ?>
        <form action="" method="post">
            <div class="welcome-panel">
                <div>
                    <center>
                        <img src="https://0.s3.envato.com/files/106192964/avator.png" alt="logo" />
                        <h2><?php echo esc_html__( 'Themeton Addon Plugin Licence', 'themeton' ); ?></h2>
                    </center>
                </div>
                <div>
                    <center>
                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>
                    <b>Purchase code: 7a3652c8-024f-45eb-a634-5ce572202a17</b>
                    </p>
                    <input type="text" name="plugin_pruchase" class="regular-text" placeholder="Add Theme Purchase code" /><br>
                    <input type="submit" value="Enter Purchase Code" class="button button-primary" style="margin-top:10px; margin-bottom:30px;" name="purchase_btn" /><br>
                    <?php
                    if (isset($_POST['purchase_btn'])) {
                        $purchase_data = themeton_verify_envato_purchase_code( $_POST['plugin_pruchase'] );
                        if( isset($purchase_data['verify-purchase']['buyer']) ) {
                            update_option( 'themeton_plugin_purchase_code', $_POST['plugin_pruchase'] );
                            wp_redirect (get_admin_url());
                            exit;
                        }
                        else {
                            ?>
                            <div class="notice notice-error"><p>Invalid License Key!</p></div>
                            <?php
                        }
                    }
                    ?>
                    </center>
                </div>
            </div>
        </form>
        <?php
    }
    return '';
}*/

new TT_Post_type_PT();


if (!class_exists('TT_VC_PARAM_TYPE')) {
class TT_VC_PARAM_TYPE {
    
    function __construct() {
        vc_add_shortcode_param( 'select_preview', array(&$this,'select_preview_settings_field'), get_template_directory_uri().'/includes/vc-extend/param.js');
    }

    public static function select_preview_settings_field( $settings, $value ) {
        $content = '<div class="vc_row select_prev">';
        $checked = '';
        $active = '';
            if ($value == '') $value = $settings['std'];
            foreach ($settings['value'] as $key => $val )
                {
                    if (esc_attr($value) == $val['value']) { $checked = 'checked'; $active = 'active'; }
                    else { $checked = ''; $active = ''; }
                    $content .= "<div class='vc_col-sm-3 tt_select_prev_item $active'><label><div class='themeton-label-inner'><img src='".$val['image_url']."'><div class='label'>$key</div></div><input type='radio' class='tt_select_prev' name='param_".$settings['param_name']."' ".$checked." value='".$val['value']."' /></label></div>";
                }
        $content .= '<input type="hidden" id="tt_prev_field" class="wpb_vc_param_value wpb-input '.$settings['param_name'].' '.$settings['type'].'" name="'.$settings['param_name'].'" value="'.esc_attr($value).'">';
        $content .= '</div>';
        return $content;
    }
}
}

if( function_exists('vc_map') ) {
	new TT_VC_PARAM_TYPE();
}


class mungu_vc_extend {

    function __construct() {
        add_action('vc_before_init', array($this,'themeton_load_vc_elements'));
    }

    public static function plugin_path() {
        return plugin_dir_path( __FILE__ );
    }

    public static function plugin_url() {
        return plugin_dir_url( __FILE__ );
    }

    public static function list_files( $directory ){
        if( !function_exists('list_files') ){
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        $all_files = list_files($directory);
        return $all_files;
    }

    /*------------------------------------------
    VISUAL COMPOSER ELEMENTS - BEGIN
    -------------------------------------------*/
    public static function themeton_load_vc_elements(){
        $file_dir = mungu_vc_extend::plugin_path() . '/themeton-vc-elements/';
        $all_files = mungu_vc_extend::list_files($file_dir);
        foreach( $all_files as $filename ) {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if( $ext=='php' ){
                require_once $filename;
            }
        }
    }

    /*------------------------------------------
    VISUAL COMPOSER ELEMENTS - END
    -------------------------------------------*/

    /*------------------------------------------
    VISUAL COMPOSER GET BLOCKS - BEGIN
    -------------------------------------------*/
    public static function vc_get_library() {
        $folder = mungu_vc_extend::plugin_path() .'/themeton-vc-blocks/';
        $arg = array_diff(scandir($folder), array('..', '.'));
        $data = array();
        foreach ($arg as $file) {
            $element_folder = $folder.$file;
            $files = array_diff(scandir($element_folder), array('..', '.'));
            $img = NULL; $content = NULL;
            foreach ($files as $name) {
                $lib = pathinfo($name);
                if ($lib['extension']=='png' || $lib['extension']=='PNG' || $lib['extension']=='JPEG' || $lib['extension']=='jpg' || $lib['extension']=='JPG' || $lib['extension']=='jpeg') {
                    $img = preg_replace( '/\s/', '%20', mungu_vc_extend::plugin_path() .'/themeton-vc-blocks/'.$file.'/'.$name);
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
    /*------------------------------------------
    VISUAL COMPOSER GET BLOCKS - END
    -------------------------------------------*/
}
new mungu_vc_extend();

/*------------------------------------------
VISUAL COMPOSER BLOCKS EXTEND - BEGIN
-------------------------------------------*/

add_filter( 'vc_load_default_templates', 'mungu_template_for_vc' );
function mungu_template_for_vc($templates){
    return array();
}

function mungu_add_default_templates() {
    if( function_exists('vc_map') && is_user_logged_in()) {
        //mungu_add_default_templates();
        $templates = mungu_vc_extend::vc_get_library();
        return array_map( 'vc_add_default_templates', $templates );
    }

}
add_action('init', 'mungu_add_default_templates');

global $mungu_category_template;
class Mungu_VC_TAB {

	function __construct() {
		add_filter( 'vc_templates_render_category', array(
			$this,
			'renderTemplateBlock',
		), 10 );
		add_filter( 'vc_get_all_templates', array(
			$this,
			'addTemplatesTab',
		) );
	}

	public function addTemplatesTab( $data ) {
		$newCategory = array(
			'category'        => 'mungu_templates',
			'category_name'   => esc_html__( 'Lagom', 'themetonaddon' ),
			'category_weight' => 1,
			'templates'       => $this->getAllTemplates(),
		);
		$data[] = $newCategory;
		return $data;
	}

	public function getTemplates() {
		$templates = mungu_vc_extend::vc_get_library();
		return $templates;
	}

	protected function get_template_categories() {
		$template = $this->getAllTemplates();
		$categories = array();
		foreach ($template as $key => $value) {
			$categories[$value['category']] = ucfirst($value['category']);
		}
		ksort($categories);
		$all['all'] = 'All';
		$custom = array(
			'contents' => esc_html__("Contents", 'themetonaddon'),
			'services' => esc_html__("Features", 'themetonaddon'),
			'contacts' => esc_html__("Contacts", 'themetonaddon'),
			'header & footer' => esc_html__("Header & Footer", 'themetonaddon'),
		);
		$categories = $all + $custom + $categories;
		$count = array();
		$count = $categories;
		foreach ($count as $key => $value)
			$count[$key] = 0;

		$count['all'] = count($template);
		
		foreach ($template as $key => $value) {
			$count[$value['category']]++;
		}



		$output = '';
		$output .= '<div class="sortable_templates">';
		$output .= '<ul class="mungu_sortable_ul">';
		$i = 0;
		foreach( $categories as $key => $value ) {
			$i++;
			$active = ( $i == 1 ) ? 'class="active" ' : '';
			if ($i == 1) $value = 'All';
			$output .= '<li ' . $active . 'data-filter="' . $key . '">' . $value . ' <span class="count">'.$count[$key].'</span></li>';
		}
		$output .= '</ul>';
		$output .= '</div>';
		return $output;

	}

	public function renderTemplateBlock( $category ) {
		if ( 'mungu_templates' === $category['category'] ) {
			$category['output'] = '<div class="vc_col-md-2">';
			$category['output'] .= $this->get_template_categories();
			$category['output'] .= '</div>';
			$category['output'] .= '
			<div class="vc_column vc_col-sm-10">
				<div class="vc_ui-template-list vc_templates-list-default_templates vc_ui-list-bar mungu-block-container" data-vc-action="collapseAll">';
			if ( ! empty( $category['templates'] ) ) {
				foreach ( $category['templates'] as $template ) {
					$category['output'] .= $this->renderTemplateListItem( $template );
				}
			}
			$category['output'] .= '
			</div>
		</div>';
		}
		return $category;
	}

	public function getAllTemplates() {
		$data = array();
		$mungu_templates = $this->getTemplates();
		$category_templates = array();
		foreach ( $mungu_templates as $template_id => $template_data ) {
			$category_templates[] = array(
				'unique_id' => $template_id,
				'name' => $template_data['name'],
				'type' => 'mungu_templates',
				'image' => isset( $template_data['image_path'] ) ? $template_data['image_path'] : false,
				'custom_class' => isset( $template_data['custom_class'] ) ? $template_data['custom_class'] : false,
				'category' => strtolower($template_data['cat_display_name']),
			);
			if ( ! empty( $category_templates ) ) {
				$data = $category_templates;
			}
		}
		return $data;
	}

	public function renderTemplateListItem( $template ) {
		$name = isset( $template['name'] ) ? esc_html( $template['name'] ) : esc_html( esc_html__( 'No title', 'themetonaddon' ) );
		$template_id = esc_attr( $template['unique_id'] );
		$template_id_hash = md5( $template_id ); // needed for jquery target for TTA
		$template_name = esc_html( $name );
		$template_name_lower = esc_attr( vc_slugify( $template_name ) );
		$template_type = esc_attr( isset( $template['type'] ) ? $template['type'] : 'custom' );
		$custom_class = esc_attr( isset( $template['custom_class'] ) ? $template['custom_class'] : '' );
		$template_image = esc_attr( isset( $template['image'] ) ? $template['image'] : '' );
		$id = strtolower($template['category']);
		$output = <<<HTML
					<div class="vc_ui-template vc_templates-template-type-default_templates $custom_class"
						data-template_id="$template_id"
						data-template_id_hash="$template_id_hash"
						data-category="$id"
						data-template_unique_id="$template_id"
						data-template_name="$template_name_lower"
						data-template_type="default_templates"
						data-vc-content=".vc_ui-template-content">
HTML;
		 
        $img = sprintf('<div class="img-placeholder" style="background-image:url(%2$s);"><img src="%1$s" alt="%3$s"></div>',mungu_vc_extend::plugin_url()."/images/dim/5x3.png", $template_image,$template['name']);
        $output .= '<div class="vc_ui-list-bar-item-trigger mungu_vc_layout_item vc_col-sm-4" title="Add template" data-template-handler="" data-vc-ui-element="template-title">'.$img;
        $output .= '<h1 class="mungu_vc_title">'.$template_name.'</h1><span>'.$template['category'].'</span>';
		$output .= <<<HTML
						</div>
						<div class="vc_ui-template-content" data-js-content>
						</div>
					</div>
HTML;

		return $output;
    }
    
}

if( function_exists('vc_map') ) {
	new Mungu_VC_TAB();
}

function mungu_template_panel() {
	wp_enqueue_style( 'themeton-vc-template',  mungu_vc_extend::plugin_url().'/css/common.css');
	wp_enqueue_script('themeton-vc-extend-script',  mungu_vc_extend::plugin_url() .'/js/vc-content-box.js', array('jquery'), false, true );
}
add_action('admin_enqueue_scripts', 'mungu_template_panel');
/*------------------------------------------
VISUAL COMPOSER BLOCKS EXTEND - END
-------------------------------------------*/

$redux_opt_name = "themeton_redux";

if(!function_exists('redux_register_custom_extension_loader')) :
    function redux_register_custom_extension_loader($ReduxFramework) {
        $path    = dirname( __FILE__ ) . '/extensions/';
            $folders = scandir( $path, 1 );
            foreach ( $folders as $folder ) {
                if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
                    continue;
                }
                $extension_class = 'ReduxFramework_Extension_' . $folder;
                if ( ! class_exists( $extension_class ) ) {
                    // In case you wanted override your override, hah.
                    $class_file = $path . $folder . '/extension_' . $folder . '.php';
                    $class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
                    if ( $class_file ) {
                        require_once( $class_file );
                    }
                }
                if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
                    $ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
                }
            }
    }
    // Modify {$redux_opt_name} to match your opt_name
    add_action("redux/extensions/{$redux_opt_name}/before", 'redux_register_custom_extension_loader', 0);
endif;



class Themeton_Tpl_Social{

    public static function show_social_share($meta) {
        global $themeton_redux, $post;
        $type = 'posts';
        if ($post->post_type) {$type = $post->post_type.'s';}
        if ($meta == 'default' || $meta == '') {
            if( isset($themeton_redux['social_sharevisibility'][$type]) && $themeton_redux['social_sharevisibility'][$type]==1 ) return true;
            else return false;
        }
        else {
            if ($meta == 1) return true;
            else return false;
        }
    }


    public static function social_share_button() {
        global $themeton_redux;
        $share = $themeton_redux['social_shares'];
        $title = esc_url(get_the_permalink());
        $share_button = array( 
                    'facebook' => array('url' => 'https://www.facebook.com/sharer.php?url='.$title ,
                                        'icon' => 'fa fa-facebook-square' ),
                    'twitter' => array('url' => 'https://twitter.com/share?url='.$title ,
                                       'icon' => 'fa fa-twitter-square' ),
                    'googleplus' => array('url' => 'https://plus.google.com/share?url='.$title,
                                          'icon' => 'fa fa-google-plus-square' ),
                    'pinterest' => array('url' => "http://pinterest.com/pin/create/button/?url=".$title."&media=".esc_url(wp_get_attachment_image_src(get_post_thumbnail_id())[0])."&description=".esc_url(get_the_excerpt()),
                                         'icon' => 'fa fa-pinterest-square' ),
                    'email' => array('url' => 'mailto:?subject='.esc_url(get_the_title()).'&body='.$title,
                                         'icon' => 'fa fa-envelope' ) 
            );
        $output = '<div class="share_button uk-float-right">'.esc_html__('Share : ','themetonaddon');
        foreach ($share as $key => $value) {
            if ($value==1) $output .= '<a href="'.$share_button[$key]['url'].'" target="_blank"><i class="post-share-'.$key.' '.$share_button[$key]['icon'].'"></i></a>'; 
        }
        $output .="</div>";
        print $output;
    }

}

new Themeton_Tpl_Social();