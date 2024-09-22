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
        $options = [
            // 'abcbiz_c_p_low' => esc_html__('Low', 'textdomain'),
            // 'abcbiz_c_p_medium' => esc_html__('Medium', 'textdomain'),
            // 'abcbiz_c_p_high' => esc_html__('High', 'textdomain'),

            'abcbiz_c_p_low' => 'abcbiz_c_p_low',
            'abcbiz_c_p_medium' => 'abcbiz_c_p_medium',
            'abcbiz_c_p_high' => 'abcbiz_c_p_high',
        ];

        $selected_keys = [
            $page['abcbiz_cost_calculator_pack_1'],
            $page['abcbiz_cost_calculator_pack_2'],
            $page['abcbiz_cost_calculator_pack_3'],
        ];

        $package_prices = [
            $page['abcbiz_cost_calculator_price_1'],
            $page['abcbiz_cost_calculator_price_2'],
            $page['abcbiz_cost_calculator_price_3'],
        ];

        $stepData = [];
        $array_number = $index + 1;

        foreach ($selected_keys as $keyIndex => $selected_key) {
            if (isset($options[$selected_key])) {
                $selected_text = $options[$selected_key];
                $package_price = isset($package_prices[$keyIndex]) ? $package_prices[$keyIndex] : '';

                $stepData[] = [
                    'step' => $array_number,
                    'package' => $selected_text,
                    'price' => $package_price,
                ];
            }
        }

        $data[] = $stepData;
    }

    $jsonData = json_encode($data);
    echo "<script>var jsonData = $jsonData;</script>";
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
            <input type="radio" onchange="cbGetRangeValue()" class='abcbiz_cost_calculator_package' id="abcbiz_c_p_medium"
                name="cbPricingLevel" value="abcbiz_c_p_medium">
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
        // Get range value
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

        // Get pages number selected
        let cbNumberOfPagesSelected = document.getElementById('abcbiz-pricing-range-selected-page');
        let cbTotalPrice = document.getElementById('cbTotalPrice');

        // Set pages number to selected number from range value
        cbNumberOfPagesSelected.innerText = cbGetRangeSliderValue;

        // Check if cbGetRangeSliderValue and selectedPackage match any 'jsonData' step and package value
        let matchedStep = null;
        jsonData.forEach(stepData => {
            stepData.forEach(step => {
                if (step.step == cbGetRangeSliderValue && step.package == selectedPackage) {
                    matchedStep = step;
                    return; // Exit the loop
                }
            });
            if (matchedStep) {
                return; // Exit the loop
            }
        });

        if (matchedStep) {
            //console.log("cbGetRangeSliderValue and selected package match jsonData step and package value");
            let price = parseInt(matchedStep.price); // Parse the price as an integer
            // console.log("Step: " + matchedStep.step + ", Package: " + matchedStep.package + ", Price: " + price);

            // Calculate and set the total price
            let totalPrice = price;
            cbTotalPrice.innerText = totalPrice;
        } else {
            console.log("cbGetRangeSliderValue and selected package do not match any jsonData step and package value");
        }
    }

    // Add event listener for input changes on the range slider
    document.getElementById("cbPricingRangeSlider").addEventListener('input', cbGetRangeValue);

    // Add event listener for change event on the package radios
    const packageRadios = document.getElementsByClassName('abcbiz_cost_calculator_package');
    for (let i = 0; i < packageRadios.length; i++) {
        packageRadios[i].addEventListener('change', cbGetRangeValue);
    }

    // Initialize the calculations
    cbGetRangeValue();


</script>