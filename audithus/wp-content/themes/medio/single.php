<?php get_header();
$style = ''; 
if (Themeton_Std::getmeta('content_top')!=NULL) { $top = Themeton_Std::getmeta('content_top'); $top = "padding-top:".abs($top)."px;"; $style .= $top; }
if (Themeton_Std::getmeta('content_bottom')!=NULL) { $bottom = Themeton_Std::getmeta('content_bottom'); $bottom = "padding-bottom:".abs($bottom)."px;"; $style .= $bottom; }

while ( have_posts() ) : the_post();
    $page_layout = 'right';
    if( Themeton_Std::getmeta('layout') == '' || Themeton_Std::getmeta('layout') == 'default') {
        $page_layout = Themeton_Std::getopt('post_layout');
    } else {
        $page_layout = Themeton_Std::getmeta('layout');
    }
    $page_layout = $page_layout == '' ? 'right' : $page_layout;
    
    global $themeton_sidebar;
    $themeton_sidebar = 'post';

    $column_classes = array(
        'full' => 'uk-width-1-1@s',
        'dual' => 'uk-width-1-1@s uk-width-3-5@m',
        'left' => 'uk-width-1-1@s uk-width-3-4@m',
        'right' => 'uk-width-1-1@s uk-width-3-4@m',
    );
?>
<!-- Content
================================================== -->
<section class="uk-section" <?php if ($style!='') { $style = 'style="'.$style.'"'; printf($style); } ?>>
<?php
if (get_post_type( get_the_ID() ) == 'header' || get_post_type( get_the_ID() ) == 'footer' || get_post_type( get_the_ID() ) == 'page_title') {
    $page_layout = 'full';
    $class = '';
}
else {
    $class='uk-container';
}
?>

    <div class="<?php echo esc_attr($class); ?> uk-position-relative">
        <div class="uk-grid uk-flex uk-flex-center">

            <div class="medio-blog-container <?php echo esc_attr($column_classes[$page_layout]);?>">
                <article <?php if ($class!='') post_class('medio-blog-single uk-article'); ?>>
                    <div class="uk-text-center"><h1 class='post-title medio-brand-title'><?php the_title(); ?></h1></div>
                    <?php
                    $bool = false;
                    if( has_post_thumbnail() ){
                        if (Themeton_Std::getmeta('featuredimage') == '1') {$bool = true;}
                        else { 
                            if (Themeton_Std::getmeta('featuredimage') == 'default' || Themeton_Std::getmeta('featuredimage') ==NULL) {
                                if (Themeton_Std::getopt('post_featuredimage') == '1' || Themeton_Std::getopt('post_featuredimage') != NULL)  $bool = true;
                            }
                        }
                        
                        if ($bool == true) { ?>
                            <div class="uk-cover-container uk-text-center"><?php echo get_the_post_thumbnail(get_the_id(), 'full'); ?></div>
                            <?php
                        }
                    }
                    ?>
                    
                    <div class="medio-blog-content mb0">
                    <div class="titulo-post"><h2><?php the_title(); ?></h2></div>
                        <div class='post-content'>
                        <?php the_content();  ?>
                        </div><!-- end .post-content -->
                        <div class='uk-clearfix'></div>

                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links mb3"><span class="page-links-title">' . esc_html__('Pages:', 'medio') . '</span>',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                            'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'medio') . ' </span>%',
                            'separator' => '<span class="screen-reader-text">, </span>',
                        ));
                        ?>
                        <hr class='mb3'>
                        <?php
                        if (class_exists('Themeton_Tpl_Social') && Themeton_Tpl_Social::show_social_share(Themeton_Std::getmeta('social'))) Themeton_Tpl_Social::social_share_button();
                        echo '<div class="uk-clearfix clearfix"></div>';

                        $categories = get_the_category();
                        $output = '';
                        if (!empty($categories)) {
                            $numItems = count($categories);
                            $indx = 0;
                            
                            ?>
                            <div class="blog-date">
                            <span class="color-brand"><?php esc_html_e('Categorias: ', 'medio'); ?></span>
                            <?php
                            foreach ($categories as $category) {?>
                                <a class="uk-button-text" href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
                                <?php if(++$indx !== $numItems) { echo esc_html(', '); }
                            } ?>
                            </div>
                            <?php
                        }

                        $tag_list = get_the_tag_list();
                        if( !empty($tag_list) ): 
                            print '<div class="blog-tags">';
                            print '<span class="color-brand">'.esc_html__('Tags: ', 'medio').'</span>';
                            echo get_the_tag_list('', '');
                            print '</div>';
                        endif;

                        echo "<div class='uk-clearfix'></div>";
                        ?>
                    </div><!-- end .medio-blog-content -->

                    <?php
                    if ($class!='') {
                        if(Themeton_Std::getmeta('authorbox')!=='0') {
                            if(Themeton_Std::getmeta('authorbox')=='1') {get_template_part( 'template-parts/author', 'info' );}
                            elseif (Themeton_Std::getopt('post_authorbox')==1){get_template_part( 'template-parts/author', 'info' );}
                        }
                    }

                    echo '<div class="uk-clearfix clearfix"></div>';
                    
                    if( Themeton_Std::getmeta('related_show') != '0' ): 
                        Themeton_Tpl::get_related_post_types();
                    endif;
                    
                    if ($class!='') {
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    }
                    ?>

                </article>
            </div><!-- end .medio-blog-container -->

            <?php
            // Right sidebar
            if( $page_layout=='right' || $page_layout == 'dual' ):
                get_sidebar();
            endif; ?>

            <?php
            // Left sidebar
            if( $page_layout=='left' || $page_layout=='dual'):
                get_sidebar('left');
            endif; ?>

        </div><!-- end .uk-grid -->
    </div><!-- end .uk-container -->
    
</section>
<?php endwhile; ?>

<?php get_footer(); ?>