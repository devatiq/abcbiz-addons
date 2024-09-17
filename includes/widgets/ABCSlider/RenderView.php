<?php
// Get settings
$settings = $this->get_settings_for_display();
$slides_per_view = !empty($settings['slides_per_view']) ? $settings['slides_per_view'] : 3;
$loop = $settings['loop'] === 'yes' ? 'true' : 'false';
$autoplay = $settings['autoplay'] === 'yes' ? 'true' : 'false';

?>
<div class="swiper-container swiper">
    <div class="swiper-wrapper">
        <!-- Dynamically render each slide -->
        <?php if (!empty($settings['slides'])) : ?>
            <?php foreach ($settings['slides'] as $slide) : ?>
                <div class="swiper-slide">
                    <!-- Slide Title -->
                    <?php if (!empty($slide['slide_title'])) : ?>
                        <h3><?php echo esc_html($slide['slide_title']); ?></h3>
                    <?php endif; ?>

                    <!-- Render the selected Elementor template -->
                    <?php if (!empty($slide['template_select'])) : ?>
                        <div class="slide-template-content">
                            <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($slide['template_select']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script>
    jQuery(document).ready(function ($) {
        // Check if Elementor is in editor mode
        var isEditMode = <?php echo \Elementor\Plugin::$instance->editor->is_edit_mode() ? 'true' : 'false'; ?>;

        // Ensure the Swiper initializes after the Elementor frontend is ready
        if (isEditMode) {
            elementorFrontend.hooks.addAction('frontend/element_ready/abcbiz-ABCSlider.default', function () {
                initSwiper();
            });
        } else {
            $(window).on('load', function() {
                initSwiper();
            });
        }

        function initSwiper() {
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
        }
    });
</script>
