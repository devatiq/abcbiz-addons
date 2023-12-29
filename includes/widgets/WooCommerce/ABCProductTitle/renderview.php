<?php
/**
 * Render View for ABC Product Ttitle Widget
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_product_wc_title = get_the_title();

if ($abcbiz_product_wc_title) {
    $abcbiz_heading_tag = $this->get_settings('abcbiz_elementor_product_wc_title_tag');
    $abcbiz_alignment = $this->get_settings('abcbiz_elementor_product_wc_title_align');
    $abcbiz_text_color = $this->get_settings('abcbiz_elementor_product_wc_title_color');
    ?>

        <div class="abcbiz-elementor-product-wc-title-area">
            <<?php echo esc_html($abcbiz_heading_tag); ?> class="abcbiz-product-wc-title-tag"><?php echo esc_html($abcbiz_product_wc_title); ?></<?php echo esc_html($abcbiz_heading_tag); ?>>
        </div>
    <?php
}
?>
