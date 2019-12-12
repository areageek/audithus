<?php get_header(); ?>
<section class="uk-section">

    <div class="uk-container uk-position-relative">
        <div class="uk-grid grid3 uk-child-width-1-3@m">
            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'content', 'service');
            endwhile;
            ?>
            <div class="pagination-container uk-flex uk-flex-center uk-width-1-1@m"><?php echo Themeton_Tpl::pagination(); ?><div class="uk-clearfix clearfix"></div></div>

        </div>
    </div>

</section>

<?php get_footer(); ?>