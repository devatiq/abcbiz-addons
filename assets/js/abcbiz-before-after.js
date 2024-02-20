jQuery(document).ready(function($) {
    // Parse the JSON object into a JavaScript object
    var beforeAfterData = abcbiz-before_after_data;
    
    // Use the dynamic values in your JavaScript code
    $(".abcbiz-before-after-container-" + beforeAfterData.id).twentytwenty({
        before_label: beforeAfterData.before_label,
        after_label: beforeAfterData.after_label,
        orientation: beforeAfterData.orientation,
        no_overlay: beforeAfterData.no_overlay,
    });
});