<?php
/*
 * 404 template
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

\Elementor\Plugin::$instance->frontend->add_body_class('elementor-template-full-width');

get_header();
/**
 * Before Header-Footer page template content.
 *
 * Fires before the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action('elementor/page_templates/header-footer/before_content');
?>

<main class="abcbiz-404-page">
    <?php
    if (!\Elementor\Plugin::$instance->preview->is_preview_mode()):
        do_action('abcbiz_404_page_content');
    else:
        ?>
        <div class="abcbiz-container">
            <h1 class="error-code">404</h1>
            <h1 class="error-title"><?php esc_html_e('Page Not Found', 'abcbiz-addons'); ?></h1>
            <p><?php esc_html_e('Sorry, but the page you are looking for does not exist.', 'abcbiz-addons'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>"
                class="button"><?php esc_html_e('Go Back to Home', 'abcbiz-addons'); ?></a>
        </div>
    <?php endif; ?>
</main>

<?php

/**
 * After Header-Footer page template content.
 *
 * Fires after the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action('elementor/page_templates/header-footer/after_content');

get_footer();