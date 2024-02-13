<?php
/**
 * Render View for WooCommerce Cart Page
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
$abcbiz_cart = do_shortcode('[woocommerce_cart]');
?>

<div class="abcbiz-elementor-wc-cart-page">
    <?php echo wp_kses_post($abcbiz_cart); ?>
</div><!-- /end abcbiz-elementor-wc-cart-page -->


