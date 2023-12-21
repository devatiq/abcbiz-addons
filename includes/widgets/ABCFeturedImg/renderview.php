<?php
/**
 * Render View for ABC Featured Image Widget
 */

 if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get the current post ID
$post_id = get_the_ID();

// Get the featured image URL
$image_url = get_the_post_thumbnail_url($post_id, 'full');

// Check if the featured image exists
if ($image_url) {
    ?>
    <div class="abc-elementor-feat-img-area">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
    </div>
    <?php
} else {
    echo esc_html__('No featured image found', 'ABCMAFTH');
}
?>


