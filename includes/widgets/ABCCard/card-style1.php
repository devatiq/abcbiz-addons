<?php
/**
 * Render View file for ABC Card Info
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_badge_text = $abcbiz_settings['abcbiz_elementor_card_info_badge_text'];
$abcbiz_heading_text = $abcbiz_settings['abcbiz_elementor_card_info_heading_text'];
$abcbiz_description = $abcbiz_settings['abcbiz_elementor_card_info_desc'];
$abcbiz_button_text = $abcbiz_settings['abcbiz_elementor_card_info_btn_text'];
$abcbiz_card_icon = $abcbiz_settings['abcbiz_elementor_card_info_icon'];  
$abcbiz_button_icon = $abcbiz_settings['abcbiz_elementor_card_info_btn_icon']; 
$abcbiz_button_url = $abcbiz_settings['abcbiz_elementor_card_info_btn_url'];
?>

<!-- Card Info Area-->
<div class="abcbiz-card-style-one-area">
    <div class="abcbiz-card-info-wrap">

    <!-- Dynamic Image -->
    <?php if ('image' === $abcbiz_settings['abcbiz_elementor_card_info_type'] && !empty($abcbiz_settings['abcbiz_elementor_card_info_image']['url'])): ?>
        <figure class="abcbiz-card-image">
            <img fetchpriority="high" src="<?php echo esc_url($abcbiz_settings['abcbiz_elementor_card_info_image']['url']); ?>" alt="<?php echo esc_attr($abcbiz_heading_text); ?>">
            <?php if (!empty($abcbiz_badge_text)): ?>
                <div class="abcbiz-badge"><?php echo esc_html($abcbiz_badge_text); ?></div>
            <?php endif; ?>
        </figure>
    <?php endif; ?>

    <!-- Dynamic Card Icon -->
    <?php if ('icon' === $abcbiz_settings['abcbiz_elementor_card_info_type'] && !empty($abcbiz_card_icon)): ?>
        <div class="abcbiz-card-icon">
            <?php \Elementor\Icons_Manager::render_icon($abcbiz_card_icon, ['aria-hidden' => 'true']); ?>
            <?php if (!empty($abcbiz_badge_text)): ?>
                <div class="abcbiz-badge"><?php echo esc_html($abcbiz_badge_text); ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <div class="abcbiz-card-content">
        <?php if (!empty($abcbiz_heading_text)): ?>
            <h3 class="abcbiz-card-title"><?php echo esc_html($abcbiz_heading_text); ?></h3>
        <?php endif; ?>

    <!-- Dynamic Description -->
    <?php if (!empty($abcbiz_description)): ?>
            <div class="abcbiz-card-text">
                <p><?php echo wp_kses_post($abcbiz_description); ?></p>
            </div>
    <?php endif; ?>

    <!-- Dynamic Button with Icon -->
    <?php if (!empty($abcbiz_button_text) || !empty($abcbiz_button_icon)): ?>
            <div class="abcbiz-card-button">
                <a href="<?php echo esc_url($abcbiz_button_url['url']); ?>" <?php echo $abcbiz_button_url['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $abcbiz_button_url['nofollow'] ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($abcbiz_button_text); ?> <span class="abcbiz-btn-icon"><?php \Elementor\Icons_Manager::render_icon($abcbiz_button_icon, ['aria-hidden' => 'true', 'class' => 'abcbiz-button-icon']); ?></span></a>
            </div>
    <?php endif; ?>
        </div><!-- end content -->
    </div>
</div><!--/ Card Info Area-->
