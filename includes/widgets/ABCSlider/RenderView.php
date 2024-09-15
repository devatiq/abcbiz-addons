<?php
// Get settings
$settings = $this->get_settings_for_display();
$slides_per_view = !empty($settings['slides_per_view']) ? $settings['slides_per_view'] : 3;
$loop = $settings['loop'] === 'yes' ? 'true' : 'false';
$autoplay = $settings['autoplay'] === 'yes' ? 'true' : 'false';

?>
<div class="swiper-container swiper">
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <!-- Add more slides as needed -->
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script>
    jQuery(document).ready(function ($) {
        // Ensure the Swiper initializes after the Elementor frontend is ready
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/abcbiz-ABCSlider.default', function () {
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: <?php echo $slides_per_view; ?>,
                    loop: <?php echo $loop; ?>,
                    autoplay: <?php echo $autoplay ? '{ delay: 2500, disableOnInteraction: false }' : 'false'; ?>,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            });
        });
    });
</script>
