<?php

if (!class_exists('WPBakeryShortCode_woo_cart')) {
class WPBakeryShortCode_woo_cart extends WPBakeryShortCode {
    protected function content( $atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));
        wc_print_notices();
        do_action( 'woocommerce_before_cart' );
        $class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_cart', $atts );
        $class .= ' '.$css_class;
        ?>
        <form class="woocommerce-cart-form <?php echo esc_attr($class);?>" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>
            <table class="uk-table uk-table-hover uk-table-divider themeton-woo-table">
            <thead>
                <tr>
                    <th><h3><?php esc_html_e( 'Product Name', 'themetonaddon' ); ?></h3></th>
                    <th><h3><?php esc_html_e( 'Price', 'themetonaddon' ); ?></h3></th>
                    <th><h3><?php esc_html_e( 'Quantity', 'themetonaddon' ); ?></h3></th>
                    <th><h3><?php esc_html_e( 'Total', 'themetonaddon' ); ?></h3></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                do_action( 'woocommerce_before_cart_contents' );
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                            <td class="cart-thumbnail">
                            <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                if ( ! $product_permalink ) {
                                    print $thumbnail;
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                }
                                if ( ! $product_permalink ) {
                                            echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
                                        } else {
                                            echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
                                        }
                                        // Meta data
                                        echo WC()->cart->get_item_data( $cart_item );
                                        // Backorder notification
                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                            echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'themetonaddon' ) . '</p>';
                                    }
                            ?>
                            </td>
                            <td>
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                ?>
                            </td>
                            <td>
                                <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {
                                        $product_quantity = woocommerce_quantity_input( array(
                                            'input_name'  => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value'   => $_product->get_max_purchase_quantity(),
                                            'min_value'   => '0',
                                        ), $_product, false );
                                    }
                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                ?>
                            </td>
                            <td>
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                    esc_html__( 'Remove this item', 'themetonaddon' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
                                ), $cart_item_key );
                            ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="uk-grid">
            <div class="uk-width-1-2@m">
                <?php if ( wc_coupons_enabled() ) { ?>
                    <div class="coupon">
                        <label for="coupon_code"><?php esc_html_e( 'Coupon:', 'themetonaddon' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'themetonaddon' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'themetonaddon' ); ?>" />
                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                    </div>
                <?php } ?>
                <input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'themetonaddon' ); ?>" />
                <?php do_action( 'woocommerce_cart_actions' ); ?>
                <?php wp_nonce_field( 'woocommerce-cart' ); ?>   
            </div>
            <div class="uk-width-1-2@m">
                <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

                    <?php do_action( 'woocommerce_before_cart_totals' ); ?>

                    <h2><?php esc_html_e( 'Cart totals', 'themetonaddon' ); ?></h2>

                    <table cellspacing="0" class="shop_table shop_table_responsive">

                        <tr class="cart-subtotal">
                            <th><?php esc_html_e( 'Subtotal', 'themetonaddon' ); ?></th>
                            <td data-title="<?php esc_attr_e( 'Subtotal', 'themetonaddon' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                        </tr>

                        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                            <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                                <td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

                            <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

                            <?php wc_cart_totals_shipping_html(); ?>

                            <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

                        <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

                            <tr class="shipping">
                                <th><?php esc_html_e( 'Shipping', 'themetonaddon' ); ?></th>
                                <td data-title="<?php esc_attr_e( 'Shipping', 'themetonaddon' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
                            </tr>

                        <?php endif; ?>

                        <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                            <tr class="fee">
                                <th><?php echo esc_html( $fee->name ); ?></th>
                                <td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) :
                            $taxable_address = WC()->customer->get_taxable_address();
                            $estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
                                    ? sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'themetonaddon' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
                                    : '';
                            if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                                <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                                    <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                                        <th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
                                        <td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr class="tax-total">
                                    <th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
                                    <td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

                        <tr class="order-total">
                            <th><?php esc_html_e( 'Total', 'themetonaddon' ); ?></th>
                            <td data-title="<?php esc_attr_e( 'Total', 'themetonaddon' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                        </tr>

                        <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

                    </table>

                    <div class="wc-proceed-to-checkout">
                        <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
                    </div>

                    <?php do_action( 'woocommerce_after_cart_totals' ); ?>

                </div>
            </div>
        </div>
        </form>

        <?php
        
        do_action( 'woocommerce_after_cart' ); 
    }
}
}

vc_map( array(
    "name" => esc_html__('Woo Cart', 'themetonaddon'),
    "description" => esc_html__("Next Woocomerce cart element", 'themetonaddon'),
    "base" => 'woo_cart',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "textfield",
            "param_name" => "title",
            "heading" => esc_html__("Title", 'themetonaddon'),
            "value" => "",
            "holder" => 'div'
        ),
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