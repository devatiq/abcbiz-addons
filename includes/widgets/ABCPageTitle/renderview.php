<?php
/**
 * Render View for ABC Page Ttitle Widget
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Get the current post title
$abcbiz_page_title = get_the_title();

// Check if there is a post title
if ($abcbiz_page_title) {
    $abcbiz_heading_tag = $this->get_settings('abcbiz_elementor_page_title_tag');
    $abcbiz_alignment = $this->get_settings('abcbiz_elementor_page_title_align');
    $abcbiz_text_color = $this->get_settings('abcbiz_elementor_page_title_color');
    ?>

        <div class="abcbiz-elementor-page-title-area">
            <<?php echo esc_html($abcbiz_heading_tag); ?> class="abcbiz-page-title-tag"><?php echo esc_html($abcbiz_page_title); ?></<?php echo esc_html($abcbiz_heading_tag); ?>>
        </div>
    <?php
}
?>
