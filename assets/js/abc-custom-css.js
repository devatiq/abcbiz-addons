(function($) {
    $(window).on('elementor:init', function() {
        elementor.channels.editor.on('change:setting:abcbiz_custom_css', function(view) {
            var elementId = view.model.id;
            var customCssSetting = view.model.get('settings').get('abcbiz_custom_css');
            applyCustomCSS(elementId, customCssSetting);
        });

        function applyCustomCSS(elementId, css) {
            var cssRule = '.elementor-element.elementor-element-' + elementId + ' { ' + css + ' }';
            $('#abcbiz-custom-css-' + elementId).remove();
            $('head').append('<style id="abcbiz-custom-css-' + elementId + '">' + cssRule + '</style>');
        }
    });

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/global', function($scope) {
            var elementId = $scope.data('id');
            var settings = elementorFrontend.config.elements.data[elementId].settings;
            if (settings && settings.abcbiz_custom_css) {
                applyCustomCSS(elementId, settings.abcbiz_custom_css);
            }
        });
    });
})(jQuery);
