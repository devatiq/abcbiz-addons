<?php
/**
 * Render View for ABC Gravity Forms
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$settings = $this->get_settings_for_display();
$form_id = isset($settings['abcbiz_gf_form_id']) ? $settings['abcbiz_gf_form_id'] : '';

?>

<div class="abcbiz-gravity-form-wrapper">
    <?php
    if (!empty($form_id)) {
        // Check if the form exists and if it's active
        $form = \GFAPI::get_form($form_id);
        if ($form && !rgar($form, 'is_trash') && rgar($form, 'is_active')) {
            // Render the form if it exists and is active
            gravity_form($form_id, false, false, false, '', true, 1, true);
        } else {
            // Show a notice if the form is not active or is trashed
            ?>
            <div class="gravity-forms-missing-notice">
                <strong><?php echo esc_html__('The selected form does not exist, is inactive, or has been removed.', 'abcbiz-addons'); ?></strong>
            </div>
            <?php
        }
    } else {
        // Show a notice if no form is selected
        ?>
        <div class="gravity-forms-missing-notice">
            <strong><?php echo esc_html__('No form selected', 'abcbiz-addons'); ?></strong>
        </div>
        <?php
    }
    ?>
</div>