<?php
/**
 * Render View for WooCommerce Product Add to Cart
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $product;
?>
<div class="abcbiz-elementor-wc-add-to-cart">
    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

    <?php
    do_action( 'woocommerce_before_add_to_cart_quantity' );

    woocommerce_quantity_input(
        array(
            'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
            'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
            'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
        )
    );

    do_action( 'woocommerce_after_add_to_cart_quantity' );
    ?>

    <?php echo '<form class="cart" action="' . esc_url( $product->add_to_cart_url() ) . '" method="post" enctype="multipart/form-data">'; ?>

    <button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

    <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="variation_id" class="variation_id" value="0" />

    <?php echo '</form>'; ?>

    <!-- Success message placeholder -->
    <div id="ajax-cart-success-message" style="display: none;"></div>
</div>

<!-- Inline JavaScript -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('body').on('added_to_cart', function(event, fragments, cart_hash, $button) {
            // Display a success message
            $('#ajax-cart-success-message').html('<div class="woocommerce-message">Product added successfully to the cart</div>').show();
        });
    });
</script>

<!-- Inline CSS -->
<style>
    .woocommerce-message {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
    }
</style>
