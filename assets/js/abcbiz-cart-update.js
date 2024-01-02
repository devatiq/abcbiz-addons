jQuery(function($) {
    'use strict';

    $('body').on('added_to_cart', function() {
        $.ajax({
            url: abcbizCartAjax.url,
            type: 'POST',
            data: {
                action: 'abcbiz_get_cart_count'
            },
            success: function(data) {
                $('.abcbiz-cart-contents-count').text(data);
            }
        });
    });
});