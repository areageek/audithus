<article <?php post_class('medio-blog-container uk-grid-margin medio-blog-col1'); ?>>
    <?php

    if (Themeton_Std::getopt('archive_layout')=='full') { $thumbsize = 'medio-blog-full-thumbnail'; }
    else { $thumbsize = 'medio-blog-thumbnail'; }

    echo Themeton_Tpl::get_post_image($thumbsize, 'auto', 'plus', true);
    ?>
    <div class="medio-blog-content">
        <div class="blog-date"><a class="uk-button-text" href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option("date-format")); ?></a></div>
        <div class='clearfix'></div>
        <h3 class="uk-article-title" >
            <a class="uk-link-reset" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <?php the_excerpt(); ?>
        <a class="uk-button uk-button-text readmorelink" href="<?php the_permalink(); ?>"><?php esc_html_e("Read More", 'medio'); ?> <span class="uk-icon" data-uk-icon="icon:arrow-right"></span></a>
    </div>
</article>