<?php
/**
 * Render View for ABC Featured Image Widget
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly
 ?>

<?php
$abcbiz_post_id = get_the_ID();
$abcbiz_image_url = get_the_post_thumbnail_url($abcbiz_post_id, 'full');

if ($abcbiz_image_url) {
    ?>
    <div class="abcbiz-elementor-feat-img-area">
        <img src="<?php echo esc_url($abcbiz_image_url); ?>" alt="<?php echo esc_attr(get_the_title($abcbiz_post_id)); ?>">
    </div>
    <?php
} else {
    echo esc_html__('No featured image found', 'abcbiz-addons');
}
?>


