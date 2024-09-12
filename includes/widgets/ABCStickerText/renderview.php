<?php
/**
 * Render View for ABC Sticker Text
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_sticker_text = $abcbiz_settings['abcbiz_elementor_sticker_text'];
$abcbiz_btn_switch = $abcbiz_settings['abcbiz_elementor_sticker_btn_switch'];
$abcbiz_btn_text = $abcbiz_settings['abcbiz_elementor_sticker_btn_text'];
$abcbiz_btn_url = $abcbiz_settings['abcbiz_elementor_sticker_btn_url'];
$abcbiz_close_icon_switch = $abcbiz_settings['abcbiz_elementor_sticker_close_icon_switch'];
?>

<div class="abcbiz-elementor-sticker-text-area">
    <?php if ('yes' === $abcbiz_close_icon_switch): ?>
        <div class="abcbiz-sticker-close-icon">
            <svg height="329pt" viewBox="0 0 329.26933 329" width="329pt" xmlns="http://www.w3.org/2000/svg"
                id="fi_1828778">
                <path
                    d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0">
                </path>
            </svg>
        </div>
    <?php endif; ?>

    <div class="abcbiz-sticker-contents-area">
        <div class="abcbiz-sticker-text">
            <?php echo esc_html($abcbiz_sticker_text); ?>
        </div>

        <?php if ('yes' === $abcbiz_btn_switch): ?>
            <div class="abcbiz-sticker-btn">
                <a href="<?php echo esc_url($abcbiz_btn_url['url']); ?>" <?php echo ($abcbiz_btn_url['is_external'] ? 'target="_blank"' : ''); ?>     <?php echo ($abcbiz_btn_url['nofollow'] ? 'rel="nofollow"' : ''); ?>>
                    <?php echo esc_html($abcbiz_btn_text); ?>
                </a>
            </div>
        <?php endif; ?>
    </div><!-- contents area -->
</div><!-- end sticker text area -->