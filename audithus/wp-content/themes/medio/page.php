<?php get_header();
$style = ''; 
if (Themeton_Std::getmeta('content_top')!=NULL) { $top = Themeton_Std::getmeta('content_top'); $top = "padding-top:".abs($top)."px;"; $style .= $top; }
if (Themeton_Std::getmeta('content_bottom')!=NULL) { $bottom = Themeton_Std::getmeta('content_bottom'); $bottom = "padding-bottom:".abs($bottom)."px;"; $style .= $bottom; }
while ( have_posts() ) : the_post();

    $page_layout = 'full';

    if( Themeton_Std::getmeta('layout') == '' || Themeton_Std::getmeta('layout') == 'default') {
        if (Themeton_Std::getopt('page_layout')!='') $page_layout = Themeton_Std::getopt('page_layout');
    } else {
        $page_layout = Themeton_Std::getmeta('layout');
    }

    global $themeton_sidebar;
    $themeton_sidebar = 'page';

    $column_classes = array(
        'full' => 'uk-width-1-1@s',
        'dual' => 'uk-width-1-1@s uk-width-3-5@m',
        'left' => 'uk-width-1-1@s uk-width-3-4@m',
        'right' => 'uk-width-1-1@s uk-width-3-4@m', 
    );
    $cclass = Themeton_Std::getopt('container_size');
?>
<section class="uk-section" <?php if ($style!='') { $style = 'style='.$style; echo esc_html($style); } ?> >
    <div class="uk-container uk-container-<?php echo esc_attr($cclass); ?> uk-position-relative">
        <div class="uk-grid uk-flex uk-flex-center">

            <div class="<?php echo esc_attr($column_classes[$page_layout]);?>">
                <?php get_template_part( 'content', 'page' ); ?>
            </div>
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
        </div>
    </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>