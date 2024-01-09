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


	<style>
    .abcbiz-contact-info-address,
    .abcbiz-contact-info-mobile,
    .abcbiz-contact-info-email {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .abcbiz-contact-info-address svg,
    .abcbiz-contact-info-mobile svg,
    .abcbiz-contact-info-email svg {
        flex-shrink: 0;
        width: 30px; /* Fixed width for the icons */
        height: 30px;
        margin-right: 10px;
    }

    .abcbiz-contact-info-address span,
    .abcbiz-contact-info-mobile span,
    .abcbiz-contact-info-email span {
        display: block;
    }

    .abcbiz-contact-info-mobile a,
    .abcbiz-contact-info-email a {
        text-decoration: none;
        color: black; /* Change the color as needed */
    }
</style>



	