jQuery(document).ready(function($) {
    $('#abcbiz-mailchimp-form').on('submit', function(e) {
        e.preventDefault();

        var formData = {
            action: 'abcbiz_mailchimp_subscribe',
            nonce: abcbizMailchimpAjax.nonce,
            email: $('#abcbiz-mailchimp-email').val(),
            fname: $('#abcbiz-mailchimp-fname').val(),
            lname: $('#abcbiz-mailchimp-lname').val(),
            mailchimp_list_id: $('#abcbiz-mailchimp-list').val()
        };

        console.log(formData);

        $.ajax({
            url: abcbizMailchimpAjax.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('.abcbiz-mailchimp-response').html('<p>' + response.data.message + '</p>');
                } else {
                    $('.abcbiz-mailchimp-response').html('<p>' + response.data.message + '</p>');
                }
            },
            error: function() {
                $('.abcbiz-mailchimp-response').html('<p>There was an error. Please try again.</p>');
            }
        });
    });
});
