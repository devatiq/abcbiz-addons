<?php
/**
 * Render View for ABC Sticker Text
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_sticker_text = $abcbiz_settings['abcbiz_elementor_sticker_text'];
$abcbiz_btn_switch = $abcbiz_settings['abcbiz_elementor_sticker_btn_switch'];
$abcbiz_btn_text = $abcbiz_settings['abcbiz_elementor_sticker_btn_text'];
$abcbiz_btn_url = $abcbiz_settings['abcbiz_elementor_sticker_btn_url'];
$abcbiz_close_icon_switch = $abcbiz_settings['abcbiz_elementor_sticker_close_icon_switch'];
?>

<div class="abcbiz-elementor-sticker-text-area">
    <?php if ( 'yes' === $abcbiz_close_icon_switch ): ?>
    <div class="abcbiz-sticker-close-icon">
        <i class="icon-element eicon-editor-close"></i>
    </div>
    <?php endif; ?>

    <div class="abcbiz-sticker-contents-area">
        <div class="abcbiz-sticker-text">
            <?php echo esc_html($abcbiz_sticker_text); ?>
        </div>
        
        <?php if ( 'yes' === $abcbiz_btn_switch ): ?>
            <div class="abcbiz-sticker-btn">
            <a href="<?php echo esc_url($abcbiz_btn_url['url']); ?>" <?php echo ($abcbiz_btn_url['is_external'] ? 'target="_blank"' : ''); ?> <?php echo ($abcbiz_btn_url['nofollow'] ? 'rel="nofollow"' : ''); ?>>
                <?php echo esc_html($abcbiz_btn_text); ?>
            </a>
            </div>
        <?php endif; ?>
    </div><!-- contents area -->
</div><!-- end sticker text area -->


