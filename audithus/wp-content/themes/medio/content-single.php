<article <?php post_class('uk-article'); ?>>
    <?php if( has_post_thumbnail() ){ ?>
        <div class="uk-cover-container uk-height-medium"><?php echo get_the_post_thumbnail(get_the_id(), 'press-grid-featured-image', array('class'=>'uk-cover'))?></div>
    <?php } ?>
    <p class="uk-article-meta"><?php esc_html_e('Written by ', 'medio'); ?><a href="<?php the_author_link(); ?>"><?php the_author_meta( 'display_name', $post->post_author ); ?></a> <?php esc_html_e('on', 'medio'); ?> <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a>
    <?php the_content(); ?>
    <?php wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'medio') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'medio') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
    ?>

    <?php
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</article>