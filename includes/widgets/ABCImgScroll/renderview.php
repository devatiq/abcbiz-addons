<?php
/**
 * Render View for ABC Scrolling Text/Image
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_animationDuration = $abcbiz_settings['abcbiz_elementor_img_text_scroll_duration'] . 's';
$abcbiz_animationDirection = $abcbiz_settings['abcbiz_elementor_img_text_scroll_direction'];
$abcbiz_animationName = ($abcbiz_animationDirection == 'abcbizltrscroll') ? 'abcbizltrscroll' : 'abcbizrtlscroll';
?>

<?php
if ( ! empty( $abcbiz_settings['abcbiz_elementor_img_text_scroll_list'] ) ) : ?>
    <div class="abcbiz-elementor-img-scroll-area">
        <div class="abcbiz-elementor-img-scroll-container">
        <div class="abcbiz-scroll-contents" style="animation: <?php echo $abcbiz_animationName . ' ' . $abcbiz_animationDuration; ?> linear 0s infinite;">
                <?php foreach ( $abcbiz_settings['abcbiz_elementor_img_text_scroll_list'] as $item ) : ?>
                    <div class="abcbiz-img-scroll-item">
                        <?php if ( ! empty( $item['abcbiz_elementor_img_text_scroll_image']['url'] ) ) : ?><figure class="abcbiz-img-scroll-img">
                            <img src="<?php echo esc_url( $item['abcbiz_elementor_img_text_scroll_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['abcbiz_elementor_img_text_scroll_title'] ); ?>">
                        </figure>
                        <?php endif; ?>
                        <?php if ( ! empty( $item['abcbiz_elementor_img_text_scroll_title'] ) ) : ?>
                            <div class="abcbiz-img-scroll-title"><?php echo esc_html( $item['abcbiz_elementor_img_text_scroll_title'] ); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div><!-- scroll contents -->
        </div>
    </div><!-- end image scrolling area -->
<?php endif; ?>
