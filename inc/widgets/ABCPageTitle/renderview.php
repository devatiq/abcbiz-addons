<?php
/**
 * Render View for ABC Page Ttitle Widget
 */

 if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get the current post title
$page_title = get_the_title();

// Check if there is a post title
if ($page_title) {
    $heading_tag = $this->get_settings('abc_elementor_page_title_tag');
    $alignment = $this->get_settings('abc_elementor_page_title_align');
    $text_color = $this->get_settings('abc_elementor_page_title_color');
    ?>

        <div class="abc-elementor-page-title-area">
            <<?php echo esc_html($heading_tag); ?> class="abc-page-title-tag"><?php echo esc_html($page_title); ?></<?php echo esc_html($heading_tag); ?>>
        </div>
    <?php
}
?>
