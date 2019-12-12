<?php get_header(); ?>
<?php 
    $args = array(
        'post_type' => 'hotelroom',
    );
?>
<section class="uk-section">
    <div class="uk-container uk-position-relative">
        <div class="uk-grid uk-child-width-1-1@m hotel-item">
        <?php
            $posts_query = new WP_Query($args);
            while ( $posts_query->have_posts() ):
            $posts_query->the_post(); 
                get_template_part( 'content', 'hotelroom');
            endwhile;
        ?>
            <div class="pagination-container uk-flex uk-flex-center uk-width-1-1@m"><?php echo Themeton_Tpl::pagination(); ?>
                <div class="uk-clearfix clearfix"></div>
            </div>

        </div>
    </div>

</section>

<?php get_footer(); ?>