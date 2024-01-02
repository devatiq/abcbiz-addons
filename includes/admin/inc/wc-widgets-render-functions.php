<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Product Cart Icon
function abcbiz_wc_product_cart_icon_field_render() {
    $option = get_option('abcbiz_wc_product_cart_icon_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/product-cart-icon-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-title.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Cart Icon", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_cart_icon_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Title
function abcbiz_wc_product_title_field_render() {
    $option = get_option('abcbiz_wc_product_title_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/woocommerce-product-title-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-title.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Title", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_title_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}