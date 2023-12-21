<?php
/**
 * Render View for WooCommerce Product Image
 */

 if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();

$image_url = get_the_post_thumbnail_url($post_id, 'full');

if ($image_url) {
    ?>
    <div class="abc-elementor-product-img-area">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
    </div>
    <?php
} else {
    echo esc_html__('No product image found', 'ABCMAFTH');
}
?>


