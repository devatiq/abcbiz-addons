<?php
/**
 * Render View for WooCommerce Product Cart
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<div class="abcbiz-elementor-wc-cart-icon">
    <?php if ( WC()->cart ) : ?>
        <?php $count = WC()->cart->get_cart_contents_count(); ?>
        <a class="abcbiz-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e('View your shopping cart', 'abcbiz-multi'); ?>">
            <i class="eicon-cart-solid"></i>
            <span class="abcbiz-cart-contents-count"><?php echo esc_html( $count ); ?></span>
        </a>
    <?php endif; ?>
</div><!-- /end woocommerce cart -->
