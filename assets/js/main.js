document.addEventListener('DOMContentLoaded', function() {
    var clickableWidgets = document.querySelectorAll('.abcbiz-custom-elementor-widget-link');

    clickableWidgets.forEach(function(widget) {
        widget.style.cursor = 'pointer';
    });
});
