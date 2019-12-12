<article <?php post_class('medio-blog-container uk-grid-margin medio-blog-col1 blog-archive-style'); ?>>
    <?php

    if (Themeton_Std::getopt('archive_layout')=='full') { $thumbsize = 'medio-blog-full-thumbnail'; }
    else { $thumbsize = 'medio-blog-thumbnail'; }

    echo Themeton_Tpl::get_post_image($thumbsize, 'auto', 'plus', true);
    ?>
    <div class="medio-blog-content">
        <div class="blog-post-meta-section">
            <h3 class="uk-article-title" >
                <a class="uk-link-reset" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </div>
        <div class="blog-date mb2">
            <span class="uk-icon mr1" data-uk-icon="icon:calendar"></span>
            <a class="uk-button-text color-brand" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>

            <span class="uk-icon mr1 ml2" data-uk-icon="icon:comment"></span>
            <a class="uk-button-text color-brand" href='<?php the_permalink();?>#comments'><?php printf( _nx( 'One comment', '%1$s Comments', get_comments_number(), 'comment', 'medio' ),
                    number_format_i18n( get_comments_number() ), get_the_title() );
?></a>
        </div>
        <?php the_excerpt(); ?>
        <p><a class="uk-button uk-button-default color-ancient-bg clearfix" href="<?php the_permalink(); ?>"><?php esc_html_e("Read More", 'medio'); ?> <span class="uk-icon" data-uk-icon="icon:arrow-right"></span></a></p>
    </div>
</article>
<hr class="uk-divider-icon">