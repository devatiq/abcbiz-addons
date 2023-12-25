jQuery(document).ready(function($) {
    $('.abcbiz-switch input[type="checkbox"]').change(function() {
        var widgetName = $(this).attr('name');
        var value = $(this).is(':checked') ? '1' : '0';
        var thisCheckbox = $(this); // Reference to the current checkbox

        // Remove any existing 'Saved...' message next to this checkbox
        thisCheckbox.siblings('.abcbiz-save-message').remove();

        // Create the 'Saved...' message element
        var saveMessage = $('<span class="abcbiz-save-message">Saving..</span>');

        // Perform the AJAX request
        $.post(abcbizAjax.ajaxurl, {
            action: 'abcbiz_save_widget_setting',
            widgetName: widgetName,
            value: value,
            nonce: abcbizAjax.nonce
        }, function(response) {
            // Append the 'Saved...' message and fade it out after a few seconds
            saveMessage.insertAfter(thisCheckbox).fadeOut(500, function() {
                $(this).remove(); // Remove the message after fading out
            });
        });
    });
});
