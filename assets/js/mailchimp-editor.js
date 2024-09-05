(function ($) {
    // Ensure script runs only in Elementor editor
    $(window).on('elementor:init', function () {
        elementor.hooks.addAction('panel/open_editor/widget/abcbiz-mailchimp', function (panel, model, view) {
            // Get the API Key and List ID fields
            var apiKeyField = panel.$el.find('input[data-setting="mailchimp_api_key"]');
            var listSelectField = panel.$el.find('select[data-setting="mailchimp_list_id"]');

            // Handle API Key input change
            apiKeyField.on('input', function () {
                var apiKey = $(this).val();
                if (apiKey.length > 0) {
                    $.ajax({
                        url: ajaxurl, // This is automatically available in WordPress admin
                        type: 'POST',
                        data: {
                            action: 'abcbiz_fetch_mailchimp_lists',
                            api_key: apiKey
                        },
                        success: function (response) {
                            if (response.success) {
                                listSelectField.empty(); // Clear current options
                                $.each(response.data.lists, function (index, list) {
                                    listSelectField.append(new Option(list.name, list.id));
                                });
                            } else {
                                alert(response.data.message);
                            }
                        }
                    });
                }
            });
        });
    });
})(jQuery);
