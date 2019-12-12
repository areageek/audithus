<div class="nothing-found media text-center">
    <h4 class="blog_title"><?php esc_html_e('Nothing Found', 'medio'); ?></h4>

    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
        
        <p><?php esc_html_e('Ready to publish your first post?', 'medio');?>
            <a href="<?php echo esc_url(admin_url('post-new.php')); ?>"><?php esc_html_e('Get started here', 'medio')); ?></a>
        </p>

    <?php elseif ( is_search() ) : ?>

        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'medio'); ?></p>
        <div class="widget widget_search mt3">
            <?php get_search_form(); ?>
        </div>

    <?php else : ?>

        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'medio'); ?></p>
        <div class="widget widget_search">
            <?php get_search_form(); ?>
        </div>

    <?php endif; ?>

</div>