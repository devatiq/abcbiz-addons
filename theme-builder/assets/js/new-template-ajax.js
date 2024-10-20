jQuery(document).ready(function($) {
    'use strict';
    // Enable the submit button when all fields are filled out
    $('#abcbiz-tb-modal-ftemplate-name, #abcbiz-tb-modal-select-template-type').on('change keyup', function() {
        let templateName = $('#abcbiz-tb-modal-ftemplate-name').val().trim();
        let templateType = $('#abcbiz-tb-modal-select-template-type').val();
        let isFormValid = templateName !== '' && templateType !== '';
        
        $('#abcbiz-tb-modal-content-form-submit').prop('disabled', !isFormValid);
    });

    $('#abcbiz-tb-modal-template-form').on('submit', function(e) {
        e.preventDefault();

        let formData = {
            action: 'abcbiz_library_new_post',
            postTitle: $('#abcbiz-tb-modal-ftemplate-name').val(),
            templateType: $('#abcbiz-tb-modal-select-template-type').val(),
            postType: $('#abcbiz-tb-post-type').val(),
            security: abcbizNewTemplateCreated.nonce,
        };

        $.ajax({
            type: 'POST',
            url: abcbizNewTemplateCreated.ajaxurl,
            data: formData,
            success: function(response) {
                if (response.success) {
                    window.location.href = response.data.redirect_url;
                } else {
                    alert(response.data.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error: ' + textStatus + ' - ' + errorThrown);
                alert('AJAX error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    });
});