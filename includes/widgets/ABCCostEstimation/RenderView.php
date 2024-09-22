<?php
/**
 * Render View file for ABC Cost Estimation
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$repeater_pages = $settings['abcbiz_cost_cal_pages_list'];
$totalPages = !empty($repeater_pages) ? count($repeater_pages) : 1;

if ($repeater_pages) {
    $data = [];

    foreach ($repeater_pages as $index => $page) {
        $step = $index + 1;
        $data["$step"]["abcbiz_c_p_low"] = $page['abcbiz_cost_calculator_price_1'];
        $data["$step"]["abcbiz_c_p_medium"] = $page['abcbiz_cost_calculator_price_2'];
        $data["$step"]["abcbiz_c_p_high"] = $page['abcbiz_cost_calculator_price_3'];
    }

    $jsonData = json_encode($data);
    echo "<script>var pricingData = $jsonData;</script>";
}

?>

<div class="abcbiz-pricing-calculator">
    <div class="abcbiz-pricing-cal-heading">
        <h2>COMPLEXITY</h2>
    </div>
    <div class="abcbiz-pricing-level">
        <label for="abcbiz_c_p_low">
            <input type="radio" onchange="cbGetRangeValue()" class='abcbiz_cost_calculator_package' id="abcbiz_c_p_low"
                name="cbPricingLevel" checked value="abcbiz_c_p_low">
            Low
        </label>
        <label for="abcbiz_c_p_medium">
            <input type="radio" onchange="cbGetRangeValue()" class='abcbiz_cost_calculator_package'
                id="abcbiz_c_p_medium" name="cbPricingLevel" value="abcbiz_c_p_medium">
            Medium
        </label>
        <label for="abcbiz_c_p_high">
            <input type="radio" onchange="cbGetRangeValue()" class='abcbiz_cost_calculator_package' id="abcbiz_c_p_high"
                name="cbPricingLevel" value="abcbiz_c_p_high">
            High
        </label>
    </div>

    <div class="abcbiz-pricing-cal-number-of-pages">
        <div class="abcbiz-pricing-cal-pages-top">
            <h2>NUMBER OF PAGES</h2>
            <p id="abcbiz-pricing-range-selected-page"></p>
        </div>
        <div class="abcbiz-pricing-cal-range-slider">
            <input id="cbPricingRangeSlider" type="range" min="1" max="<?php echo $totalPages; ?>" step="1" value="3">
            <div class="abcbiz-pricing-cal-range-bottom">
                <p id="cb-min-pages">1</p>
                <p id="cb-max-pages"><?php echo $totalPages; ?></p>
            </div>
        </div>
    </div>

    <div class="abcbiz-pricing-cal-total-price">
        <p>Total</p>
        <p id="cb-total-price">$<span id="cbTotalPrice">790</span></p>
    </div>

    <div class="abcbiz-pricing-cal-submit-button">
        <a href="https://supreox.com/figma-design-to-wordpress/#contact-us-section">Send Request</a>
    </div>
</div>

<script>
    function cbGetRangeValue() {
        // Get range slider value
        let cbGetRangeSliderValue = document.getElementById("cbPricingRangeSlider").value;

        // Get selected package
        let selectedPackage = '';
        const packageRadios = document.getElementsByClassName('abcbiz_cost_calculator_package');
        for (let i = 0; i < packageRadios.length; i++) {
            if (packageRadios[i].checked) {
                selectedPackage = packageRadios[i].value;
                break;
            }
        }

        // Set the selected pages number
        let cbNumberOfPagesSelected = document.getElementById('abcbiz-pricing-range-selected-page');
        cbNumberOfPagesSelected.innerText = cbGetRangeSliderValue;

        // Get the total price based on selected step and package
        let cbTotalPrice = document.getElementById('cbTotalPrice');
        let totalPrice = pricingData[cbGetRangeSliderValue][selectedPackage];

        // Set the total price
        cbTotalPrice.innerText = totalPrice;
    }

    // Initialize event listeners for inputs and radios
    document.getElementById("cbPricingRangeSlider").addEventListener('input', cbGetRangeValue);

    const packageRadios = document.getElementsByClassName('abcbiz_cost_calculator_package');
    for (let i = 0; i < packageRadios.length; i++) {
        packageRadios[i].addEventListener('change', cbGetRangeValue);
    }

    // Initialize the calculations on page load
    cbGetRangeValue();


</script>