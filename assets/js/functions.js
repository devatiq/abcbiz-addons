function ABCTestimonialSliderinitialize(uniqueId) {

    var slider = document.getElementById('abc-testimonial-slider-' + uniqueId);
    var breakpoints = JSON.parse(slider.getAttribute('data-breakpoints'));
    var autoplayConfig = JSON.parse(slider.getAttribute('data-autoplay-config'));
    var nextEl = slider.getAttribute('data-next-el');
    var prevEl = slider.getAttribute('data-prev-el');

    new Swiper(slider, {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: autoplayConfig,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: nextEl,
            prevEl: prevEl,
        },
        breakpoints: breakpoints
    });

}

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/global', function($scope) {
        var sliderElement = $scope.find('.abc-testimonial-slider');
        if (sliderElement.length > 0 && sliderElement.attr('id')) {
            var uniqueId = sliderElement.attr('id').replace('abc-testimonial-slider-', '');           
            ABCTestimonialSliderinitialize(uniqueId);
        }
    });
});