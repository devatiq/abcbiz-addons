<?php
/**
 * Render View for ABC Product Ttitle Widget
 */

 if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get the current post title
$product_title = get_the_title();

// Check if there is a post title
if ($product_title) {
    $heading_tag = $this->get_settings('abc_elementor_product_title_tag');
    $alignment = $this->get_settings('abc_elementor_product_title_align');
    $text_color = $this->get_settings('abc_elementor_product_title_color');
    ?>

        <div class="abc-elementor-product-title-area">
            <<?php echo esc_html($heading_tag); ?> class="abc-product-title-tag"><?php echo esc_html($product_title); ?></<?php echo esc_html($heading_tag); ?>>
        </div>
    <?php
}
?>
