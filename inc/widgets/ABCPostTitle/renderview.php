<?php
/**
 * Render View for ABC Post Ttitle Widget
 */

 if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get the current post title
$post_title = get_the_title();

// Check if there is a post title
if ($post_title) {
    $heading_tag = $this->get_settings('abc_elementor_post_title_tag');
    $alignment = $this->get_settings('abc_elementor_post_title_align');
    $text_color = $this->get_settings('abc_elementor_post_title_color');
    ?>

        <div class="abc-elementor-post-title-area">
            <<?php echo esc_html($heading_tag); ?> class="abc-post-title-tag"><?php echo esc_html($post_title); ?></<?php echo esc_html($heading_tag); ?>>
        </div>
    <?php
}
?>
