<?php
/**
 * Render View for WooCommerce Product Price
 */

 if (!defined('ABSPATH')) exit; // Exit if accessed directly

 global $product;
 $product = wc_get_product(get_the_ID());

 if (!$product) {
    echo esc_html__('This product does not exist', 'abcbiz-addons');
    return;
} ?>

<div class="abcbiz-elementor-wc-product-price">
<?php wc_get_template( '/single-product/price.php' );; ?>
</div><!-- /end product price -->