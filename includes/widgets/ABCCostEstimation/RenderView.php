<?php
/**
 * Render View file for ABC Cost Estimation
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$repeater_pages = isset($settings['abcbiz_cost_cal_pages_list']) ? $settings['abcbiz_cost_cal_pages_list'] : [];
$totalPages = !empty($repeater_pages) ? count($repeater_pages) : 1;
// Fetch saved package names from the dashboard settings
$cost_estimation_options = get_option('abcbiz_cost_estimation_options', []);
$package_1 = !empty($cost_estimation_options['cost_estimation_package_1']) ? esc_html($cost_estimation_options['cost_estimation_package_1']) : '';
$package_2 = !empty($cost_estimation_options['cost_estimation_package_2']) ? esc_html($cost_estimation_options['cost_estimation_package_2']) : '';
$package_3 = !empty($cost_estimation_options['cost_estimation_package_3']) ? esc_html($cost_estimation_options['cost_estimation_package_3']) : '';

// Generate the dynamic URL to the settings page
$settings_url = admin_url('admin.php?page=abcbiz_settings&tab=cost_estimation');
//button label
$button_label = isset($settings['abcbiz_cost_calculator_button_label']) ? $settings['abcbiz_cost_calculator_button_label'] : esc_html__('Get Cost Estimation', 'abcbiz-addons');
//button url
$button_url = isset($settings['abcbiz_cost_calculator_button_url']) ? $settings['abcbiz_cost_calculator_button_url'] : '';
//currency
$currency = isset($settings['abcbiz_cost_calculator_currency']) ? $settings['abcbiz_cost_calculator_currency'] : '$';
//default value
$default_value = isset($settings['abcbiz_cost_calculator_default_value']) ? $settings['abcbiz_cost_calculator_default_value'] : '2';

// Use Elementor's unique ID
$unique_id = $this->get_id();

if ($repeater_pages) {
    $data = [];

    foreach ($repeater_pages as $index => $page) {
        $step = $index + 1;
        $data["$step"]["abcbiz_c_p_low"] = isset($page['abcbiz_cost_calculator_price_1']) ? $page['abcbiz_cost_calculator_price_1'] : 0;
        $data["$step"]["abcbiz_c_p_medium"] = isset($page['abcbiz_cost_calculator_price_2']) ? $page['abcbiz_cost_calculator_price_2'] : 0;
        $data["$step"]["abcbiz_c_p_high"] = isset($page['abcbiz_cost_calculator_price_3']) ? $page['abcbiz_cost_calculator_price_3'] : 0;
    }

    // Convert pricing data to a JSON string and store it in a data attribute
    $jsonData = esc_attr(json_encode($data));
}
?>

<!-- Pricing Calculator Area-->
<div class="abcbiz-pricing-calculator" data-unique-id="<?php echo esc_attr($unique_id); ?>"
    data-pricing="<?php echo $jsonData; ?>">
    <?php if (!empty($settings['abcbiz_cost_calculator_heading'])): ?>
        <div class="abcbiz-pricing-cal-heading">
            <h2><?php echo esc_html($settings['abcbiz_cost_calculator_heading']); ?></h2>
        </div>
    <?php endif; ?>

    <!-- Pricing Package Name -->
    <div class="abcbiz-pricing-label">
        <?php // Check if any of the package names are empty
        if (!empty($package_1) && !empty($package_2) && !empty($package_3)) {
            ?>
            <!-- Pricing Options -->
            <div class="abcbiz-pricing-options">

                <!--Pacakge Name-->
                <?php if (!empty($package_1)): ?>
                    <label for="abcbiz_c_p_low_<?php echo esc_attr($unique_id); ?>" class="abcbiz-pricing-option">
                        <input type="radio"
                            class='abcbiz_cost_calculator_package abcbiz_cost_calculator_package_<?php echo esc_attr($unique_id); ?>'
                            id="abcbiz_c_p_low_<?php echo esc_attr($unique_id); ?>"
                            name="abcbizPricingLevel_<?php echo esc_attr($unique_id); ?>" checked value="abcbiz_c_p_low">
                        <span class="abcbiz-cost-est-pack-radio"></span>
                        <span class="abcbiz-pricing-label-text"><?php echo esc_html($package_1); ?></span>
                    </label>
                <?php endif; ?><!--/ Pacakge Name-->

                <!--Pacakge Name-->
                <?php if (!empty($package_2)): ?>
                    <label for="abcbiz_c_p_medium_<?php echo esc_attr($unique_id); ?>" class="abcbiz-pricing-option">
                        <input type="radio"
                            class='abcbiz_cost_calculator_package abcbiz_cost_calculator_package_<?php echo esc_attr($unique_id); ?>'
                            id="abcbiz_c_p_medium_<?php echo esc_attr($unique_id); ?>"
                            name="abcbizPricingLevel_<?php echo esc_attr($unique_id); ?>" value="abcbiz_c_p_medium">
                        <span class="abcbiz-cost-est-pack-radio"></span>
                        <span class="abcbiz-pricing-label-text"><?php echo esc_html($package_2); ?></span>
                    </label>
                <?php endif; ?><!--/ Pacakge Name-->

                <!--Pacakge Name-->
                <?php if (!empty($package_3)): ?>
                    <label for="abcbiz_c_p_high_<?php echo esc_attr($unique_id); ?>" class="abcbiz-pricing-option">
                        <input type="radio"
                            class='abcbiz_cost_calculator_package abcbiz_cost_calculator_package_<?php echo esc_attr($unique_id); ?>'
                            id="abcbiz_c_p_high_<?php echo esc_attr($unique_id); ?>"
                            name="abcbizPricingLevel_<?php echo esc_attr($unique_id); ?>" value="abcbiz_c_p_high">
                        <span class="abcbiz-cost-est-pack-radio"></span>
                        <span class="abcbiz-pricing-label-text"><?php echo esc_html($package_3); ?></span>
                    </label>
                <?php endif; ?><!--/ Pacakge Name-->
            </div><!--/ Pricing Options -->
            <?php
        } else {
            echo sprintf(
                '<p style="color: red;">' . esc_html__('Package names are not configured yet. Please go to the %ssettings page%s to configure them.', 'abcbiz-addons') . '</p>',
                '<a href="' . esc_url($settings_url) . '" target="_blank">',
                '</a>'
            );
        }
        ?>
    </div><!--/ Pricing Package Name -->

    <!-- Pricing Range Slider -->
    <div class="abcbiz-pricing-cal-number-of-pages">
        <!-- Pricing Range Heading -->
        <div class="abcbiz-pricing-cal-pages-top">
            <?php if (!empty($settings['abcbiz_cost_calculator_slider_label'])): ?>
                <h2><?php echo esc_html($settings['abcbiz_cost_calculator_slider_label']); ?></h2>
            <?php endif; ?>
            <p id="abcbiz-pricing-range-selected-page_<?php echo esc_attr($unique_id); ?>"
                class="abcbiz-slider-selected-page"><?php echo esc_html__('3', 'abcbiz-addons'); ?></p>
        </div><!--/ Pricing Range Heading -->
        <div class="abcbiz-pricing-cal-range-slider">
            <input id="abcbizPricingRangeSlider_<?php echo esc_attr($unique_id); ?>" class="abcbiz-range-slider"
                type="range" min="1" max="<?php echo esc_attr($totalPages); ?>" step="1" value="<?php echo esc_attr($default_value); ?>"
                data-active-color="<?php echo esc_attr($settings['slider_active_color'] ?? '#0f4fff'); ?>"
                data-inactive-color="<?php echo esc_attr($settings['slider_inactive_color'] ?? '#300bff'); ?>"
                data-thumb-color="<?php echo esc_attr($settings['slider_thumb_color'] ?? '#ffee00'); ?>">
            <div class="abcbiz-pricing-cal-range-bottom">
                <p id="abcbiz-min-pages" class="abcbiz-slider-min-page"><?php echo esc_html__('1', 'abcbiz-addons'); ?>
                </p>
                <p id="abcbiz-max-pages" class="abcbiz-slider-max-page"><?php echo esc_html($totalPages); ?></p>
            </div>
        </div>
    </div><!--/ Pricing Range Slider -->

    <!-- Pricing Total Price -->
    <div class="abcbiz-pricing-cal-total-price">
        <?php if (!empty($settings['abcbiz_cost_calculator_total_label'])): ?>
            <p><?php echo esc_html($settings['abcbiz_cost_calculator_total_label']); ?></p>
        <?php endif; ?>
        <p id="abcbiz-total-price"><?php echo esc_html($currency); ?><span
                id="abcbizTotalPrice_<?php echo esc_attr($unique_id); ?>">0</span></p>
    </div><!--/ Pricing Total Price -->

    <!-- Pricing Submit Button -->
    <div class="abcbiz-pricing-cal-submit-button">
        <a href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_label); ?></a>
    </div><!--/ Pricing Submit Button -->
</div>