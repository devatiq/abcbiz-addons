// Function to handle the range value and price calculations
function abcbizGetRangeValue(uniqueId) {
    // Get the pricing data from the attribute and parse it
    let pricingData = JSON.parse(document.querySelector(`.abcbiz-pricing-calculator[data-unique-id='${uniqueId}']`).getAttribute('data-pricing'));

    // Get range slider value
    let abcbizPricingRangeSlider = document.getElementById(`abcbizPricingRangeSlider_${uniqueId}`);
    if (!abcbizPricingRangeSlider) return; // Prevent errors in editor mode
    let abcbizGetRangeSliderValue = abcbizPricingRangeSlider.value;

    // Get selected package
    let selectedPackage = '';
    const packageRadios = document.querySelectorAll(`.abcbiz_cost_calculator_package_${uniqueId}`);
    for (let i = 0; i < packageRadios.length; i++) {
        if (packageRadios[i].checked) {
            selectedPackage = packageRadios[i].value;
            break;
        }
    }

    // Set the selected pages number
    let abcbizNumberOfPagesSelected = document.getElementById(`abcbiz-pricing-range-selected-page_${uniqueId}`);
    if (abcbizNumberOfPagesSelected) {
        abcbizNumberOfPagesSelected.innerText = abcbizGetRangeSliderValue;
    }

    // Get the total price based on selected step and package
    let abcbizTotalPrice = document.getElementById(`abcbizTotalPrice_${uniqueId}`);
    if (pricingData[abcbizGetRangeSliderValue] && pricingData[abcbizGetRangeSliderValue][selectedPackage]) {
        let totalPrice = pricingData[abcbizGetRangeSliderValue][selectedPackage];
        if (abcbizTotalPrice) {
            abcbizTotalPrice.innerText = totalPrice;
        }
    }
}

// Function to initialize the event listeners
function initializeAbcbizCostEstimation(uniqueId) {
    const pricingRangeSlider = document.getElementById(`abcbizPricingRangeSlider_${uniqueId}`);
    const packageRadios = document.querySelectorAll(`.abcbiz_cost_calculator_package_${uniqueId}`);

    if (pricingRangeSlider) {
        pricingRangeSlider.addEventListener('input', () => abcbizGetRangeValue(uniqueId));
    }

    if (packageRadios.length > 0) {
        packageRadios.forEach(radio => {
            radio.addEventListener('change', () => abcbizGetRangeValue(uniqueId));
        });
    }

    // Initialize the calculations on page load
    abcbizGetRangeValue(uniqueId);
}

// Ensure the script runs in both Elementor's frontend and editor modes
jQuery(window).on('elementor/frontend/init', () => {
    elementorFrontend.hooks.addAction('frontend/element_ready/global', ($scope) => {
        $scope.find('.abcbiz-pricing-calculator').each(function () {
            let uniqueId = jQuery(this).data('unique-id');
            initializeAbcbizCostEstimation(uniqueId);
        });
    });
});