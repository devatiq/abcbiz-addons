<?php
/**
 * Render View for ABC MailChimp
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();

?>

<div class="abcbiz-mailchimp-wrapper">
    <form id="abcbiz-mailchimp-form" class="abcbiz-mailchimp-single-form">
        <?php if ('yes' === $settings['enable_name_fields']): ?>
            <input id="abcbiz-mailchimp-fname" type="text" name="fname" placeholder="First Name">
            <input id="abcbiz-mailchimp-lname" type="text" name="lname" placeholder="Last Name">
        <?php endif; ?>
        <input id="abcbiz-mailchimp-email" type="email" name="email" placeholder="Your Email" required>
        <input id="abcbiz-mailchimp-list" type="hidden" name="list"
            value="<?php echo esc_attr($settings['mailchimp_list_id']); ?>">
        <button type="submit"
            id="abcbiz-mailchimp-submit"><?php echo esc_html($settings['submit_button_text']); ?></button>
    </form>
    <div class="abcbiz-mailchimp-response"></div>
</div>