<?php
// Get settings
$settings = $this->get_settings_for_display();
$slides_per_view = !empty($settings['slides_per_view']) ? $settings['slides_per_view'] : 1;
$slides_per_view_tablet = isset($settings['slides_per_view_tablet']) ? $settings['slides_per_view_tablet'] : 1;
$slides_per_view_mobile = isset($settings['slides_per_view_mobile']) ? $settings['slides_per_view_mobile'] : 1;

$loop = $settings['slider_loop'] === 'yes' ? true : false;
$autoplay = $settings['slider_autoplay'] === 'yes' ? ['delay' => 6000, 'disableOnInteraction' => false] : false;
$arrows = $settings['show_arrows'] === 'yes' ? true : false;
$pagination = $settings['show_pagination'] === 'yes' ? true : false;

// Combine all the settings into a single JSON string
$slider_settings = json_encode([
    'slidesPerView' => $slides_per_view,
    'slidesPerViewTablet' => $slides_per_view_tablet,
    'slidesPerViewMobile' => $slides_per_view_mobile,
    'loop' => $loop,
    'autoplay' => $autoplay,
    'arrows' => $arrows,
    'pagination' => $pagination,
]);

// Create a unique ID for the slider instance
$unique_id = $this->get_id();
?>

<div id="abcbiz-slider-<?php echo esc_attr($unique_id); ?>" class="abcbiz-addons-template-slider-wrapper"
    data-settings='<?php echo esc_attr($slider_settings); ?>'>
    <div class="abcbiz-template-swiper-container">
        <div class="abcbiz-template-swiper-wrapper">
            <!-- Dynamically render each slide -->
            <?php if (!empty($settings['slides'])): ?>
                <?php foreach ($settings['slides'] as $slide): ?>
                    <div class="abcbiz-template-swiper-slide">
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
    </div>
    <?php 
        if('yes' === $settings['show_pagination']) :
    ?>
    <!-- Add Pagination -->
        <div class="abcbiz-template-slider-pagination">
            <div class="swiper-pagination"></div>
        </div>
    <?php endif; ?>

    <?php if('yes' === $settings['show_arrows']) : ?>
        <!-- Add Navigation -->
        <div class="abcbiz-template-slider-nav">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    <?php endif; ?>
</div>