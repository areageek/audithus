<?php get_header(); ?>
<?php  
	$args = array(
        'post_type' => 'testimonials',
    );
?>
<section class="uk-section">
	<div class="uk-container uk-position-relative">
	    <div class='medio-element uk-grid uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1@s $class' id='testimonial_grid'>
	            
	           <?php
                    $posts_query = new WP_Query($args);
                    while ( $posts_query->have_posts() ):
                    $posts_query->the_post(); 
                        get_template_part( 'content', 'testimonials');
                    endwhile;
                ?>
	    </div>
	</div>    

</section>

<?php get_footer(); ?>