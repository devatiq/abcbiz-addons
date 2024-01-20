document.addEventListener('DOMContentLoaded', function() {
    var clickableWidgets = document.querySelectorAll('.custom-elementor-widget-link');

    clickableWidgets.forEach(function(widget) {
        var url = widget.getAttribute('data-custom-link-url');
        
        if (url) {
            // Change the cursor to a pointer only for widgets with a link
            widget.style.cursor = 'pointer';

            widget.addEventListener('click', function(event) {
                event.preventDefault();
                var target = widget.getAttribute('data-custom-link-target');

                if(target === '_blank') {
                    window.open(url, '_blank').focus();
                } else {
                    window.location.href = url;
                }
            });
        }
    });
});