<?php get_header(); 

    $page_layout = Themeton_Std::getopt('archive_layout');

    if(!isset($page_layout) || $page_layout == '') {
        $page_layout = 'right';
    }
    global $themeton_sidebar;
    $themeton_sidebar = 'archive';

    $column_classes = array(
        'full' => 'uk-width-1-1@s',
        'dual' => 'uk-width-1-1@s uk-width-3-5@m',
        'left' => 'uk-width-1-1@s uk-width-3-4@m',
        'right' => 'uk-width-1-1@s uk-width-3-4@m',
    );
?> 
<section class="uk-section">

    <div class="uk-container uk-position-relative">
        <div class="uk-grid uk-flex uk-flex-center">

           <?php
            $class='1';  $cls = '';
            if (Themeton_Std::getopt('archive_style')=='grid2') $class=2;
            if (Themeton_Std::getopt('archive_style')=='grid3') $class=3;
            if (Themeton_Std::getopt('archive_style')=='grid4') $class=4;
            if (Themeton_Std::getopt('archive_style')=='masonry2') { $class=2; $cls='a-grid2'; }
            if (Themeton_Std::getopt('archive_style')=='masonry3') { $class=3; $cls='a-grid3'; }
            if (Themeton_Std::getopt('archive_style')=='masonry4') { $class=3; $cls='a-grid4'; }
            ?>
            <div class="<?php echo esc_attr($column_classes[$page_layout]);?>">
                <div class="<?php echo esc_attr($cls); ?>">

                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'content', 'archive' );
                    endwhile;
                    ?>
                </div>
                <div class="pagination-container pagination-style-2 uk-flex uk-flex-center uk-width-1-1@m"><?php echo Themeton_Tpl::pagination(); ?><div class="uk-clearfix clearfix"></div></div>

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
<?php get_footer(); ?>