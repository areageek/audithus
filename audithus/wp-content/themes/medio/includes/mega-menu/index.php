<?php
if( !class_exists('Walker_Nav_Menu_Edit') ){
    require_once ABSPATH . 'wp-admin/includes/class-walker-nav-menu-edit.php';
}

class Medio_Walker_Nav_Menu_Mega extends Walker_Nav_Menu_Edit  {

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $item_id = esc_attr($item->ID);
        $walker = new Walker_Nav_Menu_Edit();
        $walker->start_el( $item_output, $item, $depth, $args, $id);
        $args = array(
            'post_type' => 'megamenu'
        );
        $temp = $active = '';
        $query = new WP_Query($args);
        while ( $query->have_posts() ){
            $query->the_post();
            if ($item->mega_menu==get_the_ID()) $active = 'selected'; 
            else $active = '';
            $temp .= '<option '.$active.' value="'.get_the_ID().'">'.get_the_title().'</option>';
        }

        $custom_html = '<p class="field-activemega description description-wide">
                            <label>
                                '.esc_html__('Select Mega Menu', 'medio').'<br>
                            <select id="edit-menu-item-medio-['.$item_id.']" name="edit-menu-item-medio-'.$item_id.'">
                                <option value="0">None</option>
                                '.$temp.'
                            </select>
                            </label>
                        </p>';

        $output .= str_replace('<div class="menu-item-actions description-wide submitbox">', $custom_html . '<div class="menu-item-actions description-wide submitbox">', $item_output);
    }
}



class Medio_Mega_Menu{

    function __construct(){
        add_filter('wp_edit_nav_menu_walker', array($this, 'edit_nav_menu_walker'), 10, 2);

        add_filter('wp_setup_nav_menu_item', array($this, 'setup_nav_menu_item'));
        add_action('wp_update_nav_menu_item', array($this, 'update_nav_menu_item'), 10, 3);

        add_filter('walker_nav_menu_start_el', array($this, 'custom_walker_nav_menu_start_el'), 10, 4);
    }

    public function edit_nav_menu_walker($walker, $menu_id) {
        return 'Medio_Walker_Nav_Menu_Mega';
    }

    public function custom_walker_nav_menu_start_el( $item_output, $item, $depth, $args ){
        $item_output = '';
        $item_output .= sprintf('<a href="%s">%s</a>',$item->url,$item->title);
        if ($item->mega_menu!=0) {
            $content = get_post($item->mega_menu);
            $item_output .= sprintf('<ul class="mega-menu pl0"><li>%s</li></ul>',do_shortcode($content->post_content));
            wp_reset_postdata();
        }
        return $item_output;
    }


    
    public function setup_nav_menu_item($menu_item) {
        $menu_item->mega_menu = get_post_meta( $menu_item->ID, "megamenu_page_id", true );
        return $menu_item;
    }
    public function update_nav_menu_item($menu_id, $menu_item_db_id, $args ) {
        $custom_value = isset($_REQUEST["edit-menu-item-medio-".$menu_item_db_id]) ? $_REQUEST["edit-menu-item-medio-".$menu_item_db_id] : '';
        update_post_meta( $menu_item_db_id, "megamenu_page_id", $custom_value );
    }

}

if( class_exists('Walker_Nav_Menu') ){
    new Medio_Mega_Menu();
}
?>