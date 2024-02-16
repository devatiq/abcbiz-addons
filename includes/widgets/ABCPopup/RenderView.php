<?php
/**
 * Render View file for ABC Popup.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_unique_id = $this->get_id();
$abcbiz_settings = $this->get_settings_for_display();
// content type
$abcbiz_popup_content_type = $abcbiz_settings['abcbiz_elementor_popup_content_type'];
$abcbiz_content_class = ' abcbiz-popup-content-' . $abcbiz_settings["abcbiz_elementor_popup_content_type"];
$abcbiz_popup_type_class = $abcbiz_content_class . ' abcbiz-popup-' . $abcbiz_settings["abcbiz_elementor_popup_type"];
$popup_img_alt_text = $abcbiz_settings['abcbiz_elementor_popup_img_alt_text'];


// popup type 
$abcbiz_popup_type = $abcbiz_settings['abcbiz_elementor_popup_type'];

if('video' == $abcbiz_popup_type) {
    $source_url = $abcbiz_settings['abcbiz_elementor_popup_video']['url'];
 }elseif('gmap' == $abcbiz_popup_type) {
    $source_url = $abcbiz_settings['abcbiz_elementor_popup_gmap'];
 }else {
    $source_url = '';
 }

?>
<script>
    (function($) {
        "use strict";
        $(document).ready(function() {
            $('.abcbiz-popup-data-<?php echo esc_attr($abcbiz_unique_id); ?>').magnificPopup({
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
<div class="abcbiz-popup-area">

    <?php if ('text' == $abcbiz_popup_content_type) : ?>

        <a class="abcbiz-popup-data-<?php echo esc_attr($abcbiz_unique_id); echo esc_attr($abcbiz_popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>"><?php echo wp_kses_post($abcbiz_settings['abcbiz_elementor_popup_text']); ?> </a>

    <?php elseif ('image' == $abcbiz_popup_content_type) : ?>

        <a class="abcbiz-popup-data-<?php echo esc_attr($abcbiz_unique_id); echo esc_attr($abcbiz_popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>">
            <img src="<?php echo esc_url($abcbiz_settings['abcbiz_elementor_popup_image']['url']); ?>" alt="<?php echo esc_attr($popup_img_alt_text); ?>">
        </a>

    <?php elseif ('icon' == $abcbiz_popup_content_type) : ?>
            <?php if(!empty($abcbiz_settings['abcbiz_elementor_popup_icon']['library'])) : ?>
                <a class="abcbiz-popup-data-<?php echo esc_attr($abcbiz_unique_id); echo esc_attr($abcbiz_popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>"><?php \Elementor\Icons_Manager::render_icon( $abcbiz_settings['abcbiz_elementor_popup_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
            <?php else : ?>
            
                <a class="abcbiz-popup-data-<?php echo esc_attr($abcbiz_unique_id); echo esc_attr($abcbiz_popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="50" fill="#448E08"/>
                        <path d="M65.0894 49.4997L41.9171 63.0569L41.7624 36.2106L65.0894 49.4997Z" fill="white"/>
                    </svg>
                </a>
            <?php endif; ?>
    <?php endif; ?>

</div>