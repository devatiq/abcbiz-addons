<?php
/**
 * ABC Section Title Widget Render View
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();

$abc_sec_divider_visible = $settings['abc_elementor_sec_title_div'] === 'yes';
?>

<div class="abc-elementor-title-align">

    <<?php echo esc_html($settings['abc_elementor_sec_title_tag']); ?> class="abc-elementor-sec-title">
        <span class="abc-elementor-sec-title-one"><?php echo esc_html($settings['abc_elementor_sec_title_one']); ?></span> <span class="abc-elementor-sec-title-two"><?php echo esc_html($settings['abc_elementor_sec_title_two']); ?></span>
    </<?php echo esc_html($settings['abc_elementor_sec_title_tag']); ?>>

    <?php if ($abc_sec_divider_visible) : ?>
        <div class="abc-elementor-sec-title-divider"></div>
    <?php endif; ?>


</div><!-- section title area -->