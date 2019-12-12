<?php get_header(); ?>
<?php   
    $args = array( 'post_type' => 'hotelroom', 'posts_per_page' => 8 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); 
?>
    <div class="hotelrrom-items">
        <?php the_title(); 
            if ( has_post_thumbnail( $post->ID ) ) {
                echo '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '">';
                echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
                echo '</a>'; 
            }
        ?>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>