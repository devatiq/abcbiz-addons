<?php
/**
 * Render View for ABC Single Image Scroll
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

$abcbiz_image = $abcbiz_settings['abcbiz_elementor_single_img_scroll_image'];
$abcbiz_image_alt = $abcbiz_settings['abcbiz_elementor_single_img_scroll_alt_text'];
$abcbiz_badge_text = $abcbiz_settings['abcbiz_elementor_single_img_scroll_badge_text'];
$abcbiz_show_badge = $abcbiz_settings['abcbiz_elementor_single_img_scroll_badge_switch'] === 'yes';

// Default image URL
$abcbiz_image_url = \Elementor\Utils::get_placeholder_image_src();

// Check if a custom image was chosen and retrieve the URL.
if (!empty($abcbiz_image['id'])) {
    // Get the image URL based on the selected size.
    $abcbiz_image_array = wp_get_attachment_image_src($abcbiz_image['id'], $abcbiz_settings['thumbnail_size']);
    if ($abcbiz_image_array) {
        $abcbiz_image_url = $abcbiz_image_array[0];
    }
} elseif (!empty($abcbiz_image['url'])) {
    // Use the custom URL if provided.
    $abcbiz_image_url = $abcbiz_image['url'];
}
?>

<div class="abcbiz-elementor-single-img-scroll-area">
<div class="abcbiz-elementor-single-img-scroll-wrap">
    <figure class="abcbiz-img-scroller-container">
        <img src="<?php echo esc_url($abcbiz_image_url); ?>" alt="<?php echo esc_html($abcbiz_image_alt); ?>">
    </figure>
    <?php if ($abcbiz_show_badge): ?>
    <div class="abcbiz-img-scroller-badge">
        <?php echo esc_html($abcbiz_badge_text); ?>
    </div>
    <?php endif; ?>
</div>
</div><!-- end single image scrolling area -->

    <style>
    .abcbiz-elementor-single-img-scroll-area {
    position: relative;
    width: 100%;
    display: flex;
    align-items: flex-start;
}

.abcbiz-elementor-single-img-scroll-wrap {
    overflow: hidden;
}

.abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-container {
    transition: transform 2s ease-in-out;
    height: 400px;
}

.abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-container img {
    width: 100%;
    max-width: 100%;
    height: auto;
    object-fit: cover;
}

.abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge {
    position: absolute;
}
    </style>

    <script>
        jQuery(document).ready(function($) {
    var $imageContainer = $('.abcbiz-elementor-single-img-scroll-area');
    $imageContainer.hover(function() {
        var $this = $(this);
        var $imgContainer = $this.find('.abcbiz-img-scroller-container');
        var imgHeight = $imgContainer.find('img').height();
        var containerHeight = $this.height();
        var differenceHeight = imgHeight - containerHeight;

        $imgContainer.css('transform', 'translateY(-' + differenceHeight + 'px)');
    }, function() {
        $(this).find('.abcbiz-img-scroller-container').css('transform', 'translateY(0)');
    });
});
    </script>
