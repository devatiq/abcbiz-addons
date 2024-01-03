<?php
/**
 * Render View for WooCommerce Product Add to Cart
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
		$product_id = get_queried_object_id();
		global $product;
		$product = $this->get_product( $product_id );
?>

<div class="abcbiz-elementor-wc-add-to-cart">
<?php
			add_action( 'woocommerce_before_add_to_cart_quantity', [ $this, 'before_add_to_cart_quantity' ], 95 );
			add_action( 'woocommerce_after_add_to_cart_button', [ $this, 'after_add_to_cart_button' ], 5 );
			$this->render_form_button( $product );	?>
</div><!-- /end add to cart area -->
