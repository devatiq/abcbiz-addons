jQuery(function ($) {
    'use strict';
    $('.abcbiz-ele-search-icon .abcbiz-search-icon').click(function() {
        var searchField = $(this).closest('.abcbiz-search-icon-container').find('.s');
        searchField.toggleClass('active');
        if (searchField.hasClass('active')) {
            searchField.focus();
        }
    });
});