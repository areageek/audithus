<?php
if ( post_password_required() ) {
    return;
}
if( !function_exists('medio_custom_comment_item') ):
function medio_custom_comment_item($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
    } else {
        $tag = 'li';
    }

    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    
    <<?php echo esc_attr($tag); ?> class="comment pingback">
        <p><?php esc_html_e('Pingback:', 'medio'); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__('Edit', 'medio'), '<span class="edit-link">', '</span>' ); ?></p>
    <?php
            break;
        default: 
    ?>
    <<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <article> 
            <div class="uk-visible-toggle">
            <div class="comment-avatar">
                <?php echo get_avatar( $comment, 128 ); ?>
            </div>

            <div class="comment-body">
                <div class="meta-data mb2">
                    <a href="javascript:;" class="comment-author"><?php echo get_comment_author(); ?></a>
                    <span class="comment-date mr1 ml1">·</span><span class="comment-date"><?php echo get_comment_date(); ?> - <?php echo get_comment_time(); ?></span>
                </div>
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>

                <div class="meta-data mt2">
                    <span class="comment-reply">
                        <?php comment_reply_link( array_merge( $args, 
                            array(
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'reply_text' => esc_html__('Responder', 'medio') .' <span uk-icon="icon:arrow-right;ratio:0.7"></span>'
                            ) ) ); ?>
                    </span>
                </div>
            </div>
            </div>
        </article>
    <?php
            break;
    endswitch;
}
endif;
// Comment Navigation
if ( ! function_exists( 'medio_theme_comment_nav' ) ) :
    function medio_theme_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'medio'); ?></h2>
            <div class="nav-links uk-clearfix">
                <?php if ( get_previous_comments_link( esc_html__('+ antigos', 'medio') ) ) : ?>
                    <div class="nav-previous"><?php echo get_previous_comments_link( esc_html__('+ antigos', 'medio') ); ?></div>
                <?php endif; ?>
                <?php if ( get_next_comments_link( esc_html__('+ novos', 'medio') ) ) : ?>
                    <div class="nav-next"><?php echo get_next_comments_link( esc_html__('+ novos', 'medio') ); ?></div>
                <?php endif; ?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->
        <?php
        endif;
    }
endif;
?>
<div id="comments" class="comments-area">    
    <?php if ( have_comments() ) : ?>
    <div class="comments-wrapper">
        <h2 class="comments-title medio-brand-title" data-title="<?php esc_attr_e('Comentários', 'medio'); ?>">
            <?php
                printf( _nx( 'Um comentário', '%1$s Comments', get_comments_number(), 'comentário', 'medio' ),
                    number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
        </h2>
        <?php medio_theme_comment_nav(); ?>
        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 56,
                    'callback'    => 'medio_custom_comment_item'
                ) );
            ?>
        </ol><!-- end .comment-list -->
    </div>
    <?php endif; // end of have_comments() ?>
    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        echo '<p class="no-comments">'.esc_html_e('Comments are closed.', 'medio').'</p>';
    endif;
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        comment_form(
            array(
                'title_reply' => esc_attr__('Deixe um comentário', 'medio'),
                'comment_notes_after' => '',
                'fields' => array(
                    'author' => '<div class="mt3"><input id="author" class="uk-input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                                        '" placeholder="'.esc_attr__('Nome *', 'medio').'" ' . $aria_req . ' /></div>',
                    'email' => '<div class="mt3">
                                    <input id="email" class="uk-input" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                                    '" placeholder="'.esc_attr__('Email *', 'medio').'" ' . $aria_req . ' /></div>',
                                 ),
                'comment_field' => '<textarea id="comment" class="uk-textarea" name="comment" placeholder="'.esc_attr__('Comentário', 'medio').'"></textarea>'
            )
        );
    ?>
</div>