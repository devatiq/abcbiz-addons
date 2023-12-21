<?php
/**
 * Render View for WooCommerce Product Summary Area
 */

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();
$product = wc_get_product($post_id);

if ($product) {
    ?>
    <div class="abc-elementor-product-summery-area">

            <div class="summary entry-summary">
                <?php do_action('woocommerce_single_product_summary'); ?>
            </div>

    </div>
    <?php
} else {
    echo esc_html__('Product not found', 'ABCMAFTH');
}
?>