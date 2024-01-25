<?php
/**
 * Render View for WooCommerce Product Related
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $product;
$product = wc_get_product(get_the_ID());

if (!$product) {
    echo esc_html__('This product does not exist', 'abcbiz-addons');
    return;
}

// Fetch related products
$args = array(
    'posts_per_page' => 4, // You can change the number of related products
    'columns'        => 4, // You can change the number of columns
    'orderby'        => 'rand', // Random order
);
$related_products = wc_get_related_products($product->get_id(), $args['posts_per_page'], $product->get_upsell_ids());

// Fetch the title from the widget settings
$abcbiz_related_products_title = $this->get_settings('abcbiz_elementor_wc_product_related_title');

if ($related_products) : ?>

    <div class="abcbiz-wc-related-products-area related products">

        <?php
        // Check if the title is not empty
        if (!empty($abcbiz_related_products_title)) : 
            ?>
            <h2 class="abcbiz-wc-related-product-title"><?php echo esc_html($abcbiz_related_products_title); ?></h2>
        <?php endif; ?>

        <?php woocommerce_product_loop_start(); ?>

            <?php foreach ($related_products as $related_product_id) : ?>

                <?php
                $post_object = get_post($related_product_id);

                setup_postdata($GLOBALS['post'] =& $post_object);

                wc_get_template_part('content', 'product');
                ?>

            <?php endforeach; ?>

        <?php woocommerce_product_loop_end(); ?>

            </div><!-- /end related product area -->
    <?php
endif;

wp_reset_postdata();
?>