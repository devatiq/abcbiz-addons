// Function to handle the range value and price calculations
function abcbizGetRangeValue() {
    // Get range slider value
    let abcbizPricingRangeSlider = document.getElementById("abcbizPricingRangeSlider");
    if (!abcbizPricingRangeSlider) return; // Prevent errors in editor mode
    let abcbizGetRangeSliderValue = abcbizPricingRangeSlider.value;

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
    let abcbizNumberOfPagesSelected = document.getElementById('abcbiz-pricing-range-selected-page');
    if (abcbizNumberOfPagesSelected) {
        abcbizNumberOfPagesSelected.innerText = abcbizGetRangeSliderValue;
    }

    // Get the total price based on selected step and package
    let abcbizTotalPrice = document.getElementById('abcbizTotalPrice');
    if (pricingData[abcbizGetRangeSliderValue] && pricingData[abcbizGetRangeSliderValue][selectedPackage]) {
        let totalPrice = pricingData[abcbizGetRangeSliderValue][selectedPackage];
        if (abcbizTotalPrice) {
            abcbizTotalPrice.innerText = totalPrice;
        }
    }
}

// Function to initialize the event listeners
function initializeAbcbizCostEstimation() {
    const pricingRangeSlider = document.getElementById("abcbizPricingRangeSlider");
    const packageRadios = document.getElementsByClassName('abcbiz_cost_calculator_package');

    if (pricingRangeSlider) {
        pricingRangeSlider.addEventListener('input', abcbizGetRangeValue);
    }

    if (packageRadios.length > 0) {
        for (let i = 0; i < packageRadios.length; i++) {
            packageRadios[i].addEventListener('change', abcbizGetRangeValue);
        }
    }

    // Initialize the calculations on page load
    abcbizGetRangeValue();
}

// Ensure the script runs in both Elementor's frontend and editor modes
jQuery(window).on('elementor/frontend/init', () => {
    elementorFrontend.hooks.addAction('frontend/element_ready/global', ($scope) => {
        // Check if the range slider exists in the current scope
        var sliderElement = $scope.find('#abcbizPricingRangeSlider');
        if (sliderElement.length > 0) {
            // Initialize the cost estimation
            initializeAbcbizCostEstimation();
        }
    });
});
