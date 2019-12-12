<?php
get_header();
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
wc_print_notices();
do_action( 'woocommerce_before_cart' ); ?>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	<div class="uk-container uk-position-relative">
		<h1 class="uk-text-center"><?php esc_html_e('Your Cart Items','medio'); ?></h1>
		<table class="uk-table uk-table-middle uk-table-divider medio-woo-table">
			<thead>
				<tr>
					<th><h3><?php esc_html_e( 'Product Name', 'medio' ); ?></h3></th>
					<th><h3><?php esc_html_e( 'Price', 'medio' ); ?></h3></th>
					<th><h3><?php esc_html_e( 'Quantity', 'medio' ); ?></h3></th>
					<th><h3><?php esc_html_e( 'Total', 'medio' ); ?></h3></th>
					<th>
						<div class="woo-update-btn uk-flex uk-flex-right">
							<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'medio' ); ?>" />
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				do_action( 'woocommerce_before_cart_contents' );
				$id = 0;
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
					$id++;
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<td class="cart-thumbnail uk-flex uk-flex-left uk-flex-middle">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
								if ( ! $product_permalink ) {
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
										} else {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
										}
										// Meta data
										echo wc_get_formatted_cart_item_data( $cart_item );

										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'medio' ) . '</p>';
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
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" id="%" value="1" />', $cart_item_key,$id );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->get_max_purchase_quantity(),
											'min_value'   => '0'
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
							<td class="uk-flex uk-flex-middle uk-flex-center">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove uk-icon-link uk-icon" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" points="6.5 3 6.5 1.5 13.5 1.5 13.5 3"></polyline> <polyline fill="none" stroke="#000" points="4.5 4 4.5 18.5 15.5 18.5 15.5 4"></polyline> <rect x="8" y="7" width="1" height="9"></rect> <rect x="11" y="7" width="1" height="9"></rect> <rect x="2" y="3" width="16" height="1"></rect></svg></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item', 'medio' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
								echo sprintf('<a href="javascript:;" woo-edit-id="%s" class="edit woo-edit uk-icon-link uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill="none" stroke="#000" d="M17.25,6.01 L7.12,16.1 L3.82,17.2 L5.02,13.9 L15.12,3.88 C15.71,3.29 16.66,3.29 17.25,3.88 C17.83,4.47 17.83,5.42 17.25,6.01 L17.25,6.01 Z"></path> <path fill="none" stroke="#000" d="M15.98,7.268 L13.851,5.148"></path></svg></a>',$id);
							?>
							</td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>

	<div class="uk-container uk-position-relative">
   		<div class="uk-grid">
            <div class="uk-width-1-2@m uk-flex uk-flex-middle">
                <?php if ( wc_coupons_enabled() ) { ?>
					<div class="coupon">
						<h3 for="coupon_code"><?php esc_html_e( 'Coupon Discount', 'medio' ); ?></h3>
						<div class="uk-flex mt3@s mt0@m mb3@s mb3@s">
						<input type="text" name="coupon_code" class="uk-input" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Enter your coupon code', 'medio' ); ?>" />
						<label class="woo-button"><input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'medio' ); ?>" /></label>
						</div>
					</div>
					<?php do_action( 'woocommerce_cart_coupon' ); ?>
				<?php } ?>
                <?php do_action( 'woocommerce_cart_actions' ); ?>
                <?php wp_nonce_field( 'woocommerce-cart' ); ?>   
			</div>
			<div class="uk-width-expand@m"></div>
            <div class="uk-width-1-3@m">
                <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

                    <?php
					do_action( 'woocommerce_before_cart_totals' ); ?>

					<div class="woo-cart-totals">
						<h5><?php esc_html_e( 'Sub totaL: ', 'medio' ); wc_cart_totals_subtotal_html(); ?></h5>
						<h2><?php 
							do_action( 'woocommerce_cart_totals_before_order_total' );
							_e( 'Grand total: ', 'medio' ); 
							wc_cart_totals_order_total_html();
							do_action( 'woocommerce_cart_totals_after_order_total' );
						?>
						</h2>
						<div class="medio-woo-shipping">
							<table cellspacing="0" class="shop_table shop_table_responsive">
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
										<th><?php esc_html_e( 'Shipping', 'medio' ); ?></th>
										<td data-title="<?php esc_attr_e( 'Shipping', 'medio' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
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
											? sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'medio' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
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
							</table>
						</div>
						<div class="wc-proceed-to-checkout">
							<a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="checkout-button button wc-forward">
								<?php esc_html_e( 'Proceed to checkout', 'medio' ); ?>
							</a>
						</div>
					</div>

                    <?php do_action( 'woocommerce_after_cart_totals' ); ?>

                </div>
            </div>
        </div>
	</div>
</form>
<div class="pv5"></div>
</div>
</div>
</div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
<?php get_footer(); ?>