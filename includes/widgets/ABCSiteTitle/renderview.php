<?php
/**
 * Render View for ABC Site Title and Tagline Widget
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Retrieve settings
$abcbiz_settings = $this->get_settings_for_display();

// Determine if site title and tagline should be displayed
$display_site_title = $abcbiz_settings['abcbiz-elementor-site-title-switch'] === 'yes';
$display_tagline = $abcbiz_settings['abcbiz-elementor-site-tagline-switch'] === 'yes';

// Retrieve site title, tagline, and their respective tags
$abcbiz_site_title = get_bloginfo('name');
$abcbiz_site_tagline = get_bloginfo('description');
$abcbiz_site_title_tag = $abcbiz_settings['abcbiz-elementor-site-title-tag'];
$abcbiz_site_tagline_tag = $abcbiz_settings['abcbiz-elementor-site-tagline-tag'];
?>

<!-- Site Title -->
<?php if ($display_site_title): ?>
    <div class="abcbiz-elementor-site-title-area">
        <<?php echo esc_attr($abcbiz_site_title_tag); ?> class="abcbiz-ele-site-title">
            <?php echo esc_html($abcbiz_site_title); ?>
        </<?php echo esc_attr($abcbiz_site_title_tag); ?>>
    </div><!-- end site title area -->
<?php endif; ?>

<!-- Tagline -->
<?php if ($display_tagline): ?>
    <div class="abcbiz-elementor-site-tagline-area">
        <<?php echo esc_attr($abcbiz_site_tagline_tag); ?> class="abcbiz-ele-site-tagline">
            <?php echo esc_html($abcbiz_site_tagline); ?>
        </<?php echo esc_attr($abcbiz_site_tagline_tag); ?>>
    </div><!-- end tagline area -->
<?php endif; ?>
