jQuery(document).ready(function ($) {
    'use strict';
    function showPopup(contentId) {
        var overlay = $(contentId);
        overlay.css('display', 'flex').hide().fadeIn();
        $('body').css('overflow', 'hidden');
    }

    // Function to hide the popup
    function hidePopup(overlay) {
        overlay.fadeOut(function() {
            $(this).css('display', 'none');
            $('body').css('overflow', ''); // Reset body overflow
        });
    }

    // Open popup on trigger click
    $('.abcbiz-popup-trigger').click(function (e) {
        e.preventDefault();
        var contentId = $(this).data('popup-content');
        showPopup(contentId);
    });

    // Close button functionality with event delegation
    $(document).on('click', '.abcbiz-popup-close', function () {
        var overlay = $(this).closest('.abcbiz-popup-overlay');
        hidePopup(overlay);
    });

    // Optional: Close the popup when clicking outside of it
    $(document).on('click', '.abcbiz-popup-overlay', function (e) {
        if (e.target !== this) return;
        hidePopup($(this));
    });

    // Prevent closing popup when clicking inside the popup content
    $(document).on('click', '.abcbiz-popup', function (e) {
        e.stopPropagation();
    });
});