<?php
/**
 * Render View for WooCommerce Product Meta
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $product;
$product = wc_get_product(get_the_ID());

if (!$product) {
    echo esc_html__('This product does not exist', 'abcbiz-multi');
    return;
}

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_show_sku = $abcbiz_settings['abcbiz_elementor_wc_product_meta_sku_switch'] === 'yes';
$abcbiz_show_category = $abcbiz_settings['abcbiz_elementor_wc_product_meta_category_switch'] === 'yes';
$abcbiz_show_tags = $abcbiz_settings['abcbiz_elementor_wc_product_meta_tags_switch'] === 'yes';
$abcbiz_show_divider = $abcbiz_settings['abcbiz_elementor_wc_product_meta_div_switch'] === 'yes';
?>

<div class="abcbiz-elementor-wc-product-meta">

    <?php do_action('woocommerce_product_meta_start'); ?>

    <!-- Display SKU if enabled and available -->
    <?php if ($abcbiz_show_sku && $product->get_sku()) : ?>
        <div class="abcbiz-product-sku">
            <span class="label"><?php esc_html_e('SKU', 'abcbiz-multi'); ?></span>
            <span class="value">: <?php echo esc_html($product->get_sku()); ?></span>
        </div>
    <?php endif; ?>

    <?php if ($abcbiz_show_divider && $abcbiz_show_category) : ?>
    <div class="abcbiz-meta-divider"></div>
    <?php endif; ?>

    <!-- Display Categories if enabled and available -->
    <?php if ($abcbiz_show_category && wc_get_product_category_list($product->get_id())) : ?>
        <div class="abcbiz-product-categories">
            <span class="label"><?php esc_html_e('Categories', 'abcbiz-multi'); ?></span>
            <span class="value">: <?php echo wc_get_product_category_list($product->get_id()); ?></span>
        </div>
    <?php endif; ?>

    <?php if ($abcbiz_show_divider && $abcbiz_show_tags && wc_get_product_tag_list($product->get_id())) : ?>
    <div class="abcbiz-meta-divider"></div>
    <?php endif; ?>

    <!-- Display Tags if enabled and available -->
    <?php if ($abcbiz_show_tags && wc_get_product_tag_list($product->get_id())) : ?>
        <div class="abcbiz-product-tags">
            <span class="label"><?php esc_html_e('Tags', 'abcbiz-multi'); ?></span>
            <span class="value">: <?php echo wc_get_product_tag_list($product->get_id()); ?></span>
        </div>
    <?php endif; ?>

    <?php do_action('woocommerce_product_meta_end'); ?>

</div><!-- /end abcbiz product meta -->