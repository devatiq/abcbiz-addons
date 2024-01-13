<?php
/**
 * Render View for WooCommerce Account Page
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abc_settings = $this->get_settings_for_display();

$abc_wc_style = $abc_settings['abc_elementor_wc_account_style_orientation'] == 'vertical' ? ' abc-ele-wc-my-account-vertical' : '';

?>

<div class="abc-elementor-wc-account-page<?php echo esc_attr($abc_wc_style); ?>">
<?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
</div><!-- /end abc-elementor-wc-account-page -->