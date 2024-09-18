<?php
// Get settings
$settings = $this->get_settings_for_display();
$slides_per_view = !empty($settings['slides_per_view']) ? $settings['slides_per_view'] : 3;
$loop = $settings['slider_loop'] === 'yes' ? true : false;
$autoplay = $settings['slider_autoplay'] === 'yes' ? ['delay' => 2500, 'disableOnInteraction' => false] : false;
$arrows = $settings['show_arrows'] === 'yes' ? true : false;
$pagination = $settings['show_pagination'] === 'yes' ? true : false;

// Combine all the settings into a single JSON string
$slider_settings = json_encode([
    'slidesPerView' => $slides_per_view,
    'loop' => $loop,
    'autoplay' => $autoplay,
    'arrows' => $arrows,
    'pagination' => $pagination,
]);

// Create a unique ID for the slider instance
$unique_id = uniqid('abcbiz-slider-');
?>

<div id="<?php echo esc_attr($unique_id); ?>" 
    class="abcbiz-addons-slider-wrapper"
    data-settings='<?php echo esc_attr($slider_settings); ?>'
>
    <div class="swiper-container swiper">
        <div class="swiper-wrapper">
            <!-- Dynamically render each slide -->
            <?php if (!empty($settings['slides'])): ?>
                <?php foreach ($settings['slides'] as $slide): ?>
                    <div class="swiper-slide">    
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