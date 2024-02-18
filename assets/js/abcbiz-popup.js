jQuery(document).ready(function ($) {
    "use strict";
    $.fn.ABCBizPopup = function () {
        this.click(function () {
            var contentId = $(this).data('popup-content');
            var popupContent = $(contentId).html();

            var overlay = $('<div class="abcbiz-popup-overlay"></div>');
            var popup = $('<div class="abcbiz-popup"></div>').append(popupContent);
            var closeBtn = $('<span class="abcbiz-popup-close"><i class="eicon-editor-close"></i></span>');

            popup.append(closeBtn);
            overlay.append(popup);

            // Append the overlay to body
            $('body').append(overlay);

            // Show the popup
            overlay.fadeIn();
            popup.show();

            // Close the popup
            closeBtn.click(function () {
                overlay.fadeOut(function () {
                    $(this).remove(); // Remove the overlay from DOM after fading out
                });
            });

            // Close on overlay click
            overlay.click(function (e) {
                if (e.target == this) { // Ensure the overlay, not child elements, was clicked
                    $(this).fadeOut(function () {
                        $(this).remove();
                    });
                }
            });
        });
    };

    $('.abcbiz-popup-trigger').ABCBizPopup();
});