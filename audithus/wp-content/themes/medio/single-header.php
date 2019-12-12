<?php get_header();  ?>
<!-- Content
================================================== -->
<section class="uk-section">
    <div class="uk-container uk-position-relative">
        <?php 
        while ( have_posts() ) : the_post();
        the_content(); 
        endwhile;
        ?>
    </div>
</section>

<?php get_footer(); ?>