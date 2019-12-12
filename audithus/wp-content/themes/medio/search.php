<?php get_header(); ?>

<section class="uk-section">

    <div class="uk-container uk-position-relative">
        <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-1-1@s uk-width-3-4@m">
                <?php
                if (isset($_GET['advanced_search']) && $_GET['advanced_search']=='true') {
                    $field_array = array('select','text','checkbox','radio','date','number');
                    $select_meta = array();
                    foreach ($field_array as $value) {
                        if (isset($_GET[$value.'1'])) {
                            $k=1;
                            while (isset($_GET[$value.$k]))
                            {
                                if (isset($_GET['meta-'.$value.$k])) {
                                    $select_meta[] = array(
                                        'key' => '_'.$_GET['meta-'.$value.$k],
                                        'value' => $_GET[$value.$k],
                                        'compare' => '='
                                    );
                                }
                                if (isset($_GET['cfield-'.$value.$k])) {
                                    $select_meta[] = array(
                                        'key' => $_GET['cfield-'.$value.$k],
                                        'value' => $_GET[$value.$k],
                                        'compare' => '='
                                    );
                                }
                                $k++;
                            }
                        }
                    }

                    $args = array(
                        'post_type' => $_GET['post_type'],
                        'posts_per_page' => -1,
                        'category_name' => $_GET['categories'],
                        'meta_query' => array(
                            'relation' => 'AND',
                            $select_meta
                        ),
                        'ignore_sticky_posts' => true,
                    );
                    $posts_query = new WP_Query($args);
                    if ($posts_query->have_posts()) {
                        while ( $posts_query->have_posts() ) {
                            $posts_query->the_post();
                            get_template_part( 'content', get_post_format() );
                        }
                    }
                    else {
                        ?>
                        <h3><?php esc_html_e('Your search term cannot be found', 'medio'); ?></h3>
                        <p><?php esc_html_e('Sorry, the post you are looking for is not available. Maybe you want to perform a search?', 'medio'); ?></p>
                        <?php get_search_form();?>
                        <br>
                        <p><?php esc_html_e('For best search results, mind the following suggestions:', 'medio'); ?></p>
                        <ul class="borderlist-not">
                            <li><?php esc_html_e('Always double check your spelling.', 'medio'); ?></li>
                            <li><?php esc_html_e('Try similar keywords, for example: tablet instead of laptop.', 'medio'); ?></li>
                            <li><?php esc_html_e('Try using more than one keyword.', 'medio'); ?></li>
                        </ul>
                        <?php
                    }
                }
                else {
                    if(have_posts()) :
                        while ( have_posts() ) : the_post();
                            get_template_part( 'content', 'archive' );
                        endwhile;
                    else: ?>
                        <h3><?php esc_html_e('Your search term cannot be found', 'medio'); ?></h3>
                        <p><?php esc_html_e('Sorry, the post you are looking for is not available. Maybe you want to perform a search?', 'medio'); ?></p>
                        <?php get_search_form();?>
                        <br>
                        <p><?php esc_html_e('For best search results, mind the following suggestions:', 'medio'); ?></p>
                        <ul class="borderlist-not">
                            <li><?php esc_html_e('Always double check your spelling.', 'medio'); ?></li>
                            <li><?php esc_html_e('Try similar keywords, for example: tablet instead of laptop.', 'medio'); ?></li>
                            <li><?php esc_html_e('Try using more than one keyword.', 'medio'); ?></li>
                        </ul>
                    <?php
                    endif;
                }
                ?>
            </div>
            <?php get_sidebar(); ?> 
        </div>
    </div>

</section>

<?php get_footer(); ?>