<?php
/**
 * Render View for ABC Contact Info and Social Widget
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<div class="abcbiz-elementor-contact-social-info-area">

<?php if (isset($abcbiz_settings['abcbiz_elementor_contact_info_switch']) && $abcbiz_settings['abcbiz_elementor_contact_info_switch'] === 'yes') : ?>
    <div class="abcbiz-contact-info-area">
        <?php include 'contact-info.php'; ?>
    </div>
<?php endif;?>
    
    <?php if (isset($abcbiz_settings['abcbiz_elementor_contact_social_icon_switch']) && $abcbiz_settings['abcbiz_elementor_contact_social_icon_switch'] === 'yes') : ?>
    <div class="abcbiz-contact-info-social-icons">
        <?php include 'social-icons.php'; ?>
    </div>
<?php endif;?>

</div><!-- /end abcbiz contact social area -->


	