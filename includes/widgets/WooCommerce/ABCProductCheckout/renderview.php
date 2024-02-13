<?php
/**
 * Render View for WooCommerce Checkout Page
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
$abcbiz_checkout = do_shortcode('[woocommerce_checkout]');
?>

<div class="abcbiz-elementor-wc-checkout-page">
   <?php echo wp_kses_post($abcbiz_checkout); ?>
</div><!-- /end abcbiz-elementor-wc-checkout-page -->


