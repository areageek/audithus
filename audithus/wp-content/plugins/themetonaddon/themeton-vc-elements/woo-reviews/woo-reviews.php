<?php
if (!class_exists('WPBakeryShortCode_woo_reviews')) {
class WPBakeryShortCode_woo_reviews extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'extra_class' => '',
            'css' => ''
        ), $atts));

        global $product;

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_reviews', $atts );
        $extra_class .= ' '.$css_class;
        $result = '';
        $args = array( 
            'number'      => 2, 
            'status'      => 'approve', 
            'post_status' => 'publish', 
            'post_type'   => 'product',
            'post_id' => get_the_ID()
        );
        $comments = get_comments( $args );
        foreach ($comments as $value) {
            $rate = '';
            if (get_comment_meta( $value->comment_ID, 'rating', true )!=NULL) {
                $star = get_comment_meta( $value->comment_ID, 'rating', true );
                for ($i=1; $i<=5; $i++)
                {
                    if ( $i <= $star ) $rate .= '<i class="fa fa-star" aria-hidden="true"></i>';
                    else $rate .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
                }
            }
            $result .='<li><h4>'.$value->comment_author.'</h4><span>'.$rate.'</span><div>'.$value->comment_content.'</div></li>';
        }
        $commenter = wp_get_current_commenter();
        
            $comment_form = array(
                'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'themetonaddon' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'themetonaddon' ), get_the_title() ),
                'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'themetonaddon' ),
                'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
                'title_reply_after'    => '</span>',
                'comment_notes_after'  => '',
                'fields'               => array(
                    'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'themetonaddon' ) . ' <span class="required">*</span></label> ' .
                                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="uk-input" size="30" aria-required="true" required /></p>',
                    'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'themetonaddon' ) . ' <span class="required">*</span></label> ' .
                                '<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" class="uk-input" size="30" aria-required="true" required /></p>',
                ),
                'class_submit' => 'uk-button',
                'label_submit'  => esc_html__( 'Submit', 'themetonaddon' ),
                'logged_in_as'  => '',
                'comment_field' => '',
            );

            if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
                $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'themetonaddon' ), esc_url( $account_page_url ) ) . '</p>';
            }

            if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
                $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'themetonaddon' ) . '</label><select name="rating" id="rating" aria-required="true" required>
                    <option value="">' . esc_html__( 'Rate&hellip;', 'themetonaddon' ) . '</option>
                    <option value="5">' . esc_html__( 'Perfect', 'themetonaddon' ) . '</option>
                    <option value="4">' . esc_html__( 'Good', 'themetonaddon' ) . '</option>
                    <option value="3">' . esc_html__( 'Average', 'themetonaddon' ) . '</option>
                    <option value="2">' . esc_html__( 'Not that bad', 'themetonaddon' ) . '</option>
                    <option value="1">' . esc_html__( 'Very poor', 'themetonaddon' ) . '</option>
                </select></div>';
            }
        
        $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'themetonaddon' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" class="uk-input" cols="45" rows="8" aria-required="true" required></textarea></p>';
        comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
        $review = '';
        $review .= '<div id="reviews" class="woocommerce-Reviews"><div id="single_review_form" class="single_review" style="display:none;"></div></div>';
        $ul = '<ul class="single-reviews comment '.$extra_class.'">';
        $ul .= $result;
        $ul .= '<li>'.$review.'</li>';
        $ul .= '</ul>';
        $result = $ul;
        return $result;
    }
}
}

vc_map( array(
    "name" => esc_html__('Woo Reviews', 'themetonaddon'),
    "description" => esc_html__("Woocommerce Single Product reviews", 'themetonaddon'),
    "base" => 'woo_reviews',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => array(esc_html__('Themeton', 'themetonaddon'),esc_html__( 'WooCommerce', 'themetonaddon' )),
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));