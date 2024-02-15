<?php
/**
 * Render View file for ABC CTA widget
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_subheading = $abcbiz_settings['abcbiz_cta_sub_heading'];
$abcbiz_heading = $abcbiz_settings['abcbiz_cta_heading'];
$abcbiz_description = $abcbiz_settings['abcbiz_cta_description'];
$abcbiz_btn1_text = $abcbiz_settings['abcbiz_cta_button_text_one'];
$abcbiz_btn2_text = $abcbiz_settings['abcbiz_cta_button_text_two'];
$abcbiz_cta_ribbon = $abcbiz_settings['abcbiz_cta_ribbon_enable'];
$abcbiz_cta_ribbon_position = $abcbiz_settings['abcbiz_cta_ribbon_position'];
$abcbiz_cta_zoom_effect = $abcbiz_settings['abcbiz_cta_zoom_effect_disable'];

if ( ! empty( $abcbiz_settings['abcbiz_cta_button_link_one']['url'] ) ) {
    $this->add_link_attributes( 'abcbiz_cta_button_link_one', $abcbiz_settings['abcbiz_cta_button_link_one'] );
}

if ( ! empty( $abcbiz_settings['abcbiz_cta_button_link_two']['url'] ) ) {
    $this->add_link_attributes( 'abcbiz_cta_button_link_two', $abcbiz_settings['abcbiz_cta_button_link_two'] );
}
?>

<!-- CTA Area -->
<div class="abcbiz-cta-area<?php if ('yes' == $abcbiz_cta_zoom_effect) : echo esc_attr(' abcbiz-cta-zoom-effect-disabled'); endif; ?>">


    <?php if('yes' == $abcbiz_cta_ribbon) : ?>
        <!-- CTA Ribbon Area -->
        <div class="abcbiz-cta-ribbon-area <?php if ('left' == $abcbiz_cta_ribbon_position) : echo esc_attr('abcbiz-left-rabbon'); endif; ?>">
            <div class="abcbiz-cta-ribbon-text">
                <p><?php echo esc_html($abcbiz_settings['abcbiz_cta_ribbon_text']); ?></p>
            </div>
        </div> <!--/ CTA Rabbon Area -->
    <?php endif; ?>

    <!-- CTA Content Area -->
    <div class="abcbiz-cta-content-area">
        <?php if(!empty($abcbiz_subheading) || !empty($abcbiz_heading)) : ?>
            <div class="abcbiz-cta-heading">
                <?php if(!empty($abcbiz_subheading)) : ?>
                    <h4><?php echo esc_html($abcbiz_subheading); ?></h4>
                <?php endif; ?>
                <?php if(!empty($abcbiz_heading)) : ?>
                    <h2><?php echo esc_html($abcbiz_heading); ?></h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($abcbiz_description)) : ?>
            <div class="abcbiz-cta-description">            
                <?php echo wpautop(esc_html($abcbiz_description)); ?>         
            </div>
        <?php endif; ?>

    </div><!--/ CTA Content Area -->

    <?php if(!empty($abcbiz_btn1_text) || !empty($abcbiz_btn2_text)) : ?>
        <!-- CTA Button -->
        <div class="abcbiz-cta-button-area">
            <?php if(!empty($abcbiz_btn1_text)) : ?>
                <a <?php echo $this->get_render_attribute_string( 'abcbiz_cta_button_link_one' ); ?> class="abcbiz-cta-button"><?php echo esc_html($abcbiz_btn1_text); ?></a>
            <?php endif; ?>
            <?php if(!empty($abcbiz_btn2_text)) : ?>
                <a <?php echo $this->get_render_attribute_string( 'abcbiz_cta_button_link_two' ); ?> class="abcbiz-cta-button"><?php echo esc_html($abcbiz_btn2_text); ?></a>
            <?php endif; ?>
        </div><!--/ CTA Button -->
    <?php endif; ?>
</div><!--/ CTA Area -->