<?php

/**
 * Render View file for ABC Popup.
 */


$unique_id = $this->get_id();
$settings = $this->get_settings_for_display();
// content type
$popup_content_type = $settings['abc_elementor_popup_content_type'];

$content_class = ' abc-popup-content-' . $settings["abc_elementor_popup_content_type"];

$popup_type_class = $content_class . ' abc-popup-' . $settings["abc_elementor_popup_type"];
$popup_img_alt_text = $settings['abc_elementor_popup_img_alt_text'];


// popup type 
$popup_type = $settings['abc_elementor_popup_type'];

if('video' == $popup_type) {
    $source_url = $settings['abc_elementor_popup_video']['url'];
 }elseif('gmap' == $popup_type) {
    $source_url = $settings['abc_elementor_popup_gmap'];
 }else {
    $source_url = '';
 }





?>
<script>
    (function($) {
        "use strict";
        $(document).ready(function() {
            $('.abc-popup-data-<?php echo esc_attr($unique_id); ?>').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: true,
                fixedContentPos: false
            });
        });
    })(jQuery);
</script>
<div class="abc-popup-area">

    <?php if ('text' == $popup_content_type) : ?>

        <a class="abc-popup-data-<?php echo esc_attr($unique_id); echo esc_attr($popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>"><?php echo wp_kses_post($settings['abc_elementor_popup_text']); ?> </a>

    <?php elseif ('image' == $popup_content_type) : ?>

        <a class="abc-popup-data-<?php echo esc_attr($unique_id); echo esc_attr($popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>">
            <img src="<?php echo esc_url($settings['abc_elementor_popup_image']['url']); ?>" alt="<?php echo esc_attr($popup_img_alt_text); ?>">
        </a>

    <?php elseif ('icon' == $popup_content_type) : ?>
            <?php if(!empty($settings['abc_elementor_popup_icon']['library'])) : ?>
                <a class="abc-popup-data-<?php echo esc_attr($unique_id); echo esc_attr($popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['abc_elementor_popup_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
            <?php else : ?>
            
                <a class="abc-popup-data-<?php echo esc_attr($unique_id); echo esc_attr($popup_type_class); ?> " href="<?php echo       esc_attr($source_url); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="50" fill="#448E08"/>
                        <path d="M65.0894 49.4997L41.9171 63.0569L41.7624 36.2106L65.0894 49.4997Z" fill="white"/>
                    </svg>
                </a>
            <?php endif; ?>
    <?php endif; ?>

</div>