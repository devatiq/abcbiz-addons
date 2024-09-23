<?php
/**
 * Render View file for ABC Cost Estimation
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$repeater_pages = $settings['abcbiz_cost_cal_pages_list'];
$totalPages = !empty($repeater_pages) ? count($repeater_pages) : 1;

// Use Elementor's unique ID
$unique_id = $this->get_id();

if ($repeater_pages) {
    $data = [];

    foreach ($repeater_pages as $index => $page) {
        $step = $index + 1;
        $data["$step"]["abcbiz_c_p_low"] = $page['abcbiz_cost_calculator_price_1'];
        $data["$step"]["abcbiz_c_p_medium"] = $page['abcbiz_cost_calculator_price_2'];
        $data["$step"]["abcbiz_c_p_high"] = $page['abcbiz_cost_calculator_price_3'];
    }

    // Create a unique pricing data variable for each widget instance
    $jsonData = json_encode($data);
    echo "<script>var pricingData_{$unique_id} = $jsonData;</script>";
}
?>

<div class="abcbiz-pricing-calculator" data-unique-id="<?php echo esc_attr($unique_id); ?>">
    <div class="abcbiz-pricing-cal-heading">
        <h2>COMPLEXITY</h2>
    </div>
    <div class="abcbiz-pricing-level">
        <label for="abcbiz_c_p_low_<?php echo esc_attr($unique_id); ?>">
            <input type="radio" class='abcbiz_cost_calculator_package abcbiz_cost_calculator_package_<?php echo esc_attr($unique_id); ?>'
                id="abcbiz_c_p_low_<?php echo esc_attr($unique_id); ?>" name="abcbizPricingLevel_<?php echo esc_attr($unique_id); ?>" checked value="abcbiz_c_p_low">
            Low
        </label>
        <label for="abcbiz_c_p_medium_<?php echo esc_attr($unique_id); ?>">
            <input type="radio" class='abcbiz_cost_calculator_package abcbiz_cost_calculator_package_<?php echo esc_attr($unique_id); ?>'
                id="abcbiz_c_p_medium_<?php echo esc_attr($unique_id); ?>" name="abcbizPricingLevel_<?php echo esc_attr($unique_id); ?>" value="abcbiz_c_p_medium">
            Medium
        </label>
        <label for="abcbiz_c_p_high_<?php echo esc_attr($unique_id); ?>">
            <input type="radio" class='abcbiz_cost_calculator_package abcbiz_cost_calculator_package_<?php echo esc_attr($unique_id); ?>'
                id="abcbiz_c_p_high_<?php echo esc_attr($unique_id); ?>" name="abcbizPricingLevel_<?php echo esc_attr($unique_id); ?>" value="abcbiz_c_p_high">
            High
        </label>
    </div>

    <div class="abcbiz-pricing-cal-number-of-pages">
        <div class="abcbiz-pricing-cal-pages-top">
            <h2>NUMBER OF PAGES</h2>
            <p id="abcbiz-pricing-range-selected-page_<?php echo esc_attr($unique_id); ?>"></p>
        </div>
        <div class="abcbiz-pricing-cal-range-slider">
            <input id="abcbizPricingRangeSlider_<?php echo esc_attr($unique_id); ?>" type="range" min="1" max="<?php echo esc_attr($totalPages); ?>" step="1" value="3">
            <div class="abcbiz-pricing-cal-range-bottom">
                <p id="abcbiz-min-pages">1</p>
                <p id="abcbiz-max-pages"><?php echo esc_attr($totalPages); ?></p>
            </div>
        </div>
    </div>

    <div class="abcbiz-pricing-cal-total-price">
        <p>Total</p>
        <p id="abcbiz-total-price">$<span id="abcbizTotalPrice_<?php echo esc_attr($unique_id); ?>">0</span></p>
    </div>

    <div class="abcbiz-pricing-cal-submit-button">
        <a href="https://supreox.com/figma-design-to-wordpress/#contact-us-section">Send Request</a>
    </div>
</div>