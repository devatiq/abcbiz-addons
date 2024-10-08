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
        // First script: Initialize cost estimation logic
        $scope.find('.abcbiz-pricing-calculator').each(function () {
            let uniqueId = jQuery(this).data('unique-id');
            initializeAbcbizCostEstimation(uniqueId);
        });

        // Second script: Initialize range slider logic
        $scope.find('.abcbiz-range-slider').each(function() {
            const slider = this;
            const uniqueId = slider.id.split('_').pop(); // Extract the unique id
            const selectedPageElement = document.getElementById(`abcbiz-pricing-range-selected-page_${uniqueId}`);

            // Function to set the slider background and selected page text based on its value
            function abcbiz_cost_range_update_slider(slider) {
                const value = (slider.value - slider.min) / (slider.max - slider.min) * 100;
                const activeColor = slider.getAttribute('data-active-color') || '#0f4fff';  // Default blue active color
                const inactiveColor = slider.getAttribute('data-inactive-color') || '#300bff';  // Default purple inactive color

                // Update slider background using the active and inactive colors
                slider.style.background = `linear-gradient(to right, ${activeColor} ${value}%, ${inactiveColor} ${value}%)`;

                // Update the selected page text
                selectedPageElement.textContent = slider.value;
            }

            // Initialize the slider background and selected page text on page load
            abcbiz_cost_range_update_slider(slider);

            // Update the slider background and selected page text when the value changes
            jQuery(slider).on('input', function() {
                abcbiz_cost_range_update_slider(slider);
            });
        });
    });
});
