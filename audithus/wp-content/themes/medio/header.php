<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif;
    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v4.0&appId=663289570407961&autoLogAppEvents=1"></script>
    <!-- Loader -->
    <?php echo medio_select_loader(); ?>
    
    <!-- Wrapper -->
    <?php 
    
    if (get_post_type()!='header' && get_post_type()!='page_title' && get_post_type()!='footer') { ?>
        <div class="wrapper uk-offcanvas-content">
    <?php } else { ?>
        <div>
    <?php
    }
    // HEADER LAYOUT SELECTION
    if (get_post_type()!='header' && get_post_type()!='page_title' && get_post_type()!='footer') :
    if (Themeton_VC::header()) { echo Themeton_VC::header(); }
    else {
        $cclass = Themeton_Std::getopt('container_size');
    ?>
        <header id="header">
            <div class="uk-container uk-container-<?php echo esc_attr($cclass); ?> medio-default-header">
                <nav class="uk-navbar">
                    <div class="uk-width-1-4@m uk-width-1-2 uk-flex">
                        <div class="uk-navbar-item">
                            <div class="uk-logo">
                                <?php Themeton_Tpl::get_logo(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-right uk-width-expand">
                        <?php
                        wp_nav_menu( array(
                            'menu_id'           => 'primary-nav',
                            'menu_class'        => 'uk-navbar-nav themeton-menu themeton-menu-top-border uk-flex-right uk-flex-middle uk-flex-wrap uk-visible@m',
                            'theme_location'    => 'primary',
                            'container'         => '',
                            'fallback_cb'       => 'themeton_primary_callback',
                        ) );
                        ?>
<ul id="primary-nav" class="uk-navbar-nav themeton-menu themeton-menu-top-border uk-flex-right uk-flex-middle uk-flex-wrap uk-visible@m">
                        <li id="menu-item-9999" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1614"><a target="_blank" href="https://www.facebook.com/audithus"><img class="icone-menu" src="https://dev.digiperforma.co/audithus/wp-content/uploads/2017/06/facebook-logo-1.png"></a></li>
                       <li id="menu-item-9998" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1614"><a target="_blank" href="https://www.instagram.com/audithuscentroauditivo/"><img class="icone-menu" src="https://dev.digiperforma.co/audithus/wp-content/uploads/2017/06/instagram.png"></a></li>
                       <li id="menu-item-9997" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1614"><a target="_blank" href="https://www.linkedin.com/company/audithusaparelhosauditivos/"><img class="icone-menu" src="https://dev.digiperforma.co/audithus/wp-content/uploads/2017/06/linkedin.png"></a></li>
</ul>


                    </div>
                    <a href="#offcanvas" class="hamburger-menu uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <rect y="9" width="20" height="2"></rect>
                            <rect y="3" width="20" height="2"></rect>
                            <rect y="15" width="20" height="2"></rect>
                        </svg>
                    </a>
                </nav>
            </div>
        </header>
        <?php
    }
   
    // PAGE TOP SLIDER 
    get_template_part( 'template-parts/top-slider' );
    if (Themeton_VC::page_title()) { echo Themeton_VC::page_title(); }
    else {
        get_template_part('template-parts/page-title');
    }
    endif;
    ?>
    <div id="offcanvas-nav">
        <div class="uk-offcanvas-bar">
            <?php Themeton_Tpl::get_logo(); ?>
            <?php
            wp_nav_menu( array(
                'menu_id'           => '',
                'menu_class'        => 'uk-nav-default uk-nav-parent-icon uk-nav uk-animation-slide-left primary-menu-collapsible',
                'theme_location'    => 'primary',
                'container'         => '',
                'fallback_cb'       => 'themeton_sidebarmenu_callback',
                'walker'            => new Walker_Nav_Uikit_Side()
            ) );
            ?>
        </div>
    </div>