<?php get_header();
$style = ''; 
if (Themeton_Std::getmeta('content_top')!=NULL) { $top = Themeton_Std::getmeta('content_top'); $top = "padding-top:".abs($top)."px;"; $style .= $top; }
if (Themeton_Std::getmeta('content_bottom')!=NULL) { $bottom = Themeton_Std::getmeta('content_bottom'); $bottom = "padding-bottom:".abs($bottom)."px;"; $style .= $bottom; }

    $page_layout = 'full';
    if( Themeton_Std::getmeta('layout') == '' || Themeton_Std::getmeta('layout') == 'default') {
        $page_layout = Themeton_Std::getopt('archive_layout');
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
    if (is_product()) {
        $page_layout = 'full';
    }
    if (is_product_category()) {
        $page_layout = 'full';
    }
    $c_class='uk-container';
    if (is_shop() || is_product_category()) $c_class = 'uk-container';
?>
<section class="uk-section" <?php if ($style!='') { $style = 'style="'.$style.'"'; printf($style); } ?> >
    <div class="<?php echo esc_attr($c_class); ?> uk-position-relative">
        <div class="uk-grid">
            <div class="uk-width-1-1@s">
                <?php medio_woocommerce_content(); ?>
            </div><!-- end .uk-width-1-1@s -->
        </div><!-- end .uk-grid -->
    </div><!-- end .uk-container -->
</section>

<?php get_footer(); ?>