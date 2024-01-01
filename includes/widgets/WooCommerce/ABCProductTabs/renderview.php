<?php
/**
 * Render View for WooCommerce Product Data Tabs
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $product;
$product = wc_get_product(get_the_ID());

// Check if the product exists
if (!$product) {
    echo esc_html__('This product does not exist', 'abcbiz-multi');
    return;
}

// Ensure that the global product data is available for WooCommerce templates
if ( $product ) {
    setup_postdata( $product->get_id() );
}

?>

<div class="abcbiz-elementor-wc-product-tabs">

    <?php 
    // Load the WooCommerce product tabs template
    wc_get_template( 'single-product/tabs/tabs.php' ); 
    ?>

</div><!-- /end abcbiz product meta -->

<?php
// Reset post data after setting it up for the product
wp_reset_postdata();
?>

