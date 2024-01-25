<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Product Breadcrumb
function abcbiz_wc_product_bread_crumb_field_render() {
    $option = get_option('abcbiz_wc_product_bread_crumb_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-breadcrumb-elementor-widgets/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-breadcrumb.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Bread Crumb", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_bread_crumb_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Tabs
function abcbiz_wc_product_tabs_field_render() {
    $option = get_option('abcbiz_wc_product_tabs_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-product-tabs-elementor-widgets/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-data-tabs.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Tabs", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_tabs_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Short Desc
function abcbiz_wc_product_short_desc_field_render() {
    $option = get_option('abcbiz_wc_product_short_desc_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-product-short-description-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-short-description.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Short Description", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_short_desc_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Related
function abcbiz_wc_product_related_field_render() {
    $option = get_option('abcbiz_wc_product_related_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-related-product-elementor-widgets/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-related.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Related Product", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_related_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Price
function abcbiz_wc_product_price_field_render() {
    $option = get_option('abcbiz_wc_product_price_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-product-pricing-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-pricing.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Price", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_price_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Meta
function abcbiz_wc_product_meta_field_render() {
    $option = get_option('abcbiz_wc_product_meta_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-product-meta-elementor-widgets/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-meta.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Meta", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_meta_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Image
function abcbiz_wc_product_img_field_render() {
    $option = get_option('abcbiz_wc_product_img_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-product-image-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-image.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Image", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_img_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Checkout Page
function abcbiz_wc_checkout_page_field_render() {
    $option = get_option('abcbiz_wc_checkout_page_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-custom-checkout-page-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-checkout-page.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Checkout Page", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_checkout_page_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Cart Page
function abcbiz_wc_cart_page_field_render() {
    $option = get_option('abcbiz_wc_cart_page_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-custom-cart-page-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-cart-page.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Cart Page", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_cart_page_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Add to cart
function abcbiz_wc_add_to_cart_icon_field_render() {
    $option = get_option('abcbiz_wc_add_to_cart_icon_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-add-to-cart-elementor-widgets/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-add-to-cart.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Add to cart", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_add_to_cart_icon_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Product Cart Icon
function abcbiz_wc_product_cart_icon_field_render() {
    $option = get_option('abcbiz_wc_product_cart_icon_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/product-cart-icon-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-cart-cion.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Cart Icon", "abcbiz-addons"); ?></h3>
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
            <a href="https://abcbizaddons.com/widgets/woocommerce-product-title-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-product-title.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Product Title", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_product_title_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

// My Account
function abcbiz_wc_my_account_field_render() {
    $option = get_option('abcbiz_wc_my_account_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcbizaddons.com/widgets/woocommerce-my-account-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-my-account.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-addons");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("My Account", "abcbiz-addons"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wc_my_account_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}
