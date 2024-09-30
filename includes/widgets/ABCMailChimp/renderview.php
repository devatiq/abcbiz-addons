<?php
/**
 * Render View for ABC MailChimp
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();

?>

<div class="abcbiz-mailchimp-wrapper">
    <form id="abcbiz-mailchimp-form" class="abcbiz-mailchimp-single-form abcbiz-mailchimp-inline-forms">
        <?php if ('yes' === $settings['enable_name_fields']): ?>
            <input id="abcbiz-mailchimp-fname" type="text" name="fname" placeholder="First Name">
            <input id="abcbiz-mailchimp-lname" type="text" name="lname" placeholder="Last Name">
        <?php endif; ?>
        <input id="abcbiz-mailchimp-email" type="email" name="email" placeholder="<?php echo esc_html($settings['email_placeholder_text']); ?>" required>
        <input id="abcbiz-mailchimp-list" type="hidden" name="list"
            value="<?php echo esc_attr($settings['mailchimp_list_id']); ?>">
        <button type="submit"
            id="abcbiz-mailchimp-submit"><?php echo esc_html($settings['submit_button_text']); ?>
        <!-- <button type="submit"
            id="abcbiz-mailchimp-inline-submit" class="abcbiz-mailchimp-inline-submit-texts">
     <?php echo esc_html($settings['submit_button_text']); ?> 
         <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" id="fi_12604076"><g clip-rule="evenodd" fill="rgb(0,0,0)" fill-rule="evenodd"><path d="m19 13.5c.2761 0 .5-.2239.5-.5v-8.5h-8.5c-.2761 0-.5.22386-.5.5s.2239.5.5.5h7.5v7.5c0 .2761.2239.5.5.5z"></path><path d="m4.64645 19.3536c.19526.1952.51184.1952.7071 0l14.00005-14.00005c.1952-.19526.1952-.51184 0-.7071-.1953-.19527-.5119-.19527-.7072 0l-13.99995 13.99995c-.19527.1953-.19527.5119 0 .7072z"></path></g></svg> 
        </button> -->
    </form>
    <div class="abcbiz-mailchimp-response"></div>
</div>