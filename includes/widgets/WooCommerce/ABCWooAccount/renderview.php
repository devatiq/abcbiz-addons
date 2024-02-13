<?php
/**
 * Render View for WooCommerce Account Page
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

$abcbiz_wc_style = $abcbiz_settings['abcbiz_elementor_wc_account_style_orientation'] == 'vertical' ? ' abcbiz-ele-wc-my-account-vertical' : '';
$abcbiz_myaccount = do_shortcode('[woocommerce_my_account]');

?>

<div class="abcbiz-elementor-wc-account-page<?php echo esc_attr($abcbiz_wc_style); ?>">
<?php echo wp_kses_post($abcbiz_myaccount); ?>
</div><!-- /end abcbiz-elementor-wc-account-page -->