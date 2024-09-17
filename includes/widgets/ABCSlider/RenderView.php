<?php
// Get settings
$settings = $this->get_settings_for_display();
$slides_per_view = !empty($settings['slides_per_view']) ? $settings['slides_per_view'] : 3;
$loop = $settings['loop'] === 'yes' ? 'true' : 'false';
$autoplay = $settings['autoplay'] === 'yes' ? json_encode(['delay' => 2500, 'disableOnInteraction' => false]) : 'false';

// Create a unique ID for the slider instance
$unique_id = uniqid('abcbiz-slider-');
?>

<div id="<?php echo esc_attr($unique_id); ?>" 
    class="abcbiz-addons-slider-wrapper"
    data-slides-per-view="<?php echo esc_attr($slides_per_view); ?>"
    data-loop="<?php echo esc_attr($loop); ?>"
    data-autoplay="<?php echo esc_attr($autoplay); ?>"
>
    <div class="swiper-container swiper">
        <div class="swiper-wrapper">
            <!-- Dynamically render each slide -->
            <?php if (!empty($settings['slides'])): ?>
                <?php foreach ($settings['slides'] as $slide): ?>
                    <div class="swiper-slide">
                        <!-- Slide Title -->
                        <?php if (!empty($slide['slide_title'])): ?>
                            <h3><?php echo esc_html($slide['slide_title']); ?></h3>
                        <?php endif; ?>

                        <!-- Render the selected Elementor template -->
                        <?php if (!empty($slide['template_select'])): ?>
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
</div>