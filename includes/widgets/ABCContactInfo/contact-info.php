<?php
/**
 * Render View for ABC Contact Info and Social Widget
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<?php if (!empty($abcbiz_settings['abcbiz_elementor_contact_info_address'])) : ?>
        <div class="abcbiz-contact-info-address">
            <svg height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg" id="fi_3177361"><g id="Pin"><path d="m32 0a24.0319 24.0319 0 0 0 -24 24c0 17.23 22.36 38.81 23.31 39.72a.99.99 0 0 0 1.38 0c.95-.91 23.31-22.49 23.31-39.72a24.0319 24.0319 0 0 0 -24-24zm0 35a11 11 0 1 1 11-11 11.0066 11.0066 0 0 1 -11 11z"></path></g></svg>
            <span><?php echo esc_html($abcbiz_settings['abcbiz_elementor_contact_info_address']); ?></span>
        </div>
    <?php endif; ?>

    <?php if (!empty($abcbiz_settings['abcbiz_elementor_contact_info_mobile'])) : ?>
        <div class="abcbiz-contact-info-mobile">
            <svg id="fi_3059446" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3"><path d="m30.035 22.6c-.082-.065-6.035-4.356-7.669-4.048-.78.138-1.226.67-2.121 1.735-.144.172-.49.584-.759.877a12.517 12.517 0 0 1 -1.651-.672 13.7 13.7 0 0 1 -6.321-6.321 12.458 12.458 0 0 1 -.672-1.651c.294-.27.706-.616.882-.764 1.06-.89 1.593-1.336 1.731-2.118.283-1.62-4.005-7.614-4.05-7.668a2.289 2.289 0 0 0 -1.705-.97c-1.738 0-6.7 6.437-6.7 7.521 0 .063.091 6.467 7.988 14.5 8.025 7.888 14.428 7.979 14.491 7.979 1.085 0 7.521-4.962 7.521-6.7a2.283 2.283 0 0 0 -.965-1.7z"></path></svg>
            <span><a href="tel:<?php echo esc_attr($abcbiz_settings['abcbiz_elementor_contact_info_mobile']); ?>"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_contact_info_mobile']); ?></a></span>
        </div>
    <?php endif; ?>

    <?php if (!empty($abcbiz_settings['abcbiz_elementor_contact_info_email'])) : ?>
        <div class="abcbiz-contact-info-email">
            <svg id="fi_11502370" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m62.843 98.364 138.32 138.38c30.168 30.11 79.482 30.136 109.675 0l138.32-138.38c1.393-1.393 1.19-3.687-.426-4.814-14.108-9.839-31.273-15.672-49.763-15.672h-285.936c-18.491 0-35.656 5.834-49.764 15.672-1.616 1.127-1.819 3.421-.426 4.814zm-36.964 66.667c0-14.54 3.605-28.278 9.955-40.353.993-1.889 3.51-2.271 5.019-.762l136.569 136.569c43.247 43.31 113.885 43.335 157.158 0l136.569-136.569c1.509-1.509 4.026-1.127 5.019.762 6.349 12.075 9.955 25.814 9.955 40.353v181.937c0 48.093-39.121 87.154-87.154 87.154h-285.936c-48.032 0-87.154-39.061-87.154-87.154z" fill-rule="evenodd"></path></svg>
            <span><a href="mailto:<?php echo esc_attr($abcbiz_settings['abcbiz_elementor_contact_info_email']); ?>"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_contact_info_email']); ?></a></span>
        </div>
    <?php endif; ?>