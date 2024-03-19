<?php
/**
 * Render View for ABC Site Logo Widget
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$abcbiz_settings = $this->get_settings_for_display();

// Get the site title for alt text.
$abcbiz_site_title = get_bloginfo('name');

// Define a default logo URL.
$abcbiz_default_logo_url = plugins_url(trim(str_replace(WP_PLUGIN_DIR, '', ABCBIZ_Path), '/') . '/assets/img/abcbiz-addons-logo.svg');

if ('yes' === $abcbiz_settings['abcbiz-elementor-site-logo-custom-switch'] && !empty($abcbiz_settings['abcbiz-elementor-site-logo-custom-image']['url'])) {
    $abcbiz_logo_url = $abcbiz_settings['abcbiz-elementor-site-logo-custom-image']['url'];
} else {
    // Fallback to the site logo set in the WordPress Customizer if available.
    $abcbiz_custom_logo_id = get_theme_mod('custom_logo');
    $abcbiz_logo_url = $abcbiz_custom_logo_id ? wp_get_attachment_image_url($abcbiz_custom_logo_id, 'full') : $abcbiz_default_logo_url;
}

// Ensure the logo URL is not empty; if it is, use the default logo.
$abcbiz_logo_url = !empty($abcbiz_logo_url) ? $abcbiz_logo_url : $abcbiz_default_logo_url;

// Check if a link is provided and not just the default '#'.
$abcbiz_logo_link = !empty($abcbiz_settings['abcbiz-elementor-site-logo-link']['url']) && $abcbiz_settings['abcbiz-elementor-site-logo-link']['url'] != '#' ? $abcbiz_settings['abcbiz-elementor-site-logo-link']['url'] : '';

?>
<div class="abcbiz-elementor-site-logo-area">
    <?php if (!empty($abcbiz_logo_link)): ?>
        <a href="<?php echo esc_url($abcbiz_logo_link); ?>" <?php echo $abcbiz_settings['abcbiz-elementor-site-logo-link']['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $abcbiz_settings['abcbiz-elementor-site-logo-link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
            <img src="<?php echo esc_url($abcbiz_logo_url); ?>" alt="<?php echo esc_attr($abcbiz_site_title); ?>">
        </a>
    <?php else: ?>
        <img src="<?php echo esc_url($abcbiz_logo_url); ?>" alt="<?php echo esc_attr($abcbiz_site_title); ?>">
    <?php endif; ?>
</div>
