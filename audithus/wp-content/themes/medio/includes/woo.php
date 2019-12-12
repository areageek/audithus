<?php

class Themeton_Woocommerce{

	public $woo_shortcodes = array(
		'sale_products',
		'best_selling_products',
		'top_rated_products',
		'featured_products',
		'product_attribute',
		'product_category',
		'products',
		'recent_products'
	);

	function __construct(){
		// before and after of loop item
		add_action( 'woocommerce_before_shop_loop_item', array($this, 'before_shop_loop_item'), 0 );
		add_action( 'woocommerce_after_shop_loop_item', array($this, 'after_shop_loop_item'), 999 );

		// before and after of loop title
		add_action( 'woocommerce_shop_loop_item_title', array($this, 'shop_loop_item_title_before'), 0 );
		add_action( 'woocommerce_shop_loop_item_title', array($this, 'shop_loop_item_title_after'), 999 );

		add_action('woocommerce_after_shop_loop_item', array($this, 'after_loop_add_to_cart'), 199 );

	}

	/* ------------------------------------------
	// before and after of loop item
	--------------------------------------------- */
	public function before_shop_loop_item(){
		printf('<div class="medio-woo-item">');
	}

	public function after_shop_loop_item(){
		printf('</div><!-- end .medio-woo-item -->');
	}

	public function after_loop_add_to_cart(){
		echo '</div><!-- end .uk-grid -->';
	}

    function product_rating_overview() {
		
	}

	/* ------------------------------------------
	// before and after of loop title
	--------------------------------------------- */
	public function shop_loop_item_title_before(){
		printf('<div class="entry-title-wrp">');
	}

	public function shop_loop_item_title_after(){
		global $product;

		if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
			return;
		}

		$rating_count = $product->get_rating_count();
		$review_count = $product->get_review_count();
		$average      = $product->get_average_rating();

		if ( $rating_count > 0 ) : ?>

			<div class="woocommerce-product-rating uk-text-center">
				<?php echo wc_get_rating_html( $average, $rating_count ); ?>
			</div>

		<?php endif;
		printf('</div><hr class="m0"><div class="uk-grid uk-grid-collapse uk-child-width-1-2@s uk-text-center uk-text-uppercase uk-flex uk-flex-middle medio-woo-loop-item-bottom">');
	}


}
if( class_exists('WooCommerce') ){
	new Themeton_Woocommerce();
}

function medio_woocommerce_content() {
	
	if ( is_singular( 'product' ) ) {

		while ( have_posts() ) : the_post();

			wc_get_template_part( 'content', 'single-product' );

		endwhile;

	} else { ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

		<?php endif;

	}
}