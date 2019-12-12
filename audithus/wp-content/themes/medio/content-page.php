<article <?php post_class('medio-page-single uk-article'); ?>>
    <?php
    $t = 0;
    if( has_post_thumbnail() ){

        if (Themeton_Std::getmeta('fea
        turedimage') == '1') $t = 1;
            else 
            if (Themeton_Std::getmeta('featuredimage') == 'default' || Themeton_Std::getmeta('featuredimage') == NULL) {
            if (Themeton_Std::getopt('page_featuredimage') == '1' || Themeton_Std::getopt('page_featuredimage')!=NULL)  $t = 1;
            }
        if ($t == 1) { ?>
            <div class="uk-cover-container uk-height-medium"><?php echo get_the_post_thumbnail(get_the_id(), 'press-grid-featured-image', array('class'=>'uk-cover'));?></div>
            <?php
        }
    }
 
    the_content(); 

    wp_link_pages(array(
        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'medio') . '</span>',
        'after' => '</div>',
        'link_before' => '<span>',
        'link_after' => '</span>',
        'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'medio') . ' </span>%',
        'separator' => '<span class="screen-reader-text">, </span>',
    ));
    ?>
    
    <?php
    if ( class_exists('Themeton_Tpl_Social') && Themeton_Tpl_Social::show_social_share(Themeton_Std::getmeta('social')) ) { Themeton_Tpl_Social::social_share_button(); }
    ?>
    <div class="uk-clearfix clearfix"></div>
    <?php
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</article>