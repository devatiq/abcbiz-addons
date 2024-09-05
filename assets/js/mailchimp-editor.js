(function ($) {
    $(window).on('elementor:init', function () {
        elementor.hooks.addAction('panel/open_editor/widget/abcbiz-mailchimp', function (panel, model, view) {
            // Get the List ID select field
            var listSelectField = panel.$el.find('select[data-setting="mailchimp_list_id"]');

            // Fetch the lists when the widget is loaded
            $.ajax({
                url: ajaxurl, // This is automatically available in WordPress admin
                type: 'POST',
                data: {
                    action: 'abcbiz_fetch_mailchimp_lists',
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
        });
    });
})(jQuery);