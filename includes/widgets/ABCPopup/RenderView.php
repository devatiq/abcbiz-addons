<?php
/**
 * Render View file for ABC Popup.
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
$settings = $this->get_settings_for_display();

$id = $this->get_id();

$text = $settings['abcbiz_elementor_popup_text'];
// content type
$abcbiz_popup_content_type = $settings['abcbiz_elementor_popup_content_type'];
$abcbiz_content_class = ' abcbiz-popup-content-' . $settings["abcbiz_elementor_popup_content_type"];
$abcbiz_popup_type_class = $abcbiz_content_class . ' abcbiz-popup-' . $settings["abcbiz_elementor_popup_type"];
$popup_img_alt_text = $settings['abcbiz_elementor_popup_img_alt_text'];

?>
<div class="abcbiz-popup-area">
    <?php if ('text' == $settings['abcbiz_elementor_popup_content_type'] && !empty($text)): ?>
        <div class="abcbiz-popup-trigger" data-popup-content="#abcbiz-popup-content-<?php echo esc_attr($id); ?>"><button class="abcbiz-popup-content-text">
                <?php echo esc_html($text); ?>
            </button></div>

    <?php elseif ('image' == $abcbiz_popup_content_type): ?>

        <div class="abcbiz-popup-trigger <?php echo esc_attr($abcbiz_popup_type_class); ?>"
            data-popup-content="#abcbiz-popup-content-<?php echo esc_attr($id); ?>">
            <img src="<?php echo esc_url($settings['abcbiz_elementor_popup_image']['url']); ?>"
                alt="<?php echo esc_attr($popup_img_alt_text); ?>">
        </div>

    <?php elseif ('icon' == $abcbiz_popup_content_type): ?>
        <?php if (!empty($settings['abcbiz_elementor_popup_icon']['library'])): ?>
            <div class="abcbiz-popup-trigger <?php echo esc_attr($abcbiz_popup_type_class); ?>"
                data-popup-content="#abcbiz-popup-content-<?php echo esc_attr($id); ?>">
                <?php \Elementor\Icons_Manager::render_icon($settings['abcbiz_elementor_popup_icon'], ['aria-hidden' => 'true']); ?>
            </div>
        <?php else: ?>

            <div class="abcbiz-popup-trigger <?php echo esc_attr($abcbiz_popup_type_class); ?>"
                data-popup-content="#abcbiz-popup-content-<?php echo esc_attr($id); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                    <circle cx="50" cy="50" r="50" fill="#448E08" />
                    <path d="M65.0894 49.4997L41.9171 63.0569L41.7624 36.2106L65.0894 49.4997Z" fill="white" />
                </svg>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ('yt-video' == $settings['abcbiz_elementor_popup_type']): ?>

        <div id="abcbiz-popup-content-<?php echo esc_attr($id); ?>" class="abcbiz-popup-content" style="display:none;">

            <?php if (!empty($settings['abcbiz_elementor_popup_video'])): ?>
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/<?php echo esc_attr($settings['abcbiz_elementor_popup_video']); ?>"></iframe>
            <?php else: ?>
                <p>
                    <?php echo esc_html__('Not a valid video', 'abcbiz-addons'); ?>
                </p>
            <?php endif; ?>

        </div>

    <?php elseif ('vm-video' == $settings['abcbiz_elementor_popup_type']): ?>
        <div id="abcbiz-popup-content-<?php echo esc_attr($id); ?>" class="abcbiz-popup-content" style="display:none;">

            <?php if (!empty($settings['abcbiz_elementor_popup_vimeo_video'])): ?>
                <iframe
                    src="https://player.vimeo.com/video/<?php echo esc_attr($settings['abcbiz_elementor_popup_vimeo_video']); ?>"
                    width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen></iframe>
            <?php else: ?>
                <p>
                    <?php echo esc_html__('Not a valid video', 'abcbiz-addons'); ?>
                </p>
            <?php endif; ?>

        </div>
    <?php elseif ('gmap' == $settings['abcbiz_elementor_popup_type']): ?>
        <div id="abcbiz-popup-content-<?php echo esc_attr($id); ?>" class="abcbiz-popup-content" style="display:none;">

            <?php if (!empty($settings['abcbiz_elementor_popup_gmap'])): ?>
                <iframe src="<?php echo esc_attr($settings['abcbiz_elementor_popup_gmap']); ?>" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php else: ?>
                <p>
                    <?php echo esc_html__('Not a valid google map', 'abcbiz-addons'); ?>
                </p>
            <?php endif; ?>

        </div>

    <?php endif; ?>
</div>