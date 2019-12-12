<?php get_header(); ?>
    <?php 
      $post_id = Themeton_Std::getopt('error_main_page');
      if (!empty($post_id) ){
        $content = get_post($post_id);
            echo '<div class="uk-container">';
            echo do_shortcode($content->post_content);
            echo '</div>';
      }else{
        get_template_part( 'template-parts/error-page' );
      }
    ?>
<?php get_footer(); ?>