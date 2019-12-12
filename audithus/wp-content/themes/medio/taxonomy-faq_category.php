<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'faq',
    );
?>
<section class="uk-section">
    <div class="uk-container uk-position-relative">
        <div class="uk-grid-match uk-grid-collapse uk-grid" id="faq_container">
            <div class="uk-width-1-4@m uk-width-1-4@l">
                <div class="faq_sidebar">
                    <div id='faq-filter'>
                        <ul>
                            <li ><a href='javascript:;' class='active' data-filter='*' ><?php esc_attr_e('All', 'medio'); ?></a></li>
                            <?php
                            $cats = '';
                            $filter_html = $last_cat = '';
                            $cat_titles = array();
                            $terms = get_terms('faq_category');
                            foreach ($terms as $term){
                                $cat_title = $term->name;
                                $cat_slug = $term->slug;
                                $cat_titles []= $cat_title;
                                ?>
                                <li><a href="javascript:;" class="filter-item" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($cat_title); ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-3-4@m uk-width-3-4@l pr10 pt0 pr1@s uk-padding-small">
                <div class="faq_search"> <?php get_search_form();?></div>
                <?php
                    $posts_query = new WP_Query($args);
                    while ( $posts_query->have_posts() ):
                    $posts_query->the_post(); 

                        get_template_part( 'content', 'faq');
                    endwhile;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>