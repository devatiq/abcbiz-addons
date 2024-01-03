jQuery(document).ready(function($) {
    $('body').on('click', '.abcbiz_add_to_cart', function(e) {
        e.preventDefault();

        let button = $(this);
        if (button.is('.disabled')) {
            return; // Exit if the button is disabled
        }

        let product_id = button.data('product_id');
        button.addClass('abcbiz_cart_loading');
        let quantity = button.closest('form').find('.quantity input').val() || 1; // Default to 1 if not set

        $.ajax({
            type: 'POST',
            url: acbbiz_add_to_cart.ajax_url,
            data: {
                'action': 'abcbiz_ajax_add_to_cart_handler',
                'product_id': product_id,
                'quantity': quantity,
                'abcbiz_cart_nonce': acbbiz_add_to_cart.abcbiz_add_to_cart_nonce 
            },
            success: function(response) {
                var messageDiv = $('#acbbiz-add-to-cart-message');
                if (response.success) {
                    messageDiv.html('<p class="success-message">' + response.data.message + '</p>').fadeIn();
                    abcbiz_updateCartCount(); // Update cart count on successful addition
                } else {
                    messageDiv.html('<p>' + response.data.message + '</p>').fadeIn();
                }
                
                messageDiv.delay(3000).queue(function(next) {
                    $(this).empty();
                    next();
                });
            },
            complete: function() {
                button.removeClass('abcbiz_cart_loading');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var messageDiv = $('#acbbiz-add-to-cart-message');
                var errorMessage = "An error occurred. Please try again.";
                if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
                    errorMessage = jqXHR.responseJSON.data.message;
                }
                messageDiv.html('<p class="error-message">' + errorMessage + '</p>').fadeIn().delay(3000).fadeOut();
            },
        });
    });

    function abcbiz_updateCartCount() {
        // Only proceed if abcbizCartAjax and abcbizCartAjax.url are defined
        if (typeof abcbizCartAjax !== 'undefined' && typeof abcbizCartAjax.url !== 'undefined') {
            $.ajax({
                type: 'POST',
                url: abcbizCartAjax.url,
                data: {
                    'action': 'abcbiz_get_cart_count'
                },
                success: function(cartCount) {
                    // Update the cart count if the element exists
                    if ($('.abcbiz-cart-contents-count').length) {
                        $('.abcbiz-cart-contents-count').text(cartCount);
                    }
                }
            });
        }
    }    
    
});